<?php 


    session_start();
    session_unset();
    session_destroy();
    header('Location: ../');
    /*if(isset($_SESSION['UserName'])) {
        header('Location: ../');
        session_destroy();
    } else {
        echo 'You are logout';
        header('Location: ../account_reg.php');
    }*/

?>