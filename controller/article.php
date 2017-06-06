<?php
if ( !defined('CMS_EXEC') ) { exit; }


class ArticleController extends Controller {

	
	public function __construct($request) {
		parent::__construct($request);
	}

	public function show($view) {
		
		$data = $this->model->getItem($view->request['id']);

		$view->assign('title', $data[0]['title']);
		$view->assign('content', $data[0]['content']);
		
	}
}
 	
?>