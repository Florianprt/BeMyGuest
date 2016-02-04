<?php
$ajax = 1;
require_once ('config/config.inc.php');


//  INSCRIPTION
if((isset($_POST['quelformulaire']))&&($_POST['quelformulaire'] == 'inscription')) {

		$nom = htmlspecialchars($_POST['nom']);
		$prenom = htmlspecialchars($_POST['prenom']);
		$adresse_email = htmlspecialchars($_POST['email']);
		$password1 = crypt(htmlspecialchars($_POST['password1']));
		$date_inscription = date("Y").'-'.date("n").'-'.date("j");
		$image = DEFAULT_AVATAR;
		$type= "formulaire";

		try {
		$Inscriptiondao = new InscriptionDao($nom , $prenom ,  $adresse_email , $password1 ,  $date_inscription ,$type , $image);
		$fctinscription = $Inscriptiondao->Inscription();
		} catch (Exception $e) {
    		echo $e->getMessage();
    		$idinsert= $e->getMessage();
		}
		if ((isset($idinsert))&&($idinsert!="existe")&&($idinsert!="")) {
			$mail = new MailDao();
			$envoimail = $mail->mailinsc($adresse_email ,$idinsert);
		}
		
}


else if((isset($_POST['id']))&&(isset($_POST['last_name']))&&(isset($_POST['first_name']))) {
    $nom = htmlspecialchars($_POST['last_name']);
	$prenom = htmlspecialchars($_POST['first_name']);
	$adresse_email = htmlspecialchars($_POST['email']);
	$age = htmlspecialchars($_POST['age_range']['min']);
	$idfacebook = htmlspecialchars($_POST['id']);
	$image = htmlspecialchars($_POST['picture']['data']['url']);
	$date_inscription = date("Y").'-'.date("n").'-'.date("j");
	$type= "facebook";


	try {
		$FacebookLogDao = new FacebookLogDao($nom , $prenom ,  $adresse_email , $age ,  $idfacebook ,$image, $date_inscription, $type);
		$fctinscription = $FacebookLogDao->checkifexist();
	} catch (Exception $e) {
    	echo $e->getMessage();
	}
}


//  CONNEXION
else if(isset($_POST['email_adresse_connect'])){

	$email = htmlspecialchars($_POST['email_adresse_connect']);
	$password = htmlspecialchars($_POST['password_connect']);

	try {
		$connectiondao = new InscriptionDao(0,0,0,0,0,0,0);
		$fctconnect = $connectiondao->Connection_check($email, $password );
	} catch (Exception $e) {
    	echo $e->getMessage();
	}
}

//NEWSLETTER
if (isset($_POST['emailnewsletter'])) {
	
	$email = $_POST['emailnewsletter'];
	$nbr = 0;

	$newsletterdao = new NewsletterDao();
	$fctinsert = $newsletterdao->checkifexist($email , $nbr);
	
	if($fctinsert){echo 'nopb';}
	else{echo 'pb';}

}

