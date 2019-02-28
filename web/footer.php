</div>
</body>
<script>
    $('#dark-day').click(function () {
        if ($('.mdui-theme-layout-dark').length == 0) {
            $('body')["0"].className = "mdui-drawer-body-left mdui-appbar-with-toolbar mdui-theme-primary-indigo mdui-theme-accent-pink mdui-theme-layout-dark mdui-loaded";
            setActiveStyleSheet('drak')
            document.cookie = "darkday=mdui-theme-layout-dark";
            document.cookie = "style=dark";
        } else {
            $('body')["0"].className = "mdui-drawer-body-left mdui-appbar-with-toolbar mdui-theme-primary-indigo mdui-theme-accent-pink mdui-loaded";
            setActiveStyleSheet('light')
            document.cookie = "darkday=null";
            document.cookie = "style=light";
        }
    });
</script>
</html>
