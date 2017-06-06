<?php
class Controller {

	private $request = null;
	private $template = '';
	private $task = '';
	private $view = null;
	public $model = null;

	/**
	 * Konstruktor, erstellet den Controller.
	 *
	 * @param Array $request Array aus $_GET & $_POST.
	 */
	public function __construct($request){
		//$this->view = new View();
		$this->request = $request;
		$this->template = !empty($request['layout']) ? $request['layout'] : 'default';
		$this->task = !empty($request['task']) ? $request['task'] : 'show';
	}

	/**
	 * Methode zum anzeigen des Contents.
	 *
	 * @return String Content der Applikation.
	 */
	public function display(){
		

		$this->model = $this->getModel();
	
		$viewFolder = ROOT.'/view/'.$this->request['view'];
		$this->view = $this->getView($viewFolder, $this->request);
				
		if( method_exists($this, $this->task ) ) {
			$this->{$this->task}($this->view);
		}
		
		$this->view->setTemplate($this->template);

		return $this->view->display();

	}
	
	public function show($view) {
		return;
	}
	
	public function login() {
		
		
		$name = trim($this->request['name']);
		$password = trim($this->request['password']);
		
		if (!$name || !$password) {
			return false;
		}
		
		
		$db = Factory::getDb();

		
		$result = $db->query("SELECT `id` FROM `users` WHERE `name` = '".$name."' AND `pass` = '".$password."' ");
		
		
		if ($result && $result[0] && $result[0]['id']) {
			$_SESSION['userID'] = $result[0]['id'];
		} else {
			header('Location: '.URL);
		}
		
		
		if ($this->request['returnUrl']) {
			header('Location: '.URL.$this->request['returnUrl']);
		}
		
		return;
	}
	
	public function logout() {
		
		$_SESSION['userID'] = false;
		
		if ($this->request['returnUrl']) {
			header('Location: '.URL.$this->request['returnUrl']);
		} else {
			header('Location: '.URL);
		}
		
		return;
	}
	
	public function register() {
		

		$name = trim($this->request['name']);
		$password = trim($this->request['password']);
		$password2 = trim($this->request['password2']);
		
		if ($password != $password2) {
			return false;
		}
		
		if (!$name || !$password) {
			return false;
		}
		
		
		$db = Factory::getDb();

		
		$db->query("INSERT INTO `users` (`name`, `pass`) VALUES ('".$name."', '".$password."')");
		
		if ($this->request['returnUrl']) {
			header('Location: '.URL.$this->request['returnUrl']);
		}
		
		return;
	}
	

	
	private function getView($viewFolder, $request) {
		
		$viewName = ucfirst($this->request['view']).'View';
		$viewFile = $viewFolder.'/view.php';

		if (file_exists($viewFile)) {
		  include_once($viewFile);
		  return new $viewName($viewFolder, $request);
		} else {
		  die('No View');
		  return false;
		}
		
		if (!$view) {
		  die('Error with View');
		  return false;
		}
		
	}
	
	
	public function getModel() {
	
		$modelName = ucfirst($this->request['view']).'Model';
		$modelFile = ROOT.'/model/'.$this->request['view'].'.php';
		
		if (file_exists($modelFile)) {
		  include_once($modelFile);
		  return new $modelName();
		} else {
		  return false;
		}
		
		if (!$model) {
		  return false;
		}

	
	
	}
	
	
}
?>