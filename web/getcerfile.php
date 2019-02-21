<?php
include_once 'config.php';
include_once 'func.php';
$secret=$_GET['secret'];
$SQLsecret=settingsDbEdit('view','secret',NULL,NULL);

if ($secret == $SQLsecret) {
    if ($_GET['fulldir'] == '' ) {
        $dir=$_GET['file'];
    } else {
        $dir=$_GET['fulldir'];
    }
    $myfile = fopen('ssl/'.$dir, "r") or die("Unable to open file!");
    echo fread($myfile, filesize('ssl/'.$dir));
    fclose($myfile);
} else {
    echo '{"code":"1","error_text":"SECRET error"}';
}
?>
