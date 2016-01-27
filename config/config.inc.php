<?php
require_once('define.php');

/************  FONCTION POUR CHARGER AUTOMATIQUEMENT LES CLASSES  ***************/
function __autoload($class) {	
	$chemin = dirname(dirname(__FILE__));
	if((stripos($class,'dao') !== false) && (stripos($class,'Controllersec') === false) && (stripos($class,'core') === false)) {
		$chemin .= '/application/models/';
	}

	elseif ((stripos($class,'dao') === false) && (stripos($class,'Controllersec') === false) && (stripos($class,'core') !== false || stripos($class,'db') !== false)) {
		$chemin .= '/core/';
	}

	elseif ((stripos($class,'dao') === false) && (stripos($class,'core') === false) && (stripos($class,'Controllersec') !== false )) {
		$chemin .= '/application/controller/';
	}
	require_once($chemin.$class.'.class.php');
}


ConnectDb::$DBNAME = $dbName;
ConnectDb::$HOST = $host;
ConnectDb::$LOGIN = $login;
ConnectDb::$PASSWORD = $password;
AbstractDao::$TABLE_PREFIXE = $table_prefixe;
if (!isset($ajax)) {
	new Core();
}



