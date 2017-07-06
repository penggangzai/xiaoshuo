<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>账号注册_爱阅读中文网</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{url('images/detail.jpg')}}">
    <link rel="stylesheet" type="text/css" href="{{url('home/register/css/pact.css')}}"/>
</head>
<body>
<div class="wrap">
    <!-- start 头部 -->
    <div class="header reg-header qidian">
        <div class="box-center">
            <div class="logo cf"><img src="{{ url('images/123.png') }}" width="50" height="50"><span class="lang">用户注册</span></div>
        </div>
    </div>
    <!-- end 头部 -->
    <!-- start 整体居中 -->
    <div class="box-center">
        <!-- start 注册模块 -->
        <div class="reg-wrap">
            <!-- start 注册进度 -->
            <div class="reg-step">
                <!-- 步进到哪一步，就给当前span上class：act -->
                <span class="lang act"><i></i>填写注册信息</span>
            </div>
            <div class="reg-form-wrap">
                <form method="post" action="{{url('/home/registe')}}">
                    {{  csrf_field() }}
                    <div class="reg-form-list form-list">
                        <dl>
                            <dd class="top" id="phone"><em>手机号:</em>
                                <input name="phone" class="mid" type="text" placeholder="输入手机号码" id="txtphonenumber">
                            </dd>
                            <dd class="top" id="phone"><em>邮箱:</em>
                                <input name="email" class="mid" type="text" placeholder="输入邮箱号" id="txtphonenumber">
                            </dd>
                            <dd class="top" id="phone"><em>性别:</em>
                                <select name="sex">
                                    <option value="1" selected>&nbsp;&nbsp;男</option>
                                    <option value="2">&nbsp;&nbsp;女</option>
                                </select>
                            </dd>
                            <dd id="phonepwd"><em>密码:</em>
                                <input name="pwd" type="password" id="txtphonepwd" placeholder="6-18位大小写字母、符号或数字">
                            </dd>
                            <dd id="password2"><em>确认密码:</em>
                                <input name="password" type="password" id="txtphonepwd2" placeholder="再次输入密码">
                            </dd>
                        </dl>
                        <div class="deal">
                            <input type="checkbox" id="deal" name="checkbox" checked>
                            <label for="deal" class="ui-checkbox"></label><label for="deal">我已阅读并同意</label><a
                                    href="https://passport.yuewen.com/pact.html?mobile=0" target="_blank">《用户服务协议》</a>
                        </div>
                        <input id="btnPhoneRegister" class="red-btn go-reg" name="" type="submit" value="提交"
                               class="text-but">
                        <a class="blue switch-reg stat" data-stat="qd_L10|切换成邮箱注册|3"
                           href="reg.html?appid=10&areaid=1&target=iframe&ticket=1&auto=1&autotime=30&returnUrl=http%3A%2F%2Fwww.qidian.com&type=2">切换成邮箱注册</a>
                    </div>
                </form>
            </div>
            <!-- end 注册进度 -->
        </div>
        <!-- end 注册模块 -->
    </div>
    <!-- end 整体居中 -->
    <script src="Maasvlakte2/public/js/jquery-1.9.1.min.js"></script>
    <script src="Maasvlakte2/public/js/checkbox.js"></script>
    <script src="Maasvlakte2/public/js/jquery.cookie.js"></script>
    <script src="Maasvlakte2/public/js/yuewenauth.js"></script>
    <script src='Maasvlakte2/public/js/phoneareasortnew.js'></script>
    <script src="Maasvlakte2/public/js/register_v1.js"></script>
    <script src="Maasvlakte2/public/js/select.js"></script>
    <script>
        var QRegister = new QRegister({
            "appId": 10,
            "areaId": 1,
            "auto": 1,
            "autoTime": 30,
            "source": "",
            "version": "1",
            "format": "jsonp",
            "method": "",
            "ticket": "1",
            "target": "iframe",
            "backUrl": "http:\/\/www.qidian.com",
            "tab": "",
            "apiUrl": "https:\/\/ptlogin.qidian.com",
            "queryString": "appid=10&areaid=1&target=iframe&ticket=1&auto=1&autotime=30&returnUrl=http%3A%2F%2Fwww.qidian.com",
            "type": 1,
            "from": "qidian",
            "isNeedShowYanbaPop": false,
            "ajaxdm": "",
            "loginUrl": "login.html?appid=10&areaid=1&target=iframe&ticket=1&auto=1&autotime=30&returnUrl=http%3A%2F%2Fwww.qidian.com"
        });
        QRegister.force = 1;
        QRegister.showCaptcha();

    </script>

    <div class="footer">
        <div class="link">
            <a href="//www.qidian.com/about/intro" target="_blank">关于起点</a>
            <a href="//www.qidian.com/about/contact" target="_blank">联系我们</a>
            <a href="http://join.book.qq.com/index.html" target="_blank">加入我们</a>
            <a href="http://kf.qidian.com/Default.aspx" target="_blank">客服中心</a>
            <a href="http://bbs.qidian.com/list/53" target="_blank">提交建议</a>
            <a href="http://wwwploy.qidian.com/help/about_link.aspx" target="_blank">合作伙伴</a>
            <a href="http://www.qidian.com/helpcenter/default.aspx" target="_blank">使用指南</a>
            <a href="http://bbs.qidian.com" target="_blank">起点论坛</a>
            <a href="http://shop.qidian.com/Index.aspx" target="_blank">起点商城</a>
        </div>
        <p>Copyright (C) 2002-2016 www.qidian.com All Right Reserved版权所有 上海玄霆娱乐信息科技有限公司</p>
        <p>上海玄霆娱乐信息科技有限公司 增值电信业务经营许可证沪B2-20080046 沪网文[2012]0068-008 新出网证（沪）字010 沪ICP备08017520号-1</p>
        <p>请所有作者发布作品时务必遵守国家互联网信息管理办法规定，我们拒绝任何色情小说，一经发现，即作删除！客服电话：010-59357051</p>
        <p>本站所收录作品、社区话题、书库评论及本站所做之广告均属个人行为，与本站立场无关</p>
        <div class="safety-box">
            <div class="safety-img dib-wrap">
                <a class="site1" href="http://www.pdxa.cn/Welcome.Asp?Id=3101151112" target="_blank"></a><a
                        class="site2"
                        href="http://www.sgs.gov.cn/lz/licenseLink.do?method=licenceView&amp;entyId=20111011181417625"
                        target="_blank"></a><a class="site3" href="http://www.cyberpolice.cn/wfjb"
                                               target="_blank"></a><a class="site4"
                                                                      href="https://ss.knet.cn/verifyseal.dll?sn=e12120411010037414000000&amp;pa=090993"
                                                                      target="_blank"></a><a class="site5"
                                                                                             href="http://www.shjbzx.cn"
                                                                                             target="_blank"></a><a
                        class="site6" href="http://www.12377.cn/node_548446.htm" target="_blank"></a><a class="site7"
                                                                                                        href="http://www.12377.cn/"
                                                                                                        target="_blank"></a>
            </div>
            <p>起点正积极配合国家最新发布的《关于办理侵犯知识产权刑事案件适用法律若干问题的意见》，</p>
            <p>采用刑事手段进行严厉打击盗版，目前相关公安机关已经抓获犯罪嫌疑人15名！正告盗版网站立即停止侵权行为！</p>
        </div>
    </div>
</div>
@if(!empty(session('error')))
    <script>
        alert('{{session('error')}}');
    </script>
@endif
<script src="Maasvlakte2/public/js/report.js"></script>
<script src="Maasvlakte2/public/js/stat.js"></script>
<script>
    $(function () {
        Stat.init();
    });
</script>
</body>
</html>
