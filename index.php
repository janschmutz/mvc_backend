<?php
session_start();

define('CMS_EXEC',1);
define('ROOT',__DIR__);
define('URL', "http://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]");


// unsere Klassen einbinden
include('lib/cms/controller.php');
include('lib/cms/model.php');
include('lib/cms/view.php');

// $_GET und $_POST zusammenfasen, $_COOKIE interessiert uns nicht.
$request = array_merge($_GET, $_POST);


// Config
include('lib/helper/config.php');
include('config/config.php');

// Factory
include ('lib/helper/factory.php');

// Request
if (!$request['view']) {
	$request['view'] = 'home';
}

// Controller erstellen
$controllerName = ucfirst($request['view']).'Controller';
$controllerFile = ROOT.'/controller/'.$request['view'].'.php';

if (file_exists($controllerFile)) {
	include_once($controllerFile);
	$controller = new $controllerName($request);
} else {
	$controller = new Controller($request);
}


if (!$controller) {
  die('Error with Controller');
}


// Inhalt der Webanwendung ausgeben.
echo $controller->display();

?>