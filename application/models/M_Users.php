<?php
include_once('application/models/MSQL.php');

// Менеджер користувачів

class M_Users
{
    private static $instance;  // екземпляр класу
    private $msql;        // драйвер БД
    private $sid;        // ідентифікатор поточної сесії
    private $uid;        // ідентифікатор поточного користувача

    // Отримання екземпляру класу
    // результат    - экземпляр класу MSQL
    public static function Instance()
    {
        if (self::$instance == null)
            self::$instance = new M_Users();

        return self::$instance;
    }
    
    // Конструктор
    public function __construct()
    {
        $this->msql = new MSQL();
        $this->sid = null;
        $this->uid = null;
    }

    // Очистка сесій, які не використовуюьбся
    public function ClearSessions()
    {
        $min = date('Y-m-d H:i:s', time() - 60 * 20);
        $t = "time_last < '%s'";
        $where = sprintf($t, $min);
        $this->msql->Delete('sessions', $where);
    }

    // Авторизація
    // $login 		- логін
    // $password 	- пароль
    // $remember 	- чи потрібно запамятовувати в куках
    // результат	- true или false
    public function Login($login, $password, $remember = true)
    {
        // вибираєм користувача з БД
        $user = $this->GetByLogin($login);
               if ($user == null)
            return false;

        $id_user = $user['id'];
        // перевірка пароля
        if ($user['password'] != md5(md5($password)))
            return false;

        // запамятовуєм ім'я и md5(пароль)
        if ($remember) {
            $expire = time() + 3600 * 24 * 100;
            setcookie('login', $login, $expire);
            setcookie('password', md5(md5($password)), $expire);
        }

        // відкриваєм сесію і запам'ятовуємо SID
        $this->sid = $this->OpenSession($id_user);
        $_SESSION['user'] = ucfirst($login);
        return true;
    }

    // Вихід
    public function Logout()
    {
        setcookie('login', '', time() - 1);
        setcookie('password', '', time() - 1);
        unset($_COOKIE['login']);
        unset($_COOKIE['password']);
        unset($_SESSION['sid']);
        unset($_SESSION['user']);
        $this->sid = null;
        $this->uid = null;
    }

    // Отримуєм користувача
    // $id_user	- якщо не вказаний, то берем поточного
    // результат - об'єкт користувача
    //
    public function Get($id_user = null)
    {
        // Якщо id_user не вказно, беремо його по поточній сесії
        if ($id_user == null)
            $id_user = $this->GetUid();

        if ($id_user == null)
            return null;

        // А зараз просто повертаєм користувача по id_user
        $t = "SELECT *, u.id AS id_user FROM users AS u
				INNER JOIN city AS c ON c.id = u.city
				WHERE u.id = '%d'";
        $query = sprintf($t, $id_user);
        $result = $this->msql->Select($query);
        return $result[0];
    }
    
    // Отримує користувача
    public function GetUsers()
    {
        $query = "SELECT * FROM users";
        $result = $this->msql->Select($query);
        return $result;
    }

    // Отримує користувача по логіну
    public function GetByLogin($login)
    {
        $query = "SELECT * FROM users WHERE login = '".$login."'";
        $result = $this->msql->Select($query);
        return $result[0];
    }

    // Отримує користувача по логіну
    public function CountByLogin($login)
    {
        $query = "SELECT COUNT(id) FROM users WHERE login = '".$login."'";
        $result = $this->msql->Count($query);
        return $result[0];
    }

    // Отримує користувача по e-mail
    public function CountByMail($mail)
    {
        $query = "SELECT COUNT(id) FROM users WHERE mail = '%s'";
        $result = $this->msql->Count($query);
        return $result;
    }

    // Отримує користувача по e-mail
    public function GetByMail($email)
    {
        $query = "SELECT id, login FROM users WHERE mail = '".$email."'";
        $result = $this->msql->Select($query);
        return $result[0];
    }
    
    // Отримання переліку міст
    // $id	- регіон
    // результат	- перелік міст
       public function GetCityByRegion($id = null)
    {

        if ($id == null)
            return null;

        $query = "SELECT * FROM city WHERE region = '%d'";
        $query = sprintf($t, $id);
        $result = $this->msql->Select($query);
        return $result;
    }

    //
    // Проверка наличия привилегии
    // $priv 		- имя привилегии
    // $id_user		- если не указан, значит, для текущего
    // результат	- true или false
    //
    public function Can($priv, $id_user = null)
    {
        $query = "SELECT id_session FROM sessions WHERE sid = '%s'";
        $query = sprintf($t, $id_user, mysqli_real_escape_string($priv));
        $result = $this->msql->Select($query);
        if (count($result) == 0)
            return false;
    }
    
    // Перевірка активності користувача
    // $id_user		- ідентифікатор
    // результат	- true если online
    //
    public function IsOnline($id_user)
    {
        $t = "SELECT id_session FROM sessions WHERE sid = '%d'";
        $query = sprintf($t, $id_user);
        $result = $this->msql->Select($query);
        if (count($result) == 0)
            return null;
        return false;
    }

