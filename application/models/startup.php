<?php
class DataBase
{
	private static $instance;
		
	//Отримання єдиного екземпляру (одиночка).
	
	public static function Instance() {
		if (self::$instance == null)
			self::$instance = new DataBase();
		
		return self::$instance;
	}
	
	public function startup()
  {
    //Настройки підключення до БД
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbName = 'db_sfs';

    //Настройка мови
    setlocale(LC_ALL, 'uk_UA.UTF8');

    //Підключення до БД

    $link = mysqli_connect($hostname, $username, $password, $dbName);
    mysqli_query($link, 'set names utf8');
      return $link;
  }
public function StartSession(){

		// Відкриття сесії
		session_start();
	}
}	