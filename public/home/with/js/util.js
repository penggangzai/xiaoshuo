(function () {

    jQuery.fn.center = function () {
        var left = ($(window).width() - $(this).width()) * 0.5;
        var top = ($(window).height() - $(this).height()) * 0.5;
        $(this).css({ position: "absolute", zIndex: 900, left: left + "px", top: top + "px" });
        return $(this);
    }

    jQuery.fn.pos = function (x, y, direction) {
        direction == "left"
        ? $(this).css({ position: "absolute", zIndex: 900, left: x + "px", top: y + "px" })
        : $(this).css({ position: "absolute", zIndex: 900, right: x + "px", top: y + "px" });
        return $(this);
    }

    window.Util = window.Util || {};
    window.Util.domain = "xxsy.net";
    window.Util.cookie = function (name, value, options) {
        if (typeof value != 'undefined') {
            options = options || {};
            if (value === null) {
                value = '';
                options.expires = -1;
            }
            var expires = '';
            if (options.expires && (typeof options.expires == 'number' || options.expires.toUTCString)) {
                var date;
                if (typeof options.expires == 'number') {
                    date = new Date();
                    date.setTime(date.getTime() + (options.expires * 1000 * 60));
                } else {
                    date = options.expires;
                }
                expires = '; expires=' + date.toUTCString();
            }
            var path = options.path ? '; path=' + (options.path) : '';
            var domain = options.domain ? '; domain=' + (options.domain) : '';
            var secure = options.secure ? '; secure' : '';
            document.cookie = [name, '=', encodeURIComponent(value), expires, path, domain, secure].join('');
        } else {
            var cookieValue = '';
            if (document.cookie && document.cookie != '') {
                var cookies = document.cookie.split(';');
                for (var i = 0; i < cookies.length; i++) {
                    cookie = cookies[i].replace(/^\s+|\s+$/g, '');
                    if (cookie.substring(0, name.length + 1) == (name + '=')) {
                        cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                        break;
                    }
                }
            }
            return cookieValue;
        }
    }

    window.Util.writeCookie = function (name, value, expires) {
        Util.cookie(name, value, { path: '/', domain: Util.domain, expires: expires });
    }

    window.Util.showMsgBox = function (msg, delay) {
        var html = [];
        html.push('<div id="__glb_MsgBox" class="x-rs5" style="width:300px; height:60px; font-size:12px; color:#f00; text-align:center; border:1px solid #f00; background:#ffffff; position:absolute; z-index:999999; display:none;"><table width="100%" cellpadding="0" cellspacing="0" style="border:none; margin:0; padding:0;"><tr><td align="center" height="60">');
        html.push(msg + '</td></tr></table></div>');
        $('#__glb_MsgBox').remove();
        $(html.join('')).appendTo('body');
        var l = ($(window).width() - 304) * 0.5;
        var t = ($(window).height() - 44) * 0.45 + $(window).scrollTop();
        $('#__glb_MsgBox')
            .css({ left: l + 'px', top: t + 'px', opacity: 1 })
            .show();
        setTimeout(function () { $('#__glb_MsgBox').hide(); }, delay);
    }

    window.Util.showMsgBox = function (msg, delay, isok) {
        var html = [];
        var sid = Math.random().toString().replace('.', '');
        if (isok == "ok" || isok == true) {
            html.push('<div id="glb_MsgBox' + sid + '" class="x-rs5" style="padding:5px 30px;width:310px; line-height:30px; font-size:14px; color:#fff; text-align:center;font-weight:bold; border:1px solid #369; background:#0fa36c; position:absolute; z-index:999999; display:none; overflow:hidden;"><table width="100%" cellpadding="0" cellspacing="0" style="border:none; margin:0; padding:0;"><tr><td align="center">');
        } else {
            html.push('<div id="glb_MsgBox' + sid + '" class="x-rs5" style="padding:5px 30px;width:310px; line-height:30px; font-size:14px; color:#f00; text-align:center; border:1px solid #f00; background:#ffffff; position:absolute; z-index:999999; display:none; overflow:hidden;"><table width="100%" cellpadding="0" cellspacing="0" style="border:none; margin:0; padding:0;"><tr><td align="center">');
        }
        html.push(msg + '</td></tr></table></div>');
        $('#glb_MsgBox' + sid).remove();
        $(html.join('')).appendTo('body');
        var l = ($(window).width() - 304) * 0.5;
        // var t = ($(window).height() - 44) * 0.45 + $(window).scrollTop();
        var t = parseInt(($(window).height() - 44) * 0.5 + $(window).scrollTop() - 80);
        $('#glb_MsgBox' + sid)
            .css({ left: l + 'px', top: t + 'px', opacity: 1 })
            .fadeIn(100);
        setTimeout(function () { $('#glb_MsgBox' + sid).fadeOut(500); }, delay);
    }

    window.Util.showLoading = function (msg) {
        var html = [];
        html.push('<div id="__glb_Loading" class="res5" style="width:200px; height:40px; line-height:40px; font-size:12px; color:#3868A4; text-align:center; border:1px solid #3868A4; background:#ffffff; position:absolute; z-index:999999; display:none;">');
        html.push(msg + '</div>');
        $('#__glb_Loading').remove();
        $(html.join('')).appendTo('body');
        var l = ($(window).width() - 204) * 0.5;
        var t = ($(window).height() - 44) * 0.45 + $(window).scrollTop();
        $('#__glb_Loading')
            .css({ left: l + 'px', top: t + 'px', opacity: 0.9 })
            .show();
    };

    window.Util.replaceHtml = function (str) {
        var t = "";
        try {
            t = $(str).text(str).html();
            if (typeof t == 'undefined') {
                var s = str;
                s = s.replace(/\</gi, '&lt;');
                s = s.replace(/\>/, '&gt;');
                t = s;
            }
        } catch (e) {
            var s = str;
            s = s.replace(/\</gi, '&lt;');
            s = s.replace(/\>/, '&gt;');
            t = s;
        }
        return t;
    };
    window.Util.toLocalTime = function (ns, formart) {
        formart = formart ? formart : "yyyy-MM-dd hh:mm:ss";
        return new Date(parseInt(ns) * 1000).format(formart);
    };
    window.Util.startLoading = function () {
        Util.showLoading('正在加载请稍后......');
    }

    window.Util.stopLoading = function () { $('#__glb_Loading').remove(); };

    window.Util.IsURL = function (str_url) {
        return /^(http\:\/\/)?(\w+\.)+\w{2,3}((\/\w+)+(\w+\.\w+)?)?$/gi.test(str_url);
    };
    window.Util.IsPicUrl = function (str_url) {
        return /^(http\:\/\/)?(\w+\.)+\w{2,3}((\/\w+)+(\w+\.\w+)?)?$/gi.test(str_url);
    };
    // 数组添加
    Array.prototype.add = function (value, isFlag) {
        if (isFlag) {
            var x = true;
            for (var i = 0; i < this.length; i++) {
                if (this[i] == value) { x = false; break; }
            }
            if (x) this.push(value);
        } else { this.push(value); }
    };

    // 删除数组中指定值
    Array.prototype.remove = function (value) {
        var index = this.indexOf(value);
        if (index != -1) this.splice(index, 1);
    };

    // 获取值在数组中的索引
    Array.prototype.indexOf = function (value) {
        var index = -1;
        for (var i = 0; i < this.length; i++) {
            if (this[i] == value) {
                index = i;
                break;
            }
        }
        return index
    };

    jQuery.fx.center = function () {
        var left = ($(window).width() - $(this).width()) * 0.5;
        var top = ($(window).height() - $(this).height()) * 0.5;
        $(this).css({ position: "absolute", zIndex: 900, left: left + "px", top: top + "px" });
    }

})();

