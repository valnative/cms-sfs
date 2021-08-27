<?php
include_once('application/models/MSQL.php');

 //Менеджер новин
 
class M_News
{	
	private static $instance;	// екземпляр класу
	private $msql;				// драйвер БД
	private $sid;				// ідентифікатор поточної сесії
	private $aid;				// ідентифікатор поточного користувача
	
	// Отримання екземпляру класу
	// результат	- экземпляр класу MSQL
	public static function Instance() {
		if (self::$instance == null)
			self::$instance = new M_News();
			return self::$instance;
	}

	// Конструктор
	public function __construct() {
		$this->msql = new MSQL();
		$this->aid = null;
	}

	// Отримаємо список новин
	public function GetAllNews() {
		$query = "SELECT * FROM news";
		$result = $this->msql->Select($query);
		return $result;
	}

  // Отримаємо список FAQ
    public function GetAllFaq() {
        $query = "SELECT * FROM faq";
        $result = $this->msql->Select($query);
        return $result;
    }

	// Отримаємо статтю по id
	public function GetNewsById($id) {
		$q = "SELECT * FROM news WHERE  id = '%d'";
		$query = sprintf($q, $id);
		$result = $this->msql->Select($query);
		return $result[0];
	}
  
  //Редагування
  public function Edit($id_news, $title, $description) {
      // Підготовка
      $id_news = trim($id_news);

      // Запит
      $obj = array();
      $obj['title'] = $title;
      $obj['description'] = $description;

      $t = "id = '%d'";
      $where = sprintf($t, $id_news);
      $this->msql->Update('news', $obj, $where);
      return true;
    }

    public function Add($title, $description) {

        // Запит
        $obj = array();
        $obj['title'] = $title;
        $obj['description'] = $description;

        $id_file = $this->msql->Insert('news', $obj);

        return $id_file;
    }
    public function Del($id) {

        $where = "id=$id";
        $this->msql->Delete('news', $where);
    }
}
