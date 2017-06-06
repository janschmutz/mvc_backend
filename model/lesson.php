<?php
if ( !defined('CMS_EXEC') ) { exit; }


class LessonModel extends Model {


	public function getItem($id) {

		if (!$id) {
			return false;
		}


		$db = Factory::getDb();


		return $db->query("SELECT * FROM `lessons` WHERE `id` = ".(int)$id );


	}

}

?>
