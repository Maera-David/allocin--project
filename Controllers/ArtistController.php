
<?php

class ArtistController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new Artist();
    }

    public function listActeur()
    {
        $instanceArtiste = new Artist();
        $actors = $instanceArtiste->getAllActor();
        $pageTwig = 'actors.html.twig';
        $template = self::$_twig->load($pageTwig);
        echo $template->render(['actors' => $actors]);
    }

    public function listRealisateur()
    {
       // $artists = $this->model->getAllArtist();
        $instanceArtiste = new Artist();
        $reals = $instanceArtiste->getAllReal(); 
        $pageTwig = 'reals.html.twig';
        $template = self::$_twig->load($pageTwig);
        echo $template->render(['reals' => $reals]);
    }

    public function showReal(int $id)
    {
        $real = $this->model->getOneReal($id);
        $instanceFilm = new Film();
        $films = $instanceFilm->getAllFilmByOneReal($id);
        $pageTwig = 'realShow.html.twig';
        $template = self::$_twig->load($pageTwig);
        echo $template->render(['real' => $real, 'films' => $films]);
    }

    public function showActeur(int $id)
    {
        $actor =  $this->model->getOneActor($id);
        $instanceFilm = new Film();
        $films = $instanceFilm->getAllFilmByOneActor($id);
        $pageTwig = 'actorShow.html.twig';
        $template = self::$_twig->load($pageTwig);
        echo $template->render(['actor' => $actor, 'films' => $films]);
    }

    
}
