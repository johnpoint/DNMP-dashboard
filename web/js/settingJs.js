var a = function () {
    $.ajax({
        url: "db.php",
        method: "POST",
        data: {mod: "view", name: "usercookie"},
        success: function (data) {
            $("#cookie")[0].textContent = data;
        }
    })
};
var b = function () {
    $.ajax({
        url: "db.php",
        method: "POST",
        data: {mod: "view", name: "dom"},
        success: function (data) {
            $("#dom")[0].textContent = data;
        }
    })
};
var c = function () {
    $.ajax({
        url: "db.php",
        method: "POST",
        data: {mod: "view", name: "secret"},
        success: function (data) {
            $("#secret")[0].textContent = data;
        }
    })
};
a();
b();
c();

var edit = new mdui.Dialog('#editcookie');
var inst = new mdui.Dialog('#goodnew');
var editdom = new mdui.Dialog('#editdom');
var editsecret = new mdui.Dialog('#editsecretwindow');

$('#domedit').click(function () {
    editdom.open();
});

$('#openedit').click(function () {
    edit.open();
});

$('#editsecret').click(function () {
    editsecret.open()
});

$('#saveedit').click(function () {
    $.ajax({
        url: "db.php",
        method: "POST",
        data: {
            mod: "update",
            do: "md5",
            name: "usercookie",
            username: $('#editusername')[0].value,
            userpasswd: $('#edituserpasswd')[0].value
        },
        success: function () {
            edit.close();
            inst.open();
            a();
        }
    });
});

$('#savesecret').click(function () {
    $.ajax({
        url: "db.php",
        method: "POST",
        data: {mod: "update", name: "secret", data: $("$editsecrettext")[0].value},
        success: function () {
            editsecret.close();
            inst.open();
            c();
        }
    });
});

$('#savedom').click(function () {
    $.ajax({
        url: "db.php",
        method: "POST",
        data: {mod: "update", name: "dom", data: $("#inputdomain")[0].value},
        success: function () {
            editdom.close();
            inst.open();
            b();
        }
    });
})
