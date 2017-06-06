<?php
if ( !defined('CMS_EXEC') ) { exit; }


class ArticlesModel extends Model {


	
    public function getItems() {  
		
		
		$db = Factory::getDb();
		
		return $db->query("SELECT * FROM `articles` ORDER BY id ");

    }  
    

  
}
 	
?>