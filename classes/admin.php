<?php 
    require_once '../core/Init.php';
    require_once '../classes/db.php';
    class Admin {
        protected static $_instance = null;
        public $_pdo;
        public  $_query, 
                $_error= false , 
                $_result, 
                $_count = 0;
        public function __construct()
        {
            try {
                $this->_pdo = new PDO('mysql:host=' . Config::get('mysql/host'). ';dbname='.Config::get('mysql/db'), Config::get('mysql/username'), Config::get('mysql/password'));
            } catch(PDOException $e) {
                die($e->getMessage());
            }
        }

        public static function getInstance() {
            if(!isset(self::$_instance)) {
                self::$_instance = new DB();

            }

            return self::$_instance;
        }

        public function login($username, $pwd) {
            if(!empty($username) && !empty($pwd)) {
                $st = $this->_pdo->prepare("SELECT * FROM admin WHERE UserName = ? AND Password = ?");
                $st->bindParam(1, $username);
                $st->bindParam(2, $pwd);
                $st->execute();
                if($st->rowCount() == 1) {
                    echo 'User Verified';
                } else {
                    echo 'Incorrect username or password';
                }
            } else {
                echo 'dont valid';
            }
        }
    }


?>