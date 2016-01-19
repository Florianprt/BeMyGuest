<?php
define("BASE", "http://localhost/BeMyGuest/");
define("SERVER", "DEV");
define("DEFAULT_ACTION", "index");
define("DEFAULT_MODULE", "pages");

define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));
define('WEBROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));

if (SERVER == "DEV") {
    define("DEBUG", true);
    $host 							='localhost';
	$login 							='root';
	$user 							='root';
	$password						='root';
	$db								='bemyguest';
	$dbName 						='bemyguest';
	$table_prefixe					='bmg_';
} else if (SERVER == "TEST") {
    define("DEBUG", true);
    $host 							='localhost';
	$login 							='root';
	$user 							='root';
	$password						='root';
	$db								='bemyguest';
	$dbName 						='bemyguest';
	$table_prefixe					='bmg_';
} else if (SERVER == "PROD") {
    define("DEBUG", false);
    $host 							='localhost';
	$login 							='root';
	$user 							='root';
	$password						='root';
	$db								='bemyguest';
	$dbName 						='bemyguest';
	$table_prefixe					='bmg_';
}




/************  FONCTION POUR CHARGER AUTOMATIQUEMENT LES CLASSES  ***************/
function __autoload($class) {	
	$chemin = dirname(dirname(__FILE__));
	if((stripos($class,'dao') !== false) && (stripos($class,'Controllersec') === false) && (stripos($class,'core') === false)) {
		$chemin .= '/application/models/';
	}

	elseif ((stripos($class,'dao') === false) && (stripos($class,'Controllersec') === false) && (stripos($class,'core') !== false )) {
		$chemin .= '/core/';
	}

	elseif ((stripos($class,'dao') === false) && (stripos($class,'core') === false) && (stripos($class,'Controllersec') !== false )) {
		$chemin .= '/application/controller/';
	}
	require_once($chemin.$class.'.class.php');
}


ConnectDbcore::$DBNAME = $dbName;
ConnectDbcore::$HOST = $host;
ConnectDbcore::$LOGIN = $login;
ConnectDbcore::$PASSWORD = $password;
AbstractDao::$TABLE_PREFIXE = $table_prefixe;
new Core();


