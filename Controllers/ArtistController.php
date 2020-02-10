<?php

class ArtistController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new Artist();
    }

    public function listActeur()
    {
        $instanceArtiste = new Artist();
        $actors = $instanceArtiste->getAllActors();  
        $pageTwig = 'artists.html.twig';
        $template = self::$_twig->load($pageTwig);
        echo $template->render(['artists' => $actors]);
    }

    public function listRealisateur()
    {
       // $artists = $this->model->getAllArtist();
        $instanceArtiste = new Artist();
        $reals = $instanceArtiste->getAllReal(); 
        $pageTwig = 'artists.html.twig';
        $template = self::$_twig->load($pageTwig);
        echo $template->render(['artists' => $reals]);
    }
}