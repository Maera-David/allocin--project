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
        $pageTwig = '.html.twig';
        $template = self::$_twig->load($pageTwig);
        echo $template->render(['actors' => $actors]);
    }

    public function listRealisateur()
    {
       // $artists = $this->model->getAllArtist();
        $instanceArtiste = new Artist();
        $reals = $instanceArtiste->getAllReal();  
    }

    public function showActor(int $id)
    {
        $pageTwig = 'infoActeur.html.twig';
        $template = $this->twig->load($pageTwig);
        echo $template->render();
    }
}