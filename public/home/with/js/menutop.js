var mainsite = 'http://www.xxsy.net';
var imagesite = 'http://images.xxsy.net';

if (/^(w\d+|www|pc[\d+])\.xxsy\.net/i.test(location.host)) mainsite = '';
var sHTML = '\
<div id="page_top">\
	<div id="nav_top">\
		<div id="login" class="menu-left">\
		</div>\
		<div class="menu-right">\
			<li class="menu"><div class="menu-hd" style="padding-right:5px;"><a href="' + mainsite + '/" style="margin-right:5px;">潇湘首页</a> </div></li>\
			';
var aurl = mainsite + '/search';

if (location.href.indexOf('search') == -1) {
    sHTML += '<li class="menu">\
					<div style="position:relative" id="menuitem3">\
						<div class="menu-hd" >\
							<img src="'+ imagesite + '/pic/20110801/iptsch_s.gif" class="menu-item-img" /><a class=aline href="' + mainsite + '/search">搜书<span class=sb><b></b></span></a>\
						</div>\
						<div id="menucnt3" class="menu-ct menu-ct-3" style="height:50px;">\
							 <form id="headform" name="headform" action="' + aurl + '" method="get" ' + (location.href.toString().toLowerCase().indexOf('/search') == -1 ? 'target="_blank"' : '') + ' style="margin:0; padding:0; border:none;" >\
							<ul>\
							<li><input type="text" value="书名/作者/标签" class="headsearch" id="headskey" name="s_wd" maxlength="20" onfocus="if(this.value==\'书名/作者/标签\'){this.value=\'\';};this.style.color=\'#333333\';"  onBlur="if(this.value==\'书名/作者/标签\'){this.value=\'\';}else{this.value=this.value.replace(/[^\u4E00-\u9FA5]/g,\'\')}" onbeforepaste="clipboardData.setData(\'text\',clipboardData.getData(\'text\').replace(/[^\u4E00-\u9FA5]/g,\'\'))"/> <input type="button" class=sbtn value="搜 索" onclick="myhead.gosearch()" /></li>\
							</ul>\
							</form>\
						</div>\
					</div>\
				</li>';
}
sHTML += '<li class="menu">\
				<div style="position:relative" id="menuitem4">\
					<div class="menu-hd">\
					<a href="javascript:void(0);" target=_self ><font color=#ff0000>今日热文<span class=sb><b></b></span></font></a>\
					</div>\
					<div id="menucnt4" class="menu-ct menu-ct-4"></div>\
				</div>\
			</li>\
			<li class="menu"><div class="menu-hd" style="padding-right:5px;"><a href="http://pay.xxsy.net"  target="_blank">VIP充值</a></div></li>\
			<li class="menu">\
				<div style="position:relative" id="menuitem5" >\
					<div class="menu-hd" >\
					<a href="http://author.xxsy.net"  target="_blank">作者登录<span class=sb><b></b></span></a>\
					</div>\
					<div id="menucnt5" class="menu-ct menu-ct-5">\
						<ul>\
                            <li><a href="http://author.xxsy.net" target="_blank">作者登录</a></li>\
							<li><a href="' + imagesite + '/xxhtml/2017/fuli2017/index.html" target="_blank"><font color=#ff0000>潇湘作者福利</font></a></li>\
							<li><a href="http://author.xxsy.net/RegAuthor.aspx"  target="_blank"><font color=#ff0000>注册账号，当作家</font></a></li>\
						</ul>\
					</div>\
				</div>\
			</li>\
			<li class="menu">\
				<div style="position:relative" id="menuitem6">\
					<div class="menu-hd" >\
						<a href="' + mainsite + '/control"  target="_blank">会员中心<span class=sb><b></b></span></a>\
					</div>\
					<div id="menucnt6" class="menu-ct menu-ct-6">\
						<ul>\
							<li><a href="' + mainsite + '/control"  target="_blank">个人资料</a></li>\
							<li><a href="' + mainsite + '/control?t=1"  target="_blank">我的书架</a></li>\
							<li><a href="' + mainsite + '/control?t=2" target="_blank">我的书签</a></li>\
							<li><a href="' + mainsite + '/control?t=6" target="_blank">绑定手机</a></li>\
							<li><a href="http://pay.xxsy.net"  target="_blank"><font color=#ff0000>VIP充值</font></a></li>\
							<li><a href="http://pay.xxsy.net"  target="_blank">充值记录</a></li>\
							<li><a href="' + mainsite + '/control?t=3"  target="_blank">消费记录</a></li>\
							<li><a href="http://pay.xxsy.net"  target="_blank">汇款登记</a></li>\
							<li><a href="' + mainsite + '/findpwd"  target="_blank">找回密码</a></li>\
							<li><a href="' + mainsite + '/control?t=3"  target="_blank">获奖书评</a></li>\
							<li class=newline><a href="' + mainsite + '/control?t=7" target="_blank"><font color=#ff0000>如何成为VIP会员?</font></a></li>\
						</ul>\
					</div>\
				</div>\
			</li>\
			<li class="menu">\
				<div style="position:relative" id="menuitem7">\
					<div class="menu-hd">\
					<a href="' + mainsite + '/help/uhelp.html"><img src="' + imagesite + '/pic/20110801/seavicicn.gif" class="menu-item-img" />联系客服<span class=sb><b></b></span></a>\
					</div>\
					<div id="menucnt7" class="menu-ct menu-ct-7">\
						<ul>\
							<li><a href="' + mainsite + '/control?t=7" target="_blank"><strong>VIP会员制度</strong></a></li>\
							<li><a href="' + mainsite + '/control?t=7"  target="_blank"><strong>如何成为VIP会员?</strong></a></li>\
							<li><a href="' + mainsite + '/findpwd"  target="_blank"><strong>找回密码（会员）</strong></a></li>\
                            <li><a href="http://author.xxsy.net/FindPwd.aspx"  target="_blank"><strong>找回密码（作者）</strong></a></li>\
                            <li class=newline><b>会员客服(7x24小时服务)：</b></li>\
							<li class=newline>QQ：<a href="http://crm2.qq.com/page/portalpage/wpa.php?uin=800057679&f=1&ty=1&aty=0&a=&from=5" target="_blank"><u>800057679</u></a> ， 电话：010-59357051</li>\
							<li style=" margin:5px 0 5px 0;border-top:solid 1px #333; height:1px;overflow:hidden; width:100%;"></li>\
							<li class=newline style="color:#f00;">&nbsp;&nbsp;<a href="tencent://message/?uin=2851615710&Site=潇湘书院&Menu=yes"  target="_blank"><u style="color:#f00;">值班编辑</u></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="' + mainsite + '/help/ahelp.html"  target="_blank"><strong>作家帮助中心</strong></a></li>\
							<li style=" margin:5px 0 5px 0;border-top:solid 1px #333; height:1px;overflow:hidden; width:100%;"></li>\
							<li class=newline>无线版权合作：<a href="tencent://message/?uin=376148100&Site=潇湘书院&Menu=yes"  target="_blank"><u>QQ:376148100</u></a></li>\
                            <li class=newline>影游漫版权：<a href="tencent://message/?uin=814880323&Site=潇湘书院&Menu=yes"  target="_blank"><u>QQ:814880323</u></a></li>\
							<li class=newline>出版合作&nbsp;&nbsp;：<a href="tencent://message/?uin=378146293&Site=潇湘书院&Menu=yes"  target="_blank"><u>QQ:378146293</u></a></li>\
						</ul>\
					</div>\
				</div>\
			</li>\
			<li class="menu"><div class="menu-hd menu-hd-nb guinness" style="width:auto; padding-right:5px;"></div></li>\
		  </div>\
	</div><iframe id=headifr name=headifr style="display:none"></iframe><div id=mybcasecnt1 style="display:none;"></div><div id=mybcasecnt2 style="display:none;"></div>\
</div>\
';

