<?php
class UserDao  extends AbstractDao {

	protected $_table = 'user';	
	
	public function listerUser() {
		return $this->lister();		
	}
	

}