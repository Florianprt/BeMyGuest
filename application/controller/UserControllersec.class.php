<?php
class UserControllersec extends Core
{
    private $_login;
    private $_password;

    public function __construct()
    {
    }

    

    public function index()
    {   
        $this->view('user/dashboard.php');
        //$this->view('vue_articles.php', $data, $this->nbPage);
    }

    public function create_dish()
    {
        $this->view('user/create_dish.php');
    }

    public function dish()
    {
        $this->view('user/dish.php');
    }

    public function profil()
    {
        $this->view('user/profil.php');
    }






    /**
     * Function connect
     * @param $login
     * @param $password
     */

    public function connect()
    {
        $this->_login = $_POST['login'];
        $this->_password = sha1($_POST['password']);

        switch ($this->model->connect($this->_login, $this->_password)) {
            case '1':
                header('location: ?module=posts&action=home&co=OK');
                break;

            case '0':
                header('location: ?module=posts&action=home&co=NOK');
                break;
        }
    }

    /**
     *Function disconnect
     */

    public function disconnect()
    {
        session_destroy();
        unset($_SESSION);
        header('location: ?module=posts&action=home&deco=OK');
        exit;
    }

    public function inscription()
    {
        define("TITLE_FOR_LAYOUT", "Inscription");
        $this->view('vue_inscription.php');
    }

}
