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
       
    }

    public function showActor(int $id)
    {
        $pageTwig = 'infoActeur.html.twig';
        $template = $this->twig->load($pageTwig);
        echo $template->render();
    }
}