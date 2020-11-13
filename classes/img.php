<?php 
    require_once './core/Init.php';
    class Img{
        protected static $_instance = null;
        public $_pdo;
        public $_result;
        public $_userID;
        public $_imgID;

        public function __construct()
        {
            try {
                $this->_pdo = new PDO('mysql:host=' . Config::get('mysql/host'). ';dbname='.Config::get('mysql/db'), Config::get('mysql/username'), Config::get('mysql/password'));
            } catch(PDOException $e) {
                die($e->getMessage());
            }
        }

        public function getImgID() {
            return $this->_imgID;
        }
        
        public function checkImg($idUser) {
            $st = $this->_pdo->prepare("SELECT * FROM profileimg WHERE userId = $idUser");
            $st->execute();
            $this->_result = $st->fetch();
            if($this->_result['status'] == 0) {
                 $this->_imgID = $idUser;
                 return true;
            }

            return false;
        }
    }
?>