<?php
class FacebookLogDao  extends AbstractDao {

	protected $_table_un = 'connect';
	protected $_table_deux = 'user';
	protected $nom = '';
	protected $prenom = '';
	protected $adresse_email = '';
	protected $age = '';
	protected $idfacebook = '';
	protected $image = '';
	protected $date = '';
	protected $iduser = '';
	protected $type = '';
	protected $null = null;		
	
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
			throw new Exception('existe_avc_fb');
			return false;
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
			throw new Exception('existe_sans_fb');
			return false;
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

		throw new Exception('bueno');
	}
	

}