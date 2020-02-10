
<?php
class Admin extends Model
{
    public function __construct()
    {
        $this->pdo = parent::getPdo();
    }

    //Select all films

    public function getAllFilms()

    {
        $sql = "SELECT * FROM film";
        $req = $this->pdo->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }
}
