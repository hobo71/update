mw.notification = {
    msg: function (data, timeout, _alert) {
        var timeout = timeout || 1000;
        var _alert = _alert || false;
        if (data != undefined) {
            if (data.success != undefined) {
                if (!_alert) {
                    mw.notification.success(data.success, timeout);
                }
                else {
                    Alert(data.success);
                }
            }
            if (data.error != undefined) {
                mw.notification.error(data.error, timeout);
            }
            if (data.warning != undefined) {
                mw.notification.warning(data.warning, timeout);
            }
        }
    },
    build: function (type, text) {
        var div = mwd.createElement('div');
        div.className = 'mw-notification mw-' + type;
        div.innerHTML = '<div>' + text + '</div>'
        return div;
    },
    append: function (type, text, timeout) {
        var timeout = timeout || 1000;
        var div = mw.notification.build(type, text);
        if (typeof mw.notification._holder === 'undefined') {
            mw.notification._holder = mwd.createElement('div');
            mw.notification._holder.id = 'mw-notifications-holder';
            mwd.body.appendChild(mw.notification._holder);
        }
        mw.notification._holder.appendChild(div);
        var w = mw.$(div).outerWidth();
        mw.$(div).css("marginLeft", -(w / 2));
        setTimeout(function () {
            div.style.opacity = 0;
            setTimeout(function () {
                mw.$(div).remove();
            }, 1000);
        }, timeout);
    },
    success: function (text, timeout) {
        var timeout = timeout || 1000;
        mw.notification.append('success', text, timeout);
    },
    error: function (text, timeout) {
        var timeout = timeout || 1000;
        mw.notification.append('error', text, timeout);
    },
    warning: function (text, timeout) {
        var timeout = timeout || 1000;
        mw.notification.append('warning', text, timeout);
    }
};