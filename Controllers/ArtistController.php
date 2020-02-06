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
        //$artists = $this->model->getAllArtist();
        //var_dump($artists); //{% for artist in artists %} {{artist.nom}}
    }
}