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
}