<?php

class Film extends Model
{
    public function __construct()
    {
        $this->pdo = parent::getPdo();
    }

    public function getAllFilm()
    {
        /*$sql = 'SELECT * FROM film';
        $req = $this->pdo->prepare($sql);
        $req->execute();
        $films = $req->fetchAll();
        return $films;*/
        
    }
}