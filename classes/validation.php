<?php 

    class Validation {
        private $_passed = true,
                $_errors = false,
                $_db = null;
        public function __construct() {
            $this->_db = DB::getInstance();
        }
        
        
    }


?>