<?php 
    require '../classes/DB.php';
    class User extends DB{
        public $table = 'user';

        public function __construct()
        {
            Parent::getInstance();
        }
    }

?>