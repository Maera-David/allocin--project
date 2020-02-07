<?php

class Film extends Model
{
    public function __construct()
    {
        $this->pdo = parent::getPdo();
    }

    public function getLast6Films()
    {
        $sql = 'SELECT * FROM film ORDER BY id DESC LIMIT 6';
        $req = $this->pdo->prepare($sql);
        $req->execute();
        $films = $req->fetchAll();
        return $films;
    }

    public function getOneFilm($id)
    {
        $sql = 'SELECT film.*, genre.nom AS genre, artiste.nom AS nomReal, artiste.prenom AS prenomReal FROM film, artiste, genre WHERE film.id = ? AND film.genre_id = genre.id AND film.artiste_id = artiste.id';
        $req = $this->pdo->prepare($sql);
        $req->execute([$id]);
        $film = $req->fetch();
        return $film;
    }
}