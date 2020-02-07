
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
        if (isset($_POST['form_submit']) && $_POST['pseudo'] != "" && $_POST['password'] != "") {
            if ($adminInfo = $this->model->adminPseudoExist($_POST['pseudo'])) {
                if (password_verify($_POST['password'], $adminInfo['password'])) {
                    $test = "ok";

                } else {
                    $test = "pas ok";
                }
                $pageTwig = 'Admin/login.html.twig';
                $template = $this->twig->load($pageTwig);
                echo $template->render(['test' => $test]);
            }
        } else {
   

            echo "test pas ok";
            //echo "merci de remplir tous les champs du formulaire<br>";
            //$nom = "";
            //$password = "";
            //header("Location: $this->baseUrl");
        }
    }
}
