<body class="mdui-drawer-body-left mdui-appbar-with-toolbar mdui-theme-primary-indigo mdui-theme-accent-pink mdui-theme-layout-dark">
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
        $().ready(function () {
            if (getCookie("darkday") == 'day') {
                $('body')["0"].className = "mdui-drawer-body-left mdui-appbar-with-toolbar mdui-theme-primary-indigo mdui-theme-accent-pink mdui-loaded";
            } else {
                $('body')["0"].className = "mdui-drawer-body-left mdui-appbar-with-toolbar mdui-theme-primary-indigo mdui-theme-accent-pink mdui-theme-layout-dark mdui-loaded";
            }
        });

        $('#dark-day').click(function () {
            if ($('.mdui-theme-layout-dark').length == 0) {
                $('body')["0"].className = "mdui-drawer-body-left mdui-appbar-with-toolbar mdui-theme-primary-indigo mdui-theme-accent-pink mdui-theme-layout-dark mdui-loaded";
                document.cookie = "darkday=dark";
            } else {
                $('body')["0"].className = "mdui-drawer-body-left mdui-appbar-with-toolbar mdui-theme-primary-indigo mdui-theme-accent-pink mdui-loaded";
                document.cookie = "darkday=day";
            }
        });

        function getCookie(cname) {
            var name = cname + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i].trim();
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }
    </script>
</header>