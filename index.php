<?php
require_once 'vendor/autoload.php';

//echo password_hash('admin', PASSWORD_BCRYPT,array('cost'=> 12)) ;

$router = new Router($_GET['url']);


//liste de nos routes
$router->get('/acteur/:id', "Artist.showActeur");
$router->get('/acteur', "Artist.listActeur");
$router->get('/film/:id', "Film.show");
$router->get('/film', "Film.listFilm");
$router->get('/realisateur/:id',"Artist.showReal");
$router->get('/realisateur', "Artist.listRealisateur");

//Les routes pour Admin
$router->post('/admin/log', "Admin.checklogin");
$router->get('/admin/index', 'Admin.index');
$router->get('/admin', "Admin.login");

//Ajout des routes pour Admin Genre
$router->get('/admin/genre','Admin.genre');
$router->get('/admin/genreUpdate/:id','Admin.genreUpdate');
$router->post('/admin/genreUpdate/:id','Admin.genreUpdate');
$router->get('/admin/genreDelete/:id','Admin.genreDelete');
$router->get('/admin/genreAdd','Admin.genreAdd');
$router->post('/admin/genreAdd','Admin.genreAdd'); 

//Ajout des routes pour Admin Films
$router->get('/admin/film','Admin.film');
$router->post('/admin/filmUpdate/:id','Admin.filmUpdate');
$router->get('/admin/filmUpdate/:id','Admin.filmUpdate');

$router->get('/admin/filmDelete/:id','Admin.filmDelete');
$router->get('/admin/filmAdd','Admin.filmAdd');
$router->post('/admin/filmAdd','Admin.filmAdd'); 

//Ajout des routes pour Admin Acteurs
$router->get('/admin/acteur','Admin.acteur');
$router->post('/admin/acteurAdd', 'Admin.acteurAdd');
$router->get('/admin/acteurAdd', 'Admin.acteurAdd');
$router->post('/admin/acteurAddTraitement','Admin.acteurAddTraitement');
$router->get('/admin/acteurUpdate/:id','Admin.acteurUpdate');

//Ajout des routes pour Admin Role
$router->get('/admin/role','Admin.role');
$router->post('/admin/roleAdd','Admin.roleAdd');
$router->get('/admin/roleAdd','Admin.roleAdd');
$router->post('/admin/roleUpdate/:id', 'Admin.roleUpdate');
$router->get('/admin/roleUpdate/:id', 'Admin.roleUpdate');

$router->get('/', 'Home.index');
$router->run();
