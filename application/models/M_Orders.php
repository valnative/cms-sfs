<?php
include_once('application/models/MSQL.php');

//Менеджер звітів
class M_Orders
{	
	private static $instance;	// екземпляр класу
	private $msql;				// драйвер БД
	private $sid;				// ідентифікатор поточної сесії
	private $aid;				// ідентифікатор поточного користувача
	
	// Отримання екземпляру класу
  // результат  - экземпляр класу MSQL
	public static function Instance() {
		if (self::$instance == null)
			self::$instance = new M_Orders();
			
		return self::$instance;
	}

	// Конструктор
	public function __construct() {
		$this->msql = new MSQL();
		$this->aid = null;
	}

  // Отримання з БД перелік бланків звітності
	public function GetAllOrders() {
		$query = "SELECT * FROM blank WHERE type = 0";
		$result = $this->msql->Select($query);
		return $result;
	}

	// Отримання з БД перелік бланків запитів
	public function GetAllZapiti() {
		$query = "SELECT * FROM blank WHERE type = 1";
		$result = $this->msql->Select($query);
		return $result;
	}
	
  // Отримання бланку по id

  public function GetOrderById($id) {
      $q = "SELECT * FROM blank	WHERE  id = '%d'";
      $query = sprintf($q, $id);
      $result = $this->msql->Select($query);
      return $result[0];
    }

  // Отримання з БД даних програмного забезпечення по id
  public function GetSoftById($id) {
      $q = "SELECT * FROM blank WHERE id =  '%d'";
      $query = sprintf($q, $id);
      $result = $this->msql->Select($query);
      return $result[0];
    }

  // Отримання з БД дані щодо переліку ПЗ
  public function GetAllSoft() {
      $query = "SELECT * FROM blank WHERE type = 2";
      $result = $this->msql->Select($query);
      return $result;
    }

  public function InsertToUpload($file_name, $id_user) {

      // Запит
      $obj = array();
      $obj['file_name'] = $file_name;
      $obj['id_user'] = $id_user;
      $id_file = $this->msql->Insert('upload', $obj);
      return $id_file;
    }

// Отримання набору полів для онлайн заповнення звіту (в розробці)
		public function GetTemplatesById($id) {
		$q = "SELECT t.name, tf.group, tf.sort, f.id, f.name, f.type FROM templates AS t 
    INNER JOIN templates_fields AS tf ON t.id = tf.id_templates
    INNER JOIN fields AS f ON f.id = tf.id_fields
		WHERE  t.id =  '%d'  ORDER BY tf.group ASC, tf.sort ASC  ";
		$query = sprintf($q, $id);
		$result = $this->msql->Select($query);
		return $result;
	}
}
