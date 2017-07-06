<!DOCTYPE html>
<html>
<head>
    <meta charset=UTF-8>
    <title> 起点游戏平台_阅文集团旗下网站</title>

    <link rel="stylesheet" type="text/css" href="{{asset('home/recreation/css/gamecommer.css')}}"/>
    <script type="text/javascript" src="{{asset('home/recreation/js/jquery-1.11.1.min.js')}}">

    </script>
    <script type="text/javascript" src="{{asset('home/recreation/js/common.js')}}">

    </script>
    <script type="text/javascript" src="{{asset('home/recreation/js/ad.js')}}">

    </script>
    <script type="text/javascript">
        document.domain = "qidian.com";
        var gameLog = '';
        var guid = '-1';
    </script>
</head>
<body><!--  topnav  star  -->
<script type='text/javascript' src='Maasvlakte2/public/js/342ca1768b2f4b37a8cf7294a51d971e.js' charset="UTF-8"></script>
<!--  topnav  end  -->
<div class="maxadd"><!--  header  star  -->
    <meta charset="UTF-8"><!--  member、banner  star  -->
    <div class="contBox mgtp1">
        <div class="contCent"><!--  left  star  -->
            <div class="contLeft"><!-- open service star  -->
                <div class="recentOpenBox">
                    <script type="text/javascript"
                            src="Maasvlakte2/public/js/0d2ba11118854cc1a60e8a8a80c4f0dd.js"></script>
                </div><!-- open service end  --><!--  minadd star  -->
                <div class="leftAdd mgtp1"><a
                            href=""
                            target="_blank" class="qd_game_key" data-aid="qd_Y03" data-game-key="244x125"
                            style="border:none; outline:0;cursor:pointer;">
                        <img width="244px" height="125px" style="cursor:pointer;" src="{{asset('home/recreation/picture/20170503160959wtzubglj5o.jpg')}}"></a>
                </div><!--  minadd send  --><!--	-->
                <div class="questionnaire mgtp1">
                    <div class="title juanTitle">
                        问卷调查
                    </div>
                    <dl id="vote"></dl>
                </div>
            </div><!--  left  end  --><!--  right  star  -->
            <div class="contRight">
                <div class="title jpgameTitle">精品游戏</div>
                <div class="homeGanmeList">
                    @foreach ($data as $v)
                    <dl>
                        <dt><cite class='stateIco gamehot'></cite><img
                                    src="{{ url($v->img) }}" style="width:220px;height:125px;">
                        </dt>
                        <dd><span><em>0</em><i>.0</i></span>
                            <p><a target="_blank"
                                  href="{{$v->domain}}">{{$v->name}}</a></p>
                            <cite><a target="_blank"
                                                                  href="{{$v->domain}}"
                                                                  class="goweb">官网</a><a target="_blank"
                                                                                         href=""
                                                                                         class="getgift">礼包</a></cite>
                        </dd>
                    </dl>
                    @endforeach
                </div>
            </div><!--  right  end  --></div>
    </div><!-- content  end  -->
    <div class="contBox mgtp1">
        <div class="contCent">
            <div class="homeLink">
                <div class="title linkTitle">
                    友情链接
                </div>
                <a target="_blank" href="/Home/Other/link" class="linkmore">+更多</a>
                <div class="linkBox"><a target="_blank" href="http://kaifu.qq.com/">腾讯新服表</a><a target="_blank"
                                                                                                href="http://www.07073.com/">07073页游网</a><a
                            target="_blank" href="http://www.265g.com/">265G</a><a target="_blank"
                                                                                   href="http://www.yeyou.com/">17173</a><a
                            target="_blank" href="http://www.969g.com/">969G网页游戏</a><a target="_blank"
                                                                                       href="http://web.ali213.net/">游侠网页游戏</a><a
                            target="_blank" href="http://www.40407.com/">40407网页游戏门户</a><a target="_blank"
                                                                                           href="http://www.eeyy.com/">一游网</a><a
                            target="_blank" href="http://www.cwan.com/">中国玩家网</a><a target="_blank"
                                                                                    href="http://www.youyy.com/">766网页游戏</a><a
                            target="_blank" href="http://ka.sina.com.cn/">新浪新手卡</a><a target="_blank"
                                                                                      href="http://www.juxia.com/">聚侠网页游戏</a><a
                            target="_blank" href="http://www.521g.com/">521G开服表</a><a target="_blank"
                                                                                      href="http://www.323g.com/">323G网页游戏</a><a
                            target="_blank" href="http://www.9k9k.com/">9k9k开服网</a><a target="_blank"
                                                                                      href="http://web.bfyx.com/">北方游戏网</a><a
                            target="_blank" href="http://www.7mgame.com/">齐名游戏</a><a target="_blank"
                                                                                     href="http://www.8864.com">8864游戏平台</a><a
                            target="_blank" href="http://www.duouoo.com/">多游网</a></div>
            </div>
        </div>
    </div><!-- 问卷调查提交 -->
    <div class="overlay" id="popfade"></div>
    <div class="showQuestion" id="question">
        <dl class="QtiTle">
            <dt><span>提交</span>问卷</dt>
            <dd><a href="javascript:Close('question','popfade');" title="关闭"><img
                            src="Maasvlakte2/public/picture/qclose.png" id="Qclose"/></a></dd>
        </dl>
        <div class="QinfoTip"><p><img src="Maasvlakte2/public/picture/qtip.png"/><span id="msg"></span></p></div>
        <div class="rightBtn"><a href="javascript:Close('question','popfade');">确&nbsp;&nbsp;认</a></div>
    </div><!-- 问卷调查结果 -->
    <div class="showQuestion" id="Qresult">
        <dl class="QtiTle">
            <dt><span>结果</span>问卷</dt>
            <dd><a href="javascript:Close('Qresult','popfade');" title="关闭"><img
                            src="Maasvlakte2/public/picture/qclose.png" id="Qclose1"/></a></dd>
        </dl>
        <div class="QinfoTip" id="_resultDetail"></div>
        <div class="rightBtn"><a href="javascript:Close('Qresult','popfade');">确&nbsp;&nbsp;认</a></div>
    </div>
    <script type="text/javascript" src="Maasvlakte2/public/js/vote.js"></script>
    <script type="text/javascript" src="Maasvlakte2/public/js/lastestlogin.js"></script>
    <script type="text/javascript" src="Maasvlakte2/public/js/index.js"></script>
    <script type="text/javascript" src="Maasvlakte2/public/js/user.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            vote.Init();
            user.init();
            index.init();

        });
    </script><!--  footer  star -->
    <meta charset="UTF-8">
    <div class="footerBox">
        <div class="f_site"><a class="site1" href="http://www.pdxa.cn/Welcome.Asp?Id=3101151112" target="_blank"></a><a
                    class="site2"
                    href="http://www.sgs.gov.cn/lz/licenseLink.do?method=licenceView&amp;entyId=20111011181417625"
                    target="_blank"></a><a class="site3" href="http://www.cyberpolice.cn/wfjb" target="_blank"></a><a
                    class="site4" href="https://ss.knet.cn/verifyseal.dll?sn=e12120411010037414000000&amp;pa=090993"
                    target="_blank"></a><a class="site5" href="http://www.shjbzx.cn" target="_blank"></a><a
                    class="site6" href="http://www.12377.cn/node_548446.htm" target="_blank"></a><a class="site8"
                                                                                                    href="http://sq.ccm.gov.cn/ccnt/sczr/login"
                                                                                                    target="_blank"></a>
        </div>
        <div class="f_notice">
            <div class="fn_cont"><p class="fnc_text"><em>健康游戏公告</em><i>|</i><span>抵制不良游戏 | 拒绝盗版游戏</span><span>注意自我保护 | 谨防受骗上当</span><span>适度游戏益脑 | 沉迷游戏伤身</span><span>合理安排时间 | 享受健康生活</span>
                </p>
                <div class="fnc_btns"><a href="http://webgame.qidian.com/jiazhang.html" target="_blank" title="家长监护工程">家长监护工程</a><a
                            href="http://webgame.qidian.com/Home/User/wallow" target="_blank"
                            title="防沉迷信息填补">防沉迷信息填补</a><a href="http://webgame.qidian.com/Home/User/wallow"
                                                          target="_blank" title="实名信息填补入口">实名信息填补入口</a></div>
            </div>
        </div>
        <div class="f_info">
            <div class="fi_cont"><p>上海玄霆娱乐信息科技有限公司 增值电信业务经营许可证沪B2-20080046 文网文[2008]149号</p>
                <p>软著登字第1190408号 沪新出科数[2016]329号 文网游备字〔2016〕Ｗ-RPG 5612 号 <a
                            href="http://static.game.qidian.com/others/xtyl/index.html" target="_blank">
                        沪网文[2015]0081-031</a></p>
                <p>Copyright 2004-2017 All rights reserved.</p></div>
        </div>
    </div><!--  footer  end --><!--  custom 	star  -->
    <meta charset="UTF-8">
    <div class="customBox">
        <ul>
            <li><a target="_blank" href="http://vip.game.qidian.com" class="kfvip"><i></i><span>VIP福利</span></a></li>
            <li id="codebox"><a href="javascript:;" class="kfcode"><i></i><span>扫码关注</span></a>
                <div class="codeInfoBox">
                    <dl>
                        <dt>微信公众平台</dt>
                        <dd><img src="Maasvlakte2/public/picture/20150701100029gvyjvolbjz.jpg">
                            <p>
                                微信号：game_qd</p>订阅，领取独享礼包
                        </dd>
                    </dl>
                    <dl>
                        <dt>关注微博</dt>
                        <dd><img src="Maasvlakte2/public/picture/201507011000208o73jfckcn.jpg">
                            <p><a target="_blank" href=" http://weibo.com/qdgame">进入微博</a></p></dd>
                    </dl>
                </div>
            </li>
            <li><a target="_blank" href="/Customer/Index/index" class="kfservice "><i></i><span>客服中心</span></a></li>
            <li><a href="javascript:;" class="kfback"><i></i></a></li>
        </ul>
    </div><!--  custom 	end  -->
    <meta charset="UTF-8"><!-- 背景光告  --><!-- head min add-->
    <div class="maxaddbg">
        <div class="picPostion">
            <div class="addPic" id="maxaddbg"><a
                        href="http://act.yy.game.qidian.com/Home/ScoreAct/index?qd_game_key=1920x700Home&qd_dd_p1=qd_Y01"
                        target="_blank" class="qd_game_key" data-aid="qd_Y01" data-game-key="1920x700Home"
                        style="border:none; outline:0;cursor:pointer;"><img width='1920px' height='700px'
                                                                            style="cursor:pointer;"
                                                                            src="Maasvlakte2/public/picture/20170623154925yi8wed1pfw.jpg"></a>
            </div>
        </div>
    </div><!-- 底部右下角广告 -->
</div>
<script type="text/javascript" src="Maasvlakte2/public/js/jquery.rotate.min.js"></script>
<script type="text/javascript" src="Maasvlakte2/public/js/jquery.banner.js"></script>
<script type="text/javascript" src="Maasvlakte2/public/js/addrotate.js"></script>
<script type="text/javascript" src="Maasvlakte2/public/js/recommendgame.js"></script>
<script type="text/javascript" src="Maasvlakte2/public/js/public.js"></script>
<script type="text/javascript" src="Maasvlakte2/public/js/homejq.js"></script>
<script type="text/javascript" src="Maasvlakte2/public/js/useroperate.js"></script>
<script type="text/javascript" src="Maasvlakte2/public/js/menu.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        userOperate.init();
        menu.Init();
        ad.init();
    });
</script>
<script type="text/javascript" src="Maasvlakte2/public/js/9b05eff3ff294a00962dd355bd075744.js" charset="UTF-8"></script>
</body>
</html>