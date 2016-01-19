<?php /***********CLASS DE CONNECTION A LA BASE DE DONNEES EN PDO*************/

class ConnectDbcore {
	

	private static $_INSTANCE;
	
	public static $DBNAME ;
	
	public static $HOST ;
	
	public static $LOGIN ;
	
	public static $PASSWORD ;


	private function __construct() {
		try {


			if(self::$DBNAME == null || self::$HOST == null ||self::$LOGIN == null) {
				throw new PDOException('Les informations sur la base de données le login ou le mdp son incorrect ou incompletes');
			}

			$dsn = 'mysql:dbname='.self::$DBNAME.';host='.self::$HOST;
			$user = self::$LOGIN;
			$password = self::$PASSWORD;

			$options = array (
			PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\' ',
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
/*$this represente l'objet*/
			$this->pdo = new PDO( $dsn, $user, $password, $options );
			} 
			catch ( PDOException $e ) {
				die("Connection à Mysql impossible : ". $e->getMessage());
			}

	}

/** Verifie si la connexion est etabli *******/
	public static function getInstance() {
		if(self::$_INSTANCE == null) {
			self::$_INSTANCE = new ConnectDb();
		}
		return self::$_INSTANCE;
	}

	
	public function getPdo() {
		return $this->pdo;
	}
}
