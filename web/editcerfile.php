<?php
include_once 'config.php';
include_once 'verify.php';
include_once 'func.php';
if ($vcode == 1) {
    $myfile = fopen($_GET['file'], "r") or die("Unable to open file!");
    echo '<div class="mdui-container doc-container doc-no-cover">
    <h1 class="doc-title mdui-text-color-theme">服务器管理面板 - 证书编辑</h1>
    <div class="doc-chapter">
      <div class="mdui-typo">';
    echo'
    <div class="mdui-textfield">
        <textarea class="mdui-textfield-input" rows="20" placeholder='.$_GET['file'].'>'.fread($myfile, filesize($_GET['file'])).'</textarea>
    </div></div>/div>/div>';
    fclose($myfile);
}else {
    exit;
}