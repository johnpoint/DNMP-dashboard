<?php
echo '<body class="mdui-drawer-body-left mdui-appbar-with-toolbar mdui-theme-primary-indigo mdui-theme-accent-pink '.$_COOKIE["darkday"].'">';
?>
<header class="mdui-appbar mdui-appbar-fixed">
    <div class="mdui-toolbar mdui-color-theme">
        <span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white"
              mdui-drawer="{target: '#main-drawer', swipe: true}"><i class="mdui-icon material-icons">menu</i></span>
        <a href="../" class="mdui-typo-headline mdui-hidden-xs">服务器</a>
        <a href="./" class="mdui-typo-title">管理</a>
        <span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white" mdui-tooltip="{content: '夜间模式'}">
            <i id="dark-day" class="mdui-icon material-icons">color_lens</i></span>
    </div>
    <script>
        $('#dark-day').click(function () {
            if ($('.mdui-theme-layout-dark').length == 0) {
                $('body')["0"].className = "mdui-drawer-body-left mdui-appbar-with-toolbar mdui-theme-primary-indigo mdui-theme-accent-pink mdui-theme-layout-dark mdui-loaded";
                setActiveStyleSheet('dark');
                document.cookie = "darkday=mdui-theme-layout-dark";
                document.cookie = "style=dark";
            } else {
                $('body')["0"].className = "mdui-drawer-body-left mdui-appbar-with-toolbar mdui-theme-primary-indigo mdui-theme-accent-pink mdui-loaded";
                setActiveStyleSheet('light');
                document.cookie = "darkday=null";
                document.cookie = "style=light";
            }
        });
    </script>
</header>