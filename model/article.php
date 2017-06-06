<?php
if ( !defined('CMS_EXEC') ) { exit; }


class ArticleModel extends Model {


	public function getItem($id) {  
		
		if (!$id) {
			return false;
		}
	
		
		$db = Factory::getDb();
		
		
		return $db->query("SELECT * FROM `articles` WHERE `id` = ".(int)$id );

	
	}  
  
}
 	
?>