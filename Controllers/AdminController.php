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
        echo $template->render(['connected' => $connected]);
    }

    public function checklogin()
    {
        $error = "";
        if (isset($_POST['form_submit']) && $_POST['pseudo'] != "" && $_POST['password'] != "") {
            if ($adminInfo = $this->model->adminPseudoExist($_POST['pseudo'])) {
                if (password_verify($_POST['password'], $adminInfo['password'])) {
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
        if (!isset($_SESSION['admin'])) {
            header("Location: $this->baseUrl/admin");
        }
    }

    public function logout()
    {
        $this->isConnected();
        session_destroy();
        header("Location: $this->baseUrl/admin");
    }

    public function index()
    {
        $this->isConnected();
        $pageTwig = 'Admin/index.html.twig';
        $template = $this->twig->load($pageTwig);
        echo $template->render(["session" => $_SESSION]);
    }

    //Fonction pour upload files 
    private function uploadFiles($name, $destination)
    {
        $photoName = $_FILES[$name]['name'];
        $photoTmpName = $_FILES[$name]['tmp_name'];
        $photoError = $_FILES[$name]['error'];
        $photoSeize = $_FILES[$name]['size'];

        $photoExt = explode('.', $photoName); // Explode la chaine a chaque point
        $photoActualExt = strtolower(end($photoExt)); // la derniere partie = extention

        $allowed = array('jpg', 'jpeg', 'png');

        if (in_array($photoActualExt, $allowed) && ($photoError == 0) && ($photoSeize < 1000000)) {
            $photoNew = uniqid('', true) . "." . $photoActualExt;
            $photoDestination = "assets/img/" . $destination . "/" . $photoNew;
            move_uploaded_file($photoTmpName, $photoDestination);
            return $photoNew;
        } else {
            return NULL;
        }
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
        if (!empty($_POST)) {
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

    public function genreAdd()
    {
        $this->isConnected();
        $instanceGenre = new Genre();
        if (!empty($_POST)) {
            $instanceGenre->add($_POST["genre"]);
            header("Location: $this->baseUrl/admin/genre");
        }
        $pageGenreAdd = 'Admin/genreAdd.html.twig';
        $template = $this->twig->load($pageGenreAdd);
        echo $template->render();
    }

    //Méthodes pour Films
    public function film()
    {
        $this->isConnected();
        $film = new Film();
        $films = $film->getAllFilmAdmin();
        $pageFilm = 'Admin/film.html.twig';
        $template = $this->twig->load($pageFilm);
        echo $template->render(["session" => $_SESSION, 'films' => $films]);
    }

    public function filmUpdate($id)
    {
        $this->isConnected();
        $instanceFilm = new Film();
        if (!empty($_POST)) {
            $instanceFilm->updateFilm($id, $_POST["film-titre"], $_POST["film-date"], $_POST["film-synopsis"], $_POST["film-genre"], $_POST["film-artiste"]);
            header("Location: $this->baseUrl/admin/film");
        }
        $film = $instanceFilm->getOneFilmAdmin($id);
        $instanceGenre = new Genre();
        $genres = $instanceGenre->getAllGenre();

        $instanceArtist = new Artist();
        $artists = $instanceArtist->getAllArtist();

        $pageFilm = 'Admin/filmUpdate.html.twig';
        $template = $this->twig->load($pageFilm);
        echo $template->render(["film" => $film, "genres" => $genres, "artistes" => $artists]);
    }

    public function filmDelete($id)
    {
        $this->isConnected();
        $instanceFilm = new Film();
        $instanceFilm->delete($id);
        header("Location: $this->baseUrl/admin/film");
    }

    public function filmAdd()
    {
        $this->isConnected();
        $instanceFilm = new Film();

        if (!empty($_POST)) {
            $fileNameNew = $this->uploadFiles('film-affiche', 'film');
            $instanceFilm->add($_POST["film-titre"], $_POST["film-date"], $_POST["film-synopsis"], $_POST["film-genre"], $_POST["film-artiste"], $fileNameNew);
            header("Location: $this->baseUrl/admin/film?uploadsuccrss");
        }

        $instanceGenre = new Genre();
        $genres = $instanceGenre->getAllGenre();

        $instanceArtist = new Artist();
        $artists = $instanceArtist->getAllArtist();

        $pageFilmAdd = 'Admin/filmAdd.html.twig';
        $template = $this->twig->load($pageFilmAdd);
        echo $template->render(["genres" => $genres, "artistes" => $artists]);
    }

    //Méthodes pour acteurs
    public function acteur()
    {
        $this->isConnected();
        $instanceArtist = new Artist();
        $acteurs = $instanceArtist->getAllActor();
        $pageActeur = 'Admin/acteur.html.twig';
        $template = $this->twig->load($pageActeur);
        echo $template->render(["acteurs" => $acteurs]);
    }

    public function acteurUpdate($id)
    {
        $this->isConnected();
        $instanceArtist = new Artist();
        $acteur = $instanceArtist->getOneActor($id);
        $pageActeurUpdate = 'Admin/acteurUpdate.html.twig';
        $template = $this->twig->load($pageActeurUpdate);
        echo $template->render(["acteur" => $acteur]);
    }

    public function acteurDelete($id)
    {
        $this->isConnected();
        $instanceActeur = new Artist();
        $instanceActeur->delete($id);
        header("Location: $this->baseUrl/admin/acteur");
    }

    public function acteurAdd()
    {
        $this->isConnected();
        $error = "";
        $instanceArtist = new Artist();
        if (!empty($_POST)) {
            $photoNew = $this->uploadFiles('photo', 'acteurs');
            if ($instanceArtist->add($_POST["nom"], $_POST["prenom"], $_POST["dateDeNaissance"], $_POST["biographie"], $photoNew)) {
                header("Location: $this->baseUrl/admin/acteur");
            } else {
                $error = "Il y a eu un problème lors de l'ajout.";
            }
        }
        $pageActeurAdd = 'Admin/acteurAdd.html.twig';
        $template = $this->twig->load($pageActeurAdd);
        echo $template->render(["error" => $error]);
    }


    //Méthodes pour Role
    public function role()
    {
        $this->isConnected();
        $instanceFilm = new Film();
        $films = $instanceFilm->getAllFilm();
        //$artist = $instanceArtist->getAllArtist();
        $pageRole = 'Admin/role.html.twig';
        $template = $this->twig->load($pageRole);
        echo $template->render(["films" => $films]);
    }
    public function roleAdd()
    {
        $pageRoleAdd = 'Admin/roleAdd.html.twig';
        $template = $this->twig->load($pageRoleAdd);
        echo $template->render();
    }
    public function roleUpdate($id)
    {
        $this->isConnected();
        if (!empty($_POST)) {
            var_dump($_POST);
            $instanceRole = new Role();
            $instanceRole->deleteRoles($id);
            for ($i = 0; $i < count($_POST['role']); $i++) {
                $instanceRole->addRoles($id, $_POST['artist-role'][$i], $_POST['role'][$i]);
                //var_dump($_POST['role'][$i]);
            }
            header("Location: $this->baseUrl/admin/role");
        }
        $instanceArtist = new Artist();
        $roles = $instanceArtist->getActorsFromOneFilm($id);
        $artists = $instanceArtist->getAllArtist();
        $instanceFilm = new Film();
        $film = $instanceFilm->getOneFilm($id);
        $pageRoleUpdate = 'Admin/roleUpdate.html.twig';
        $template = $this->twig->load($pageRoleUpdate);
        echo $template->render(["roles" => $roles, "film" => $film, 'artists' => $artists]);
    }
}
