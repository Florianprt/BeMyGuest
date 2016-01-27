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

    public function index()
    {   

        $data = array (
                "pages_info"  => array("title" => $this->title),
        );



        $data = array_merge($data, $this->global_information);

        $this->view('user/dashboard.php', $data);
    }

    public function create_dish()
    {      
        $Flashsession =  new AlerteCore();
        $dish = new DishDao();

        //create repository to upload the file
        if ((empty($_FILES))&&(!isset($_POST['envoyer']))) {
            $file=DEFAULT_LINK_FILE.$this->id.'/dish/new/';
            if (is_dir($file)){
                $filedao = new FileDao();
                $deleteallfile = $filedao->deleteDir($file);
                mkdir(DEFAULT_LINK_FILE.$this->id.'/dish/new', 0700);
            }
            else{mkdir(DEFAULT_LINK_FILE.$this->id.'/dish/new', 0700);}
        }
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


            $insertdish = $dish->InsertDish($this->id, $name, $adress, $zipcode ,$city , $ingredients , $description, $price, $quantity, $dishnewquantity, $dishbegin, $dishfinish ,$dishactive);

            if (isset($insertdish)) {
                $messagesession = $Flashsession->setFlash('Perfect , your dish is online ! ' ,'dark');
            }
            else{
                $messagesession = $Flashsession->setFlash('Error , please test again ! ' ,'error');
            }

            header('location: ../dish/'); 

        }
        // FIN si POST FORMULAIRE
        $data = array (
                "pages_info"  => array("title" => $this->title),
        );



        $data = array_merge($data, $this->global_information);

        $this->view('user/create_dish.php', $data);
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
            $dishnewquantity= $quantity;
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

            $modifydish = $dish->updatedish($iddish, $name, $adress, $zipcode ,$city , $ingredients , $description, $price, $quantity, $dishnewquantity, $dishbegin, $dishfinish ,$dishactive);
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

            $datanotif = array (
                "pages_notifs"  => array("notifs" => $Flashsession->flash()),
            );

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

        $data = array (
                "user_info"  => array("nom" => $this->name, "prenom" => $this->firstname, "email" => $email, "ville" => $ville, "email" => $email, "arrondissement" => $arrondissement, "adresse" => $adresse, "age" => $age, "description" => $description, "image" => $this->image),
                "pages_info"  => array("title" => $this->title),
        );




        $data = array_merge($data, $this->global_information);
        if (isset($datanotif)) {
        $data = array_merge($data, $datanotif);
        }

        
        $this->view('user/profil.php', $data);
    }



//page pour changer ses informations de profil 
    public function account()
    {   
         $data = array (
                "notifications"  => array("1" => $n1,),
        );

        $data = array_merge($data, $this->global_information);

        $this->view('user/account.php', $data);
    }

}
