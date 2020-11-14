<?php 
    require_once './core/Init.php';
    class Img{
        protected static $_instance = null;
        public $_pdo;
        public $_result;
        public $_userID;
        public $_UserID;
        public $_imgType;
        public $_imgName;
        public function __construct()
        {
            try {
                $this->_pdo = new PDO('mysql:host=' . Config::get('mysql/host'). ';dbname='.Config::get('mysql/db'), Config::get('mysql/username'), Config::get('mysql/password'));
            } catch(PDOException $e) {
                die($e->getMessage());
            }
        }

        public function getUserID() {
            return $this->_UserID;
        }
        
        public function getImgType() {
            return $this->_imgType;
        }

        public function getImgName() {
            return $this->_imgName;
        }
        public function checkImg($idUser) {
            $st = $this->_pdo->prepare("SELECT * FROM profileimg WHERE userId = $idUser");
            $st->execute();
            $this->_result = $st->fetch();
            $this->_imgType = $this->_result['type'];
            $this->_imgName = $this->_result['Name'];
            if($this->_result['status'] == 0) {
                 $this->_UserID = $idUser;
                 return true;
            }

            return false;
        }

        public function uploadImg($userID, $imgName) {
            $file = $_FILES['file'];
            $fileName = $_FILES['file']['name'];
            $fileSize = $_FILES['file']['size'];
            $fileType = $_FILES['file']['type'];
            $fileError = $_FILES['file']['error'];
            $fileTmpName = $_FILES['file']['tmp_name'];
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $allowed = array('jpg' , 'jpeg' , 'png');
            if(in_array($fileActualExt, $allowed)) {
                if($fileError == 0) {
                    if($fileSize<100000) {
                        $fileNameNew = "profile". $userID . '.' .$imgName."." .$fileActualExt;
                        $fileDestination = 'uploads/'.$fileNameNew; 
                        move_uploaded_file($fileTmpName, $fileDestination);
                        // Set status
                        $stat = 0;
                        $usrID = $this->_userID;
                        $st = $this->_pdo->prepare('UPDATE profileimg SET Name = ?, Type = ?, status = ? WHERE userId = ?');
                        $st->bindParam(1, $fileName);
                        $st->bindParam(2, $fileActualExt);
                        $st->bindParam(3, $stat);
                        $st->bindParam(4, $usrID);
                        $st->execute();
                        return 0;
                    }
                    else {
                        return 1;
                    }
                }
            }
        }
    }
?>