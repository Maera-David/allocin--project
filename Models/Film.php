<?php

class Film extends Model
{
    public function __construct()
    {
        $this->pdo = parent::getPdo();
    }

    public function getLast3Films()
    {
        $sql = 'SELECT * FROM film ORDER BY id DESC LIMIT 3';
        $req = $this->pdo->prepare($sql);
        $req->execute();
        $films = $req->fetchAll();
        return $films;
    }

    public function getOneFilm($id)
    {
        $sql = 'SELECT film.*, genre.nom AS genre, artiste.nom AS nomReal, artiste.prenom AS prenomReal, artiste.id AS idReal FROM film, artiste, genre WHERE film.id = ? AND film.genre_id = genre.id AND film.artiste_id = artiste.id';
        $req = $this->pdo->prepare($sql);
        $req->execute([$id]);
        $film = $req->fetch();
        return $film;
    }

    public function getAllFilmByOneReal($id)
    {
        $sql = 'SELECT * FROM film WHERE artiste_id = ?';
        $req = $this->pdo->prepare($sql);
        $req->execute([$id]);
        $films = $req->fetchAll();
        return $films;
    }

    public function getAllFilmByOneActor($id)
    {
        $sql = 'SELECT film.titre, film.id FROM film, film_has_artiste, artiste WHERE artiste.id = ? AND film_has_artiste.artiste_id = artiste.id AND film_has_artiste.film_id = film.id';
        $req = $this->pdo->prepare($sql);
        $req->execute([$id]);
        $films = $req->fetchAll();
        return $films;
    }

    public function getAllfilm()
    {
        $sql = 'SELECT * FROM film ORDER BY id';
        $req = $this->pdo->prepare($sql);
        $req->execute();
        $films = $req->fetchAll();
        return $films; 
    }
}
