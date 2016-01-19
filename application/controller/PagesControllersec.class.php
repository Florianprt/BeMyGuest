<?php

class PagesControllersec extends Core
{

    public function __construct()
    {

    }

    public function index()
    {   
        $this->view('page/index.php');
        //$this->view('vue_articles.php', $data, $this->nbPage);
    }

    public function search()
    {
        $this->view('page/search.php');
    }

    public function profil()
    {
        $this->view('page/profil.php');
    }

    public function dish()
    {
        $this->view('page/dish.php');
    }







    public function connect()
    {
        $this->view('page/connect.php');
    }

    public function post()
    {
        if (isset($_GET['id'])) {

            if ($data = $this->model->lire_article($_GET["id"])) {

                if ($comments = $this->model->get_comments($_GET["id"])) {

                    //On définir le titre de la page dans une constante.
                    define("TITLE_FOR_LAYOUT", "Article détaillé");
                    $this->load->view('vue_article.php', $data, null, $comments);

                } else {

                    //On définir le titre de la page dans une constante.
                    define("TITLE_FOR_LAYOUT", "Article détaillé");
                    $this->load->view('vue_article.php', $data);

                }

            } else {
                define("TITLE_FOR_LAYOUT", "Erreur technique");
                $this->load->view('vue_error.php');
            }

        } else {
            define("TITLE_FOR_LAYOUT", "Erreur technique");
            $this->load->view('vue_error.php');
        }
    }

    public function deletecomm()
    {
        $idcomment = $_GET['idcomm'];
        $idpost = $_GET['idpost'];

        if ($this->model->delete_comment($idcomment)) {
            header('location: ?module=posts&action=post&id=' . $idpost . '&delcomment=ok');
            exit;
        } else {
            header('location: ?module=posts&action=post&id=' . $idpost . '&delcomment=nok');
            exit;
        }
    }
}
