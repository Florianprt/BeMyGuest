<?php
$dashboard =1;

if (isset($_COOKIE['log'])) {
include_once("vue/user/dashboard.php");
}
else{
	header('Location: ../');
	//include_once("vue/page/index.php");
}