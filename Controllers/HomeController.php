<?php

class HomeController extends Controller
{
    public function __construct()
    {
        $this->twig = parent::getTwig();
    }

    public function index()
    {
        //var_dump($this->twig);
        $film = new Film();
        $film->getAllFilm();
        $pageTwig = 'index.html.twig';
        $template = $this->twig->load($pageTwig);
        echo $template->render();
    }
}