<?php

class FilmController extends Controller                             
{
    public function __construct()
    {
        parent::__construct();
    }

    public function show(int $id)
    {
        $pageTwig = 'filmShow.html.twig';
        $template = $this->twig->load($pageTwig);
        echo $template->render();
    }
}