<?php
class UserControllersec extends Core
{
    
    private $id= '';
    private $name= '';
    private $firstname= '';
    private $image = '';
    private $global_information = array();
    private $title = 'Be my guest | Admin';

    public function __construct()
    {
        $user = new UserDao();
        if (isset($_COOKIE['log'])) {
            $partcookie =  explode("|", $_COOKIE['log']);
            $this->id = substr($partcookie[0], 5);
            $this->adresse_email = end($partcookie);
        }
        else{
            header('location: ../');
        }
        $information = $user->getById($this->id);

        foreach($information as $item) { 
            $this->name = $item['nom'];
            $this->firstname = $item['prenom'];
            $this->image = $item['image'];
        }
        $this->global_information = array( "personnal_information"  => array("name" => $this->name, "first_name" => $this->firstname, "image" => $this->image , "id" => $this->id));
    }

    public function index()
    {   

        $data = array (
                "pages_info"  => array("title" => $this->title),
        );



        $data = array_merge($data, $this->global_information);

        $this->view('user/dashboard.php', $data);
    }

    public function createdish()
    {      
        $Flashsession =  new AlerteCore();
        $dish = new DishDao();

        $data = array (
                "pages_info"  => array("title" => $this->title),
        );

        //create repository to upload the file
        $file=DEFAULT_LINK_FILE.$this->id.'/dish/new/';
        if (is_dir($file)){
            if ((empty($_FILES))&&(!isset($_POST['envoyer']))) {
                $filedao = new FileDao();
                $deleteallfile = $filedao->deleteDir($file);
                mkdir(DEFAULT_LINK_FILE.$this->id.'/dish/new', 0700);
            }
        }else{mkdir(DEFAULT_LINK_FILE.$this->id.'/dish/new', 0700);}
        //finish to create repository to upload the file
        
        //upload file
        $ds          = DIRECTORY_SEPARATOR;  //1
        if (!empty($_FILES)) {
            mkdir(DEFAULT_LINK_FILE.$this->id.'/dish/new', 0700);
            $tempFile = $_FILES['file']['tmp_name'];          //3             
            $targetPath = DEFAULT_LINK_FILE.$this->id.$ds.'dish'.$ds.'new'.$ds;  //4
            $targetFile =  $targetPath. $_FILES['file']['name'];  //5
            move_uploaded_file($tempFile,$targetFile); //6
        }
        //fin upload file

        // si POST FORMULAIRE
        if (isset($_POST['envoyer'])) {
            $name = stripslashes($_POST['name']);
            $adress = stripslashes($_POST['adress']);
            $city = stripslashes($_POST['city']);
            $zipcode = stripslashes($_POST['zipcode']);
            $ingredients = stripslashes($_POST['ingredients']);
            $quantity = stripslashes($_POST['quantity']);
            $dishnewquantity= $quantity;
            $price = stripslashes($_POST['price']);
            $description = stripslashes($_POST['description']);
            $dishbegin = stripslashes($_POST['dishbegin']);
            $dishfinish = stripslashes($_POST['dishfinish']);
            $dishactive = 1;

            $address = str_replace(" ", "+", $adress.'+'.$city.'+'.$zipcode);

            $json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=$city");
            $json = json_decode($json);
            if (isset($json->{'results'}[0])) {
                $lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
                $long = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'}; 
            }
            else{
                $lat = 0;
                $long = 0;
            }


            $insertdish = $dish->InsertDish($this->id, $name, $adress, $zipcode ,$city , $ingredients , $description, $price, $quantity, $dishnewquantity, $dishbegin, $dishfinish ,$dishactive,$lat,$long);

            if (isset($insertdish)) {
                $messagesession = $Flashsession->setFlash('Perfect , your dish is online ! ' ,'dark');
            }
            else{
                $messagesession = $Flashsession->setFlash('Error , please test again ! ' ,'error');
            }

            /*$msgflash = $Flashsession->flash();
            $datanotif = array (
                "pages_notifs"  => array("notifs" => $msgflash),
            );
            $data = array_merge($data, $datanotif);*/
            
            header('location: ../dish/'); 

        }
        // FIN si POST FORMULAIRE
        $data = array (
                "pages_info"  => array("title" => $this->title),
        );



        $data = array_merge($data, $this->global_information);

        $this->view('user/createdish.php', $data);
    }

//see his dish
    public function dish()
    {   
        $Flashsession =  new AlerteCore();
        $dish = new DishDao();

        $getdish = $dish->getByUserId($this->id);

        if (isset($_POST['changedate'])){
            $idplat = stripslashes($_POST['changedate']);
            $datebegin = stripslashes($_POST['dishbegin'.$idplat]);
            $datefinish = stripslashes($_POST['dishfinish'.$idplat]);

            $modifydish = $dish->updatedishdate($idplat,$datebegin, $datefinish);
            if ($modifydish) {
                header("Refresh:0");
            }
        }
        if ((isset($_POST['envoyer']))&&isset($_POST['changedish'])) {
            $iddish =stripslashes($_POST['changedish']);
            $name = stripslashes($_POST['name']);
            $adress = stripslashes($_POST['adress']);
            $city = stripslashes($_POST['city']);
            $zipcode = stripslashes($_POST['zipcode']);
            $ingredients = stripslashes($_POST['ingredients']);
            $quantity = stripslashes($_POST['quantity']);
            $dishbuy = stripslashes($_POST['dishbuy']);
            $price = stripslashes($_POST['price']);
            $description = stripslashes($_POST['description']);
            $dishbegin = stripslashes($_POST['dishbegin']);
            $dishfinish = stripslashes($_POST['dishfinish']);
            if (isset($_POST['dishactive'])) {
              $dishactive = stripslashes($_POST['dishactive']);
            }
            else{
              $dishactive = 0;
            }
            $address = str_replace(" ", "+", $adress.'+'.$city.'+'.$zipcode);
            $json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=$city");
            $json = json_decode($json);
            $lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
            $long = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};

            $modifydish = $dish->updatedish($iddish, $name, $adress, $zipcode ,$city , $ingredients , $description, $price, $quantity, $dishbegin, $dishfinish ,$dishactive,$lat,$long);
            if ($modifydish) {
                header("Refresh:0");
            }
        }

