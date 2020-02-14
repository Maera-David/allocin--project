<?php

class FilmController extends Controller
{
    public function __construct()
    {
        self::$_twig = parent::getTwig();
    }

    public function show(int $id)
    {
        //var_dump($id);
        $instanceFilm = new Film();
        $film = $instanceFilm->getOneFilm($id);
        $instanceArtiste = new Artist();
        $actors = $instanceArtiste->getActorsFromOneFilm($id);
        $pageTwig = 'filmShow.html.twig';
        $template = self::$_twig->load($pageTwig);
        echo $template->render(['film' => $film, 'artists' => $actors]);
    }

}