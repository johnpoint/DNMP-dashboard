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
        <textarea class="mdui-textfield-input" rows="20" placeholder='.$_GET['file'].' disabled>'.fread($myfile, filesize($_GET['file'])).'</textarea>
    </div>
    <form action="upload_file.php'.'?file='.$_GET['file'].'" method="post"
enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file" /> 
<br />
<input type="submit" name="submit" value="Submit" />
</form>
    </div></div></div>';
    fclose($myfile);
}else {
    exit;
}