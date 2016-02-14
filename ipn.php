<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

    $ajax = 1;
    require_once ('config/config.inc.php');

    $reservationDao = new ReservationDao();
    $dish = new DishDao();
    $userDao = new UserDao();

  	$datefor = $_POST['option_selection1_1'];
    if ($datefor=="now") {
      $datefor = date('Y-m-d');
    }
    $iddish = $_POST['option_selection2_1'];
    $idperson = $_POST['option_selection3_1'];

  	$quantity = $_POST['quantity1'];
  	$prix = $_POST['mc_gross'];

  	$dateachat = date('Y-m-d');

    //select dish's information to the bdd
    $getdish = $dish->getById($iddish);
    foreach ($getdish as $item) {
        $idsale = $item['bmg_user_idbmg_user'];
        $quantityrest = $item['dishquantity'];
        $quantitybuy = $item['dishbuy'] ;
        $dishname = $item['dishname'] ;
        $dishaddress = $item['dishadress'].' , '.$item['dishcity'].' , '.$item['dishzipcode'] ;
    }
    //fin select dish's information to the bdd

    //select Purchaser information
    $getuserBuy = $userDao->getById($idperson);
    foreach ($getuserBuy as $item) {
        $BuyNom = $item['nom'];
        $BuyPrenom = $item['prenom'] ;
        $BuyEmail = $item['email'];
    }
    //fin select Purchaser information

    //select Saler informations
    $getuserSale = $userDao->getById($idsale);
    foreach ($getuserSale as $item) {
        $SaleNom = $item['nom'];
        $SalePrenom = $item['prenom'];
        $SaleEmail = $item['email'];
    }
    //fin select Saler informations

    //update quantity dish
    $newqtrest = $quantityrest-$quantity;
    $newdsihbuy = $quantitybuy+$quantity;
    $updatedish = $dish->updatequantitydish($iddish , $newqtrest , $newdsihbuy);
    //fin update quantity

    //add reservations
    $insertresa = $reservationDao->Insertresa($iddish, $idperson , $idsale , $quantity ,$dateachat, $datefor, $prix , $_POST);
    //fin add reservations

    $idresa = $insertresa;

    //send email
    $mailDao = new MailDao();
    $sendmailbuy = $mailDao->MailBuy($idresa , $BuyNom , $BuyPrenom , $SaleNom , $SalePrenom , $dishname , $dishaddress, $datefor , $SaleEmail);
    $sendmailsaler = $mailDao->MailSale($idresa , $BuyNom , $BuyPrenom , $SaleNom , $SalePrenom , $dishname , $dishaddress ,$datefor ,$BuyEmail);
    //fin send email


    //$sendmailcomment
    $sendmailcommentbuy = $mailDao->MailComment($idperson , $SaleNom , $SalePrenom , $SalePrenom , $dishname  , $SaleEmail);
    $sendmailcommentsale = $mailDao->MailComment($idsale , $BuyNom , $BuyPrenom , $SalePrenom , $dishname  , $BuyEmail);
    // fin $sendmailcomment

