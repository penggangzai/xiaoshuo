// JavaScript Document
$(document).ready(function(){

//问卷调查
$(".amount").click(function(){
	   $(this).addClass("radioCur");
	   $(this).siblings().removeClass("radioCur")
	})
//mygame
$(".mypop").hover(function() {
	$(this).animate({"top": "0"}, 400, "swing");
},function() {
	$(this).stop(true,false).animate({"top": "-64px"}, 400, "swing");
});
	
//home game  list
$(".hgamePop").hover(function() {
	$(this).animate({"top": "0"}, 400, "swing");
},function() {
	$(this).stop(true,false).animate({"top": "-125px"}, 600, "swing");
});
//top min  gamelist

var navLi=$(".topGameAll");
	navLi.mouseover(function () {
		$(this).find(".minall").addClass("listcur");
		$(this).find(".topList").show();
	})
	navLi.mouseleave(function(){
		$(this).find(".minall").removeClass("listcur");
		$(this).find(".topList").hide();
	})


//14.12.22 body max add close 
$('.addclose').click(function(){
	$(this).hide();
	$('.maxaddbg').hide();
	$('body').addClass("bodybg");
	
});
//nav max gamelist

$("#maxall").click(function(){
	$("#navGameList").slideToggle();
	});
$("#closeGlist").click(function(){
	$("#navGameList").slideUp();
	});

//channel

	var freeLi=$(".navLi li");
	freeLi.mouseover(function () {
		$(this).find(".free").addClass("navcur");
		$(this).find(".channel").slideDown();
	})
	freeLi.mouseleave(function(){
		$(this).find(".free").removeClass("navcur");
		$(this).find(".channel").slideUp();
	})
//2015.01.12
$(".navgift").mouseover(function(){
	$(this).addClass("navcur");	
	$(this).find(".channel").slideDown();
	}).mouseleave(function(){
	$(this).removeClass("navcur");	
	$(this).find(".channel").slideUp();
});

//2015.01.27
/* $("#Mymoney").mouseover(function(){
	$(this).find(".MoneyInfo").show();
	}).mouseleave(function(){
	$(this).find(".MoneyInfo").hide();
});  */
//
jQuery('.moreServer a,.questionnaire dl dd a,.rightBtn a').mouseenter(function(){
	jQuery(this).stop().fadeTo('slow',0.8);
}).mouseleave(function(){
	jQuery(this).stop().fadeTo('slow',1);
});


//�ͷ���ά��
$(function () {
	var navLi=$("#codebox");
	navLi.mouseover(function () {
		if($(document.body).width() < 1366){
			$(this).find(".kfcode").addClass("codecur");
			$(this).find(".codeInfoBox").show();
		}else{
			$(".codeInfoBox").addClass("RcodBox");
			$(this).find(".codeInfoBox").show();
			$(this).find(".kfcode").addClass("codecur");
			}
	})
	navLi.mouseleave(function(){
		$(this).find(".kfcode").removeClass("codecur");
		$(this).find(".codeInfoBox").hide();
		$(".codeInfoBox").removeClass("RcodBox");
	})
})

$('.kfback').click(function(event){$('html, body').animate({scrollTop:0}, 800);	});

//右下角广��?
	$("#dbclose").click(function(){
		 $("#botAddBox").animate({
				bottom:'-275px'
			  },"30000");
	});
	//�����ر�
	$(".lclosebtn").click(function(){
		 $(".dlleft").animate({
				left:'-110px'
			  },"30000");
			   $(".dlright").animate({
				right:'-110px'
			  },"30000");
	});
	$(".rclosebtn").click(function(){
		 $(".dlright").animate({
				right:'-110px'
			  },"30000");
			   $(".dlleft").animate({
				left:'-110px'
			  },"30000");
	});


// 由于不兼容JQ 1.11
// 放弃对IE6的支持

// if ($.browser.msie && ($.browser.version == "6.0") && !$.support.style) {

//  $("#dbclose").click(function(){
// 		 $("#botAddBox").css("display","none")
// 	});
// }

});

//加入收藏
function AddFavorite(sURL, sTitle) {
	try {
		if(window.sidebar){
			//for Firefox
			window.sidebar.addPanel(sTitle, sURL, "");
		}else if(window.external){
			//for IE
			window.external.AddFavorite(sURL, sTitle);
		}else if(window.opera && window.print){
			// for opera
			return true;
		}else{
			alert("加入收藏夹失败，请使用Ctrl+D进行添加.");
		}
	} catch (e) {
		alert("加入收藏夹失败，请使用Ctrl+D进行添加.");
	}
}
//设置首页
function SetHome(obj,vrl){
        try{
                obj.style.behavior='url(#default#homepage)';obj.setHomePage(vrl);
        }
        catch(e){
                if(window.netscape) {
                        try {
                                netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
                        }
                        catch (e) {
                                alert("此操作被浏览器拒绝！\n请在浏览器地址栏输��? 'about:config' 并回车\n然后��? [signed.applets.codebase_principal_support]的值设置为'true',双击即可��?");
                        }
                        var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components.interfaces.nsIPrefBranch);
                        prefs.setCharPref('browser.startup.homepage',vrl);
                 }
        }
}

//弹出隐藏��?
function Show(show_div,bg_div){
   document.getElementById(show_div).style.display='block';
   document.getElementById(bg_div).style.display='block' ;
};
//关闭弹出��?
function Close(show_div,bg_div)
{
    document.getElementById(show_div).style.display='none';
    document.getElementById(bg_div).style.display='none';
};

 //12.12 ���½ǹ���Ч��
	function testJsStop(){    
	  setTimeout(function(){
	    $("#popMaxPic").hide();
		$(".minAddBot").show();
		$("#dbclose").addClass("minCloseAdd");
		$("#botAddBox").addClass("minBotAddBox");
	  },8000)
	}    
	testJsStop();
	$(document).ready(function(){
		$(".minAddBot").click(function(){
			 $("#popMaxPic").css("display","block");
			 $(".minAddBot").hide();	
			$("#dbclose").removeClass("minCloseAdd");
			$("#botAddBox").removeClass("minBotAddBox");
			testJsStop();
		});
	});

