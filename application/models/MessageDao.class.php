<?php
class MessageDao  extends AbstractDao {

        protected $_table = 'message';
        protected $_table_deux = 'reservations';

        public function Insertmessage($idresa, $message, $idwriter, $date) {
            $pdo = $this->getPdo();
            $sth = $pdo->prepare("
            INSERT INTO ".self::$TABLE_PREFIXE.$this->_table." 
            (bmg_reservations_id ,  themessage ,  idbmg_user , datemsg) 
            VALUES (:idresa , :message , :idwriter , :date);");
            $sth->bindParam('idresa',$idresa);
            $sth->bindParam('message',$message);
            $sth->bindParam('idwriter',$idwriter);
            $sth->bindParam('date',$date);
            $sth->execute();
            return true;
        }


        public function getmessagedistinct($id) {
            $pdo = $this->getPdo();
            $sth = $pdo->prepare("SELECT DISTINCT FROM ".self::$TABLE_PREFIXE.$this->_table.",".self::$TABLE_PREFIXE.$this->_table_deux." WHERE bmg_reservations_id=id and ((id_user = :idpers) or (id_saler = :idpers))");
            $sth->bindParam('idpers',$id,PDO::PARAM_INT);
            $sth->execute();
            $result = $sth->fetchAll();
            return $result;
        }


        public function getmessage($id) {
            $pdo = $this->getPdo();
            $sth = $pdo->prepare("SELECT * FROM ".self::$TABLE_PREFIXE.$this->_table." WHERE bmg_reservations_id = :bmg_reservations_id");
            $sth->bindParam('bmg_reservations_id',$id,PDO::PARAM_INT);
            $sth->execute();
            $result = $sth->fetchAll();
            return $result;
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