<?php
abstract class AbstractDao {

	public static $TABLE_PREFIXE;
	
	protected $_table;

	public function getPdo() {
		return ConnectDb::getInstance()->getPdo();
	}
	
	public function getById($id) {
		$pdo = $this->getPdo();
		$sth = $pdo->prepare("SELECT * FROM ".self::$TABLE_PREFIXE.$this->_table." WHERE id = :entryid");
		$sth->bindParam('entryid',$id,PDO::PARAM_INT);
		$sth->execute();
		$result = $sth->fetchAll();
		return $result;
	}

	public function lister() {	
		return $this->getPdo()->query("SELECT * FROM ".self::$TABLE_PREFIXE.$this->_table);
	}



	
}