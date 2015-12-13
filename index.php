<?php
ini_set('display_errors',1);
require_once ('config/config.inc.php');

// Controler principal - dispatcher
if (!isset($_GET["module"])) {
	$module = "page";
} else {
	$module = $_GET["module"];
}


if (!isset($_GET["page"])) {
	$action = "index";
} else {
	$action = $_GET["page"];
}

$url = "controleur/". $module ."/". $action .".php";


if (file_exists($url)) {
	include_once($url);
} else {
	include_once("vue/404.php");
}