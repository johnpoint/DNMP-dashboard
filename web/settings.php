<?php
include_once 'config.php';
include_once 'verify.php';
if ($vcode == 1) {
    echo '';
} else {
    exit;
}
?>
<div class="mdui-container doc-container doc-no-cover">
    <h1 class="doc-title mdui-text-color-theme">服务器管理面板 - 设置</h1>
    <div class="doc-chapter">
        <div class="mdui-typo">
            <div class="mdui-panel" mdui-panel>
                <div class="mdui-panel-item">
                    <div class="mdui-panel-item-header">登陆令牌</div>
                    <div class="mdui-panel-item-body">
                        <code id='cookie'></code>
                        <div class="mdui-panel-item-actions">
                            <button class="mdui-btn mdui-color-theme-accent mdui-ripple" id="openedit">edit</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mdui-panel" mdui-panel>
                <div class="mdui-panel-item">
                    <div class="mdui-panel-item-header">域名</div>
                    <div class="mdui-panel-item-body">
                        <code id='dom'></code>
                        <div class="mdui-panel-item-actions">
                            <button class="mdui-btn mdui-color-theme-accent mdui-ripple" id="domedit">edit</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mdui-dialog" id="editcookie">
                <div class="mdui-dialog-title">更新令牌</div>
                <div class="mdui-dialog-content">
                    <p>令牌由用户名密码生成,更换令牌需更换密码,并且需要重新登陆</p>
                    <form>
                        <div class="mdui-textfield mdui-textfield-floating-label">
                            <label class="mdui-textfield-label">Username</label>
                            <input class="mdui-textfield-input" type="text" id="editusername"/>
                        </div>
                        <div class="mdui-textfield mdui-textfield-floating-label">
                            <label class="mdui-textfield-label">Password</label>
                            <input class="mdui-textfield-input" type="password" id="edituserpasswd"/>
                        </div>
                    </form>
                    <div class="mdui-dialog-actions">
                        <button class="mdui-btn mdui-ripple" id="saveedit">save</button>
                    </div>
                </div>
            </div>

            <div class="mdui-dialog" id="editdom">
                <div class="mdui-dialog-title">更新域名</div>
                <div class="mdui-dialog-content">
                    <form>
                        <div class="mdui-textfield mdui-textfield-floating-label">
                            <label class="mdui-textfield-label">domain</label>
                            <input class="mdui-textfield-input" type="text" id="inputdomain"/>
                        </div>
                    </form>
                    <div class="mdui-dialog-actions">
                        <button class="mdui-btn mdui-ripple" id="savedom">save</button>
                    </div>
                </div>
            </div>

            <div class="mdui-dialog" id="goodnew">
                <div class="mdui-dialog-title">Success!</div>
                <div class="mdui-dialog-content">操作完成</div>
                <div class="mdui-dialog-actions">
                    <button href="/" class="mdui-btn mdui-ripple" id="okbutton" mdui-dialog-confirm>OK
                    </button>
                </div>
            </div>

            <div class="mdui-panel" mdui-panel>
                <div class="mdui-panel-item">
                    <div class="mdui-panel-item-header">API secret</div>
                    <div class="mdui-panel-item-body">
                        <p id='secret'></p>
                        <div class="mdui-panel-item-actions">
                            <button class="mdui-btn mdui-color-theme-accent mdui-ripple" id="editsecret">edit</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mdui-dialog" id="editsecretwindow">
                <div class="mdui-dialog-title">API secret</div>
                <div class="mdui-dialog-content">
                    <p>更新 API secret</p>
                    <form>
                        <div class="mdui-textfield mdui-textfield-floating-label">
                            <label class="mdui-textfield-label">SECRET</label>
                            <input class="mdui-textfield-input" type="text" id="editsecrettext"/>
                        </div>
                    </form>
                    <div class="mdui-dialog-actions">
                        <button class="mdui-btn mdui-ripple" id="savesecret">save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
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

</script>
