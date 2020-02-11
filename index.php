
<?php
require_once 'vendor/autoload.php';

//echo password_hash('admin', PASSWORD_BCRYPT,array('cost'=> 12)) ;

$router = new Router($_GET['url']);

//liste de nos routes
$router->get('/acteur', "Artist.listActeur");
$router->get('/film/:id', "Film.show");

$router->post('/admin/log', "Admin.checklogin");
$router->get('/admin/index', 'Admin.index');
$router->get('/admin', "Admin.login");//Ajout la route pour Admin
$router->get('/admin/genre','Admin.genre');
$router->get('/admin/film','Admin.film');
$router->get('/admin/acteur','Admin.acteur');
$router->get('/admin/realisateur','Admin.realisateur');

$router->get('/', 'Home.index');
$router->run();
