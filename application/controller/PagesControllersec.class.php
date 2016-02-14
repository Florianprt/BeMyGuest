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
                "pages_info"  => array("title" => $title,"num" => "1","nom" => "home"),
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
            $date = $datearray[2].'-'.$datearray[0].'-'.$datearray[1];
        }

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
        $recoDao = new RecommendDao();
        $commentDao = new CommentDao();

        $title = 'Be my guest | Profil '.$this->name;

        $data = array (
                "pages_info"  => array("title" => $title,"nom" => "profil"),
        );

        if (isset($_GET['id'])) {
           $searchperson = $user->getById($_GET['id']);
           $c=0;
           foreach ($searchperson as $item) {
                $nom = $item['nom'];
                $prenom = $item['prenom'];
                $ville = $item['ville'];
                $zipcode = $item['arrondissement'];
                $date_inscription = $item['date_inscription'];
                $age = $item['age'];
                $image = $item['image'];
                $description = $item['description'];
                $c++;
            }
            if ($c==0) {
                header('location: ../home');
            }
            $dateinsc = new DateTime($date_inscription);
            $now = new DateTime();
            $membresince = $dateinsc->diff($now)->format("%Y years and %d days");;
            $dataperson = array (
                "person"  => array("nom" => $nom,"prenom" => $prenom, "ville" =>$ville, "zipcode" =>$zipcode , "date_inscription"=>$date_inscription, "age"=>$age, "image"=>$image, "description"=>$description, "membresince" => $membresince),
            );
            $data = array_merge($data, $dataperson);

            //DISH USER
            $nbrdish = $dish->getByUserId($_GET['id']);
            $i=0;
            foreach ($nbrdish as $item) {
                $i++;
            }
            $nbrdishvalidate = $dish->getByUserIdOn($_GET['id']);
            //FIN DISH USER
            
            //USER VALIDATE
            $getvalidation = $validate->getByUserId($_GET['id']);
            foreach ($getvalidation as $item) {
                $facebookvalidate =$item['facebook'];
                $emailvalidate =$item['email'];
                $bankinfo =$item['bankinfo'];
            }
            //FIN USER VALIDATE

            //RECO
            $getReco = $recoDao->getByIdFor($_GET['id']);
            $nr=0;
            foreach ($getReco as $item) {
                $nr++;
            }
            //FIN RECO

            //COM
            $getCom = $commentDao->getByIdFor($_GET['id']);
            $nrcom=0;
            foreach ($getCom as $item) {
                $nrcom++;
            }
            //FIN COM

            $databdd = array (
                "dish"  => array("nombre" => $i),
                "reco"  => array("nombre" => $nr),
                "com"  => array("nombre" => $nrcom),
                "validation"  => array("facebook" => $facebookvalidate,"email" => $emailvalidate,"bank"=>$bankinfo),
                "function" =>array("dish"=>$nbrdish,"dishOn"=>$nbrdishvalidate, "GetReco" => $getReco, "GetCom" => $getCom)
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
                $dishIdUser = $item['bmg_user_idbmg_user'];
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
            //img
            $dir    = DEFAULT_LINK_FILE.$dishIdUser.'/dish/'.$_GET['id'];
            $files = scandir($dir);
            $arrayimg = array();
            $i=0;
            for($j=0; $j<count($files); $j++){
                if ($files[$j] != "." && $files[$j]!= ".." && $files[$j]!= ".DS_Store") {
                    $i++;
                    array_push($arrayimg, $dir.'/'.$files[$j]);
                }
            }
            if($i!=0){ 
                $lesArrayImg = array(
                "img"=> $arrayimg,
            );
            }else{
                $lesArrayImg = array(
                "img"=> array(DEFAULT_LINK_FILE."default/dish.jpg"),
                );
            }
            //finimg
            if(isset($_GET['date'])){
                if($_GET['date']=='now'){
                    $dateRecherche = date('Y-m-d');
                }
                else{
                     $dateRechercheExp = explode("-", $_GET['date']);
                     $dateRecherche = $dateRechercheExp[2].'-'.$dateRechercheExp[0].'-'.$dateRechercheExp[1];
                }
            }
            else{
                $dateRecherche = date('Y-m-d');
            }
            $datadaterecherche = array (
                "date"  => array("date" => $dateRecherche),
            );

            $dataproduit = array (
                "dish"  => array("name" => $dishname,"adresse" => $fulladresse, "ingredient" =>$dishingredients, "desc" =>$dishdesc , "price"=>$dishprice, "quantity"=>$dishquantity, "begin"=>$dishbegin, "finish"=>$dishfinish, "lat"=>$dishlat, "long"=>$dishlong),
            );
            $data = array_merge($data, $lesArrayImg);
            $data = array_merge($data, $datadaterecherche);
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

    public function recomandate()
    {   
        $user = new UserDao();
        $recoDao = new RecommendDao();

        $title = 'Be my guest | recomandate your friend';
        $data = array (
                "pages_info"  => array("title" => $title, "nom" => "reco"),
        );

        if (isset($_COOKIE['log'])) {
            $data = array_merge($data, $this->global_information);
        }
        if (isset($_GET['id'])) {

            $getuserreco = $user->getById($_GET['id']);
            foreach ($getuserreco as $item) {
                $nom = $item['nom'];
                $prenom = $item['prenom'];
                $image = $item['image'];
            }
            $datauserget = array (
                "user_get"  => array("nom" => $nom, "prenom" => $prenom , "image" =>$image),
            );
            $data = array_merge($data, $datauserget);


            if((isset($_POST['envoyer']))){
                $idwrite = $this->id;
                $idfor = $_GET['id'];
                $reco = $_POST['thereco'];
                $date = date("Y-m-d");

                $insertreco = $recoDao->InsertReco($idwrite, $idfor , $reco ,$date);
                if ($insertreco) {
                    header('location: ../home');
                }
            }

            $this->view('page/recomandate.php', $data);
        }
        else{
            header('location: ../home');
        }
    }

    public function payment()
    {   
        $dish = new DishDao();

        $title = 'Be my guest | Valid your payment';
        $data = array (
                "pages_info"  => array("title" => $title ,"nom" => "payment"),
        );
        if (isset($_COOKIE['log'])) {
            $data = array_merge($data, $this->global_information);
        }


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


        $this->view('page/payment.php', $data);

    }


    public function success()
    {   

        $title = 'Be my guest | Success your payment';
        $data = array (
                "pages_info"  => array("title" => $title ,"nom" => "payment"),
        );
        if (isset($_COOKIE['log'])) {
            $data = array_merge($data, $this->global_information);
        }


        $this->view('page/success.php', $data);

    }

    public function cgu()
    {   

        $title = 'Be my guest | our C.G.U';
        $data = array (
                "pages_info"  => array("title" => $title ,"nom" => "cgu"),
        );
        if (isset($_COOKIE['log'])) {
            $data = array_merge($data, $this->global_information);
        }


        $this->view('page/cgu.php', $data);

    }


    public function comment()
    {   
        $user = new UserDao();
        $commentDao = new CommentDao();
        $reservationDao = new ReservationDao();

        $title = 'Be my guest | comment';
        $data = array (
                "pages_info"  => array("title" => $title, "nom" => "comment"),
        );

        if (isset($_COOKIE['log'])) {
            $data = array_merge($data, $this->global_information);
        }
        if (isset($_GET['id'])) {

            $checkifissetresa = $reservationDao->chickif($this->id ,$_GET['id']);
            $i=0;
            foreach ($checkifissetresa as $item) {
                $i ++;
            }
            if ($i==0) {
                header('location: ../home');
            }

            $getuserreco = $user->getById($_GET['id']);
            foreach ($getuserreco as $item) {
                $nom = $item['nom'];
                $prenom = $item['prenom'];
                $image = $item['image'];
            }

            $datauserget = array (
                "user_get"  => array("nom" => $nom, "prenom" => $prenom , "image" =>$image),
            );
            $data = array_merge($data, $datauserget);


            if((isset($_POST['envoyer']))){
                $idwrite = $this->id;
                $idfor = $_GET['id'];
                $reco = $_POST['thereco'];
                $date = date("Y-m-d");

                $insertreco = $commentDao->Insertcom($idwrite, $idfor , $reco ,$date);
                if ($insertreco) {
                    header('location: ../home');
                }
            }

            $this->view('page/comment.php', $data);
        }
        else{
            header('location: ../home');
        }
    }




    public function message()
    {   
        $reservationDao = new ReservationDao();
        $messageDao = new MessageDao();

        $title = 'Be my guest | Contact someone';
        $data = array (
                "pages_info"  => array("title" => $title ,"nom" => "message"),
        );
        if (isset($_COOKIE['log'])) {
            $data = array_merge($data, $this->global_information);
        }

        if (isset($_GET['id'])) {
            $getresa = $reservationDao->selectresabyid($_GET['id']);
            $nbrresa = 0;
            foreach ($getresa as $items) {
                $nbrresa ++;
                $iddish = $items['id_dish'];
                $idperson = $items['id_user'];
                $idsale = $items['id_saler'];
                $quantity = $items['quantity'];
                $datefor = $items['date_for'];

                $dishname = $items['dishname'];

                $dir    = DEFAULT_LINK_FILE.$idsale.'/dish/'.$iddish;
                $files = scandir($dir);
                $i=0;
                for($j=0; $j<count($files); $j++){
                if ($files[$j] != "." && $files[$j]!= ".." && $files[$j]!= ".DS_Store") {
                    $i++;
                    $name=$files[$j];
                }}
                if ($i==0) {
                    $dishimg = DEFAULT_LINK_FILE.'default/dish.jpg';
                }
                else{
                    $dishimg = $dir.'/'.$name;
                }
            }
            if ($nbrresa==0) {
                header('location: ../home');
            }

            if((isset($_POST['envoyer']))){
                $idwrite = $this->id;
                $idresa = $_GET['id'];
                $message = $_POST['thereco'];
                $date = date("Y-m-d");

                $insertmsg = $messageDao->Insertmessage($idresa, $message , $idwrite ,$date);
                if ($insertmsg) {
                    header('location: ../home');
                }
            }

            if (($this->id == $idperson )||($this->id == $idsale)) {
                
                $datainfo = array (
                    "dish"  => array("name" => $dishname ,"for" =>$datefor ,"img" =>$dishimg),
                );
                $data = array_merge($data, $datainfo);
            }

            else{
                header('location: ../home');
            }

        }
        else{
            header('location: home');
        }



        $this->view('page/message.php', $data);

    }


}
