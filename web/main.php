<?php
include_once 'func.php';
$info = serverDbView('*');
$cernum = settingsDbEdit('view', 'cernum', NULL, NULL);
echo '<div class="mdui-container doc-container doc-no-cover">
<h1 class="doc-title mdui-text-color-theme">概况</h1>
<div class="doc-chapter">
    <div class="mdui-typo">
    <div class="mdui-container">
    <div class="mdui-row-xs-2">
  <div class="mdui-col">
  <h1>服务器</h1>
        <h2>' . $info['num'] . '台</h2>
  </div>
  <div class="mdui-col">
    <h1>证书</h1>
    <h2>' . $cernum . '张</h2>
  </div>
    </div>
    </div>
    </div>
</div>
  ';
?>
