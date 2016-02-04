<?php
class MailDao  extends AbstractDao {

	protected $mail_expediteur = 'service.bemyguest@gmail.com';
	//protected $deblink = BASE.'valid/';

	function mailinsc($to , $id){
			$idpersone =  explode("|", $id);
			$id = substr($idpersone[0], 5);
			$deblink = BASE.'valid/';
			/*$email ='charles.duvert@gmail.com';
			$to=$email.','.'service.bemyguest@gmail.com';*/
			$subject = 'Your inscription BE MY GUEST ! ';

			$headers  = 'MIME-Version: 1.0' . "\r\n";
		  	$headers .= "From: " . $this->mail_expediteur . "\r\n";
		  	$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		  
		  	$message="";
		  	$message='<div style="width:400px; border:1px solid #ee6416; font-family:\'Lucida Sans Unicode\', \'Lucida Grande\', sans-serif; font-size:12px; padding:20px; margin:auto;">';
		  	$message .= '<span style="font-size:14px; ">Hi, Welcome to BE MY GUEST,</span>
		  	<hr style="border:1px solid #ee6416; border-top:none;"/>
		  	<br />';
			$message .= "<p style='background:#F6F6F6; padding:10px;'><span style=''>I think you'll enjoy being on Cloud9 but if you have any questions, just drop us an email and we’d love to help!<br>Also, to verify your email address please click the link below:</p>";
			$message .="<div style='margin:40px'><a href='".$deblink.$id."' style='list-style:none;border: 1px solid #763568!important;color: #763568;background-color: transparent!important;text-decoration: none;font-size: 15px;padding: 10px 20px;'>CLICK HERE</a></div>
				</div>";

			mail($to, $subject, $message, $headers);
	}





}	