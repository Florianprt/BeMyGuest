<?php
class DishDao  extends AbstractDao {

	protected $_table = 'dish';	
	
	public function listerDish() {
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

	public function getByUserId($id) {
		$pdo = $this->getPdo();
		$sth = $pdo->prepare("SELECT * FROM ".self::$TABLE_PREFIXE.$this->_table." WHERE bmg_user_idbmg_user = :bmg_user_idbmg_user");
		$sth->bindParam('bmg_user_idbmg_user',$id,PDO::PARAM_INT);
		$sth->execute();
		$result = $sth->fetchAll();
		return $result;
	}

	public function InsertDish($id, $name, $adress, $zipcode ,$city,$ingredients,$description,$price,$quantity ,$dishnewquantity, $dishbegin, $dishfinish , $dishactive) {
		$pdo = $this->getPdo();
		$sth = $pdo->prepare("
		INSERT INTO ".self::$TABLE_PREFIXE.$this->_table." 
		(bmg_user_idbmg_user ,	dishname , dishadress , dishzipcode ,dishcity,	dishingredients, dishdesc,dishprice, dishquantity , dishnewquantity, dishbegin, dishfinish ,dishactive) 
		VALUES ( :bmg_user_idbmg_user , :dishname , :dishadress , :dishzipcode , :dishcity, :dishingredients, :dishdesc, :dishprice, :dishquantity , :dishnewquantity, :dishbegin, :dishfinish , :dishactive);");
		$sth->bindParam('bmg_user_idbmg_user',$id);
		$sth->bindParam('dishname',$name);
		$sth->bindParam('dishadress',$adress);
		$sth->bindParam('dishzipcode',$zipcode);
		$sth->bindParam('dishcity',$city);
		$sth->bindParam('dishingredients',$ingredients);
		$sth->bindParam('dishdesc',$description);
		$sth->bindParam('dishprice',$price);
		$sth->bindParam('dishquantity',$quantity);
		$sth->bindParam('dishnewquantity',$dishnewquantity);
		$sth->bindParam('dishbegin',$dishbegin);
		$sth->bindParam('dishfinish',$dishfinish);
		$sth->bindParam('dishactive',$dishactive);
		$sth->execute();
		$iddish = $pdo->lastInsertId();
		rename(DEFAULT_LINK_FILE.$id.'/dish/new',DEFAULT_LINK_FILE.$id.'/dish/'.$iddish);

		return $iddish;

	}

	public function updatedishdate($id,$dishbegin, $dishfinish) {
		$pdo = $this->getPdo();
		$sth = $pdo->prepare("UPDATE ".self::$TABLE_PREFIXE.$this->_table." SET dishbegin=:dishbegin, dishfinish=:dishfinish WHERE idbmg_dish=:idbmg_dish");
		$sth->bindParam('dishbegin',$dishbegin);
		$sth->bindParam('dishfinish',$dishfinish);
		$sth->bindParam('idbmg_dish',$id);
		$sth->execute();
		return true;
	}

	public function updatedish($id, $name, $adress, $zipcode ,$city,$ingredients,$description,$price,$quantity ,$dishnewquantity, $dishbegin, $dishfinish , $dishactive) {
		$pdo = $this->getPdo();
		$sth = $pdo->prepare("
		UPDATE ".self::$TABLE_PREFIXE.$this->_table." 
		SET	dishname =:dishname, dishadress=:dishadress , dishzipcode=:dishzipcode ,dishcity=:dishcity,	dishingredients=:dishingredients, dishdesc=:dishdesc,dishprice=:dishprice, dishquantity=:dishquantity , dishnewquantity=:dishnewquantity, dishbegin=:dishbegin, dishfinish=:dishfinish ,dishactive=:dishactive WHERE idbmg_dish=:idbmg_dish");
		$sth->bindParam('idbmg_dish',$id);
		$sth->bindParam('dishname',$name);
		$sth->bindParam('dishadress',$adress);
		$sth->bindParam('dishzipcode',$zipcode);
		$sth->bindParam('dishcity',$city);
		$sth->bindParam('dishingredients',$ingredients);
		$sth->bindParam('dishdesc',$description);
		$sth->bindParam('dishprice',$price);
		$sth->bindParam('dishquantity',$quantity);
		$sth->bindParam('dishnewquantity',$dishnewquantity);
		$sth->bindParam('dishbegin',$dishbegin);
		$sth->bindParam('dishfinish',$dishfinish);
		$sth->bindParam('dishactive',$dishactive);
		$sth->execute();

		return true;

	}


}