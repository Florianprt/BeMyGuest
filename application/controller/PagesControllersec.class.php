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

        $dish = new DishDao();

        $title = 'Be my guest | Search';
        $data = array (
                "pages_info"  => array("title" => $title, "nom" => "search" ),
        );


        if (isset($_POST['btnformaccueil'])) {
            if ((isset($_POST['lat']))&&(isset($_POST['lng']))&&($_POST['where']=="Look around")) {
                $lat = $_POST['lat'];
                $long = $_POST['lng'];
            }
            elseif(($_POST['where']=="")||(!isset($_POST['where']))){
                $lat = DEFAULT_LAT;
                $long = DEFAULT_LONG;
            }
            else{
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
        else if (!isset($_POST['btnformaccueil'])){
            $datasearch = array (
                "search"  => array("where" => 'Paris', "date" => 'now', "cb" => "1", "lat" => DEFAULT_LAT, "long" => DEFAULT_LONG),
            );
            $data = array_merge($data, $datasearch);
        }

        if($datasearch['search']['date']=="now"){
            $date = date('Y-m-d');
        }
        else{
            $datearray = explode("/", $datasearch['search']['date']);
            $date= $datearray[2].'-'.$datearray[0].'-'.$datearray[1];
        }
        /*lat+0.02>lat>lat-0.02*/
        $latmin=$datasearch['search']['lat']-DEFAULT_DIST_LAT;
        $latmax=$datasearch['search']['lat']+DEFAULT_DIST_LAT;
        $lngmin=$datasearch['search']['long']-DEFAULT_DIST_LONG;
        $lngmax=$datasearch['search']['long']+DEFAULT_DIST_LONG; 
        $searchdish = $dish->searchdish($date, $data['search']['cb'],$latmin,$latmax,$lngmin,$lngmax);
        $datafunction = array (
                "function"  => array("search" => $searchdish),
            );
        $data = array_merge($data, $datafunction);




        if (isset($_COOKIE['log'])) {
            $data = array_merge($data, $this->global_information);
        }
        
        $this->view('page/search.php' , $data);
    }

    public function profil()
    {   
        $user = new UserDao();
        $dish = new DishDao();
        $validate = new ValidateDao();

        $title = 'Be my guest | Profil '.'name';

        $data = array (
                "pages_info"  => array("title" => $title),
        );

        if (isset($_GET['id'])) {
           $searchperson = $user->getById($_GET['id']);
           foreach ($searchperson as $item) {
                $nom = $item['nom'];
                $prenom = $item['prenom'];
                $ville = $item['ville'];
                $zipcode = $item['arrondissement'];
                $date_inscription = $item['date_inscription'];
                $age = $item['age'];
                $image = $item['image'];
                $description = $item['description'];
            }
            $dateinsc = new DateTime($date_inscription);
            $now = new DateTime();
            $membresince = $dateinsc->diff($now)->format("%Y years and %d days");;
            $dataperson = array (
                "person"  => array("nom" => $nom,"prenom" => $prenom, "ville" =>$ville, "zipcode" =>$zipcode , "date_inscription"=>$date_inscription, "age"=>$age, "image"=>$image, "description"=>$description, "membresince" => $membresince),
            );
            $data = array_merge($data, $dataperson);

            $nbrdish = $dish->getByUserId($_GET['id']);
            $i=0;
            foreach ($nbrdish as $item) {
                $i++;
            }

            $getvalidation = $validate->getByUserId($_GET['id']);
            foreach ($getvalidation as $item) {
                $facebookvalidate =$item['facebook'];
                $emailvalidate =$item['email'];
                $bankinfo =$item['bankinfo'];
            }

            $databdd = array (
                "dish"  => array("nombre" => $i),
                "validation"  => array("facebook" => $facebookvalidate,"email" => $emailvalidate,"bank"=>$bankinfo),
            );

            $data = array_merge($data, $databdd);
        }
        else{
            header('location: home');
        }

        

        if (isset($_COOKIE['log'])) {
            $data = array_merge($data, $this->global_information);
        }
        
        $this->view('page/profil.php', $data);
    }

    public function dish()
    {   
        $dish = new DishDao();

        $title = 'Be my guest | Dish';

        $data = array (
                "pages_info"  => array("title" => $title,"nom" => "dish"),
        );
        if (isset($_GET['id'])) {
           $searchdish = $dish->getById($_GET['id']);
           foreach ($searchdish as $item) {
                $dishname = $item['dishname'];
                $dishadress = $item['dishadress'];
                $dishzipcode = $item['dishzipcode'];
                $dishcity = $item['dishcity'];
                $dishingredients = $item['dishingredients'];
                $dishdesc = $item['dishdesc'];
                $dishprice = $item['dishprice'];
                $dishquantity = $item['dishquantity'];
                $dishbegin = $item['dishbegin'];
                $dishfinish = $item['dishfinish'];
                $dishlat = $item['dishlat'];
                $dishlong = $item['dishlong'];
           }
           $fulladresse = $dishadress." ".$dishcity." , ".$dishzipcode;
            $dataproduit = array (
                "dish"  => array("name" => $dishname,"adresse" => $fulladresse, "ingredient" =>$dishingredients, "desc" =>$dishdesc , "price"=>$dishprice, "quantity"=>$dishquantity, "begin"=>$dishbegin, "finish"=>$dishfinish, "lat"=>$dishlat, "long"=>$dishlong),
            );
            $data = array_merge($data, $dataproduit);

        }
        else{
            header('location: home');
        }

        

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

    public function valid()
    {   
        $title = 'Be my guest | Valid your email';
        $data = array (
                "pages_info"  => array("title" => $title),
        );

        if (isset($_COOKIE['log'])) {
            $data = array_merge($data, $this->global_information);
        }
        if (isset($_GET['id'])) {
            $validate = new ValidateDao();
            $fctvalidateeamil = $validate->validateemail($_GET['id']);
            if($fctvalidateeamil){
                $this->view('page/valid.php', $data);
            }
            else{
                header("Refresh:0");
            }
        }
        else{
            header('location: home');
        }
    }

    public function payment()
    {   
        $title = 'Be my guest | Valid your payment';
        $data = array (
                "pages_info"  => array("title" => $title),
        );
        if (isset($_COOKIE['log'])) {
            $data = array_merge($data, $this->global_information);
        }


        $this->view('page/payment.php', $data);

    }


}
