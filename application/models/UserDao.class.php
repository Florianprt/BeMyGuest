<?php
class UserDao  extends AbstractDao {

	protected $_table = 'user';	
	protected $_table_un = 'connect';	
	
	public function listerUser() {
		return $this->lister();		
	}
	
	public function getById($id) {
		$pdo = $this->getPdo();
		$sth = $pdo->prepare("SELECT * FROM ".self::$TABLE_PREFIXE.$this->_table." WHERE idbmg_user = :idbmg_user");
		$sth->bindParam('idbmg_user',$id,PDO::PARAM_INT);
		$sth->execute();
		$result = $sth->fetchAll();
		return $result;
	}

	public function updateprofil($id, $nom, $prenom, $email ,$ville,$arrondissement,$adresse,$age,$description, $lien) {
		$pdo = $this->getPdo();
		$sth = $pdo->prepare("UPDATE ".self::$TABLE_PREFIXE.$this->_table." SET nom=:nom, prenom=:prenom, email=:email, ville=:ville, arrondissement=:arrondissement, adresse=:adresse, age=:age, description=:description, image=:image  WHERE idbmg_user=:idbmg_user");
		$sth->bindParam('nom',$nom);
		$sth->bindParam('prenom',$prenom);
		$sth->bindParam('email',$email);
		$sth->bindParam('ville',$ville);
		$sth->bindParam('arrondissement',$arrondissement);
		$sth->bindParam('adresse',$adresse);
		$sth->bindParam('age',$age);
		$sth->bindParam('description',$description);
		$sth->bindParam('image',$lien);
		$sth->bindParam('idbmg_user',$id);
		$sth->execute();
		$this->updateemailco($id , $email);
	}

	public function updateemailco($id, $email) {
		$pdo = $this->getPdo();
		$sth = $pdo->prepare("UPDATE ".self::$TABLE_PREFIXE.$this->_table_un." SET email=:email  WHERE bmg_user_idbmg_user=:bmg_user_idbmg_user");
		$sth->bindParam('email',$email);
		$sth->bindParam('bmg_user_idbmg_user',$id);
		$sth->execute();
		return true;
	}
	

}