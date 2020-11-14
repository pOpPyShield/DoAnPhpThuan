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

        public function uploadImg() {
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
                        $fileNameNew = "profile". $this->_imgID . "." .$fileActualExt;
                        $fileDestination = 'uploads/'.$fileNameNew; 
                        move_uploaded_file($fileTmpName, $fileDestination);
                        header('Location: ./?uploadsuccess');
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