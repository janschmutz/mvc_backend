<?php
if ( !defined('CMS_EXEC') ) { exit; }


class LessonsView extends View {

	public function __construct($viewFolder, $request) {
		parent::__construct($viewFolder, $request);
	}


	public function display() {

		// Do something...

		return $this->loadTemplate();

	}


}

?>
