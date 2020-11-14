<?php 

    require_once './classes/user.php';
    if(isset($_POST['reg'])) {
        $name = $_POST['username'];
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        $pwdagain = $_POST['pwdAgain'];
        $userReg = new User();
        $userReg->reg($name, $pwd, $email, $pwdagain);
    }   

    if(isset($_GET['message'])) {
        $message = $_GET['message'];
        if($message == 'success') {
            echo '<script>alert("Registation done")</script>';
        }
    }
    


?>