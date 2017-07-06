/// <reference path="jquery.min.js" />
try {
    window.onerror = function () { return true; }
    document.write('<script src="http://read2.xxsy.net/commendclickByJquery.js"></script>');
    
    function AutoShowLi(sid) {
        var li = $(sid).children('li');
        var iRnd = parseInt(Math.random() * (li.length) + 0);
        var newlist = [];
        if (iRnd > 0) {
            for (var i = iRnd; i < li.length; i++) {
                newlist.push(li[i]);
            }
            for (var i = 0; i < iRnd; i++) {
                newlist.push(li[i]);
            }
            $(sid).html(newlist);
        }
    }

    function is_iPad() {
        var ua = navigator.userAgent.toLowerCase();
        if (ua.match(/iPad/i) == "ipad") {
            return true;
        } else {
            return false;
        }
    }

    var _sTime = new Date('2017/05/27 10:00:00');
    var _eTime = new Date('2017/05/31 10:00:00');

    if (thispagename == 'index') {
        /*首页*/

        AutoShowLi('#ql_li'); // 打乱显示顺序 强力推荐
        AutoShowLi('#bjtj_li');//打乱显示顺序 最新上架
        AutoShowLi('#triplet_ancient .txt_list');//
        AutoShowLi('#triplet_modern .txt_list');// 
        AutoShowLi('#triplet_fantasy .txt_list');// 

        if (is_iPad() == true) {
            $('#top_banner').html('<p style="padding:15px;width:953px;font-size:14px;color:#f00;border:1px solid #FFCC00;background-color:#FFEECC;">您正在使用pad访问本站，潇湘书院pad版 ( <a href="http://pad.xxsy.net" target="_self">pad.xxsy.net</a> ) 现已上线，<input type="button" style="height:23px;line-height:23px;padding:5px 5px;font-size:14px;" value="点此进入pad版，体验专为pad用户打造的阅读效果" onclick="javascript:location.href=\'http://pad.xxsy.net\';"</p>');
        } else {
            setTimeout(function () { $('#top_banner').html('<iframe frameborder="0" width="985" height="90" scrolling="no"  src="http://images.xxsy.net/sygg/2014/indextop.html"></iframe>'); }, 200);
        }

        setTimeout(function () { $('#banner').html('<iframe frameborder="0" width="980" height="80" scrolling="no"  src="http://images.xxsy.net/sygg/index_middle_ads.html"></iframe>'); }, 500);

        function addfavorite() {
            if (document.all) {
                window.external.addFavorite('http://www.xxsy.net', '潇湘书院 言情小说');
            }
            else if (window.sidebar) {
                window.sidebar.addPanel('潇湘书院 言情小说', 'http://www.xxsy.net', "");
            }
        }
    }

    if (thispagename == 'search') {
        /*搜索页*/
        //document.write('<script src="http://www.funshion.net.cn/c/js/123_z.js"></script>');
        //var bdloaded = setInterval(function () {
        //    var bdobj = $('div[id=sr_id4xxsy]');
        //    if (bdobj.length > 0) {
        //        bdobj.appendTo($('#search_top_ad'));
        //        clearInterval(bdloaded);
        //    }
        //}, 100);

        setTimeout(function () { $('#search_top_ad').html('<iframe frameborder="0" width="985" height="90" scrolling="no"  src="http://images.xxsy.net/sygg/2014/search_top.html"></iframe>'); }, 100);
        setTimeout(function () { $('#infoleftad_1').html('<iframe frameborder="0" width="250" height="250" scrolling="no"  src="http://images.xxsy.net/sygg/2014/search_left_250_250.html"></iframe>'); }, 300);
        setTimeout(function () { $('#infoleftad_2').html('<iframe frameborder="0" width="250" height="250" scrolling="no"  src="http://images.xxsy.net/sygg/2014/search_left_250_250_2.html"></iframe>'); }, 1000);
    }

    if (thispagename == 'info') {
        /*信息页*/
        $('#infoleftad_1').hide();
        setTimeout(function () {
            var ad_2 = $('#infoleftad_2').clone();
            $('#infoleftad_2').remove();

            var pij = $('#pingjialeftdiv').clone();
            $('#pingjialeftdiv').remove();

            $('#good_order').after(pij).after($(ad_2));
        }, 500);

        _sTime = new Date('2017/05/26 10:00:00');
        _eTime = new Date('2017/05/29 10:00:00');
        
        /*960*90,作品封面页,搜索页顶部横幅*/
        if (new Date() >= _sTime && new Date() < _eTime) {
            $('#info_top_adv_1').html('<a href="http://act.yy.game.qidian.com/Ad/Cpl/index/mark/6e26ead8e11c36ab6aeb096c3b162f42/name/gjjp?mark=23755432da" target="_blank"><img src="http://images.xxsy.net/pic/2017/960-90.jpg" style="border:none;padding-left:10px;" /></a>');
        } else {
            document.write('<script> var cpro_id = "u1457061";</script><script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script>');
            var bdloaded = setInterval(function () {
                var bdobj = $('div[id*=_u1457061_0]');
                if (bdobj.length > 0) {
                    bdobj.appendTo($('#info_top_adv_1'));
                    clearInterval(bdloaded);
                }
            }, 200);
        }

        //setTimeout(function () { $('#info_top_adv_1').html('<iframe frameborder="0" width="985" height="90" scrolling="no"  src="http://images.xxsy.net/sygg/2014/info_top.html"></iframe>'); }, 300);
        setTimeout(function () { $('#infoleftad_2').html('<iframe frameborder="0" width="250" height="250" scrolling="no"  src="http://images.xxsy.net/sygg/2014/catalog_right_250x250_2.html"></iframe>'); }, 400);
        setTimeout(function () { $('#rightad_2').html('<iframe frameborder="0" width="730" height="90" scrolling="no"  src="http://images.xxsy.net/sygg/2014/info_right.html"></iframe>'); }, 500);
        setTimeout(function () { $('#rightad_3').html('<iframe frameborder="0" width="730" height="90" scrolling="no"  src="http://images.xxsy.net/sygg/2014/info_right_2.html"></iframe>'); }, 700);

        // document.write('<script>var cpro_id = "u1441923";</script>');
        // document.write('<script src="http://cpro.baidustatic.com/cpro/ui/f.js" type="text/javascript"></script>');

        /**/
        document.write('<a style="display:none!important" id="tanx-a-mm_17311389_4246970_15464847"></a>');
        tanx_s = document.createElement("script");
        tanx_s.type = "text/javascript";
        tanx_s.charset = "gbk";
        tanx_s.id = "tanx-s-mm_17311389_4246970_15464847";
        tanx_s.async = true;
        tanx_s.src = "http://p.tanx.com/ex?i=mm_17311389_4246970_15464847";
        tanx_h = document.getElementsByTagName("head")[0];
        if (tanx_h) tanx_h.insertBefore(tanx_s, tanx_h.firstChild);


        $('#gift_order').after('<div class="sider_banner" style="margin:0px 0px 5px 0px;"><iframe frameborder="0" width="250" height="250" scrolling="no"  src="http://images.xxsy.net/sygg/2014/catalog_right_250x250.html"></iframe></div>');
    }
    if (thispagename == 'control') {
        /*会员中心*/
        setTimeout(function () { $('#controltopad').html('<iframe frameborder="0" width="980" height="90" scrolling="no"  src="http://images.xxsy.net/sygg/2014/usercontrol_top.html"></iframe>'); }, 700);
        //document.write('<script> var cpro_id = "u1457061";</script><script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script>');
        //var bdloaded = setInterval(function () {
        //    var bdobj = $('div[id*=_u1457061_0]');
        //    if (bdobj.length > 0) {
        //        bdobj.appendTo($('#controltopad'));
        //        clearInterval(bdloaded);
        //    }
        //}, 200);
    }

    if (thispagename == 'login') {
        /*会员登录*/
        //setTimeout(function () { $('#btnbanner').html('<iframe frameborder="0" width="728" height="90" scrolling="no"  src="http://images.xxsy.net/sygg/2014/login_btn.html"></iframe>'); }, 300);
    }
   
    if (thispagename == 'catalog') {
        /*目录页*/
        document.write('<script src="http://www.funshion.net.cn/c/js/123_z.js"></script>');
        var bdloaded = setInterval(function () {
            var bdobj = $('div[id=sr_id4xxsy]');
            if (bdobj.length > 0) {
                bdobj.appendTo($('#bigbanner_1'));
                clearInterval(bdloaded);
            }
        }, 100);

        $('#good_order').before('<div class="sider_banner" style="margin:0px 0px 5px 0px;"><iframe frameborder="0" width="250" height="250" scrolling="no"  src="http://images.xxsy.net/sygg/2014/catalog_right_250x250_2.html"></iframe></div>');
        setTimeout(function () { $('#infoleftad_1').html('<iframe frameborder="0" width="250" height="250" scrolling="no"  src="http://images.xxsy.net/sygg/2014/catalog_right_250x250.html"></iframe>'); }, 200);
        setTimeout(function () { $('#bigbanner_2').html('<iframe frameborder="0" width="728" height="90" scrolling="no"  src="http://images.xxsy.net/sygg/2014/catalog_left.html"></iframe>'); }, 200);
    }

    
     

    if (thispagename == 'detail') {
        /*内容页*/

        document.write('<script src="http://www.funshion.net.cn/c/js/123_z.js"></script>');
        var bdloaded = setInterval(function () {
            var bdobj = $('div[id=sr_id4xxsy]');
            if (bdobj.length > 0) {
                bdobj.appendTo($('#bigbanner_1'));
                clearInterval(bdloaded);
            }
        }, 100);


        var scnt = $('#zjcontentdiv').html();
        var rndad = ['减肥品', '内衣', '女装', '笔记本', '手机', '化妆品', '美容品'];
        var iRnd = parseInt(Math.random() * (7 - 1 + 1) + 0);
    
        setTimeout(function () { $('#bigbanner_2').html('<iframe frameborder="0" width="985" height="250" scrolling="no"  src="http://images.xxsy.net/sygg/2014/detail_btn.html"></iframe>'); }, 500);
        
        if (!document.getElementById('vidioadv')) {
            $('<div id="vidioadv"></div>').appendTo($('#recom_bottom'));
        }

    }
    _sTime = new Date('2017/05/27 10:00:00');
    _eTime = new Date('2017/05/31 10:00:00');
    if (new Date() >= _sTime && new Date() < _eTime ) {

        if (thispagename == 'index' || thispagename == 'info' || thispagename == 'catalog' || thispagename == 'detail') {

            var shtml = '<div onclick="DragonBoat.ShowRP()" style="width:106px;height:127px; position:fixed;cursor:pointer; top:150px;right:120px;z-index:11"><img src="http://images.xxsy.net/pic/2017/smredpackedbg.png" /> </div>';
            document.write(shtml);
            document.write(' <link href="http://hd.xxsy.net/Css/pc/DragonBoatRP.css" rel="stylesheet" />');
            document.write('<script src="http://hd.xxsy.net/Scripts/pc/DragonBoatRP.js?rnd=123421034"></script>');

            shtml = '<script>var options = {\
                showrp: 1,\
                bookid: bookid ? bookid : 0,\
                bookname: bookname ? bookname : ""\
              }  ;DragonBoat.Init(options);</script>';
            document.write(shtml);
            
        }
    }

} catch (e) { }