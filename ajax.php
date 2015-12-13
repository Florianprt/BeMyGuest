<?php
require_once ('config/config.inc.php');
//header('Content-type: application/json');


//  INSCRIPTION
if((isset($_POST['quelformulaire']))&&($_POST['quelformulaire'] == 'inscription')) {

		$nom = stripslashes($_POST['nom']);
		$prenom = stripslashes($_POST['prenom']);
		$adresse_email = stripslashes($_POST['email']);
		$password1 = crypt(stripslashes($_POST['password1']));
		$date_inscription = date("Y").'-'.date("n").'-'.date("j");
		$type= "formulaire";

		/*
		$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0);
		$nom = 'charles';
		$prenom = 'test';
		$adresse_email = 'yo@aol.fr';
		$password1 = 'test';
		$password2 = 'test';
		$date_inscription = date("Y").'-'.date("n").'-'.date("j");
		$type= "formulaire";
		*/

		try {
		$Inscriptiondao = new InscriptionDao($nom , $prenom ,  $adresse_email , $password1 ,  $date_inscription ,$type);
		$fctinscription = $Inscriptiondao->Inscription();
		} catch (Exception $e) {
    		echo $e->getMessage();
		}
}

else if((isset($_POST['id']))&&(isset($_POST['last_name']))&&(isset($_POST['first_name']))) {
    $nom = stripslashes($_POST['last_name']);
	$prenom = stripslashes($_POST['first_name']);
	$adresse_email = stripslashes($_POST['email']);
	$age = stripslashes($_POST['age_range']['min']);
	$idfacebook = stripslashes($_POST['id']);
	$image = stripslashes($_POST['picture']['data']['url']);
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
if(isset($_POST['btnconnexion'])){
	
}