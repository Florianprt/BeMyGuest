<?php
class BankDao  extends AbstractDao {

	protected $_table = 'bankaccount';	

	
	public function sendbankinfo($id, $nombank , $prenombank , $iban , $bic){

		$pdo = $this->getPdo();
		$select = $pdo->prepare("SELECT * FROM ".self::$TABLE_PREFIXE.$this->_table." WHERE bmg_user_idbmg_user= :bmg_user_idbmg_user");
		$select->bindValue('bmg_user_idbmg_user', $id);
		$select->execute();

		$nbusers = $select->rowCount();

		if ($nbusers == 0) {
			$sth = $pdo->prepare("
			INSERT INTO ".self::$TABLE_PREFIXE.$this->_table." 
			(bmg_user_idbmg_user, nombank , prenombank , iban , bic) VALUES ( :bmg_user_idbmg_user, :nombank , :prenombank , :iban , :bic);");
			$sth->bindParam('bmg_user_idbmg_user',$id);
			$sth->bindParam('nombank',$nombank);
			$sth->bindParam('prenombank',$prenombank);
			$sth->bindParam('iban',$iban);
			$sth->bindParam('bic',$bic);
			$sth->execute();
			return true;
		}
		else if ($nbusers == 1) {
			$sth = $pdo->prepare("UPDATE ".self::$TABLE_PREFIXE.$this->_table." SET nombank=:nombank ,prenombank=:prenombank,iban=:iban,bic=:bic  WHERE bmg_user_idbmg_user=:bmg_user_idbmg_user");
			$sth->bindParam('bmg_user_idbmg_user',$id);
			$sth->bindParam('nombank',$nombank);
			$sth->bindParam('prenombank',$prenombank);
			$sth->bindParam('iban',$iban);
			$sth->bindParam('bic',$bic);
			$sth->execute();
			return true;
		}
	}

	public function selectbank($id){
		$pdo = $this->getPdo();
		$sth = $pdo->prepare("SELECT * FROM ".self::$TABLE_PREFIXE.$this->_table." WHERE bmg_user_idbmg_user = :bmg_user_idbmg_user");
		$sth->bindParam('bmg_user_idbmg_user',$id,PDO::PARAM_INT);
		$sth->execute();
		$result = $sth->fetchAll();
		return $result;
	}


}