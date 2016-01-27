<?php
class CookieDao  extends AbstractDao {

	protected $_table_un = 'connect';
	protected $_table_deux = 'user';
	protected $id = '';
	protected $cookie = '';
	protected $idco = '';
	
	public function __construct($cookie)
	{
		$this->cookie = $cookie;
		$email =  explode("|", $cookie);
		$this->id = substr($email[0], 5);
		$this->idco = $email[2];
	}

	public function checkgoodcookie(){

		$pdo = $this->getPdo();
		$select = $pdo->prepare("SELECT * FROM ".self::$TABLE_PREFIXE.$this->_table_un." WHERE bmg_user_idbmg_user= :bmg_user_idbmg_user");
		$select->bindValue('bmg_user_idbmg_user', $this->id);
		$select->execute();

			$nbusers = $select->rowCount();

		if ($nbusers == 0) {
			return false;
		}
		else if ($nbusers == 1) {

			foreach($select as $item) { 
				$idconnect = $item['idbmg_connect'];
			}

			if (crypt($idconnect, $this->idco) == $this->idco) {
				return true;
			}
			else{
				return false;
			}

		}

	}

}