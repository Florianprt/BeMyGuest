<?php
class DishDao  extends AbstractDao {

	protected $_table = 'dish';
	protected $_table_deux ='user';
	
	public function listerDish() {
		return $this->lister();		
	}
	
	public function getById($id) {
		$pdo = $this->getPdo();
		$sth = $pdo->prepare("SELECT * FROM ".self::$TABLE_PREFIXE.$this->_table." WHERE idbmg_dish = :idbmg_dish");
		$sth->bindParam('idbmg_dish',$id,PDO::PARAM_INT);
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
	public function getByUserIdOn($id) {
		$on=1;
		$pdo = $this->getPdo();
		$sth = $pdo->prepare("SELECT * FROM ".self::$TABLE_PREFIXE.$this->_table." WHERE bmg_user_idbmg_user = :bmg_user_idbmg_user and dishactive =:dishactive");
		$sth->bindParam('bmg_user_idbmg_user',$id,PDO::PARAM_INT);
		$sth->bindParam('dishactive',$on);
		$sth->execute();
		$result = $sth->fetchAll();
		return $result;
	}

	public function InsertDish($id, $name, $adress, $zipcode ,$city,$ingredients,$description,$price,$quantity ,$dishnewquantity, $dishbegin, $dishfinish , $dishactive,$dishlat,$dishlong) {
		$pdo = $this->getPdo();
		$sth = $pdo->prepare("
		INSERT INTO ".self::$TABLE_PREFIXE.$this->_table." 
		(bmg_user_idbmg_user ,	dishname , dishadress , dishzipcode ,dishcity,	dishingredients, dishdesc,dishprice, dishquantity , dishbuy, dishbegin, dishfinish ,dishactive,dishlat,dishlong) 
		VALUES ( :bmg_user_idbmg_user , :dishname , :dishadress , :dishzipcode , :dishcity, :dishingredients, :dishdesc, :dishprice, :dishquantity , :dishbuy, :dishbegin, :dishfinish , :dishactive,:dishlat,:dishlong);");
		$sth->bindParam('bmg_user_idbmg_user',$id);
		$sth->bindParam('dishname',$name);
		$sth->bindParam('dishadress',$adress);
		$sth->bindParam('dishzipcode',$zipcode);
		$sth->bindParam('dishcity',$city);
		$sth->bindParam('dishingredients',$ingredients);
		$sth->bindParam('dishdesc',$description);
		$sth->bindParam('dishprice',$price);
		$sth->bindParam('dishquantity',$quantity);
		$sth->bindParam('dishbuy',$dishnewquantity);
		$sth->bindParam('dishbegin',$dishbegin);
		$sth->bindParam('dishfinish',$dishfinish);
		$sth->bindParam('dishactive',$dishactive);
		$sth->bindParam('dishlat',$dishlat);
		$sth->bindParam('dishlong',$dishlong);
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

	public function updatequantitydish($iddish , $newqtrest , $newdsihbuy) {
		$pdo = $this->getPdo();
		$sth = $pdo->prepare("UPDATE ".self::$TABLE_PREFIXE.$this->_table." SET dishquantity=:dishquantity, dishbuy=:dishbuy WHERE idbmg_dish=:idbmg_dish");
		$sth->bindParam('dishquantity',$newqtrest);
		$sth->bindParam('dishbuy',$newdsihbuy);
		$sth->bindParam('idbmg_dish',$iddish);
		$sth->execute();
		return true;
	}

	public function updatedish($id, $name, $adress, $zipcode ,$city,$ingredients,$description,$price,$quantity , $dishbegin, $dishfinish , $dishactive,$dishlat,$dishlong) {
		$pdo = $this->getPdo();
		$sth = $pdo->prepare("
		UPDATE ".self::$TABLE_PREFIXE.$this->_table." 
		SET	dishname =:dishname, dishadress=:dishadress , dishzipcode=:dishzipcode ,dishcity=:dishcity,	dishingredients=:dishingredients, dishdesc=:dishdesc,dishprice=:dishprice, dishquantity=:dishquantity , dishbegin=:dishbegin, dishfinish=:dishfinish ,dishactive=:dishactive,dishlat=:dishlat,dishlong=:dishlong WHERE idbmg_dish=:idbmg_dish");
		$sth->bindParam('idbmg_dish',$id);
		$sth->bindParam('dishname',$name);
		$sth->bindParam('dishadress',$adress);
		$sth->bindParam('dishzipcode',$zipcode);
		$sth->bindParam('dishcity',$city);
		$sth->bindParam('dishingredients',$ingredients);
		$sth->bindParam('dishdesc',$description);
		$sth->bindParam('dishprice',$price);
		$sth->bindParam('dishquantity',$quantity);
		$sth->bindParam('dishbegin',$dishbegin);
		$sth->bindParam('dishfinish',$dishfinish);
		$sth->bindParam('dishactive',$dishactive);
		$sth->bindParam('dishlat',$dishlat);
		$sth->bindParam('dishlong',$dishlong);
		$sth->execute();

		return true;

	}

	public function searchdish($date , $nbr ,$latmin,$latmax,$lngmin,$lngmax) {
		$pdo = $this->getPdo();
		$sth = $pdo->prepare("SELECT * FROM ".self::$TABLE_PREFIXE.$this->_table.",".self::$TABLE_PREFIXE.$this->_table_deux." WHERE bmg_user_idbmg_user=idbmg_user and dishbegin<=:date and dishfinish>=:date and dishquantity>=:quantity and dishlat<=:latmax and dishlat>=:latmin and dishlong<=:lngmax and dishlong>=:lngmin and dishactive=1");
		$sth->bindParam('date',$date,PDO::PARAM_INT);
		$sth->bindParam('quantity',$nbr);
		$sth->bindParam('latmin',$latmin);
		$sth->bindParam('latmax',$latmax);
		$sth->bindParam('lngmin',$lngmin);
		$sth->bindParam('lngmax',$lngmax);
		$sth->execute();
		$result = $sth->fetchAll();
		return $result;
	}


}