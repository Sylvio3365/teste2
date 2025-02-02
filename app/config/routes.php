<?php

use app\controllers\ApiExampleController;
use app\controllers\WelcomeController;
use app\controllers\AdminController;
use flight\Engine;
use flight\net\Router;
//use Flight;

/** 
 * @var Router $router 
 * @var Engine $app
 */
/*$router->get('/', function() use ($app) {
	$Welcome_Controller = new WelcomeController($app);
	$app->render('welcome', [ 'message' => 'It works!!' ]);
});*/


$Admin_Controller = new AdminController();
$router->get('/', [$Admin_Controller, 'goLoginAdmin']);
$router->post('/traitement/login', [$Admin_Controller, 'verifierLogin']);

$router->get('/hello', function () {
	echo '<h1>Hello world! Oh hey ';
});

//$router->get('/', \app\controllers\WelcomeController::class.'->home'); 

$router->get('/hello-world/@name', function ($name) {
	echo '<h1>Hello world! Oh hey ' . $name . '!</h1>';
});
