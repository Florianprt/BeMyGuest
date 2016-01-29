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
                "pages_info"  => array("title" => $title,"num" => "1"),
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
                "pages_info"  => array("title" => $title, "nom" => "search" ),
        );


        if ((isset($_POST['btnformaccueil']))&&(isset($_POST['where']))&&(isset($_POST['date']))&&($_POST['where']!="")&&($_POST['date']!="")) {
            
            if ((isset($_POST['lat']))&&(isset($_POST['lng']))&&($_POST['where']=="Look around")) {
                $lat = $_POST['lat'];
                $long = $_POST['lng'];
            }elseif($_POST['where']!="Look around"){
                $address = str_replace(" ", "+", $_POST['where']);
                $json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=");
                $json = json_decode($json);
                $lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
                $long = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
            }
            
            $datasearch = array (
                "search"  => array("where" => $_POST['where'], "date" => $_POST['date'], "cb" => $_POST['cb'], "lat" => $lat, "long" => $long),
            );
            $data = array_merge($data, $datasearch);
        }

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

    public function propose()
    {
        $title = 'Be my guest | Propose a dish';
        $data = array (
                "pages_info"  => array("title" => $title),
        );
        $this->view('page/propose.php');
    }


}
