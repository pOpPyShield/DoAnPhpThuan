
<?php

    require_once './classes/Admin.php';
    require_once './classes/user.php';
    require_once './classes/superadmin.php';
        /*$name = $_POST['username'];
        $pwd = $_POST['pwd'];
        */

        $object = new Admin();
        $user = new User();
        $superadmin = new superAdmin();
        if(isset($_POST['login'])) {
            $name = $_POST['username'];
            $pwd = $_POST['pwd'];
            if($user->login($name, $pwd) != false) {
                if($_SESSION['level'] == 'user' && $_SESSION['is_login'] == true) {
                    $_SESSION['UserName'] = $object->getUserName();
                    echo '<script>location.href="indexiuser.php"</script>';
                }   
            } elseif($admin->login($name, $pwd)) {
                if($_SESSION['level'] == 'admin' && $_SESSION['is_login'] == true) {
                    echo '<script>location.href="AdminDashboard.php"</script>';
                }
            } elseif($superadmin->login($name, $pwd)) {
                if($_SESSION['level'] == 'superadmin' && $_SESSION['is_login']==true) {
                    echo '<script>location.href="SuperAdminDashboard.php"</script>';
                }
            } else {
                echo '<script>location.href="account.php"</script>';
            } 
        }

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


