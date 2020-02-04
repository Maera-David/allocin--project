<?php
class NotFoundController extends Controller {
    public function __construct() {
        $this->twig = parent::getTwig();
    }

    public function index() {
        header("HTTP/1.0 404 Not Found");
        $pageTwig = 'Errors/404.html.twig';
        $template = $this->twig->load($pageTwig);
        echo $template->render();
    }
}

