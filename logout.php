<?php 

    if(isset($_SESSION['UserName'])) {
        session_destroy();
        echo "<script>location.href='account.php'</script>";
    } else {
        echo "<script>location.href='account.php'</script>";
    }

?>