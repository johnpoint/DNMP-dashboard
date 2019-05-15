$('input.service').click(function () {
    hitpoint = this;
    if (this.checked == true) {
        $.ajax({
            url: 'api.php',
            method: 'GET',
            data: { do: 'repo', ipv4: this.attributes['4'].nodeValue, key: this.attributes['1'].nodeValue, value: '11', secret: document.getElementById('nonediv').innerHTML },
            success: function () {
                hitpoint.checked = false;
                hitpoint.disabled = true;
            }
        });
    } else {
        $.ajax({
            url: 'api.php',
            method: 'GET',
            data: { do: 'repo', ipv4: this.attributes['4'].nodeValue, key: this.attributes['1'].nodeValue, value: '10', secret: document.getElementById('nonediv').innerHTML },
            success: function () {
                hitpoint.checked = true;
                hitpoint.disabled = true;
            }
        });
    }
});
var msg = 0;
var status = 0;
function checkUpdate() {
    status = 1;
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
                                $('#' + i + '' + j)[0].checked = true;
                                $('#' + i + '' + j)[0].disabled = false;
                            } else if (a['info'][i]['nginx'] == 0) {
                                $('#' + i + '' + j)[0].checked = false;
                                $('#' + i + '' + j)[0].disabled = false;
                            } else if (a['info'][i]['nginx'] == 10) {
                                $('#' + i + '' + j)[0].checked = false;
                                $('#' + i + '' + j)[0].disabled = true;
                            } else if (a['info'][i]['nginx'] == 11) {
                                $('#' + i + '' + j)[0].checked = true;
                                $('#' + i + '' + j)[0].disabled = true;
                            }
                            break;
                        case 5:
                            if (a['info'][i]['phpfpm'] == 1) {
                                $('#' + i + '' + j)[0].checked = true;
                                $('#' + i + '' + j)[0].disabled = false;
                            } else if (a['info'][i]['phpfpm'] == 0) {
                                $('#' + i + '' + j)[0].checked = false;
                                $('#' + i + '' + j)[0].disabled = false;
                            } else if (a['info'][i]['phpfpm'] == 10) {
                                $('#' + i + '' + j)[0].checked = false;
                                $('#' + i + '' + j)[0].disabled = true;
                            } else if (a['info'][i]['phpfpm'] == 11) {
                                $('#' + i + '' + j)[0].checked = true;
                                $('#' + i + '' + j)[0].disabled = true;
                            }
                            break;
                        case 6:
                            if (a['info'][i]['mysql'] == 1) {
                                $('#' + i + '' + j)[0].checked = true;
                                $('#' + i + '' + j)[0].disabled = false;
                            } else if (a['info'][i]['mysql'] == 0) {
                                $('#' + i + '' + j)[0].checked = false;
                                $('#' + i + '' + j)[0].disabled = false;
                            } else if (a['info'][i]['mysql'] == 10) {
                                $('#' + i + '' + j)[0].checked = false;
                                $('#' + i + '' + j)[0].disabled = true;
                            } else if (a['info'][i]['mysql'] == 11) {
                                $('#' + i + '' + j)[0].checked = true;
                                $('#' + i + '' + j)[0].disabled = true;
                            }
                            break;
                        case 7:
                            if (a['info'][i]['Nupdate'] == 1) {
                                $('#' + i + '' + j)[0]['innerText'] = 'UPGRADE';
                                $('#' + i + '' + j)[0].disabled = false;
                            } else {
                                $('#' + i + '' + j)[0]['innerText'] = 'UPGRADING';
                                $('#' + i + '' + j)[0].disabled = true;
                            }
                            break;
                    }

                }
            }
            status = 0;
        }
    });
};

const timeId = setInterval(() => {
    if (true) {
        clearInterval(this.timeId)
    }; if(status==0){checkUpdate()};
}, 3000)