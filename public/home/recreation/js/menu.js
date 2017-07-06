var menu = (function () {
    var i = {};
    i.Init = function () {
     $("#maxall").click(function () {  
         i.Current($("#hotGame"));
         $("#txtIput").val('');
     });
     $(".ulPinyin>li>a").click(function () { i.Current(this); });
     $("#_find").click(function () { i.Find(); });
     $("#txtIput").bind("keydown",function(e){
          if(e.keyCode == 13){ 
            i.Find();
          }return;
       });
       var payUrl = "https://pay.yuewen.com/pc/index?appId=10&areaId=1&userGuid="+guid+"&returnUrl="+encodeURIComponent(location.href);
       $('.userPay').attr('href',payUrl);
    };
    i.Find = function(result){
           var _txt = $.trim(($("#txtIput").val()));
           if(_txt==''){
              $("#txtIput").focus();
              alert("游戏名称不能为空");
              return;
           }
	       	$.post('/Home/Data/searchGamesByKey',{'key':_txt},function(data){
	       		i.Detail(data);
			},'json');
    };
     i.Detail = function(result){
            var html = "";
           if(result.ReturnCode != 0){ 
             html = "亲爱的用户，很遗憾，目前没有找到相关产品。";
           }else  {
              var d = result.ReturnData.data;
              for(var i=0;i<d.length;i++)
              {
                  //http://game.qidian.com/game/game/xxrz16x16.gif
            	  var url = "http://webgame.qidian.com/Game/Index/index?name="+d[i].shortName;
            	  if(d[i].shortName == 'zysd'){
            		  url = "http://cpgame.qd.game.qidian.com/Home/GameServer/lists?name=zysd";
            	  }
                  html+='<li><a target="_blank" href="'+url+'"><img src="http://img.qidian.com/webgame/game/'+d[i].shortName+'16x16.gif" />' + d[i].gameName  + '</a></li>';
              }
           }
          $(".ulPinyin>li>a").attr("class","");
          $(".gamelist").css("display","none");
          $("#gamemore").html(html);
          $("#gamemore").css("display","");
      };
    i.Current = function(e){  
    	  $(".ulPinyin>li>a").attr("class","");
          $(e).attr("class","getcur");
          $(".gamelist").css("display","none");
          $("#" + $(e).attr("id") + "_detail").css("display","");
    };  
    return i;
 })();
