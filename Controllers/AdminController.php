<?php
class AdminController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new Admin();
        session_start();
    }

    public function login()
    {
        //if(isset($_SESSION["admin"]))
        $connected = (isset($_SESSION["admin"])) ? true : false;
        $pageTwig = 'Admin/login.html.twig';
        $template = $this->twig->load($pageTwig);
        echo $template->render(['connected'=>$connected]);
    }

    public function checklogin()
    {
        $error = "";
        if (isset($_POST['form_submit']) && $_POST['pseudo'] != "" && $_POST['password'] != "") {            
            if($adminInfo = $this->model->adminPseudoExist($_POST['pseudo'])){
                if(password_verify($_POST['password'], $adminInfo['password'])){
                  //Tout est ok --> redirection header('Location: la route désirée')
                  $_SESSION["admin"] = true;
                  header("Location: $this->baseUrl/admin/index");
                } else {
                    //Mdp faux
                    $error = "Mot de passe incorrect";
                }
            } else {
                //Nom d'utilisateur n'existe pas dans la BDD
                $error = "Identifiant incorrect";
            }
            $pageTwig = 'Admin/login.html.twig';
            $template = $this->twig->load($pageTwig);
            echo $template->render(['error' => $error]);
        } 
    }

    private function isConnected()
    {
        if(!isset($_SESSION['admin'])){
            header("Location: $this->baseUrl/admin");  
        }
    }

    public function index()
    {         
        $this->isConnected();
        $pageTwig = 'Admin/index.html.twig';
        $template = $this->twig->load($pageTwig);
        echo $template->render(["session" => $_SESSION]);
    }
    
    //Méthodes pour Genre
    
    public function genre()
    {
        $this->isConnected();
        $genre = new Genre();
        $genres = $genre->getAllGenre();
        $pageGenre = 'Admin/genre.html.twig';
        $template = $this->twig->load($pageGenre);
        echo $template->render(["session" => $_SESSION, 'genres' => $genres]);
    }

    public function genreUpdate($id)
    {
       $this->isConnected();
       $instanceGenre = new Genre();
       if(!empty($_POST)){
            $instanceGenre->update($id, $_POST["genre"]);
            header("Location: $this->baseUrl/admin/genre");
       }
       $genre = $instanceGenre->getOneGenre($id);
       $pageGenre = 'Admin/genreUpdate.html.twig';
       $template = $this->twig->load($pageGenre);
       echo $template->render(["genre" => $genre]);
    }

    public function genreDelete($id)
    {
        $this->isConnected();
        $instanceGenre = new Genre();
        $instanceGenre->delete($id);
        header("Location: $this->baseUrl/admin/genre");  
    }

    //Méthodes pour Films
    public function film()
    {
        $this->isConnected();
        $film = new Film();
        $films = $film->getAllFilm();
        $pageFilm = 'Admin/film.html.twig';
        $template = $this->twig->load($pageFilm);
        echo $template->render(["session" => $_SESSION, 'films' => $films]);
    }

    //Méthodes pour Acteurs
    public function acteur()
    {
        $this->isConnected();
        $pageActeur = 'Admin/acteur.html.twig';
        $template = $this->twig->load($pageActeur);
        echo $template->render(["session" => $_SESSION]);
    }

    //Méthodes pour Réalisateurs
    public function realisateur()
    {
        $this->isConnected();
        $pageRealisateur = 'Admin/realisateur.html.twig';
        $template = $this->twig->load($pageRealisateur);
        echo $template->render(["session" => $_SESSION]);
    }
}

 











/*class Form
 {
    public function __construct()
{
    $nom = "";
    $password = "";
}
    public function form(){
if (isset($_POST ['form_submit']) && $_POST['user'] != "" && $_POST['password'] != "")
{
   $nom = $_POST['user'];
   $password = $_POST['password'];
   echo "<p>Nom : $nom, password : ". $password ."</p>" ;
}
else
{
    echo "merci de remplir tous les champs du formulaire<br>";
    $nom = "";
    $password = "";
    }
 }
}*/