document.write(sHTML);

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

var _MYHEAD = function () {
    var my = this;
    my.userid = null;
    my.username = '';
    my.cpageid_1 = 1;
    my.cpageid_2 = 1;
    my.actionCallback = null;
    my.loginCallback = function () { };
    my.btnstyle = function () {
        if ($.browser.msie) {
            return 'border:solid #FFFFFF 1px;background-image:url(' + imagesite + '/pic/line_1_27.gif);width:auto;height:26px;margin:0 0 0 30px;padding:5px 0 0 0 ;color:#085271; cursor: pointer;font-size:14px;';
        } else {
            return 'border:solid #cdcdcd 1px; background-image:url(' + imagesite + '/css/1/btn_line.gif);width:auto;height:24px; color:#085271; cursor: pointer;font-size:14px;padding:3px 10px;';
        }
    };

    my.loadingHTML = '<div style="height:200px!important;line-height:200px!important;"><img border=0 style="width:32px;height:32px;" src="' + imagesite + '/pic/loading.gif" />正在加载数据...</div>';
    my.init = function (callback) {
        my.userid = userid = my.getCookie("xxyc", "userid") || my.getCookie("userid");
        my.username = username = my.getCookie("name4js");
        my.writeHead();
        try {
            $('div[id^=menuitem]').hover(function () {
                $(this).attr('class', 'menuhover');
                var tid = $(this).attr('id').replace('menuitem', '');
                if ($('#menucnt' + tid).html().length < 5) {
                    if (tid == '2') {
                        my.getSCbook(my.userid, 0, 1);
                    } else if (tid == '4') {
                        my.getTodayHot();
                    } else if (tid == '1') {
                        my.getUserInfo();
                    }
                }
            }, function () {
                $(this).attr('class', 'menu');
            });
            if (_myComment) { _myComment.showCmtBox(); }
        } catch (e) { }

        if (callback) {
            if (callback == 'closebox') {
                try {
                    JQBox.removeBoxForse(function () {
                        if (my.actionCallback) { my.actionCallback(); my.actionCallback = null; }
                    });
                } catch (e) { };
            } else {
                callback();
            }
        }
    };
    my.loginform = function (callback) {
        my.init();
        JQBox.FrameBox({ title: '登录潇湘书院 ', uri: mainsite + '/login/box?rnd=' + Math.random(), width: 550, height: 350 }, function () {
            if (callback) my.actionCallback = callback;
        });
    };
    my.QQloginform = function (callback) {
        my.init();
        JQBox.FrameBox({ title: '登录潇湘书院 ', uri: mainsite + '/login/box?isqq=1&rnd=' + Math.random(), width: 550, height: 350 }, function () {
            if (callback) my.actionCallback = callback;
        });
    };
    my.cookieOperate = function (name) {
        var cookieValue = '';
        if (document.cookie && document.cookie != '') {
            var cookies = document.cookie.split(';');
            for (var i = 0; i < cookies.length; i++) {
                cookie = cookies[i].replace(/^\s+|\s+$/g, '');
                if (cookie.substring(0, name.length + 1) == (name + '=')) {
                    cookieValue = unescape(cookie.substring(name.length + 1));
                    break;
                }
            }
        }
        return cookieValue;
    };
    my.getCookie = function (sname, key) {
        return !key ? my.cookieOperate(sname) : my.cookieOperate(sname).Val(key);
    };
    my.setCookie = function (name, value, expireDays) {
        if (!expireDays) { expireDays = 30; }
        var exp = new Date();    //new Date("December 31, 9998");
        exp.setTime(exp.getTime() + expireDays * 24 * 60 * 60 * 1000);
        document.cookie = name + "=" + escape(value) + ";expires=" + exp.toGMTString() + ";path=/;domain=.xxsy.net;";
    };
    my.logout = function () {
        var url = mainsite + encodeURI('/login/logout?callback=myhead.logoutCallBack&rnd=' + Math.random());
        $.getScript(url);
    };
    my.logoutCallBack = function () {
        if (location.href.toString().toLowerCase().indexOf('login') > -1) location.href = location.href;
        if (location.href.toString().toLowerCase().indexOf('control') > -1 || location.href.toString().toLowerCase().indexOf('vipbook.aspx') > -1) location.href = mainsite;
        my.init();
    };
    my.strLength = function (_sVal) {
        var iLen;
        var sVal = escape(_sVal);
        iLen = sVal.length - (sVal.length - sVal.replace(/\%u/g, "u").length) * 4;
        sVal = sVal.replace(/\%u/g, "uu");
        iLen = iLen - (sVal.length - sVal.replace(/\%/g, "").length) * 2;
        return iLen;
    };
    my.writeHead = function () {
        if (my.userid.length > 0 && my.username.length > 0) {
            var loginhtml = '<li class="menu"><div class="menu-hd menu-hd-nb" style=" padding-right:0px;">hi，</div></li>\
			<li class="menu">\
			<div style="position:relative" id="menuitem1" >\
				<div class="menu-hd">\
					<a href="' + mainsite + '/control">' + my.username + '<span class=sb><b></b></span></a>\
				</div>\
				<div id="menucnt1" class="menu-ct menu-ct-1"></div>\
			</div></li>\
			<li class="menu">\
			<div style="position:relative" id="menuitem2">\
				<div class="menu-hd">\
					<a href="' + mainsite + '/control?t=1"><font color=#ff0000>我的书架</font><span class=sb><b></b></span></a>\
				</div>\
				<div id="menucnt2" class="menu-ct menu-ct-2" >\
				</div>\
			</div></li>\
			<li class="menu"><div class="menu-hd menu-hd-nb"><a href="javascript:void(0);" onclick="myhead.logout()"  target=_self>退出</a></div></li>\
			';
            $("#login").html(loginhtml).show();
        } else {
            if (location.href.toLowerCase().indexOf('login') == -1) {
                $("#login").html('<li class="menu"><div class="menu-hd menu-hd-nb">\亲，欢迎来潇湘，请 <a href="' + mainsite + '/login?r=' + encodeURIComponent(location.href) + '"  target="_self" target="_self"><font color=#ff0000>登录</font></a> 或 <a href="' + mainsite + '/Reg"><font color=#ff0000>注册</font></a>　<img src="'+imagesite+'/pic/2013/Connect_logo_6.png" align="absmiddle" id="qqloginbtn" style="cursor:pointer" /></div></li>').show();
                $("#qqloginbtn").click(function () {
                    my.QQloginform();
                });
            }
        }
    };
    my.getSCbook = function (userid, nid, pageid, itype) {
        if (my.userid.lenght == 0) { my.loginform(); return false; }
        if (pageid == 1) {
            $('#menucnt2').html(my.loadingHTML);
        }
        var stype = '';
        if (!itype) { itype = 1; }

        stype = '#mybcasecnt' + itype; // 1书架,2书签

        if ($(stype).text() == '') {
            if (my.userid.length < 1) {
                my.init();
                return;
            }
            var url = mainsite + '/UserAjax/BookCmt?userid=' + userid + '&nid=' + nid + '&callback=myhead.scCallback&itype=' + itype + '&pageid=' + pageid + '&rnd=' + Math.random();
            $.getScript(url);
        } else {
            $('#menucnt2').html($(stype).html());
        }
    };

    my.scCallback = function (rs) {
        if (rs == 'nologin') { my.loginform(); return false; }
        var s = [];
        //if (rs.grovebookcount.length > 0 ) {
        //    s.push('<ul id="grovinul" style="line-height:30px;border:1px solid #ddd;margin:3px 2px;">',
        //        '<li style="padding-left:20px;color:#f00;background-color:#ffc;height:30px;">娘娘,您养的 ' + ME.grovebook.length + ' 本小说写完了,快进入<a href="' + mainsite + '/control?t=1">【我的书架】</a>查看吧!</li></ul>'
        //    );
        //}
        if (rs.itype == 1) {
           s.push('<div id="mybc"><span class="off"></span><span id="head_select_1" class="on" onclick="myhead.trans(1,2)">我的书架</span>',
               '<span id="head_select_2" class="off" onclick="myhead.trans(2,2)">我的书签</span>',
               '<span class="rblank"></span></div>'
           );
        } else {
           s.push('<div id="mybc"><span class="off"></span><span id="head_select_1" class="off" onclick="myhead.trans(1,2)">我的书架</span>',
              '<span id="head_select_2" class="on" onclick="myhead.trans(2,2)">我的书签</span>',
              '<span class="rblank"></span></div>'
           );
        }
        s.push('<ul id="mybctitle"><li class="n0">序</li><li class="n1">书名</li><li class="n2">' + (rs.itype == 1 ? '最新章节(更新时间)' : '标签章节(加入时间)') + '</li>',
           '<li class="n3">作者</li><li class="n4">操作</li></ul><ul id="mybclist">');

        $(rs.data).each(function (i, o) {
            //if (rs.grovebookcount.length > 0 && i > 8) return;
            s.push('<li class="n0">'+(i+1)+'</li><li class=n1><a href=http://www.xxsy.net/info/' + o.bookid + '.html id=b_' + o.bookid + '>' + o.bookname + '</span></a></li><li class=n2>');
            if (o.vip == 1) {
                s.push('<a href=http://vip.xxsy.net/vipbook.aspx?bookid=' + o.bookid + '&juanid=' + o.juanid + '&zhangjieid=' + o.zjid + '><font color=red>[Ｖ]</font>' + o.zhangjiename + '</a>');
            } else {
                s.push('<a href=http://www.xxsy.net/books/' + o.bookid + '/' + o.zjid + '.html>&nbsp;' + o.zhangjiename + '</a>')
            }
            if (new Date((rs.itype == 1 ? o.showzjtime : o.sqtime)) >= new Date(rs.ndate)) {
                s.push('&nbsp;[<font color=red>' + (rs.itype == 1 ? o.showzjtime : o.sqtime) + '</font><img src="'+imagesite+'/pic/new.gif" border=0>]');
            } else {
                s.push('&nbsp;<font color="#666666">[' + (rs.itype == 1 ? o.showzjtime : o.sqtime) + ']</font>');
            }
            s.push('</li><li class=n3>' + o.authorName + '</li><li class=n4><a href="javascript:void(0)"');
            s.push('onclick="myhead.confirmBox(' + userid + ',' + o.bookid + ',\'' + rs.token + '\',' + rs.itype + ')" target=_self>' + (rs.itype == 1 ? '下架' : '撤销') + '</a></li>');
        });

        s.push('<li class=newline><span class=s1> </span><span class=s2>');
        
        if (rs.itype == 1) {
            s.push('<a href="'+mainsite+'/control?t=1">管理我的书架>></a>');
        } else {
            s.push('<a href="' + mainsite + '/control?t=2">管理我的书签>></a>');
        }
        s.push('&nbsp;&nbsp;&nbsp;&nbsp;<a target=_self href="javascript:void(0)" onclick="myhead.close(2)" title="关闭窗口">关闭x</a></span></li></ul>');
        
        $('#mybcasecnt' + rs.itype).html(s.join(''));
        setTimeout(function () { $('#menucnt2').html($('#mybcasecnt' + rs.itype).html()); }, 300);
    };

    my.getTodayHot = function () {
        $('#menucnt4').html(my.loadingHTML);
        $.getScript(mainsite + '/WebAjax/TodayHot?callback=myhead.setTodayHot&rnd=' + Math.random());
    };

    my.setTodayHot = function (data) {
        var s = [];
        $(data).each(function (i, o) {
            s.push('<div class=newline><a href="' + mainsite + '/info/' + o.bookid + '.html"><img src="'+imagesite+'/simg/' + o.bookid + '.jpg" /><font color=#ff0000>' + o.bookname + '</font><br>' + o.infoContent + '...</a></div>');
        })
        $('#menucnt4').html(s.join(''));
    };
    
    my.getUserInfo = function () {
        if (my.userid.lenght == 0) { my.loginform(); return false; }
        $('#menucnt1').html(my.loadingHTML);
        var url = mainsite + '/UserAjax/TopMenu?callback=myhead.setUserInfo&userid=' + my.userid + '&rnd=' + Math.random();
        $.getScript(url);
    };
    my.setUserInfo = function (data) {
        if (data == 'nologin') { my.loginform(); return false; }

        var html = [];
        html.push('<div class=cnt><dl class=d1><img src="'+imagesite+'/pic/userface/' + data.userface + '" /></dl><dl class=d2><ul>');
        html.push('<li class="hasmedal"><span>会员名称：' + data.username + '</span><a class="' + data.medals[0].css + '" title="' + data.medals[0].medelname + '：' + data.medals[0].levelname + ' [' + data.medals[0].levelp + ']\n当前积分：' + data.medals[0].point + ' 点\n升级到 ' + data.medals[0].nextname + ' 还差 ' + data.medals[0].need + ' 点"></a></li>');
        html.push('<li>会员类型：' + data.vipuser + '</li>');
        html.push('<li>账户余额：' + data.xxpoint + ' 点 &nbsp;&nbsp;<a href=\"http://pay.xxsy.net\" target=_blank>(充值)</a></li>');
        data.ybopen == 1 ? html.push('<li>我的元宝：' + data.ybdian + ' 个</li>') : html.push('<li>累计消费：' + data.totalxiaofei + ' 点</li>');
        html.push('<li>累计V订阅：' + data.totaldy + ' 点</li>');
        html.push('<li>本月V订阅：' + data.monthdy + ' 点</li>');
        html.push('<li>月票数：' + data.ypnum + '，获赠还差 <b title="累计VIP订阅每消费满6-10元即可获得1张月票，所得月票当月有效"><u>' + data.ypneed + '</u></b> 点</li>');
        html.push('<li>评价票：' + data.pjnum);
        if (data.monthdy < 1000) {
            html.push('，获赠还差 <b title="本月 VIP订阅消费满10元即可获得1张评价票(每月仅赠送1张)，所得评价票当月有效。或可以消费潇湘购买，每张200点"><u>' + data.pjneed + '</u></b> 点');
        } else {
            if (data.pjnum === 1) html.push(' (获赠)');
        }
        html.push('</li><li class=newline><a href="http://pay.xxsy.net/" target="_blank">充值记录</a><a href="' + mainsite + '/control?t=3">消费记录</a><a href="http://pay.xxsy.net/?t=3" target="_blank">汇款登记</a><a href="' + mainsite + '/control?t=5">修改密码</a><a href="' + mainsite + '/control"><strong>进入我的控制面板>></strong></a></li>');
        html.push('</ul></dl><dl class="d3"><span>我的勋章：</span>');
        if (data.medals.length > 1) {
            $(data.medals).each(function (i, o) {
                if (!$.isEmptyObject(o) && i > 0)
                    html.push('<a class="' + o.css + '" title="' + o.medelname + '：' + o.levelname + ' [' + o.levelp + '] "></a>');
            });
        } else {
            html.push("<span>还没有勋章</span> ");
        }
        if (data.needgetmedal > 0) html.push('<a href="' + mainsite + '/control">点击领取 <b>' + data.needgetmedal + '</b> 个勋章</a>');
        html.push('</dl></div>');
        $('#menucnt1').html(html.join(''));
    };

    my.delcase = function (userid, bookid, skey, itype) {
        if (my.userid.lenght == 0) { my.loginform(); return false; }
        var url = mainsite + '/UserAjax/removeshelf?userid=' + userid + '&bookid=' + bookid + '&utoken=' + skey + '&itype=' + itype + '&callback=myhead.delcaseCB&rnd=' + Math.random();
        $.getScript(url);
    };
    my.delcaseCB = function (rs) {
        if (rs == 'nologin') { my.loginform(); return false; }
        if (rs.code == 0) {
            $('#mybcasecnt' + rs.itype).html('');
            myhead.getSCbook(userid, 0, 1, rs.itype);
        } else {
            $('#_divcnt').html('<font color=#0000ff>系统繁忙，操作失败，请稍候重试！</font><p><input type=button value=" 确 定 " style="' + my.btnstyle() + '" onclick="myhead.closeBox(' + itype + ')" /><p>');
        }
    };

    my.confirmBox = function (userid, bookid, skey, itype) {
        if (my.userid.lenght == 0) { my.loginform(); return false; }
        var stitle = '下架';
        var sbutton = '确定下架';
        if (itype == 2) { stitle = '的书签撤销'; }
        var str = '<div class=cfbox-mask></div><div class=cfbox><div class=divbd><div class=cnt id=_divcnt><img src="'+imagesite+'/pic/icon_alert.gif" /></span>确定要将 <font color=#ff0000>《' + $('#b_' + bookid).text() + '》</font> ' + stitle + '吗？<p><input type=button value="' + sbutton + '" onclick="myhead.delcase(' + userid + ',' + bookid + ',\'' + skey + '\',' + itype + ')" style="' + my.btnstyle() + '" /><input type=button value="  取 消 " style="' + my.btnstyle() + ';margin-left:20px;" onclick="myhead.closeBox(' + itype + ')" /><p></div></div></div>';

        $('#menucnt2').html($('#menucnt2').html() + str);
    };
    my.closeBox = function (itype) {
        $('#menucnt2').html($('#mybcasecnt' + itype).html());
    };

    my.trans = function (itype, total) {
        for (var i = 1; i <= total; i++) {
            if (itype == i) {
                if ($('#head_select_' + i).attr('class') == "off") {
                    $('#head_select_' + i).attr("class", "on");
                    var ipage = 0;
                    if (itype == 1) {
                        ipage = my.cpageid_1;
                    } else if (itype == 2) {
                        ipage = my.cpageid_2;
                    }
                    my.getSCbook(my.userid, 0, ipage, itype);
                }
            } else {
                $('#head_select_' + i).attr("class", "off");
            }
        }
    };
    my.gosearch = function (s) {
        if ($('#headskey').val() == '书名/作者/标签') { $('#headskey').val(''); }
        $('#headform').submit();
    };
    my.close = function (div) {
        $('#menuitem' + div).attr('class', 'menu');
    };
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

function initLayer(layerid, conid, classOn, classOff, def, url, callback) {
    if (!url) url = '';
    try {
        $(layerid).hover(function () {
            $(this).attr('class', classOn).siblings().attr('class', classOff);
            if ($(conid).html().toString().trim().length < 5) {
                if (url.length > 2) {
                    $.get(url, function (data) { $(conid).html(data); })
                } else { if (callback) callback(); }
            }
            $(conid).show().siblings().hide();
        }, function () { }).attr('class', classOff);
        if (def == true) {
            if (url.length > 2) {
                $.get(url, function (data) {
                    $(layerid).attr('class', classOn); $(conid).html(data).show(); if (callback) callback();
                });
            } else {
                $(layerid).attr('class', classOn); $(conid).show(); if (callback) callback();
            }
        } else {
            $(conid).hide(); if (callback) callback();
        }
    } catch (e) { }
};

function initLayer_click(layerid, conid, classOn, classOff, def, url, callback) {
    if (!url) url = '';
    try {
        $(layerid).click(function () {
            $(this).attr('class', classOn).siblings().attr('class', classOff);
            if ($(conid).html().length < 5) {
                if (url.length > 2) {
                    $.get(url, function (data) { $(conid).html(data); })
                } else { if (callback) callback(); }
            }
            $(conid).show().siblings().hide();
        }).attr('class', classOff);
        if (def == true) {
            if (url.length > 2) {
                $.get(url, function (data) {
                    $(layerid).attr('class', classOn); $(conid).html(data).show(); if (callback) callback(true);
                });
            } else {
                $(layerid).attr('class', classOn); $(conid).show(); if (callback) callback(true);
            }
        } else {
            $(conid).hide(); if (callback) callback(true);
        }
    } catch (e) { }
};

document.domain = 'xxsy.net';
var userid = null;
var username = null;
var myhead = new _MYHEAD();

setTimeout('myhead.init()', 50);

var ref = document.referrer;

if (ref.length>5 && ref.indexOf("xxsy.net") == -1 && ref.indexOf("xxsy.com") ==-1 ) {
    ref = ref.replace("http://", "");
    ref = ref.replace("https://", "");
    if (ref.indexOf("/") > 1) {
        ref = ref.substring(0, ref.indexOf("/"));
    }
    myhead.setCookie("haourl", ref, 365);
}