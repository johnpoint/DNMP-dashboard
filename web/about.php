<?php
include_once 'config.php';
include_once 'verify.php';
if ( $vcode == 1) {
echo '<div class="mdui-container doc-container doc-no-cover">
  <h1 class="doc-title mdui-text-color-theme">服务器管理面板 - 关于</h1>
  <div class="doc-chapter">
    <div class="mdui-typo">
    <h1>开发者</h1>
    <li><a href="https://github.com/johnpoint">johnpoint</a></li>
    <h1>API</h1>
    <li><a href="https://ip.sb">IP.SB</a></li>
    <h1>THANKS</h1>
    <li><a href="https://github.com/BotoX/ServerStatus">BotoX/ServerStatus</a></li>
    <li><a href="https://github.com/zdhxiong/mdui">zdhxiong/mdui</a></li>
    </div>
  </div>
</div>';
}else {
  header("Location: /index.php");
}
 ?>
