<?php
include_once 'func.php';
$info = serverDbView('*');
echo '  <div class="mdui-container doc-container doc-no-cover">
<h1 class="doc-title mdui-text-color-theme">概况</h1>
<div class="doc-chapter">
    <div class="mdui-typo">
    <div class="mdui-panel mdui-panel-gapless" mdui-panel>
        <div class="mdui-panel-item-header mdui-panel-item-open">服务器</div>
        <div class="mdui-panel-item-body">
            <code>'.$info['num'].'</code>
        </div>
    </div>
    </div>
    </div>
</div>
  ';
 ?>
