<?php
class ConnectionDao  extends AbstractDao {

	protected $_table = 'connection';	
	
	public function listerPages() {
		return $this->lister();		
	}
	
	public function getPagesById($id) {
		return $this->getById($id);
	}

	

}