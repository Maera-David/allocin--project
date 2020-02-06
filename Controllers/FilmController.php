<?php

class FilmController extends Controller
{
    public function __construct()
    {
        $this->twig = parent::getTwig();
    }

    public function show(int $id)
    {
        var_dump($id);
    }

}