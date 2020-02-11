<?php

class Artist extends Model
{
    public function __construct()
    {
        $this->pdo = parent::getPdo();
    }

    public function getAllReal()
    {
        $sql = 'SELECT DISTINCT artiste.nom, artiste.prenom, artiste.id, artiste.photo FROM `film`, `artiste` WHERE film.artiste_id = artiste.id';
        $req = $this->pdo->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }

    public function getActorsFromOneFilm($id)
    {
        $sql = 'SELECT artiste.nom, artiste.prenom, film_has_artiste.role FROM artiste, film, film_has_artiste WHERE film.id = ? AND film.id = film_has_artiste.film_id AND film_has_artiste.artiste_id = artiste.id';
        $req = $this->pdo->prepare($sql);
        $req->execute([$id]);
        return $req->fetchAll();
    }

    public function getAllActor()
    {
        $sql = 'SELECT DISTINCT artiste.nom, artiste.prenom,artiste.id, artiste.photo FROM film_has_artiste, artiste WHERE film_has_artiste.artiste_id = artiste.id';
        $req = $this->pdo->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }

    public function getOneReal($id)
    {
        $sql = 'SELECT artiste.nom, artiste.prenom, artiste.photo, artiste.biographie, artiste.date_de_naissance FROM artiste WHERE artiste.id = ?';
        $req = $this->pdo->prepare($sql);
        $req->execute([$id]);
        return $req->fetch();
    }

    public function getOneActor($id)
    {
        $sql = 'SELECT artiste.nom, artiste.prenom, artiste.photo, artiste.biographie, artiste.date_de_naissance FROM artiste WHERE artiste.id = ?';
        $req = $this->pdo->prepare($sql);
        $req->execute([$id]);
        return $req->fetch();
    }
}