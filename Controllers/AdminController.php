<?php
class AdminController extends Controller
{
public function __construct()
{
parent::__construct();
}


public function login()
{
$pageTwig = 'Admin/login.html.twig';
$template = $this->twig->load($pageTwig);
echo $template->render();
}
} 
