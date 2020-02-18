<?php
require_once 'vendor/autoload.php';

//echo password_hash('admin', PASSWORD_BCRYPT,array('cost'=> 12)) ;

$router = new Router($_GET['url']);

//liste de nos routes
$router->get('/acteur/:id', "Artist.showActeur");
$router->get('/acteur', "Artist.listActeur");
$router->get('/film/:id', "Film.show");
$router->get('/realisateur/:id',"Artist.showReal");
$router->get('/realisateur', "Artist.listRealisateur");
$router->get('/', 'Home.index');


$router->post('/admin/log', "Admin.checklogin");
$router->get('/admin/index', 'Admin.index');
$router->get('/admin', "Admin.login");
$router->get('/admin/genre','Admin.genre');
$router->get('/admin/genreUpdate/:id','Admin.genreUpdate');
$router->post('/admin/genreUpdate/:id','Admin.genreUpdate');
$router->get('/admin/genreDelete/:id','Admin.genreDelete');
$router->get('/admin/genreAdd','Admin.genreAdd');
$router->post('/admin/genreAdd','Admin.genreAdd')
;
$router->get('/admin/acteur','Admin.acteur');
$router->post('/admin/acteurAdd', 'Admin.acteurAdd');
$router->get('/admin/acteurAdd', 'Admin.acteurAdd');
$router->post('/admin/acteurAddTraitement','Admin.acteurAddTraitement');
$router->get('/admin/acteurUpdate/:id','Admin.acteurUpdate');

$router->get('/admin/film','Admin.film');

$router->get('/', 'Home.index');

$router->run();
