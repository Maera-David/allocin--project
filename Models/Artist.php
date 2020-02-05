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
}