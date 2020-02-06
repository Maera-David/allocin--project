<?php

class FilmController extends Controller
{
    public function __construct()
    {
        self:$_twig = parent::getTwig();
    }

    public function show(int $id)
    {
        //var_dump($id);
        $instanceFilm = new Film();
        $film = $instanceFilm->getOneFilm($id);
        $pageTwig = 'show.html.twig';
        $template = $this->twig->load($pageTwig);
        echo $template->render(['film' => $film]);
    }

}