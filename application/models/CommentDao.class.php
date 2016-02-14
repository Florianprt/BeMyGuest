<?php
class CommentDao  extends AbstractDao {

        protected $_table = 'com';
        protected $_table_deux = 'user';

        public function Insertcom($writer, $for, $reco, $date) {
            $pdo = $this->getPdo();
            $sth = $pdo->prepare("
            INSERT INTO ".self::$TABLE_PREFIXE.$this->_table." 
            (com_date , bmg_user_idbmg_user ,  bmg_dish_idbmg_dish , com_desc) 
            VALUES (:date , :writer , :for , :reco);");
            $sth->bindParam('writer',$writer);
            $sth->bindParam('for',$for);
            $sth->bindParam('reco',$reco);
            $sth->bindParam('date',$date);
            $sth->execute();
            return true;
        }

        public function getByIdFor($id) {
            $pdo = $this->getPdo();
            $sth = $pdo->prepare("SELECT * FROM ".self::$TABLE_PREFIXE.$this->_table.",".self::$TABLE_PREFIXE.$this->_table_deux." WHERE bmg_user_idbmg_user=idbmg_user and bmg_dish_idbmg_dish = :bmg_user_for");
            $sth->bindParam('bmg_user_for',$id,PDO::PARAM_INT);
            $sth->execute();
            $result = $sth->fetchAll();
            return $result;
        }


}