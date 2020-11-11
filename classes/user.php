<?php 
    require_once './core/Init.php';
    class User{
        protected static $_instance = null;
        public $_pdo;
        public $_result;
        public $username = '';
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

        public function getUserName() {
            return $this->username;
        }

        public function login($username, $pwd) {
            if(!empty($username) && !empty($pwd)) {
                $st = $this->_pdo->prepare("SELECT * FROM user WHERE UserName=?");
                $st->bindParam(1, $username);
                $st->execute();
                if($st->rowCount()==1) {
                    $this->_result = $st->fetch();
                    if(password_verify($_POST['pwd'], $this->_result['Password'])) {
                        $this->username = $this->_result['UserName'];
                        $_SESSION['level'] = 'user';
                        $_SESSION['is_login'] = true;
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
        
        public function reg($username, $Password, $Email, $pwdagain) {
            $email1 = filter_var( $Email, FILTER_VALIDATE_EMAIL);
            if(!empty($username) && !empty($Email) && $email1 != false && !empty($Password) && !empty($pwdagain)) {
                if($Password != $pwdagain) {
                    header('Location: account.php');
                    exit();
                } else {
                    $pwd1 = password_hash($Password, PASSWORD_BCRYPT);
                    $st = $this->_pdo->prepare("INSERT INTO user(UserName, Password, Email) VALUES (?, ?, ?)");
                    $st->bindParam(1, $username);
                    $st->bindParam(2, $pwd1);
                    $st->bindParam(3, $email1);
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