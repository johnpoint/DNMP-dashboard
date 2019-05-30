<?php
include_once 'config.php';
include_once 'verify.php';
include_once 'func.php';
if ($vcode == 1) {
    echo'
    <div class="mdui-textfield">
        <textarea class="mdui-textfield-input" rows="20" placeholder='.$_GET['file'].'></textarea>
    </div>';
}else {
    exit;
}