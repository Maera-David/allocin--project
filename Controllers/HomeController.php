  
<?php

class HomeController extends Controller
{
    public function __construct()
    {
        $this->twig = parent::getTwig();
    }

    public function index()
    {
        $film = new Film();
        $films = $film->getLast3Films();
        $pageTwig = 'index.html.twig';
        $template = $this->twig->load($pageTwig);
        echo $template->render(['films' => $films]);
    }
}