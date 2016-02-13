<?php
class ReservationDao  extends AbstractDao {

	protected $_table = 'reservations';
	protected $_table_un = 'dish';


	public function Insertresa($id_dish, $id_user, $id_saler , $quantity ,$date_buy, $date_for,$price_total,$ipn) {
		$pdo = $this->getPdo();
		$sth = $pdo->prepare("
		INSERT INTO ".self::$TABLE_PREFIXE.$this->_table." 
		(id_dish ,	id_user, id_saler , quantity , date_buy ,date_for ,price_total,ipn) VALUES ( :id_dish , :id_user , :id_saler , :quantity , :date_buy , :date_for , :price_total , :ipn);");
		$sth->bindParam('id_dish',$id_dish);
		$sth->bindParam('id_user',$id_user);
		$sth->bindParam('id_saler',$id_saler);
		$sth->bindParam('quantity',$quantity);
		$sth->bindParam('date_buy',$date_buy);
		$sth->bindParam('date_for',$date_for);
		$sth->bindParam('price_total',$price_total);
		$sth->bindParam('ipn',$ipn);
		$sth->execute();
	}

	public function selectresabyBuyid($id){
		$pdo = $this->getPdo();
		$sth = $pdo->prepare("SELECT * FROM ".self::$TABLE_PREFIXE.$this->_table.",".self::$TABLE_PREFIXE.$this->_table_un." WHERE id_dish=idbmg_dish and id_user = :id_user");
		$sth->bindParam('id_user',$id,PDO::PARAM_INT);
		$sth->execute();
		$result = $sth->fetchAll();
		return $result;
	}

	public function selectresabySaleid($id){
		$pdo = $this->getPdo();
		$sth = $pdo->prepare("SELECT * FROM ".self::$TABLE_PREFIXE.$this->_table.",".self::$TABLE_PREFIXE.$this->_table_un." WHERE id_dish=idbmg_dish and id_saler = :id_saler");
		$sth->bindParam('id_saler',$id,PDO::PARAM_INT);
		$sth->execute();
		$result = $sth->fetchAll();
		return $result;
	}



}
