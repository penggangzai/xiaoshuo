var user = {
	loginlog : null,
	c : function(text){
//			console.log(text);
	},
	init : function(g){
		this.getLoginLog();
		this.getUserBalance();

//		this.getTodayOpen();
//		this.initHtml();
		$("#Mymoney").mouseover(function(){
			$(this).find(".MoneyInfo").show();
		}).mouseleave(function(){
			$(this).find(".MoneyInfo").hide();
		});
		this.getUserExp();
	},
	getUserBalance : function(){
		$.post('/Home/OutResource/userBalance',{'gameId':'4rfvcde3'},function(data){
			if(data && data["ReturnCode"] == 0){
				var d = data["ReturnData"]['data'];
				$('#total').html(d['balance']);
				$('#qdb').html(d['chargeTotal']);
				$('#yxb').html(d['game']);
				//$('#zb').html(d['free']);
			}
		},'json');
	},
	getUserExp : function(){
		$.post('/Home/OutResource/userExp',{'gameId':'4rfvcde3'},function(data){
			if(data && data["ReturnCode"] == 0){
				var d = data["ReturnData"]['data'];
				if(d){
					$('#exp').html("经验值： "+d);
				}
			}else{
				$('#exp').html("经验值： "+0);
			}
		},'json');
	},
	getTodayOpen : function(){
		$.post('/Home/OutResource/todayOpen',{'gameId':'4rfvcde3'},function(data){
			user.c(data);
			if(data && data["ReturnCode"] == 0){
				var d = data["ReturnData"];
				user.initTodayOpen(d);
			}
		},'json');
	},
	initTodayOpen : function (data){
		var d = data['data'];
		var li = ' <li><img src="http://img.qidian.com/webgame/game/{0}16x16.gif"><b><a target="_blank" title="{1}" href="http://webgame.qidian.com/Game/Index/index/name/{0}">{1}</a></b><em><a target="_blank" title="{2}" href="{3}">{2}</a></em><i><a target="_blank" href="http://webgame.qidian.com/Home/Other/code/shortName/{0}">礼包</a></i></li>';
		var a = "http://cpgame.qd.game.qidian.com/Home/GameServer/lists?name={0}";
		var b = window.location.href.split("?")[0]+"?name={0}";
		var lis = "";
		for (var i in d) {
			var loingUrl = d[i].login_url;
			s = a.format(d[i].game_short);
			if(loingUrl && loingUrl.indexOf('http') ){
				s = b.format(d[i].game_short);
			}
			var l = li.format(d[i].game_short,d[i].game_name,d[i].site_name,s);
			lis += l;
		}
		$('.minOpenList').find('ul').html(lis);
		var date = new Date();
		if(data.type == 2){//近期开服
			$('.dayopen').addClass('newRecom');
			var d1 = d[0].open_datatime.replace(/-/,"/");
			var d2 = d1.replace(/-/,"/");
			date = new Date(d2);
		}
		var m = date.getMonth()+1;
		var day = date.getDate();
		$('.minDate').find("h1").html(m+"月");
		$('.minDate').find("h2").html(day);
	},

	getLoginLog : function(){
		var logs = gameLog;//common.getCookie2('game_logs');//common.GetCookie('game_logs');
		if(logs != null && logs != ""){
			var lg = $.parseJSON(logs);
			user.initLoginLog(lg);
			return;
		}else{
			$.post('/Home/OutResource/userLoginLog',{'gameId':'4rfvcde3'},function(data){
				user.c(data);
				if(data && data["ReturnCode"] == 0){
					user.initLoginLog(data['ReturnData']['data']);
				}
			},'json');
		}
	},
	initLoginLog : function(data,type){
		var a ='<li class="group" id="mylist_{0}" style="display: {5};"><img src="http://img.qidian.com/webgame/game/{1}16x16.gif" ><b>'+
			'<a target="_blank" href="http://webgame.qidian.com/Game/Index/index?name={1}">{2}</a></b><em> {3}</em><i>'+
			'<a target="_blank" href="{4}">进入游戏</a></i></li>';
		var as = "";
		for (var i = 0 ; i < data.length && i < 8; i++) {
			var dis = i < 3 ? "block" : "none";
			var tp =  "http://cpgame.qd.game.qidian.com/Home/GameServer/lists?name={0}";
			t = tp.format(data[i].shortName);
			var al = a.format(parseInt(i)+1,data[i].shortName,data[i].gameName,data[i].serverName,t,dis);
			as += al;
		}
		$("#_total").val(data.length);
		$('#_loginList').html(as);
	},
	loginLogNext : function(){//分页
		var _current = parseInt($("#_current").val());
		var _total = $("#_total").val();
		var _size = 3;
		var _pageCount = _total % _size == 0 ? parseInt(_total / _size) : parseInt(_total / _size) + 1;
		$('.group').css('display','none');
		if  (_current == _pageCount )_current = 0 ;
		if(_current<_pageCount){
			for(var i = _current * _size +1 ; i <= (_current+1) * _size; i ++){
				$("#mylist_"+i).css('display','block');
			}
			$("#_current").val(_current+1);
		}
	}
};
