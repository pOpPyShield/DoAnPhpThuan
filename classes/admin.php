<?php 
    require 'DB.php';

    class Admin extends DB {
        public function __construct()
        {
            Parent::getInstance();
        }
    }


?>