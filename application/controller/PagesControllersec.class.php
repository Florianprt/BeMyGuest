<?php

class PagesControllersec extends Core
{

    private $id= '';
    private $name= '';
    private $firstname= '';
    private $image = '';
    private $global_information = array();

    public function __construct()
    {
        if (isset($_COOKIE['log'])) {

            $user = new UserDao();
            $partcookie =  explode("|", $_COOKIE['log']);
            $this->id = substr($partcookie[0], 5);
            $this->adresse_email = end($partcookie);

            $information = $user->getById($this->id);

            foreach($information as $item) { 
                $this->name = $item['nom'];
                $this->firstname = $item['prenom'];
                $this->image = $item['image'];
            }
            $this->global_information = array( "personnal_information"  => array("name" => $this->name, "first_name" => $this->firstname, "image" => $this->image));
        }
    }

    public function index()
    {
        $title = 'Be my guest | Home';

        $data = array (
                "pages_info"  => array("title" => $title),
        );



        if (isset($_COOKIE['log'])) {
            $data = array_merge($data, $this->global_information);
        }


        $this->view('page/index.php', $data);
    }

    public function search()
    {   
        $title = 'Be my guest | Search';

        $data = array (
                "pages_info"  => array("title" => $title),
        );

        

        if (isset($_COOKIE['log'])) {
            $data = array_merge($data, $this->global_information);
        }
        
        $this->view('page/search.php' , $data);
    }

    public function profil()
    {   
        $title = 'Be my guest | Profil '.'name';

        $data = array (
                "pages_info"  => array("title" => $title),
        );

        

        if (isset($_COOKIE['log'])) {
            $data = array_merge($data, $this->global_information);
        }
        
        $this->view('page/profil.php', $data);
    }

    public function dish()
    {   
        $title = 'Be my guest | Dish';

        $data = array (
                "pages_info"  => array("title" => $title),
        );

        

        if (isset($_COOKIE['log'])) {
            $data = array_merge($data, $this->global_information);
        }
        
        $this->view('page/dish.php', $data);
    }




    public function connect()
    {

        $title = 'Be my guest | Connect you';

        $data = array (
                "pages_info"  => array("title" => $title),
        );

        $this->view('page/connect.php');
    }


}
