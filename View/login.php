<?php 
    require_once '../classes/admin.php';

    if(isset($_POST['login'])) {
        $name = $_POST['username'];
        $pwd = $_POST['pwd'];

        $object = new Admin();
        $object->login($name, $pwd);
    }

?>