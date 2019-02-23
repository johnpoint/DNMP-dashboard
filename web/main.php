<?php
include_once 'func.php';
$info = serverDbView('*');
echo '  <div class="mdui-container doc-container doc-no-cover">
<h1 class="doc-title mdui-text-color-theme">概况</h1>
<div class="doc-chapter">
    <div class="mdui-typo">
        <h2>目前注册服务器数目:</h2><p>'.$info['num'].'</p>
    </div>
</div>
  ';
 ?>