    // Отримання id поточного користувача
    // результат	- UID

    public function GetUid()
    {
        // Первірка кеша.
        if ($this->uid != null)
            return $this->uid;

        // Беремо по поточній сесії
        $sid = $this->GetSid();

        if ($sid == null)
            return null;

        $query = "SELECT id_user FROM sessions WHERE sid = '".$sid."'";
        $result = $this->msql->Select($query);

        // Якщо сесію не знайшли - значить користувач не авторизований
        if (count($result) == 0)
            return null;

        // Якщо знайшли - запам'ятовуєм її
        $this->uid = $result[0]['id_user'];
        return $this->uid;
    }

    // Функція повертає ідентифікатор поточної сесії
    // результат	- SID
    //
    private function GetSid()
    {
        // Перевірка кеша
        if ($this->sid != null)
            return $this->sid;

        // Шукаємо SID в сесії
        $sid = $_SESSION['sid'];

        // Якщо знайшли, спробуєм оновити time_last в базі
        // Водночасі первірим, чи є сесія там
        if ($sid != null) {
            $session = array();
            $session['time_last'] = date('Y-m-d H:i:s');
            $t = "sid = '%s'";
            $where = sprintf($t, $sid);
            $affected_rows = $this->msql->Update('sessions', $session, $where);

            if ($affected_rows == 0) {
                $query = "SELECT count(*) FROM sessions WHERE sid = '%s'";
                $result = $this->msql->Select($query);

                if ($result[0]['count(*)'] == 0)
                    $sid = null;
            }
        }

        // Якщо немає сесії, то шукаєм логін і md5(пароль) в куках.
        // Тобто спробуєм перепідключитись
        if ($sid == null && isset($_COOKIE['login'])) {
            $user = $this->GetByLogin($_COOKIE['login']);

            if ($user != null && $user['password'] == $_COOKIE['password'])
                $sid = $this->OpenSession($user['id_user']);
        }

        // Запам'ятовуєм в кеш
        if ($sid != null)
            $this->sid = $sid;

        // Нарешті повертаєм SID.
        return $sid;
    }

    // Відкриття нової сесії
    // результат	- SID
    private function OpenSession($id_user)
    {
        // генеруєм SID
        $sid = $this->GenerateStr(10);

        // вставляємо SID до БД
        $now = date('Y-m-d H:i:s');
        $session = array();
        $session['id_user'] = $id_user;
        $session['sid'] = $sid;
        $session['time_start'] = $now;
        $session['time_last'] = $now;
        $this->msql->Insert('sessions', $session);

        // реєструєм сесію в PHP сесії
        $_SESSION['sid'] = $sid;

        // повертаєм SID
        return $sid;
    }

    public function AddUser($login, $password, $email, $fam, $name, $otch, $city = 1, $kod = 1, $address = '')
    {
        // Підготовка
        $login = trim($login);
        $password = md5(md5(trim($password)));
        $email = trim($email);
        $fam = trim($fam);
        $name = trim($name);
        $otch = trim($otch);
        $city = (int)trim($city);
        $kod = trim($kod);
        $address = trim($address);

        // Перевірка
        if ($login == '')
            return false;

        // Запит
        $obj = array();
        $obj['login'] = $login;
        $obj['fam'] = $fam;
        $obj['name'] = $name;
        $obj['otch'] = $otch;
        $obj['kod'] = $kod;
        $obj['city'] = $city;
        $obj['password'] = $password;
        $obj['mail'] = $email;
        $obj['address'] = $address;
        $obj['hash'] = '16838ad78c01771e79c21dc448308b97';
        $obj['id_role'] = '1';

        $id_user = $this->msql->Insert('users', $obj);

        $this->sid = $this->OpenSession($id_user);
        $_SESSION['user'] = $login;
        return $id_user;
    }

    //
    // Змінити пароль
    //
    public function Repass($id_user, $pass)
    {
        // Підготовка
        $id_user = trim($id_user);
        $pass = trim($pass);

        // Перевірка
        if ($pass == '')
            return false;

        // Запит
        $obj = array();
        $obj['password'] = $pass;

        $t = "id = '%d'";
        $where = sprintf($t, $id_user);
        $this->msql->Update('users', $obj, $where);
        return true;
    }

    //
    // Редагування користувача
    //
    public function Edit($id_user, $name, $pass, $mail)
    {
        // Підготовка
        $id_user = trim($id_user);
        $pass = trim($pass);

        // Перевірка
        if ($pass == '')
            return false;
        // Запит
        $obj = array();
        $obj['name'] = $name;
        $obj['password'] = $pass;
        $obj['mail'] = $mail;

        $t = "id = '%d'";
        $where = sprintf($t, $id_user);
        $this->msql->Update('users', $obj, $where);
        return true;
    }

    //
    // Генерація случайной последовательности
    // $length 		- ее длина
    // результат	- случайная строка
    //
    public function GenerateStr($length = 10)
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
        $code = "";
        $clen = strlen($chars) - 1;

        while (strlen($code) < $length)
            $code .= $chars[mt_rand(0, $clen)];

        return $code;
    }

}
