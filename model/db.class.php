<?php

//    if (file_exists('C:\xampp\htdocs\acessoFacilX\classes\config.class.php')) {
//        require_once ('C:\xampp\htdocs\acessoFacilX\classes\config.class.php');
//    }
    
//    if ($_SERVER['PHP_SELF'] == '/acessoFacilx/index.php'):
//        require_once ('class/config.class.php');
//    else:
//        require_once ('../class/config.class.php');
//    endif;
    
    require_once ('config.class.php');

class db {

	private static $instance;

	public static function getInstance(){

		if(!isset(self::$instance)){

			try {
				self::$instance = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
				self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
		return self::$instance;
	}
 	
	public static function prepare($sql){
		return self::getInstance()->prepare($sql);
	}

}