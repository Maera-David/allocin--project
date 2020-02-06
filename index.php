<?php
require_once 'vendor/autoload.php';

//echo password_hash('admin', PASSWORD_BCRYPT,array('cost'=> 12)) ;

$router = new Router($_GET['url']);

//liste de nos routes
$router->get('/acteur', "Artist.listActeur");
$router->get('/', 'Home.index');
$router->get('/admin', "Admin.login");
$router->post('/admin/log', "Admin.checklogin");

$router->run();