<?php
$host 							='localhost';

$login 							='root';
$user 							='root';

$password						='root';
$db								='bemyguest';
$dbName 						='bemyguest';

$table_prefixe					='bmg_';



/************  FONCTION POUR CHARGER AUTOMATIQUEMENT LES CLASSES  ***************/
function __autoload($class) {	
	$chemin = dirname(dirname(__FILE__)).'/modele/classes/';
	require_once($chemin.$class.'.class.php');	
}


ConnectDb::$DBNAME = $dbName;
ConnectDb::$HOST = $host;
ConnectDb::$LOGIN = $login;
ConnectDb::$PASSWORD = $password;
AbstractDao::$TABLE_PREFIXE = $table_prefixe;
