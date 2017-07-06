var _bookaction = function () {
    var my = this;
    var domainUrl = "";
    var sharehtml = '\
	<div id="ckepop"><span class="jiathis_txt">分享到：</span>\
	<a class="jiathis_button_fav"></a>\
	<a class="jiathis_button_email"></a>\
	<a class="jiathis_button_tqq"></a>\
	<a class="jiathis_button_tsina"></a>\
	<a class="jiathis_button_t163"></a>\
	<a class="jiathis_button_tsohu"></a>\
	<a class="jiathis_button_qq"></a>\
	<a class="jiathis_button_qzone"></a>\
	<a class="jiathis_button_hi"></a>\
	<a class="jiathis_button_tieba"></a>\
	<a class="jiathis_button_feixin"></a>\
	<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank"></a>\
	<a class="jiathis_counter_style"></a>\
	</div>\
	<script type="text/javascript" >\
	var jiathis_config={\
		summary:"",\
		hideMore:false\
	}\
	</script>\
	<script type="text/javascript" src="http://v2.jiathis.com/code/jia.js" charset="utf-8"></script>\
	';
    my.init = function () {
        if (location.href.indexOf('/info') > 0) {
            my.share();
            $('a[id^=ba_send_]').click(function () { my.postAc($(this).attr('id').replace('ba_send_', '')); });
            $('#ba_addtoCase').click(function () { my.shouCang(bookid); });
            $('#ba_addtoCase_2').click(function () { my.shouCang(bookid); });
        }
    };

    my.showMsg = function (msg, icon, title, callback) {
        JQBox.alert({ title: title, icon: icon, msg: msg });
        if (callback) callback();
    };
    my.shouCang = function (bookid, clickOjb) {
        if (userid == 0) {
            myhead.loginform(function () { my.shouCang(bookid, clickOjb); });
            return;
        }
        $.post('/UserAjax/AddBookShelf', $.param({ bookid: bookid, rnd: Math.random() }), function (rs) {
            if (rs == 'nologin') { myhead.loginform(function () { my.shouCang(bookid, clickOjb); }); return; }
            if (rs.code != 0) {
                my.showMsg(rs.msg, 'failed', '加入书架');
                return;
            }
            else
            {
                if (location.href.indexOf('/info') > 0) {
                    my.showMsg('收藏成功', 'ok', '加入书架');
                    $('#menucnt2').html('');
                    $('#menuitem2').attr('class', 'menuhover');
                    myhead.getSCbook(userid, 0, 1);
                } else {
                    if (clickOjb) {
                        clickOjb.innerHTML = '收藏成功';
                        clickOjb.onclick = 'return false;';
                        $('#menucnt2').html('');
                    } else {
                        my.showMsg('收藏成功', 'ok', '加入书架');
                    }
                }
            }
        });
    };
    my.addSQ = function (bookid, chapterid) {
        if (userid == 0) {
            myhead.loginform(function () { my.addSQ(bookid, chapterid); });
            return;
        }
        $.post('/UserAjax/AddBookMark', $.param({ bookid: bookid, chapterid: chapterid, rnd: Math.random() }), function (rs) {
            if (rs == 'nologin') {
                myhead.loginform(function () { my.addSQ(bookid, chapterid); }); return;
            } else if (rs.code == 0 ) {
                my.showMsg('操作成功，书签已更新', 'ok', '加入书签');
                return;
            } else {
                my.showMsg(rs.msg, 'failed', '加入书签');
                return;
            }
        });
    };
    my.postAc = function (iliwu, byorqb, bid, bname, callback) {
        if (userid == 0) {
            myhead.loginform(function () { my.postAc(iliwu); });
            return false;
        }
        bid = bid ? bid : bookid;
        bname = bname ? bname : bookname;
        byorqb = byorqb ? byorqb : '';

        var url = domainUrl;
        var h = 360;
        var st = '我为 ' + bname + ' 加油 -- 赠送道具';

        if (byorqb == 'by') {
            url += '/PayMents?q=baoyue&rnd=' + Math.random();
            h = 430;
            st = '订制包月服务--潇湘书院';
        } else if (byorqb == 'qb') {
            url += '/PayMents?q=specialbook&bookid=' + bid + '&rnd=' + Math.random();
            st = bname + '--全本订阅特价书';
        }
        else {
            url += '/SendGift?iliwu=' + iliwu + '&bookid=' + bid + '&rnd=' + Math.random();
        }

        var ohtml = '<a href="http://pay.xxsy.net" target="_blank"><font color="#0000ff">【VIP充值】</font></a>　<a href="/help/uhelp.html" target="_blank"><font color="#0000ff">【帮助中心】</font></a>　　<b style="color:#f00">*** 说明：</b>新获得的粉丝值数据将延时第二天显示。';
        JQBox.FrameBox({ title: st, uri: url, width: 570, height: h, buttons: { show: true, close: true, outhtml: ohtml }, closeCallBack: function () {
            if (callback) callback();
        } 
        });
    };
    my.share = function () {
        $('#sharediv').html(sharehtml);
    }
}

var bac = new _bookaction();
bac.init();