<?php
class MailDao  extends AbstractDao {

	protected $mail_expediteur = 'service.bemyguest@gmail.com';
	//protected $deblink = BASE.'valid/';

	function mailinsc($to , $id){
			$idpersone =  explode("|", $id);
			$id = substr($idpersone[0], 5);
			$deblink = BASE.'valid/';
			$subject = 'Your inscription BE MY GUEST ! ';

			$headers  = 'MIME-Version: 1.0' . "\r\n";
		  	$headers .= "From: " . $this->mail_expediteur . "\r\n";
		  	$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		  
		  	$message="";
		  	$message='<div style="width:400px; border:1px solid #ee6416; font-family:\'Lucida Sans Unicode\', \'Lucida Grande\', sans-serif; font-size:12px; padding:20px; margin:auto;">';
		  	$message .= '<span style="font-size:14px; ">Hi, Welcome to BE MY GUEST,</span>
		  	<hr style="border:1px solid #ee6416; border-top:none;"/>
		  	<br />';
			$message .= "<p style='background:#F6F6F6; padding:10px;'><span style=''>I think you'll enjoy being on Be My Guest but if you have any questions, just drop us an email and we’d love to help!<br>Also, to verify your email address please click the link below:</p>";
			$message .="<div style='margin:40px'><a href='".$deblink.$id."' style='list-style:none;border: 1px solid #763568!important;color: #763568;background-color: transparent!important;text-decoration: none;font-size: 15px;padding: 10px 20px;'>CLICK HERE</a></div>
				</div>";

			mail($to, $subject, $message, $headers);
	}

	function sendRecoRequest($id , $nom , $prenom , $email){
			$deblink = BASE.'recomandate/';
			$subject = 'BE MY GUEST | Recomandate ';

			$headers  = 'MIME-Version: 1.0' . "\r\n";
		  	$headers .= "From: " . $this->mail_expediteur  . "\r\n";
		  	$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		  
		  	$message="";
		  	$message='<div style="width:400px; border:1px solid #ee6416; font-family:\'Lucida Sans Unicode\', \'Lucida Grande\', sans-serif; font-size:12px; padding:20px; margin:auto;">';
		  	$message .= '<span style="font-size:14px; ">Hi, Welcome we are BE MY GUEST,</span>
		  	<hr style="border:1px solid #ee6416; border-top:none;"/>
		  	<br />';
			$message .= "<p style='background:#F6F6F6; padding:10px;'><span style=''>Your friend".$nom.$prenom." ask you to write a recommandation for his very good dish!<br>can you do that ?<br> please click the link below:</p>";
			$message .="<div style='margin:40px'><a href='".$deblink.$id."' style='list-style:none;border: 1px solid #763568!important;color: #763568;background-color: transparent!important;text-decoration: none;font-size: 15px;padding: 10px 20px;'>CLICK HERE</a></div>
				</div>";

			if(mail($email, $subject, $message, $headers)){
				return true;
			}
			else{
				return false;
			}
	}

	function MailBuy($idresa , $BuyNom , $BuyPrenom , $SaleNom , $SalePrenom , $dishname , $dishaddress ,$datefor , $SaleEmail){
			$deblink = BASE.'message/';
			$subject = 'BE MY GUEST | Buy dish ';

			$headers  = 'MIME-Version: 1.0' . "\r\n";
		  	$headers .= "From: " . $this->mail_expediteur  . "\r\n";
		  	$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		  
		  	$message="";
		  	$message='<div style="width:400px; border:1px solid #ee6416; font-family:\'Lucida Sans Unicode\', \'Lucida Grande\', sans-serif; font-size:12px; padding:20px; margin:auto;">';
		  	$message .= '<span style="font-size:14px; ">Hi,'.$SalePrenom.'  '.$SaleNom.' THANK YOU FOR YOUR PURCHASE !,</span>
		  	<hr style="border:1px solid #ee6416; border-top:none;"/>
		  	<br />';
			$message .= "<p style='background:#F6F6F6; padding:10px;'><span style=''>You just bought a dish to  ".$BuyPrenom;
			$message .= "Your reservation is scheduled for the ".$datefor." <br> You must come to fetch it at : ".$dishaddress."<br>";
			$message .= " But it's recomandate to contact the cook before.<br> So please click the link below:</p>";
			$message .="<div style='margin:40px'><a href='".$deblink.$idresa."' style='list-style:none;border: 1px solid #763568!important;color: #763568;background-color: transparent!important;text-decoration: none;font-size: 15px;padding: 10px 20px;'>CLICK HERE</a></div>
				</div>";

			if(mail($SaleEmail, $subject, $message, $headers)){
				return true;
			}
			else{
				return false;
			}
	}

