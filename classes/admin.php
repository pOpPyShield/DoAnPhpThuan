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
        public function getResult() {
            return $this->_result;
        }
        public function login($username, $pwd) {
            $un = filter_var($username, FILTER_SANITIZE_STRING,  FILTER_FLAG_STRIP_HIGH);
            if(!empty($username) && !empty($pwd)) {
                $st = $this->_pdo->prepare("SELECT * FROM admin WHERE UserName = ? AND Password = ?");
                $st->bindParam(1, $un);
                $st->bindParam(2, $pwd);
                $st->execute();
                if($st->rowCount() == 1) {
                    $this->_result = $st->fetch(PDO::FETCH_OBJ);
                    if(password_verify($pwd, $this->_result['Password'] && $_SESSION['UserName'] = $username)) {
                        header("location: indexi.php?message=success");
                    }
                    
                } else {
                    echo 'Incorrect username or password';
                }
            } else {
                echo 'dont valid';
            }
        }

        public function reg($username, $email, $pwd, $pwdagain) {
            $email1 = filter_var( $email, FILTER_VALIDATE_EMAIL);
            if(!empty($username) && !empty($email) && $email1 != false && !empty($pwd) && !empty($pwdagain)) {
                if($pwd != $pwdagain) {
                    header('Location: account.php');
                    exit();
                } else {
                    $id = '1';
                    $pwd1 = password_hash($pwd, PASSWORD_BCRYPT);
                    $st = $this->_pdo->prepare("INSERT INTO admin(UserName, Password, email, idSuperAdmin) VALUES (?, ?, ?, ?)");
                    $st->bindParam(1, $username);
                    $st->bindParam(2, $pwd1);
                    $st->bindParam(3, $email1);
                    $st->bindParam(4, $id);
                    if($st->execute()) {
                        header('location: account.php?message=success');
                    }

                }
            } else {
                echo 'dont valid';
            }
        }
    }


?>