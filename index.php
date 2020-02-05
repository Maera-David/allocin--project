<?php
require_once 'vendor/autoload.php';

$router = new Router($_GET['url']);

//liste de nos routes
$router->get('/acteur', "Artist.listActeur");
$router->get('/', 'Home.index');

$router->run();