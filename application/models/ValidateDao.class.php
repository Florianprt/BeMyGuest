<?php
class ValidateDao  extends AbstractDao {

	protected $_table = 'validation';	
	protected $ok = 1;	
	protected $nok = 0;

	function validateemail($id){
		$pdo = $this->getPdo();
		$select = $pdo->prepare("SELECT * FROM ".self::$TABLE_PREFIXE.$this->_table." WHERE bmg_user_idbmg_user= :bmg_user_idbmg_user");
		$select->bindValue('bmg_user_idbmg_user', $id);
		$select->execute();

		$nbusers = $select->rowCount();

		if ($nbusers == 0) {
			$sth = $pdo->prepare("
			INSERT INTO ".self::$TABLE_PREFIXE.$this->_table." 
			(bmg_user_idbmg_user ,	email) VALUES ( :bmg_user_idbmg_user , :email);");
			$sth->bindParam('bmg_user_idbmg_user',$id);
			$sth->bindParam('email',$this->ok);
			$sth->execute();
			return true;
		}
		else if ($nbusers == 1) {
			$sth = $pdo->prepare("UPDATE ".self::$TABLE_PREFIXE.$this->_table." SET email=:email WHERE bmg_user_idbmg_user=:bmg_user_idbmg_user");
			$sth->bindParam('email',$this->ok);
			$sth->bindParam('bmg_user_idbmg_user',$id);
			$sth->execute();
			return true;
		}
	}

	public function getByUserId($id) {
		$pdo = $this->getPdo();
		$sth = $pdo->prepare("SELECT * FROM ".self::$TABLE_PREFIXE.$this->_table." WHERE bmg_user_idbmg_user = :bmg_user_idbmg_user");
		$sth->bindParam('bmg_user_idbmg_user',$id,PDO::PARAM_INT);
		$sth->execute();
		$result = $sth->fetchAll();
		return $result;
	}

	public function firstvalidate($id){
			$pdo = $this->getPdo();
			$sth = $pdo->prepare("INSERT INTO ".self::$TABLE_PREFIXE.$this->_table." 
			(bmg_user_idbmg_user ,	facebook , email , bankinfo) VALUES ( :bmg_user_idbmg_user , :facebook , :email , :bankinfo);");
			$sth->bindParam('bmg_user_idbmg_user',$id);
			$sth->bindParam('facebook',$this->nok);
			$sth->bindParam('email',$this->nok);
			$sth->bindParam('bankinfo',$this->nok);
			$sth->execute();
			return true;
	}





}