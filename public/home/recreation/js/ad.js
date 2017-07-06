var ad = (function() {
	var i = {};
	i.init =  function(){
		i.preview();
		i.click();
	};	
   i.createSender = function (url) {
        var img = new Image();
        img.onload = img.onerror = function () {
            img = null;
        };
        img.src = url;
	};
	i.preview = function(){
		var currentUrl = encodeURIComponent(location.href);
		var uid = i.getId();
		var url = "http://path.book.qq.com/qreport?path=gmrawlog&pid=qd_P_game&ltype=P&url="+currentUrl+"&uid="+uid;
		i.createSender(url);
		return;
	};
	i.click = function(){
		var currentUrl = encodeURIComponent(location.href);
		var uid = i.getId();
		$('.qd_game_key').on('click',function(){
			//http://path.book.qq.com/qreport?path=gmrawlog&pid=qd_P_game&eid=qd_Y01&game_key=3310X160&ltype=A/P&uid=123456
			var eid = $(this).attr('data-aid');
			var game_key = $(this).attr('data-game-key');
			var url = "http://path.book.qq.com/qreport?path=gmrawlog&pid=qd_P_game&ltype=A&url="+currentUrl+"&uid="+uid+"&eid="+eid+"&game_key="+game_key;
			i.createSender(url);
			return;
		});
	};
	i.getId = function(){
		var key = "game_stat_datacenter_uid";
		var uid = i.getCookie(key);
		if(uid){
			return uid;
		}
		uid = i.generateRand();
		var dt = new Date();   
		dt.setMinutes(dt.getMinutes() + 60 * 24 * 365 * 10 );   
		document.cookie= key+"="+uid+";domain=webgame.qidian.com;path=/;expires=" + dt.toGMTString();   
		return uid;
	};
	i.getCookie = function(name){
		document.cookie = "domain=webgame.qidian.com";
		var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
		if(arr=document.cookie.match(reg))
			return unescape(arr[2]);
		else
			return null;
	};
	i.generateRand = function(){
		   	//48-57是数字
		   	//97-122是字母
	   		var chaArr=new Array();
	   		for(var i=0;i<28;i++){
	   			var ranAsc=Math.floor(Math.random()*25)+97;
	   			if(ranAsc!=105&&ranAsc!=108&&ranAsc!=111){
	   				var ranChar =String.fromCharCode(ranAsc);
	   				chaArr.push(ranChar);
	   			}
	   		}
	   		var rand = chaArr.join("");
	   	//	console.info(rand);
	   		return rand;
	   };
	   return i;
})();


