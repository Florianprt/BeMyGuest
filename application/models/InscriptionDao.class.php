<?php
class InscriptionDao  extends AbstractDao {

	protected $_table_un = 'connect';
	protected $_table_deux = 'user';
	protected $nom = '';
	protected $prenom = '';
	protected $adresse_email = '';
	protected $password = '';
	protected $date = '';
	protected $iduser = '';
	protected $image = '';
	protected $idconnectuser = '';
	protected $type = '';		
	
	public function __construct($nom , $prenom ,  $adresse_email ,  $password ,  $date_inscription ,  $type, $image )
	{
		$this->nom =  $nom;
		$this->prenom = $prenom;
		$this->adresse_email =$adresse_email;
		$this->password =$password;
		$this->date_inscription =$date_inscription;
		$this->type =$type;
		$this->image =$image;
	}


	public function Inscription() {
		$pdo = $this->getPdo();
		$select = $pdo->prepare("SELECT * FROM ".self::$TABLE_PREFIXE.$this->_table_deux." WHERE email= :email");
		$select->bindValue('email', $this->adresse_email);
		$select->execute();

			$nbusers = $select->rowCount();

		if ($nbusers == 0) {
			$this->InsertUser();
		}
		else if ($nbusers == 1) {
			throw new Exception('existe');
			return false;
		}
	}

	public function InsertUser() {
		$pdo = $this->getPdo();
		$sth = $pdo->prepare("
		INSERT INTO ".self::$TABLE_PREFIXE.$this->_table_deux." 
		(nom ,	prenom , email , date_inscription ,image) VALUES ( :nom , :prenom , :email , :date_inscription , :image);");
		$sth->bindParam('nom',$this->nom);
		$sth->bindParam('prenom',$this->prenom);
		$sth->bindParam('email',$this->adresse_email);
		$sth->bindParam('date_inscription',$this->date_inscription);
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
		(bmg_user_idbmg_user , email , type , password ) VALUES (:bmg_user_idbmg_user , :email , :type , :password);");
		$sth->bindParam('bmg_user_idbmg_user',$this->iduser);
		$sth->bindParam('email',$this->adresse_email);
		$sth->bindParam('type',$this->type);
		$sth->bindParam('password',$this->password);
		$sth->execute();
		$this->idconnectuser = $pdo->lastInsertId();

		$length = 5;
		$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
		$result = $randomString.$this->iduser.'|'.$randomString.'|'.crypt($this->idconnectuser);
		throw new Exception($result);
		exit();
	}


	public function Connection_check($email , $password) {
		$pdo = $this->getPdo();
		$select = $pdo->prepare("SELECT * FROM ".self::$TABLE_PREFIXE.$this->_table_un." WHERE email= :email");
		$select->bindValue('email', $email);
		$select->execute();

			$nbusers = $select->rowCount();

		if ($nbusers == 0) {
			throw new Exception('noexiste');
			return false;
		}
		else if ($nbusers == 1) {

			foreach($select as $item) { 
				$email = $item['email'];
				$passwordbase = $item['password'];
				$userid = $item['bmg_user_idbmg_user'];
				$connectid = $item['idbmg_connect'];
			}

			if (crypt($password, $passwordbase) == $passwordbase) {
				$length = 5;
				$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
				$result = $randomString.$userid.'|'.$randomString.'|'.crypt($connectid);
				throw new Exception($result);
				exit();
			}
			else{
				throw new Exception('falsepassword');
				exit();
			}
		}
	}
	

}