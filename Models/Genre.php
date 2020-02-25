<?php

class Genre extends Model
{
    public function __construct()
    {
       
        $this->pdo = parent::getPdo();
    }

    public function getAllGenre()
    {
        $sql = 'SELECT * FROM genre';
        $req = $this->pdo->prepare($sql);
        $req->execute();
        $genre = $req->fetchAll();
        return $genre;
    }

    public function getOneGenre($id)
    {
        $sql = 'SELECT * FROM genre WHERE id = ? ';
        $req = $this->pdo->prepare($sql);
        $req->execute([$id]);
        $genre = $req->fetch();
        return $genre;
    }

    public function update($id, $newValue)
    {
        $sql = 'UPDATE genre SET nom = ? WHERE id = ?';
        $req = $this->pdo->prepare($sql);
        $req->execute([$newValue, $id]);
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM genre WHERE id = ?';
        $req = $this->pdo->prepare($sql);
        $req->execute([$id]);
    }

    public function add($nom)
    {
        $sql = 'INSERT INTO genre (nom) VALUES(?)';
        $req = $this->pdo->prepare($sql);
        $req->execute([$nom]);
    }
}
 
