<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");

error_reporting(E_ALL);
ini_set("display_errors", 1);

require __DIR__ . '/../vendor/autoload.php';

// Create Router instance
$router = new \Bramus\Router\Router();

$router->setNamespace('Controllers');

// routes for the nieuws endpoint
$router->get('/nieuws', 'NieuwsController@getAll');

// routes for the trainingstijden endpoint 
$router->get('/trainingstijden', 'ProgrammaController@getAll');

// routes for the wedstrijdschema endpoint WedstrijschemaController
$router->get('/wedstrijdschema', 'WedstrijdController@getAll');
$router->post('/wedstrijdschema', 'WedstrijdController@create');
$router->delete('/wedstrijdschema/(\d+)', 'WedstrijdController@delete');

// routes for the login endpoint
$router->post('/login', 'LoginController@Login');

// routes for the speler endpoint
$router->get('/spelers', 'SpelerController@getAll');
$router->get('/spelers/(\d+)', 'SpelerController@getOne');
$router->post('/spelers', 'SpelerController@create');
$router->put('/spelers/(\d+)', 'SpelerController@update');
$router->delete('/spelers/(\d+)', 'SpelerController@delete');


// Run it!
$router->run();