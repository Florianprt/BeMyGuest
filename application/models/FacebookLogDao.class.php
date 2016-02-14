<?php
class FacebookLogDao  extends AbstractDao {

	protected $_table_un = 'connect';
	protected $_table_deux = 'user';
	protected $_table_trois = 'validation';
	protected $nom = '';
	protected $prenom = '';
	protected $adresse_email = '';
	protected $age = '';
	protected $idfacebook = '';
	protected $image = '';
	protected $date = '';
	protected $iduser = '';
	protected $idconnectuser = '';
	protected $type = '';
	protected $null = null;
	protected $result = '';
	protected $ok = 1;
	
	public function __construct($nom , $prenom ,  $adresse_email , $age ,  $idfacebook ,$image, $date_inscription, $type)
	{
		$this->nom =  $nom;
		$this->prenom = $prenom;
		$this->adresse_email =$adresse_email;
		$this->age =$age;
		$this->idfacebook =$idfacebook;
		$this->image =$image;
		$this->date_inscription =$date_inscription;
		$this->type =$type;
	}

	public function checkifexist() {
		$pdo = $this->getPdo();
		$select = $pdo->prepare("SELECT * FROM ".self::$TABLE_PREFIXE.$this->_table_un." WHERE idfacebook =:idfacebook and idfacebook IS NOT NULL");
		$select->bindValue('idfacebook', $this->idfacebook);
		$select->execute();

		$nbusers = $select->rowCount();

		if ($nbusers == 0) {
			$this->checkconnection();
		}
		else if ($nbusers == 1) {

			//exist avec facebook so connect
			foreach($select as $item) { 
				$email = $item['email'];
				$password = $item['password'];
				$userid = $item['bmg_user_idbmg_user'];
				$connectid = $item['idbmg_connect'];
			}

			$length = 5;
			$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
			$result = $randomString.$userid.'|'.$randomString.'|'.crypt($connectid).'|'.$email;
			throw new Exception($result);
			return false;
			exit();
		}
	}

	public function checkconnection() {
		$pdo = $this->getPdo();
		$select = $pdo->prepare("SELECT * FROM ".self::$TABLE_PREFIXE.$this->_table_un." WHERE email= :email");
		$select->bindValue('email', $this->adresse_email);
		$select->execute();

		$nbusers = $select->rowCount();

		if ($nbusers == 0) {
			$this->InsertUser();
		}
		else if ($nbusers == 1) {

			foreach($select as $item) { 
				$email = $this->adresse_email;
				$password = $item['password'];
				$userid = $item['bmg_user_idbmg_user'];
				$connectid = $item['idbmg_connect'];
				$idfacebook = $item['idfacebook'];
			}

			if ( $idfacebook == $this->idfacebook) {
				$length = 5;
				$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
				$result = $randomString.$userid.'|'.$randomString.'|'.crypt($connectid);
				throw new Exception($result);
				return false;
				exit();
			}
			else{
				throw new Exception('nofb');
				exit();
			}
		}
	}

	public function InsertUser() {
		$pdo = $this->getPdo();
		$sth = $pdo->prepare("
		INSERT INTO ".self::$TABLE_PREFIXE.$this->_table_deux." 
		(nom ,	prenom , email , date_inscription , age , image ) VALUES ( :nom , :prenom , :email , :date_inscription , :age , :image );");
		$sth->bindParam('nom',$this->nom);
		$sth->bindParam('prenom',$this->prenom);
		$sth->bindParam('email',$this->adresse_email);
		$sth->bindParam('date_inscription',$this->date_inscription);
		$sth->bindParam('age',$this->age);
		$sth->bindParam('image',$this->image);
		$sth->execute();

		$this->iduser = $pdo->lastInsertId();
		mkdir(DEFAULT_LINK_FILE.$this->iduser, 0700);
		mkdir(DEFAULT_LINK_FILE.$this->iduser.'/profil', 0700);
		mkdir(DEFAULT_LINK_FILE.$this->iduser.'/dish', 0700);
		$this->InsertConnection();

	}

	public function InsertConnection() {
		$pdo = $this->getPdo();
		$sth = $pdo->prepare("
		INSERT INTO ".self::$TABLE_PREFIXE.$this->_table_un." 
		(bmg_user_idbmg_user , email , type , idfacebook ) VALUES (:bmg_user_idbmg_user , :email , :type , :idfacebook);");
		$sth->bindParam('bmg_user_idbmg_user',$this->iduser);
		$sth->bindParam('email',$this->adresse_email);
		$sth->bindParam('type',$this->type);
		$sth->bindParam('idfacebook',$this->idfacebook);
		$sth->execute();
		$this->idconnectuser = $pdo->lastInsertId();
		
		$length = 5;
		$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
		$this->result = $randomString.$this->iduser.'|'.$randomString.'|'.crypt($this->idconnectuser);
		$this->Insertvalidation();
		//throw new Exception($result);
	}

	public function Insertvalidation() {
		$pdo = $this->getPdo();
		$sth = $pdo->prepare("
		INSERT INTO ".self::$TABLE_PREFIXE.$this->_table_trois." 
		(bmg_user_idbmg_user , facebook ,email) VALUES (:bmg_user_idbmg_user , :facebook , :email);");
		$sth->bindParam('bmg_user_idbmg_user',$this->iduser);
		$sth->bindParam('facebook',$this->ok);
		$sth->bindParam('email',$this->ok);
		$sth->execute();
		throw new Exception($this->result);
		return true;
	}
	

}