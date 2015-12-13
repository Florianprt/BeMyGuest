<?php
$dish = 1;
if (isset($_COOKIE['log'])) {
include_once("vue/user/create_dish.php");
}
else{
	header('Location: ../');
}