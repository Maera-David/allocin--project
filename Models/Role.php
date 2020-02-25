
<?php

class Role extends Model 
{
    public function __construct()
    {
        $this->pdo = parent::getPdo();
    }

    public function deleteRoles($id)
    {
        $sql = 'DELETE FROM film_has_artiste WHERE film_id = ?';
        $req = $this->pdo->prepare($sql);
        $req->execute([$id]);
    }

    public function addRoles($idFilm, $idArtiste, $role)
    {
        $sql = 'INSERT INTO film_has_artiste (film_id, artiste_id, role) VALUES (?, ?, ?)';
        $req = $this->pdo->prepare($sql);
        $req->execute([$idFilm, $idArtiste, $role]);
    }
}