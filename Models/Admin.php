
<?php
class Admin extends Model
{
    public function __construct()
    {
        $this->pdo = parent::getPdo();
    }
    public function adminPseudoExist($pseudo){
        $sql = "SELECT * FROM admin WHERE pseudo = ?";
        $req = $this->pdo->prepare($sql);
        $req->execute([$pseudo]);
        $login = $req->fetch();
        return $login;
    }

}
