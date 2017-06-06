<?php
if ( !defined('CMS_EXEC') ) { exit; }


class LessonsModel extends Model {



    public function getItems() {


		$db = Factory::getDb();

		return $db->query("SELECT * FROM `lessons` ORDER BY id ");

    }



}

?>
