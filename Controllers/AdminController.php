
<?php
class AdminController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new Admin();

    }


    public function login()
    {
        $pageTwig = 'Admin/login.html.twig';
        $template = $this->twig->load($pageTwig);
        echo $template->render();
    }

    public function checklogin()
    {
        $error = "";
        if (isset($_POST['form_submit']) && $_POST['pseudo'] != "" && $_POST['password'] != "") {            
            if($adminInfo = $this->model->adminPseudoExist($_POST['pseudo'])){
                if(password_verify($_POST['password'], $adminInfo['password'])){
                  //Tout est ok --> redirection header('Location: la route désirée')

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