        $data = array (
                "pages_info"  => array("title" => $this->title,"page" => "dish"),
                "function"  => array("dish" => $getdish),
        );



        $data = array_merge($data, $this->global_information);

        $this->view('user/dish.php', $data);

    }
// fin de see his dish

//page pour changer ses informations de profil 
    public function profil()
    {   

        $Flashsession =  new AlerteCore();
        $user = new UserDao();

        $data = array (
                "pages_info"  => array("title" => $this->title),
        );
        $data = array_merge($data, $this->global_information);



        // si POST FORMULAIRE
        if (isset($_POST['envoyer'])) {
            $nom = stripslashes($_POST['last_name']);
            $prenom = stripslashes($_POST['first_titre']);
            $email = stripslashes($_POST['email']);
            $ville = stripslashes($_POST['ville']);
            $arrondissement = stripslashes($_POST['arrondissement']);
            $adresse = stripslashes($_POST['adresse']);
            $age = stripslashes($_POST['age']);
            $description = stripslashes($_POST['description']);

            $image_name = $nom.'_'.$prenom.date("Y").date("m").date("d").date("H").date("i").date("s");
            $image_name = $bodytag = str_replace(" ", "_", $image_name);
            $image_name =  str_replace(array_keys(unserialize (array_replace)), unserialize (array_replace), $image_name);
            $repertoirdedepot = DEFAULT_LINK_FILE.$this->id.'/profil/';

            if( (!empty($_FILES["file"])) && ($_FILES['file']['error'] == 0)) {
            $okmaxfilesize = 50000000000000;
            $do_file1="yesimg";
            $filename = basename($_FILES['file']['name']);
            $filesize = $_FILES["file"]["size"];
            $ext = substr($filename, strrpos($filename, '.') + 1);
            if ($_FILES["file"]["size"] < $okmaxfilesize) {
            
              if (
                ($ext == "jpg")||($ext == "jpeg")||($ext == "png")||($ext == "JPG")||($ext == "JPEG")||($ext == "PNG")
                )
                {
                //Chemin d'upload
                $filename=stripslashes($filename);
                $newname = $repertoirdedepot.$image_name.'.'.$ext;
                if ((move_uploaded_file($_FILES['file']['tmp_name'],$newname))) {
                $lien=$newname;
                }
                else {$lien= DEFAULT_AVATAR;}

                } else {$content='Le fichier possède une extension non autorisée !';$lien=DEFAULT_AVATAR;}
              } else {$content='La taille du fichier est supérieure à la limite autorisée !';$lien=DEFAULT_AVATAR;} 
            }else {$lien =$this->image;}


            $updateprofil = $user->updateprofil($this->id, $nom, $prenom, $email ,$ville,$arrondissement,$adresse,$age,$description, $lien);
            if ($updateprofil) {
                $messagesession = $Flashsession->setFlash('GREAT, the modifications is send ! ' ,'success');
            }
            $msgflash = $Flashsession->flash();
            $datanotif = array (
                "pages_notifs"  => array("notifs" => $msgflash),
            );
            $data = array_merge($data, $datanotif);

            header("Refresh:0");
            //header('location: '); 

        }
        //FIN DE SI IF POST FORMULAIRE

        // ON RECUPERE TOUT DE LA BDD
        $information = $user->getById($this->id);

        foreach($information as $item) { 
            $this->name = $item['nom'];
            $this->firstname = $item['prenom'];
            $email = $item['email'];
            $ville = $item['ville'];
            $arrondissement = $item['arrondissement'];
            $adresse = $item['adresse'];
            $age = $item['age'];
            $description = $item['description'];
            $this->image = $item['image'];
        }
        // FIN ON RECUPERE TOUT DE LA BDD

        $datauser = array (
                "user_info"  => array("nom" => $this->name, "prenom" => $this->firstname, "email" => $email, "ville" => $ville, "email" => $email, "arrondissement" => $arrondissement, "adresse" => $adresse, "age" => $age, "description" => $description, "image" => $this->image),
        );



        $data = array_merge($data, $datauser);
        /*if (isset($datanotif)) {
        $data = array_merge($data, $datanotif);
        }*/

        
        $this->view('user/profil.php', $data);
    }



