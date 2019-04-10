$('#dark-day').click(function () {
    if ($('.mdui-theme-layout-dark').length == 0) {
        $('body')["0"].className = "mdui-drawer-body-left mdui-appbar-with-toolbar mdui-theme-primary-indigo mdui-theme-accent-pink mdui-theme-layout-dark mdui-loaded";
        document.cookie = "darkday=mdui-theme-layout-dark";
        document.cookie = "style=dark";
        if (getCookie('status') == 1) {
            setActiveStyleSheet('dark');
        }
    } else {
        $('body')["0"].className = "mdui-drawer-body-left mdui-appbar-with-toolbar mdui-theme-primary-indigo mdui-theme-accent-pink mdui-loaded";
        document.cookie = "darkday=null";
        document.cookie = "style=light";
        if (getCookie('status') == 1) {
            setActiveStyleSheet('light');
        }
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