<?php
class NewsletterDao  extends AbstractDao {

	protected $_table = 'newsletter';	
	
	public function listerUser() {
		return $this->lister();		
	}


	public function checkifexist($email, $number) {
		$pdo = $this->getPdo();
		$select = $pdo->prepare("SELECT * FROM ".self::$TABLE_PREFIXE.$this->_table." WHERE email= :email");
		$select->bindValue('email', $email);
		$select->execute();

			$nbusers = $select->rowCount();

		if ($nbusers == 0) {
			$sth = $pdo->prepare("
			INSERT INTO ".self::$TABLE_PREFIXE.$this->_table." 
			( email , number) VALUES (:email , :number);");
			$sth->bindParam('email',$email);
			$sth->bindParam('number',$number);
			$sth->execute();
			return true;
		}
		else if ($nbusers == 1) {
			return true;
		}
	}
	/*public function Insertnews($email , $number) {
		$pdo = $this->getPdo();
		$sth = $pdo->prepare("
		INSERT INTO ".self::$TABLE_PREFIXE.$this->_table." 
		( email , number) VALUES (:email , :number);");
		$sth->bindParam('email',$email);
		$sth->bindParam('number',$number);
		$sth->execute();
		return true;
	}*/
	

}