<?php
    require 'Config.php';
    class token {
        public static function generate() {
            return session::put(Config::get('session/token_name'), md5(uniqid()));
        }
    }

?>