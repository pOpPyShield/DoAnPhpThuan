<?php 

    if(isset($_POST['submit'])) {
        $file = $_FILES['file'];
        $fileName = $_FILES['file']['name'];
        $fileSize = $_FILES['file']['size'];
        $fileType = $_FILES['file']['type'];
        $fileError = $_FILES['file']['error'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        
        $allowed = array('jpg' , 'jpeg' , 'png');
        
        if(in_array($fileActualExt, $allowed)) {
            if($fileError === 0) {
                if($fileSize<50000) {
                    $fileNameNew = uniqid('',true). "." .$fileActualExt;
                    $fileDestination = 'uploads/'.$fileNameNew; 
                    move_uploaded_file($fileTmpName, $fileDestination);
                    header('Location: ./?uploadsuccess');
                }
                else {
                    echo 'There was an error';
                }
            }
        } else {
            echo 'Cannot upload';
        }
        
    }

?>