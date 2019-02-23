<?php
include_once 'func.php';
$info = serverDbView('*');
echo '  <div class="mdui-container doc-container doc-no-cover">
<h1 class="doc-title mdui-text-color-theme">概况</h1>
<div class="doc-chapter">
    <div class="mdui-typo">
        <h1>服务器</h1>
        <h2>'.$info['num'].'</h2>
    </div>
</div>
  ';
 ?>
