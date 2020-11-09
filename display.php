
<?php

    require_once './classes/Admin.php';

    if(isset($_SESSION['UserName'])) {
        echo '<h1>Welcome: '. $_SESSION['UserName']. '</h1>';
        echo '<a href="logout.php">Logout</a>';
    } else {
        echo '<script>location.href="account.php"</script>';
        $name = $_POST['username'];
        $pwd = $_POST['pwd'];

        $object = new Admin();
       
        if($object->login($name, $pwd) != false) {
            $_SESSION['UserName'] = $object->getUserName();
            $_SESSION['is_login'] = true;
        }
    }

?>


