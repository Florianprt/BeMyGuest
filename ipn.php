<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

    $ajax = 1;
    require_once ('config/config.inc.php');

    $reservationDao = new ReservationDao();
    $dish = new DishDao();

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
        $idsale = $item['bmg_user_idbmg_user']
        $quantityrest = $item['dishquantity'];
        $quantitybuy = $item['dishbuy'] ;
    }
    //fin select dish's information to the bdd

    //update quantity dish
    $newqtrest = $quantityrest-$quantity;
    $newdsihbuy = $quantitybuy+$quantity;
    $updatedish = $dish->updatequantitydish($iddish , $newqtrest , $newdsihbuy);
    //fin update quantity

    //add reservations
    $insertresa = $reservationDao->Insertresa($iddish, $idperson , $idsale , $quantity ,$dateachat, $datefor, $prix , $_POST);
    //fin add reservations

    //send email
    //

/*
mc_gross=9.20
item_name1=Pates 3

option_name1_1=date
option_name2_1=iddish
option_name3_1=idperson
option_selection1_1=now
option_selection2_1=2
option_selection3_1=77

protection_eligibility=Eligible&
address_status=confirmed&
item_number1=1&
tax=1.20&
payer_id=DQRE87G77KBKE&address_street=1 Main St&
payment_date=03:11:37 Feb 09, 2016 PST&
payment_status=Completed&charset=windows-1252&address_zip=95131&mc_shipping=0.00&mc_handling=0.00&first_name=Be&mc_fee=0.61&address_country_code=US&address_name=Be myguest&notify_version=3.8&custom=&payer_status=verified&business=service.bemyguest-facilitator@gmail.com&address_country=United States&num_cart_items=1&mc_handling1=0.00&address_city=San Jose&verify_sign=ArgX1JoEl.LNTJ5nkTmgzkfLaDiVA3BdnhNdAzEcy82l8WTeoyeb4hBd&payer_email=service.bemyguest@gmail.com&mc_shipping1=0.00&

txn_id=61Y44867YU103234N&payment_type=instant&
last_name=myguest&address_state=CA&receiver_email=service.bemyguest-facilitator@gmail.com&payment_fee=&quantity1=2&receiver_id=KZSTBYM7D7ANE&txn_type=cart&mc_gross_1=8.00&mc_currency=EUR&residence_country=US&test_ipn=1&transaction_subject=&payment_gross=&ipn_track_id=1acfbb375fc10*/


	$adresse = "http://".$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
