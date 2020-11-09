<?php 


        require_once '../classes/admin.php';

    if(isset($_POST['reg'])) {
        $name = $_POST['username'];
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        $pwdagain = $_POST['pwdAgain'];
        $object = new Admin();
        $object->reg($name, $email, $pwd,$pwdagain);
    }   

    if(isset($_GET['message'])) {
        $message = $_GET['message'];
        if($message == 'success') {
            echo '<script>alert("Registation done")</script>';
        }
    }


?>