function request(name, defVal) {
    var r = null;
    try {
        var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
        r = window.location.search.substr(1).match(reg);
    } catch (e) { }
    if (r != null) return decodeURIComponent(r[2]); return defVal;
}
/****
* 将字符串中指定格式替换成指定参数值。
*/
String.prototype.format = function () {
    var str = this;
    for (var i = 0; i < arguments.length; i++) {
        str = str.replace(new RegExp("\\{" + i + "\\}", "gi"), arguments[i]);
    }
    return str;
}
String.prototype.replaceAll = function (reallyDo, replaceWith, ignoreCase) {
    if (!RegExp.prototype.isPrototypeOf(reallyDo)) {
        return this.replace(new RegExp(reallyDo, (ignoreCase ? "gi" : "g")), replaceWith);
    } else {
        return this.replace(reallyDo, replaceWith);
    }
}
if (typeof String.prototype.trim !== 'function') {
    String.prototype.trim = function () {
        return this.replace(/^\s+|\s+$/, '');
    }
}

function noQuanXian() {
    if (JQBox) {
        JQBox.alert({ msg: '你没有操作此项功能的权限，请确认！', icon: 'failed' });
    } else {
        window.Util.showMsgBox('你没有操作此项功能的权限，请确认！', 3000);
    }
}

///now.format("yyyy-MM-dd hh:mm:ss");
String.prototype.formatTime = function (formatProvider) {
    var t = new Date(this.toString().replaceAll('-', '/'));
    var str = typeof formatProvider == "undefined" ? "yyyy-MM-dd HH:mm:ss" : formatProvider;
    var s = str.replace("yyyy", t.getFullYear())
        .replace("MM", (t.getMonth() + 1).toString().fill(2, "0"))
        .replace("dd", t.getDate().toString().fill(2, "0"))
        .replace("HH", t.getHours().toString().fill(2, "0"))
        .replace("hh", t.getHours() > 12 ? (t.getHours() - 12).toString().fill(2, "0") : t.getHours().toString().fill(2, "0"))
        .replace("mm", t.getMinutes().toString().fill(2, "0"))
        .replace("ss", t.getSeconds().toString().fill(2, "0"));
    return s;
}
Date.prototype.format = function (formatProvider) {
    return this.toString().formatTime(formatProvider);
};

/****
* 字符串按特定字符补全位数
*/
String.prototype.fill = function (bit, char, t) {
    var str = this;
    var l = bit - str.length;
    if (l > 0) {
        for (var i = 0; i < l; i++) {
            str = (typeof t == "undefined" || t == 0) ? (char + str) : (str + char);
        }
    }
    return str;
}

String.prototype.Val = function (argName) {

    var str = this;
    var value = "";
    var regex = new RegExp("(^|&)" + argName + "=([^&]*)(&|$)", "i");
    var r = str.substr(1).match(regex);
    if (r != null) {
        value = unescape(r[2]);
    }
    return value;
}


function loadJs(sid, jsurl, callback) {
    if (document.getElementById(sid)) {
        if (callback) callback();
    } else {
        var script = document.createElement("script");
        script.id = sid;
        script.type = "text/javascript";
        script.onload = script.onreadystatechange = function () {
            if (script.readyState && script.readyState != 'loaded' && script.readyState != 'complete') {
                return;
            }
            script.onreadystatechange = script.onload = null;
            if (callback)
                callback();
        };
        script.src = jsurl;
        document.body.appendChild(script);
    }
}