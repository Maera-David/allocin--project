<?php

class Artist extends Model
{
    public function __construct()
    {
        $this->pdo = parent::getPdo();
    }

    public function getAllArtist()
    {
        //$sql = 'SELECT * FROM artist';
        //$req = $this->pdo->prepare($sql);
        //$req->execute();
        //return $req->fetchAll();
    }

    public function getActorsFromOneFilm($id)
    {
        $sql = 'SELECT artiste.nom, artiste.prenom, film_has_artiste.role FROM artiste, film, film_has_artiste WHERE film.id = ? AND film.id = film_has_artiste.film_id AND film_has_artiste.artiste_id = artiste.id';
        $req = $this->pdo->prepare($sql);
        $req->execute([$id]);
        return $req->fetchAll();
    }
}