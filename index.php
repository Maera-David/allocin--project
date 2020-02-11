<?php
require_once 'vendor/autoload.php';

$router = new Router($_GET['url']);

//liste de nos routes
$router->get('/acteur', "Artist.listActeur");
$router->get('/acteur/:id', "Artist.showActeur");
$router->get('/film/:id', "Film.show");
$router->get('/', 'Home.index');
$router->get('/realisateur', "Artist.listRealisateur");
$router->get('/realisateur/:id',"Artist.showReal");

$router->run();