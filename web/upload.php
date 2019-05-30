<?php
include_once 'config.php';
include_once 'verify.php';
include_once 'func.php';
if ($vcode == 1) {
    if ($_FILES["file"]["size"] < 20000){
        if ($_FILES["file"]["error"] > 0){
            echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
        }else{
            echo "Upload: " . $_FILES["file"]["name"] . "<br />";
            echo "Type: " . $_FILES["file"]["type"] . "<br />";
            echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
            echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

            move_uploaded_file($_FILES["file"]["tmp_name"],$_GET['file']);
            echo "OK!";
        }
    }else{
        echo "Invalid file";
    }
}else {
    exit;
}
?>