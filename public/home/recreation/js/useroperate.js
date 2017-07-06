var userOperate = {
	init : function(){
		var url = "http://webgame.qidian.com";
		$('.topHome').on('click',function(){
			userOperate.setHome(this,url);
		});
		$('.topCollect').on('click',function(){
			userOperate.favorite(this,url,'trading-platform');
		});
		$(".lg").click(function () {
			common.globalLoginOut();
		});
		userOperate.targetUrl();
	},
	favorite : function (title,url,flag){
		var url = "http://webgame.qidian.com";
		var flag = "trading-platform";
		var title = "起点游戏";
		try{
			if ((typeof window.sidebar == 'object') && (typeof window.sidebar.addPanel == 'function'))//Gecko
			{
				window.sidebar.addPanel(title,url,flag);
			}
			else//IE
			{
				window.external.AddFavorite(url,title);
			}
		}catch(e){
			alert('请尝试同时按下键盘Ctrl键和"d"健收藏当前页');
		}
	},
	setHome : function (obj,url){
		try{
			obj.style.behavior='url(#default#homepage)';
			obj.setHomePage(url);
		}
		catch(e){
			try
			{
				netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
			}
			catch (e)
			{
				//alert( "该操作被浏览器拒绝，如果想启用该功能，请在地址栏内输入 about:config,然后将项 signed.applets.codebase_principal_support 值该为true" );
				alert('浏览器不支持当前操作。（请手动进行"设为首页"）');
				return;
			}
			if(confirm("是否将" + url + "设为主页？"))
			{
				var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components. interfaces.nsIPrefBranch);
				prefs.setCharPref('browser.startup.homepage',url);
			}
		}
	},
	hover : function(){
		$('#jump2').show();
	},
	out : function(){
		$('#jump2').hide();
	},
	targetUrl : function(){
		$('.minLogin').on('click',function(){
			location.href = 'https://passport.qidian.com?appid=17&areaid=1&source=webgame&version=1.0&autotime=30&ticket=1&returnurl='+encodeURIComponent(location.href);
		});
		$('.minReg').on('click',function(){
			location.href ='https://passport.qidian.com/reg.html?appid=17&areaid=1&source=webgame&version=1.0&ticket=1&returnurl='+encodeURIComponent(location.href);
		});
	}
};



 