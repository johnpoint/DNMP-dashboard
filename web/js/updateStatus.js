$('td.service').click(function () {
    hitpoint = this;
    if (this.bgColor == 'green') {
        $.ajax({
            url: 'api.php',
            method: 'GET',
            data: { do: 'repo', ipv4: this.attributes['4'].nodeValue, key: this.attributes['0'].nodeValue, value: '10', secret: document.getElementById('nonediv').innerHTML },
            success: function () {
                hitpoint.bgColor = 'yellow';
                hitpoint.innerHTML = 'close';
            }
        });
    } else {
        $.ajax({
            url: 'api.php',
            method: 'GET',
            data: { do: 'repo', ipv4: this.attributes['4'].nodeValue, key: this.attributes['0'].nodeValue, value: '11', secret: document.getElementById('nonediv').innerHTML },
            success: function () {
                hitpoint.bgColor = 'yellow';
                hitpoint.innerHTML = 'opening';
            }
        });
    }
});
$('#upgradenginx').click(function () {
    $.ajax({
        url: "db.php",
        method: "POST",
        data: {mod: "update", name: "nginx", data: 1},
        success: function () {
            $('#upgradenginx').disabled=true;
        }
    })
});
var msg = 0;
function checkUpdate() {
    $.ajax({
        url: 'api.php',
        method: 'GET',
        data: { do: 'checkupdate', secret: $('#secret')[0].innerText },
        success: function (data) {
            msg = data;
            a = JSON.parse(msg);
            for (var i = 0; i < a['info']['length']; i++) {
                for (var j = 4; j < 8; j++) {
                    switch (j) {
                        case 4:
                            if (a['info'][i]['nginx'] == 1) {
                                $('#' + i + '' + j)[0]['innerText'] = 'running';
                                $('#' + i + '' + j)[0].bgColor = 'green';
                            } else if (a['info'][i]['nginx'] == 0) {
                                $('#' + i + '' + j)[0]['innerText'] = 'deaded';
                                $('#' + i + '' + j)[0].bgColor = 'red';
                            } else if (a['info'][i]['nginx'] == 10) {
                                $('#' + i + '' + j)[0]['innerText'] = 'close';
                                $('#' + i + '' + j)[0].bgColor = 'yellow';
                            } else if (a['info'][i]['nginx'] == 11) {
                                $('#' + i + '' + j)[0]['innerText'] = 'opening';
                                $('#' + i + '' + j)[0].bgColor = 'yellow';
                            }
                            break;
                        case 5:
                            if (a['info'][i]['phpfpm'] == 1) {
                                $('#' + i + '' + j)[0]['innerText'] = 'running';
                                $('#' + i + '' + j)[0].bgColor = 'green';
                            } else if (a['info'][i]['phpfpm'] == 0) {
                                $('#' + i + '' + j)[0]['innerText'] = 'deaded';
                                $('#' + i + '' + j)[0].bgColor = 'red';
                            } else if (a['info'][i]['phpfpm'] == 10) {
                                $('#' + i + '' + j)[0]['innerText'] = 'close';
                                $('#' + i + '' + j)[0].bgColor = 'yellow';
                            } else if (a['info'][i]['phpfpm'] == 11) {
                                $('#' + i + '' + j)[0]['innerText'] = 'opening';
                                $('#' + i + '' + j)[0].bgColor = 'yellow';
                            }
                            break;
                        case 6:
                            if (a['info'][i]['mysql'] == 1) {
                                $('#' + i + '' + j)[0]['innerText'] = 'running';
                                $('#' + i + '' + j)[0].bgColor = 'green';
                            } else if (a['info'][i]['mysql'] == 0) {
                                $('#' + i + '' + j)[0]['innerText'] = 'deaded';
                                $('#' + i + '' + j)[0].bgColor = 'red';
                            } else if (a['info'][i]['mysql'] == 10) {
                                $('#' + i + '' + j)[0]['innerText'] = 'close';
                                $('#' + i + '' + j)[0].bgColor = 'yellow';
                            } else if (a['info'][i]['mysql'] == 11) {
                                $('#' + i + '' + j)[0]['innerText'] = 'opening';
                                $('#' + i + '' + j)[0].bgColor = 'yellow';
                            }
                            break;
                        case 7:
                            if (a['info'][i]['proxy'] == 1) {
                                $('#' + i + '' + j)[0]['innerText'] = 'running';
                                $('#' + i + '' + j)[0].bgColor = 'green';
                            } else if (a['info'][i]['proxy'] == 0) {
                                $('#' + i + '' + j)[0]['innerText'] = 'deaded';
                                $('#' + i + '' + j)[0].bgColor = 'red';
                            } else if (a['info'][i]['proxy'] == 10) {
                                $('#' + i + '' + j)[0]['innerText'] = 'close';
                                $('#' + i + '' + j)[0].bgColor = 'yellow';
                            } else if (a['info'][i]['proxy'] == 11) {
                                $('#' + i + '' + j)[0]['innerText'] = 'opening';
                                $('#' + i + '' + j)[0].bgColor = 'yellow';
                            }
                            break;
                    }

                }
            }
        }
    });
    $.ajax({
        url: 'db.php',
        method: "POST",
        data: { mod: "view", name: "nginx" },
        success: function (data) {
            if (data == '1') {
                $('#upgradenginx')[0].disabled=true;
            }else{
                $('#upgradenginx')[0].disabled=false;
            }
        }
    })
};

const timeId = setInterval(() => {
    if (true) {
        clearInterval(this.timeId)
    }; checkUpdate();
}, 3000)