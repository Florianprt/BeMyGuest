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
	protected $type = '';		
	
	public function __construct($nom , $prenom ,  $adresse_email ,  $password ,  $date_inscription ,  $type )
	{
		$this->nom =  $nom;
		$this->prenom = $prenom;
		$this->adresse_email =$adresse_email;
		$this->password =$password;
		$this->date_inscription =$date_inscription;
		$this->type =$type;
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
		(nom ,	prenom , email , date_inscription ) VALUES ( :nom , :prenom , :email , :date_inscription );");
		$sth->bindParam('nom',$this->nom);
		$sth->bindParam('prenom',$this->prenom);
		$sth->bindParam('email',$this->adresse_email);
		$sth->bindParam('date_inscription',$this->date_inscription);
		$sth->execute();
		$this->iduser = $pdo->lastInsertId();

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

		throw new Exception('bueno');
	}
	

}