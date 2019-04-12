<?php
include_once 'config.php';
include_once 'verify.php';
include_once 'func.php';
if ($vcode == 1) {
    echo '<div class="mdui-container doc-container doc-no-cover">
    <h1 class="doc-title mdui-text-color-theme">服务器管理面板 - 管理</h1>
    <div class="doc-chapter">
      <div class="mdui-typo">
      <code>注册服务器: curl "https://' . settingsDbEdit('view', 'dom', NULL, NULL) . '/api.php?do=reg&secret=' . '<code id="secret">'.settingsDbEdit('view', 'secret', NULL, NULL) .'</code>'. '&ip=$(curl ip.sb -4)&hostname=$(hostname)&ipv6=$(curl ip.sb -6)"</code>
      <div class="mdui-progress">
  <div class="mdui-progress-indeterminate"></div>
</div>
      <div style="display: none;" id="nonediv">' . settingsDbEdit('view', 'secret', NULL, NULL) . '</div>
      <div id="serverinfo"></div>';
    $info = serverDbView('*');
    echo '<div class="mdui-table-fluid">
    <table class="mdui-table mdui-table-hoverable">';
    echo '<thead><tr>
      <th>#</th>
      <th>ipv4</th>
      <th>ipv6</th>
      <th>hostname</th>
      <th>nginx</th>
      <th>php-fpm</th>
      <th>mysql</th>
      <th>proxy</th>
    </tr></thead><tbody>';
    for ($i = 0; $i < $info['num']; $i++) {
        $j = 0;
        echo '<tr><td id=' . $i . $j . '>' . $info['info'][$i]['id'] . '</td>';
        $j++;
        echo '<td id=' . $i . $j . '>' . $info['info'][$i]['ipv4'] . '</td>';
        $j++;
        echo '<td id=' . $i . $j . '>' . $info['info'][$i]['ipv6'] . '</td>';
        $j++;
        echo '<td id=' . $i . $j . '>' . $info['info'][$i]['hostname'] . '</td>';
        $j++;
        if ($info['info'][$i]['nginx'] == '1') {
            echo '<td item="nginx" class="service" id=' . $i . $j . ' bgcolor="green" ip=' . $info['info'][$i]['ipv4'] . '>running</td>';
            $j++;
        } elseif ($info['info'][$i]['nginx'] == '10') {
            echo '<td item="nginx" class="service" id=' . $i . $j . ' bgcolor="yellow" ip=' . $info['info'][$i]['ipv4'] . '>close</td>';
            $j++;
        } elseif ($info['info'][$i]['nginx'] == '11') {
            echo '<td item="nginx" class="service" id=' . $i . $j . ' bgcolor="yellow" ip=' . $info['info'][$i]['ipv4'] . '>opening</td>';
            $j++;
        } else {
            echo '<td item="nginx" class="service" id=' . $i . $j . ' bgcolor="red" ip=' . $info['info'][$i]['ipv4'] . '>deaded</td>';
            $j++;
        }

        if ($info['info'][$i]['phpfpm'] == '1') {
            echo '<td item="phpfpm" class="service" id=' . $i . $j . ' bgcolor="green" ip=' . $info['info'][$i]['ipv4'] . '>running</td>';
            $j++;
        } elseif ($info['info'][$i]['phpfpm'] == '10') {
            echo '<td item="phpfpm" class="service" id=' . $i . $j . ' bgcolor="yellow" ip=' . $info['info'][$i]['ipv4'] . '>close</td>';
            $j++;
        } elseif ($info['info'][$i]['phpfpm'] == '11') {
            echo '<td item="phpfpm" class="service" id=' . $i . $j . ' bgcolor="yellow" ip=' . $info['info'][$i]['ipv4'] . '>opening</td>';
            $j++;
        } else {
            echo '<td item="phpfpm" class="service" id=' . $i . $j . ' bgcolor="red" ip=' . $info['info'][$i]['ipv4'] . '>deaded</td>';
            $j++;
        }

        if ($info['info'][$i]['mysql'] == '1') {
            echo '<td item="mysql" class="service" id=' . $i . $j . ' bgcolor="green" ip=' . $info['info'][$i]['ipv4'] . '>running</td>';
            $j++;
        } elseif ($info['info'][$i]['mysql'] == '10') {
            echo '<td item="mysql" class="service" id=' . $i . $j . ' bgcolor="yellow" ip=' . $info['info'][$i]['ipv4'] . '>close</td>';
            $j++;
        } elseif ($info['info'][$i]['mysql'] == '11') {
            echo '<td item="mysql" class="service" id=' . $i . $j . ' bgcolor="yellow" ip=' . $info['info'][$i]['ipv4'] . '>opening</td>';
            $j++;
        } else {
            echo '<td item="mysql" class="service" id=' . $i . $j . ' bgcolor="red" ip=' . $info['info'][$i]['ipv4'] . '>deaded</td>';
            $j++;
        }

        if ($info['info'][$i]['update'] == '1') {
            echo '<td item="update" class="service" id=' . $i . $j . ' bgcolor="green" ip=' . $info['info'][$i]['ipv4'] . '>UPGRADE</td>';
            $j++;
        } else {
            echo '<td item="update" class="service" id=' . $i . $j . ' bgcolor="gray" ip=' . $info['info'][$i]['ipv4'] . '>UPGRADING</td>';
            $j++;
        }
    }
    echo '</tbody>
    </table>
  </div>';
    echo '</div>
    </div>';
    echo '<script src="js/updateStatus.js?v=1.2.0"></script>';
} else {
    header("Location: /index.php");
}