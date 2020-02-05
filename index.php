<?php
require_once 'vendor/autoload.php';

$router = new Router($_GET['url']);

//liste de nos routes
$router->get('/acteur', "Artist.listActeur");
$router->get('/', 'Home.index');
$router->get('/admin', "Admin.login"); //Ajout la route pour Admin
$router->post('/admin/log', "Admin.checklogin"); 
$router->run();
