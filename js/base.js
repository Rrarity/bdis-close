/**
 * Created by user on 17.01.14.
 */
var BASE_URL = '/bdis/';

var N_ALERT = 'alert',
    N_INFORMATION = 'information',
    N_ERROR = 'error',
    N_WARNING = 'warning',
    N_NOTIFICATION = 'notification',
    N_SUCCESS = 'success';

function noty_error(text, type, timeout) {
    type = typeof type !== 'undefined' ? type : N_ERROR;
    timeout = typeof timeout !== 'undefined' ? timeout : 3000;
    noty({
        text: text,
        type: type,
        timeout: timeout,
        dismissQueue: false,
        layout: 'topCenter',
        theme: 'defaultTheme'
    });
}

function noty_confirm(text, succes) {
    succes = typeof succes !== 'undefined' ? succes : function($n) { $n.close(); };
    noty({
        text: text,
        layout: 'center',
        buttons: [
            {addClass: 'k-button', text: 'Да', onClick: succes
            },
            {addClass: 'k-button', text: 'Отмена', onClick: function($noty) {
                $noty.close();
            }
            }
        ]
    });
}

function noty_alert(text, succes) {
    succes = typeof succes !== 'undefined' ? succes : function($n) { $n.close(); };
    noty({
        text: text,
        layout: 'center',
        buttons: [
            {addClass: 'k-button', text: 'Закрыть', onClick: succes }
        ]
    });
}

function noty_message(text, type) {
    text = typeof text !== 'undefined' ? text : "Загрузка...";
    type = typeof type !== 'undefined' ? type : N_INFORMATION;
    return noty({
        text: text,
        type: type,
        dismissQueue: false,
        layout: 'topCenter',
        theme: 'defaultTheme'
    });
}