//page pour changer ses informations de profil 
    public function account()
    {   
        $data = array (
                "pages_info"  => array("title" => $this->title),
        );

        $bankDao = new BankDao();

        // si POST FORMULAIRE
        if (isset($_POST['envoyer'])) {
            $nombank = stripslashes($_POST['nombank']);
            $prenombank = stripslashes($_POST['prenombank']);
            $iban = stripslashes($_POST['iban']);
            $bic = stripslashes($_POST['bic']);

            $sendbankinfo = $bankDao->sendbankinfo($this->id, $nombank , $prenombank , $iban , $bic);
            if($sendbankinfo){
                header("Refresh:0");
            }
        }

        $selectbankaccount = $bankDao->selectbank($this->id);
            foreach ($selectbankaccount as $item) {
                $nombank = $item['nombank'];
                $prenombank = $item['prenombank'];
                $iban = $item['iban'];
                $bic = $item['bic'];
            }
        if ((isset($nombank))||(isset($prenombank))||(isset($iban))||(isset($bic))) {
            $databank = array (
                "bankinfo"  => array("nombank" => $nombank,"prenombank" => $prenombank,"iban" => $iban,"bic" => $bic),
            );
            $data = array_merge($data, $databank);
        }
        $data = array_merge($data, $this->global_information);

        $this->view('user/account.php', $data);
    }

    public function recomandations()
    {   
        $Flashsession =  new AlerteCore();
        $emailDao = new MailDao();

        $data = array (
                "pages_info"  => array("title" => $this->title),
        );

         // si POST FORMULAIRE
        if (isset($_POST['envoyer'])) {
            $email = stripslashes($_POST['email']);
            $sendmail = $emailDao->sendRecoRequest($this->id, $this->name , $this->firstname, $email);
            if($sendmail){
                $messagesession = $Flashsession->setFlash('GREAT, the email is send ! ' ,'success');
            }
            else{
                $messagesession = $Flashsession->setFlash('Error please try again ! ' ,'dark');
            }
            $msgflash = $Flashsession->flash();
            $datanotif = array (
                "pages_notifs"  => array("notifs" => $msgflash),
            );
            $data = array_merge($data, $datanotif);
        }



        $data = array_merge($data, $this->global_information);

        $this->view('user/recomandations.php', $data);
    }

    public function purchases()
    {   
        $reservationDao = new ReservationDao();

        $data = array (
                "pages_info"  => array("title" => $this->title),
        );

        $getresa = $reservationDao->selectresabyBuyid($this->id);

        $i=0;
        foreach ($getresa as $items) {
            $i++;
        }

        $datapage = array (
                "nbr"  => array("buy" => $i),
                "function"  => array("sails" => $getresa),
        );

        $data = array_merge($data, $datapage);
        $data = array_merge($data, $this->global_information);

        $this->view('user/purchases.php', $data);
    }

    public function sale()
    {   
        $reservationDao = new ReservationDao();

        $data = array (
                "pages_info"  => array("title" => $this->title),
        );

        $getresa = $reservationDao->selectresabySaleid($this->id);

        $i=0;
        foreach ($getresa as $items) {
            $i++;
        }

        $datapage = array (
                "nbr"  => array("buy" => $i),
                "function"  => array("sails" => $getresa),
        );

        $data = array_merge($data, $datapage);
        $data = array_merge($data, $this->global_information);

        $this->view('user/sale.php', $data);
    }


    public function message()
    {   
        $messageDao = new MessageDao();
        $reservationDao = new ReservationDao();
        $user = new UserDao();
        $Flashsession =  new AlerteCore();

        $data = array (
                "pages_info"  => array("title" => $this->title),
        );

        //$getmessagedist = $messageDao->getmessagedistinct($this->id);
        $takeresa = $reservationDao->takeresa($this->id);
        $getmessage = $messageDao->getmessage($this->id);

        $datafunct = array (
                "function"  => array("msg" => $messageDao,"resa" => $takeresa , "user" => $user ),
        );

        if((isset($_POST['send']))){
            $idwrite = $this->id;
            $idresa = $_POST['idresa'];
            $message = $_POST['msg'];
            $date = date("Y-m-d");

            $insertmsg = $messageDao->Insertmessage($idresa, $message , $idwrite ,$date);
            if ($insertmsg) {
                
                $messagesession = $Flashsession->setFlash('Perfect , your message is send ! ' ,'dark');
                $msgflash = $Flashsession->flash();
                $datanotif = array (
                    "pages_notifs"  => array("notifs" => $msgflash),
                );
                $data = array_merge($data, $datanotif);

                $data = array_merge($data, $datafunct);
                $data = array_merge($data, $this->global_information);
                $this->view('user/message.php', $data);
            }
        }


        $data = array_merge($data, $datafunct);
        $data = array_merge($data, $this->global_information);

        $this->view('user/message.php', $data);
    }

}
