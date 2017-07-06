<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>账号登录 | 起点中文网_起点中文网_阅文集团旗下网站</title>
    <link rel="stylesheet" type="text/css" href="{{url('home/login/css/pact.css')}}"/>
<body>
<div class="wrap">
    <!-- start 头部 -->
    <div class="header ">
        <div class="box-center">
            <div class="logo"><img src="{{url('images/detail.jpg')}}" width="50"; height="50";></div>
        </div>
    </div>
    <!-- end 头部 -->

    <!-- start 整体居中 -->
    <div class="box-center">
        <!-- start 登录区块 -->
        <div class="login-area-wrap cf">
            <!-- start 运营图 -->
            <div class="login-op-img fl">
                <img src="{{url('home/login/picture/loginbg.jpg')}}" alt="起点登录">
            </div>
            <!-- end 运营图 -->

            <!-- start 登录区 -->
            <div class="login-wrap fl">
                <!-- start 登录切换 -->
                <div class="login-tab cf">
                    <ul>
                        <li class="act stat" tab="qidian" data-stat="qd_L01|账号登录|1">账号登录</li>
                    </ul>
                </div>
                <!-- end 登录切换 -->

                <!-- start 登录切换容器 -->
                <div class="login-switch-wrap" id="j_loginSwitchWrap">
                    <!-- start 起点登录 -->
                    <div class="qd-login login-box ">
                        <!-- start 普通登录 -->
                        <form method="post" action="{{url('/home/loginn')}}">
                            {{  csrf_field() }}
                            <div class="normal-login" id="j_normalLogin">
                                <div class="error-tip hidden"></div>
                                <ul>
                                    <li><em class="iconfont"></em><input name="phone" type="text" tabindex="1" placeholder="手机号" id="username"></li>
                                    <li><em class="iconfont"></em><input name="pwd" type="password" tabindex="2" id="password" placeholder="密码"></li>
                                </ul>
                                <div class="auto-login-box cf">
                                    <div class="link fr">
                                        <a href="{{url('/Secret/Zaohui')}}" target="_blank" id="forgetPsw">忘记密码</a>
                                        <em></em>
                                        <a href="{{url('/home/entry')}}"
                                           target="_blank" id="regQd">免费注册</a>
                                    </div>
                                    <input type="checkbox" id="autologin" tabindex="3" name="checkbox">
                                    <label for="autologin" class="ui-checkbox stat" data-stat="qd_L04|勾选自动登录|2"
                                           data-off-stat="qd_L05|取消自动登录|2"></label><label for="autologin">自动登录</label>
                                </div>
                                <input class="red-btn go-login btnLogin login-button" name="" type="submit" value="登 录" class="text-but">
                            </div>
                        </form>
                        <!-- end 普通登录 -->
                    </div>
                    <!-- end 起点登录 -->
                </div>
                <!-- end 登录切换容器 -->
            </div>
            <!-- end 登录区 -->
        </div>
        <!-- end 登录区块 -->
    </div>
    <!-- end 整体居中 -->

    <!-- start 页脚 -->
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
    </div>    <!-- end 页脚 -->
</div>
@if(!empty(session('error')))
    <script>
        alert('{{session('error')}}');
    </script>
@endif
</body>
</html>