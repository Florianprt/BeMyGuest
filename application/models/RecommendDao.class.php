<?php
class RecommendDao  extends AbstractDao {

        protected $_table = 'reco';
        protected $_table_deux = 'user';

        public function InsertReco($writer, $for, $reco, $date) {
            $pdo = $this->getPdo();
            $sth = $pdo->prepare("
            INSERT INTO ".self::$TABLE_PREFIXE.$this->_table." 
            (bmg_user_writer ,  bmg_user_for , reco , date) 
            VALUES ( :bmg_user_writer , :bmg_user_for , :reco , :date);");
            $sth->bindParam('bmg_user_writer',$writer);
            $sth->bindParam('bmg_user_for',$for);
            $sth->bindParam('reco',$reco);
            $sth->bindParam('date',$date);
            $sth->execute();
            return true;
        }

        public function getByIdFor($id) {
            $pdo = $this->getPdo();
            $sth = $pdo->prepare("SELECT * FROM ".self::$TABLE_PREFIXE.$this->_table.",".self::$TABLE_PREFIXE.$this->_table_deux." WHERE bmg_user_writer=idbmg_user and bmg_user_for = :bmg_user_for");
            $sth->bindParam('bmg_user_for',$id,PDO::PARAM_INT);
            $sth->execute();
            $result = $sth->fetchAll();
            return $result;
        }


}