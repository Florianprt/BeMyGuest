<?php
class AlerteCore extends Core{

	public function __construct(){
		session_start();
	}

	public function setFlash($message, $type){
		$_SESSION['flash']= array( 'message' =>$message, 'type' => $type);
	}

	public function flash(){
		if (isset($_SESSION['flash'])) { 
			return $msgflash = '<div class="alert alert-'.$_SESSION['flash']['type'].' media fade in bd-0" id="message-alert"><div class="media-body width-100p"><h4 class="alert-title f-14">Alerte ! </h4><p class="f-12 alert-message pull-left">'.$_SESSION['flash']['message'].' </p></div></div>';
			unset($_SESSION['flash']);
		}
	}
}