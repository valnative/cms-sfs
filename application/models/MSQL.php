<?php
// Помічник роботи з БД
class MSQL
{
    public $link;

    public function __construct()
    {
        $db = DataBase::instance();
        $this->link = $db->startup();
    }
    //
    // Вибірка строк
    // $query    	- повний текст SQL-запиту
    // результат	- масив вибраних об'єктів
    //
    public function Select($query)
    {
        $result = mysqli_query($this->link, $query);
        if (!$result)
            die(mysqli_error($this->link));

        $n = mysqli_num_rows($result);
        $arr = array();
        for ($i = 0; $i < $n; $i++) {
            $row = mysqli_fetch_assoc($result);
            $arr[] = $row;
        }
        return $arr;
    }

    public function Count($query)
    {
        $result = mysqli_query($this->link, $query);
        if (!$result)
            die(mysqli_error($this->link));
        return mysqli_fetch_row($result);
    }
    //
    // Вставка строки
    // $table 		- им'я таблицы
    // $object 		- асоціативний масив з парами вида "ім'я стовпчика - значення"
    // результат	- ідентифікатор нової строки
    //
    public function Insert($table, $object)
    {
        $columns = array();
        $values = array();

        foreach ($object as $key => $value) {
            $key = mysqli_real_escape_string($this->link, $key . '');
            $columns[] = $key;

            if ($value === null) {
                $values[] = 'NULL';
            } else {
                $value = mysqli_real_escape_string($this->link, $value . '');
                $values[] = "'$value'";
            }
        }
        $columns_s = implode(',', $columns);
        $values_s = implode(',', $values);
        $query = "INSERT INTO $table ($columns_s) VALUES ($values_s)";
        $result = mysqli_query($this->link, $query);
        if (!$result)
            die(mysqli_error($this->link));

        return mysqli_insert_id($this->link);
    }
    //
    // Зміна строк
    // $table 		- ім'я таблицы
    // $object      - асоціативний масив з парами вида "ім'я стовпчика - значення"
    // $where		- умова (частина SQL запиту)
    // результат	- число змінених строк
    //
    public function Update($table, $object, $where)
    {
        $sets = array();
        foreach ($object as $key => $value) {
            $key = mysqli_real_escape_string($this->link, $key . '');
            $columns[] = $key;

            if ($value === null) {
                $sets[] = "$key = NULL";
            } else {
                $value = mysqli_real_escape_string($this->link, $value . '');
                $sets[] = "$key = '$value'";
            }
        }
        $sets_s = implode(',', $sets);
        $query = "UPDATE $table SET $sets_s WHERE $where";
        $result = mysqli_query($this->link, $query);

        if (!$result)
            die(mysqli_error($this->link));
        return mysqli_affected_rows($this->link);
    }
    //
    // Видалення строк
    // $table 		- ім'я таблиці
    // $where		- умова (частина SQL запиту)
    // результат	- число видалених строк
    //
    public function Delete($table, $where)
    {
        $query = "DELETE FROM $table WHERE $where";
        $result = mysqli_query($this->link, $query);
        if (!$result)
            die(mysqli_error($this->link));

        return mysqli_affected_rows($this->link);
    }
}