	function MailSale($idresa , $BuyNom , $BuyPrenom , $SaleNom , $SalePrenom , $dishname , $dishaddress ,$datefor ,$BuyEmail){
			$deblink = BASE.'message/';
			$subject = 'BE MY GUEST | Purchase dish ';

			$headers  = 'MIME-Version: 1.0' . "\r\n";
		  	$headers .= "From: " . $this->mail_expediteur  . "\r\n";
		  	$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		  
		  	$message="";
		  	$message='<div style="width:400px; border:1px solid #ee6416; font-family:\'Lucida Sans Unicode\', \'Lucida Grande\', sans-serif; font-size:12px; padding:20px; margin:auto;">';
		  	$message .= '<span style="font-size:14px; ">Hi,'.$BuyPrenom.'  '.$BuyNom.' Well done you have a new reservation !,</span>
		  	<hr style="border:1px solid #ee6416; border-top:none;"/>
		  	<br />';
			$message .= "<p style='background:#F6F6F6; padding:10px;'><span style=''>".$SaleNom." just bought you a dish :) !";
			$message .= "The reservation is scheduled for the ".$datefor." <br> At this address : ".$dishaddress."<br>";
			$message .= "If ".$SaleNom." doesn't contact you, it's recomandate to contact him before.<br> So please click the link below:</p>";
			$message .="<div style='margin:40px'><a href='".$deblink.$idresa."' style='list-style:none;border: 1px solid #763568!important;color: #763568;background-color: transparent!important;text-decoration: none;font-size: 15px;padding: 10px 20px;'>CLICK HERE</a></div>
				</div>";

			if(mail($BuyEmail, $subject, $message, $headers)){
				return true;
			}
			else{
				return false;
			}
	}


	function MailComment($idsale , $nomfor , $prenomfor , $prenomde , $dishname  , $emailfor){
			$deblink = BASE.'comment/';
			$subject = 'BE MY GUEST | comment ';

			$headers  = 'MIME-Version: 1.0' . "\r\n";
		  	$headers .= "From: " . $this->mail_expediteur  . "\r\n";
		  	$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		  
		  	$message="";
		  	$message='<div style="width:400px; border:1px solid #ee6416; font-family:\'Lucida Sans Unicode\', \'Lucida Grande\', sans-serif; font-size:12px; padding:20px; margin:auto;">';
		  	$message .= '<span style="font-size:14px; ">Hi, '.$nomfor.' '.$prenomfor.' how are you ?,</span>
		  	<hr style="border:1px solid #ee6416; border-top:none;"/>
		  	<br />';
			$message .= "<p style='background:#F6F6F6; padding:10px;'><span style=''>You dealt with ".$prenomde." for the ".$dishname." dishes. Can you to write a comment for ".$prenomde." !<br>can you do that ?<br> please click the link below:</p>";
			$message .="<div style='margin:40px'><a href='".$deblink.$idsale."' style='list-style:none;border: 1px solid #763568!important;color: #763568;background-color: transparent!important;text-decoration: none;font-size: 15px;padding: 10px 20px;'>CLICK HERE</a></div>
				</div>";

			if(mail($emailfor, $subject, $message, $headers)){
				return true;
			}
			else{
				return false;
			}
	}





}	