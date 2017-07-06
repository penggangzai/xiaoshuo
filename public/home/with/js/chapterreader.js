/// <reference path="jquery.min.js" />
/// <reference path="Util.js" />
$(document).bind('contextmenu cut copy selectstart', function (e) {
    e.preventDefault(); return false;
});
(function () {
    ChapterReader = {};
    var my = ChapterReader;
    var Timer;
    my.ReadSet = { fsize: 26, fstyle: "楷体", bg: "c_default", pwidth: 960, pmode: 'fy', auto: 0, speed: 5, autonext: 0, bgindex: 0 };
    my.scrolling = false;

    my.showHtml = function () {
        var s = '<!--  左侧导航 start   -->\
            <ul class="sub_menu" id="float_sub_menu">\
                <li class="menu_set">\
                    <span class="icon" title="阅读设置" ></span>\
                    <div class="menu_info">\
                        <span class="close_btn"></span>\
                        <div class="set_list">\
                        </div>\
                    </div>\
                </li>\
            </ul>\
            <!--  左侧导航 end   -->\
            <!--  右侧导航 start   -->\
            <ul class="sub_nav" id="float_sub_nav">\
                <li class="nav_top">\
                    <span class="icon" title="返回顶部"></span>\
                </li>\
            </ul>\
            <!--  右侧导航 end   -->';
        /* <li class="nav_zan"> <span class="icon"></span> </li>*/
        document.write(s);
    };
    my.GoToPrePage = function () {
        if ($('a[name=przjurl]').length > 0) {
            location.href = $('a[name=przjurl]').attr('href');
        } else {
            alert('当前页面已是第 1 页');
        }
    };
    my.GoToNextPage = function () {
        if ($('a[name=nextzjurl]').length > 0) {
            location.href = $('a[name=nextzjurl]').attr('href');
        } else {
            alert('当前页面已是最后一页');
        }
    };
    my.init = function () {

        my.showHtml();
        //加载设置
        my.setReader(my.GetCookieConfig());

        //双击滚屏
        $(document).dblclick( function () {
            if (my.scrolling==true) {
                my.autostop();
            } else {
                if (my.GetCookieConfig().auto == 1) my.autoscroll(my.GetCookieConfig().speed);
            }
        });

        //快捷键
        $(document).keydown(function (e) {
            if (e.which == 13) {
                location.href = '/books/' + bookid + '.html';
            } else if (e.which == 37) {
                my.GoToPrePage();
            } else if (e.which == 39) {
                my.GoToNextPage();
            }
        });
        //阅读设置
        $(".menu_set .icon").click(function () {
            my.ReadConfig();
        });

        $("#float_sub_menu li .icon").click(function () {
            var sibDom = $(this).siblings(".menu_info");
            if (sibDom.is(":visible")) {
                $(this).parents("li").removeClass("active")

            } else {
                $(this).parents("li").addClass("active").siblings().removeClass("active")
            }
        })
        $(".close_btn").click(function () {
            $(this).parents("li").removeClass("active");
        });

        //智能浮动侧栏导航
        $.fn.smartFloat = function () {
            var position = function (element) {
                var top = element.position().top, pos = element.css("position");
                $(window).scroll(function () {
                    var scrolls = $(this).scrollTop();
                    if (scrolls > top) {
                        if (window.XMLHttpRequest) {
                            element.css({
                                position: "fixed",
                                top: 0
                            });
                        } else {
                            element.css({
                                top: scrolls
                            });
                        }
                    } else {
                        element.css({
                            position: "absolute",
                            top: top
                        });
                    }
                });
            };
            return $(this).each(function () {
                position($(this));
            });
        };
        $("#float_sub_menu,#float_sub_nav").smartFloat();

        //返回顶部
        $(".sub_nav .nav_top .icon").click(function () {
            $('body,html').animate({ scrollTop: 0 }, 200);
            return false;
        });

        /* 点击左侧浮动收藏 */
        $('.menu_shujia .icon').click(function () {
            bac.shouCang(bookid);
        });

        /* 点击左侧浮动添加书签 */
        $('.menu_keep .icon').click(function () {
            bac.addSQ(bookid,chapterid);
        });

        /* 点击右浮动赠送道具 */
        $(".nav_gift .icon").click(function () {
            bac.postAc(vipbook == 1 ? 4 : 5);
        });

        var cntjuanid = 0;
        /* 点击查看目录 */
        $(".menu_list .icon").click(function () {
            if ($('.chapter_juan').length == 0) {
                $.post('/Chapter/GetBookChapterList', $.param({ bookid: bookid, rnd: Math.random() }), function (rs) {
                    if (rs == 'nobook') {
                        location.href = '/notfound';
                        return false;
                    }
                    if (rs.length == 0) {
                        Util.showMsgBox('获取数据失败，请稍候再试', 2000);
                        return false;
                    }
                    var juanid = 0;
                    var str = [];
                    $(rs).each(function (i, c) {
                        if (c.juanid != juanid) {
                            if (juanid != 0) str.push('</ul></dd>');
                            str.push('<dt class="chapter_juan" juan="' + c.juanid + '">' + c.juanname + ' <span> <img src="/content/pic/arr_down.gif" /> </span> </dt>');
                            str.push(' <dd> <ul style="display:none;" juan="' + c.juanid + '">');
                            juanid = c.juanid;
                        }
                        str.push('<li> ' + (c.isvip == 1 ? '<font style="color:#f00">V</font>' : '') + ' <a href="/chapter/' + c.chapterid + '.html">' + c.chaptername + '</a></li>');
                        if (c.chapterid == chapterid) cntjuanid = c.juanid;
                    });
                    str.push('</ul></dd>');
                    $(".menu_list .chapter_classfy").append(str.join(''));

                    $('.chapter_classfy .chapter_juan').click(function () {
                        var cjuan = $(this).attr('juan');
                        if ($(this).find('img').attr('src') == '/content/pic/arr_down.gif') {
                            $(this).find('img').attr('src', '/content/pic/arr_up.gif');
                            $('.chapter_classfy ul[juan=' + cjuan + ']').show(100);
                        } else {
                            $(this).find('img').attr('src', '/content/pic/arr_down.gif');
                            $('.chapter_classfy ul[juan=' + cjuan + ']').hide();
                        }
                    });

                    $('.chapter_classfy').find('a[href="/chapter/' + chapterid + '.html"]').addClass('cntchapter');
                    $('.chapter_classfy .chapter_juan[juan=' + cntjuanid + ']').click();
                });
            } else {
                $('.chapter_classfy').find('a[href="/chapter/' + chapterid + '.html"]').addClass('cntchapter');
            }
        });
    };
    my.GetCookieConfig = function () {
        var _cookieset = Util.cookie("xx_readset");
        var ReadSet = _cookieset.length > 0 ? JSON.parse(_cookieset) : my.ReadSet;
        return ReadSet;
    };
    my.autoscroll = function (ispeed) {
        my.scrolling = true;
        Timer = setInterval(function () {
            my.doScroll();
        }, 200 / parseInt(ispeed));
    };
    my.autostop = function () { clearInterval(Timer); my.scrolling = false; };
    my.doScroll = function () {
        var cp = $(document).scrollTop();
        window.scroll(0, ++cp);
        endPos = $(document).scrollTop();
        if (cp != endPos) {
            my.autostop();
            if (my.ReadSet.autonext == 1) my.GoToNextPage();
        }
    };
    /***************************************************/
    my.ReadConfig = function () {
        var rset = my.GetCookieConfig();
        var bgtext = ['默认', '粉色', '灰色', '亮蓝', '绿色', '浅蓝', '夜间'];
        var s = '\
            <h3>设置您喜欢的阅读方式</h3>\
            <div class="form" item="bgcolor">背景颜色：<span class="color c_default" bgindex="0">默认</span><span class="color c_pink" bgindex="1">粉色</span><span class="color c_gray" bgindex="2">灰色</span><span class="color c_hblue" bgindex="3">亮蓝</span><span class="color c_green" bgindex="4">绿色</span><span class="color c_lblue" bgindex="5">浅蓝</span><span class="color c_night" bgindex="6">夜间</span></div>\
            <div class="form" item="fstyle">正文字体：<span class="fontstyle style_default">楷体</span><span class="fontstyle">宋体</span><span class="fontstyle">雅黑</span><span class="fontstyle">隶书</span></div>\
            <div class="form" item="fsize">字体大小：<span class="btn_minus">-</span><span class="text_input">' + rset.fsize + '</span><span class="btn_plus">+</span></div>\
            <div class="form" item="pwidth">页面宽度：<span class="btn_minus">-</span><span class="text_input">' + rset.pwidth + '</span><span class="btn_plus">+</span></div>\
            <div class="form" item="autop">双击滚屏：<span class="contral_btn"><span class="button button_open" style="display:none;" isopen="1">打开</span> <span class="button button_close" style="display:none;"  isopen="0">关闭</span> </span>滚屏速度：<span class="btn_minus">-</span><span class="text_input">' + rset.speed + '</span><span class="btn_plus">+</span></div>\
            <div class="form"><input type="checkbox" id="mode_auto"><label for="mode_auto">滚屏结束自动翻页</label></div>\
            <div class="form"><span class="btn_save">保存</span><span class="btn_cancel">取消</span></div>\
        ';
        // <div class="form" item="pmode">阅读模式：<input type="radio" id="mode_fy" name="mode" ' + (rset.pmode == 'fy' ? 'checked="checked"' : '') + '  value="fy"><label for="mode_fy" class="label_mode">翻页式 </label><input type="radio" name="mode" id="mode_pbl" ' + (rset.pmode == 'pbl' ? 'checked="checked"' : '') + ' value="pbl"><label for="mode_pbl" class="label_mode">瀑布流 </label></div>\

        $('.set_list').html(s);
        
        
        $('.set_list .form[item=bgcolor] span').eq(rset.bgindex).html('√');
        $('.set_list span.style_default').removeClass('style_default');
        $('.set_list span:contains("' + (rset.fstyle == 'Microsoft YaHei' ? '雅黑' : rset.fstyle) + '")').addClass('style_default');
        $('.set_list .form[item=autop] .contral_btn [isopen=' + rset.auto + ']').siblings().show();
        $('.set_list .form input[id=mode_auto]').attr('checked', rset.autonext == 1 ? 'checked' : false);

        //点击取消
        $('.set_list .btn_cancel').click(function () {
            $(".close_btn").click();
            my.setReader(my.GetCookieConfig());
        });


        //背景色
        $('.set_list .form[item=bgcolor] span').click(function () {
            var obj = $(this);
            var oldindex = $('.set_list span:contains("√")').index();
            $('.set_list .form[item=bgcolor] span').eq(oldindex).html(bgtext[oldindex]);
            obj.html('√');
            rset.bg = $(obj).attr('class').replace('color ', '');
            rset.bgindex = Number($(obj).attr('bgindex'));
            $('#zjcontentdiv').attr('class', rset.bg);
            
        });

        //字体
        $('.set_list .form[item=fstyle] span').click(function () {
            var obj = $(this);
            $('.set_list span.style_default').removeClass('style_default');
            $(obj).addClass('style_default');
            rset.fstyle = $(obj).text() == '雅黑' ? 'Microsoft YaHei' : $(obj).text();
            $('#zjcontentdiv').css({ 'font-family': rset.fstyle });
        });

      
        //字体大小
        $('.set_list .form[item=fsize] span.btn_minus,.set_list .form[item=fsize] span.btn_plus').click(function () {
            var obj = $(this);
            var objname = $(obj).attr('class');
            var isize = parseInt($('.set_list .form[item=fsize] span.text_input').text());
            if (objname == 'btn_minus') {
                if ((isize - 2) < 14) isize = 14;
                else isize -= 2;
            } else {
                if ((isize + 2) > 48) isize = 48;
                else isize += 2;
            }
            $('.set_list .form[item=fsize] span.text_input').html(isize);
            $('#zjcontentdiv').css({ 'font-size': isize });
            rset.fsize = isize;
           
        });
        
        //页面宽度
        $('.set_list .form[item=pwidth] span.btn_minus,.set_list .form[item=pwidth] span.btn_plus').click(function () {
            var obj = $(this);
            var objname = $(obj).attr('class');
            var isize = parseInt($('.set_list .form[item=pwidth] span.text_input').text());
           
            if (objname == 'btn_minus') {
                if ((isize - 160) < 640) isize = 640;
                else isize -= 160;
            } else {
                if ((isize + 160) > 1280) isize = 1280;
                else isize += 160;
            }
            $('.set_list .form[item=pwidth] span.text_input').html(isize);
            rset.pwidth = isize;
            $('#ccon_load,#con_contain,#footer').width(rset.pwidth);
            $("#float_sub_menu").css('margin-left', (rset.pwidth / 2 + 59) * -1);
            $("#float_sub_nav").css('margin-left', (rset.pwidth / 2 - 1));
        });

        //滚屏开关
        $('.set_list .form[item=autop] .contral_btn span').click(function () {
            var obj = $(this);
            var isopen = parseInt($(obj).attr('isopen'));
            $(obj).hide().siblings().show();
            rset.auto = isopen;
            //if (isopen == 1) my.autoscroll(rset.speed);
            //else if (my.scrolling == true) my.autostop();
        });

        //滚屏结束自动翻页
        $('.set_list .form input[id=mode_auto]').click(function () {
            var obj = $(this);
            var isopen = $(obj).attr('checked') ? 1 : 0;
            rset.autonext = isopen;
        });
        //滚屏速度
        $('.set_list .form[item=autop] span.btn_minus,.set_list .form[item=autop] span.btn_plus').click(function () {
            var obj = $(this);
            var objname = $(obj).attr('class');
            var isize = parseInt($('.set_list .form[item=autop] span.text_input').text());
            
            if (objname == 'btn_minus') {
                if ((isize - 1) < 1) isize = 1;
                else isize -= 1;
            } else {
                if ((isize + 1) > 10) isize = 10;
                else isize += 1;
            }
            $('.set_list .form[item=autop] span.text_input').html(isize);
            rset.speed = isize;
            if (rset.auto == 1) {
                if (my.scrolling == true) my.autostop();
                my.autoscroll(rset.speed);
            }
        });
         
        //保存设置
        $('.set_list .btn_save').click(function () {
            Util.writeCookie('xx_readset', JSON.stringify(rset), 365 * 60 * 60 * 24);
            $(".close_btn").click();
            my.setReader(rset);
        });
    };

    /* 设置阅读 */
    my.setReader = function (obj) {
        $('#zjcontentdiv').attr('class', obj.bg);
        $('.set_list .form[item=bgcolor] span').eq(obj.bgindex).html('√');
        $('#zjcontentdiv').css({
            'font-family': obj.fstyle == '雅黑' ? 'Microsoft YaHei' : obj.fstyle,
            'font-size': obj.fsize
        });
        $('#ccon_load,#con_contain,#footer').width(obj.pwidth);
        $("#float_sub_menu").css('margin-left', (obj.pwidth / 2 + 59) * -1);
        $("#float_sub_nav").css('margin-left', (obj.pwidth / 2 - 1));
       
        //if (obj.auto == 1 && my.scrolling==false) {
        //    my.autoscroll(obj.speed);
        //}
    };
})();

ChapterReader.init();