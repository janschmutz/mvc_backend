<?php


include('lib/helper/database.php');

class Factory {
	
	private static $db = false;
	
	public static function getDb() {
		
		if (!self::$db) {
			
			$config = (object)Config::get();
			
			// Database
			if ($config->dbHost && $config->dbUser && $config->dbPass && $config->dbName) {			
				
				self::$db = new Database($config->dbHost, $config->dbUser, $config->dbPass, $config->dbName);
				self::$db->connect();
					
			}
			
		}
		return self::$db;
				
	}
	

}
?>