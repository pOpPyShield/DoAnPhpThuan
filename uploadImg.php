<?php 

    session_start();
    require_once './classes/img.php';
    if(isset($_POST['submit'])) {
        $img = new Img();
        if($img->uploadImg($_SESSION['id'], $_SESSION['ImgName']) == 0) {
            header('Location: ./?uploadsuccess');
        } else {
            header('Location: ./?uploadfailed');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="uploadImg.php" method="POST">
        <input type="file" name='file'>
        <button type="submit" name="submit">upload</button>
    </form>
</body>
</html>