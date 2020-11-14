<?php 

    if(isset($_SESSION['UserName'])) {
        session_destroy();
        header('Location: ../');
    } else {
        header('Location: ../account_reg.php');
    }

?>