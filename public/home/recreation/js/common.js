/**
 * 
 */
divselectid ='ujm';
document.domain = "qidian.com";
 String.prototype.format = function(args) {
	    var result = this;
	    if (arguments.length > 0) {    
	        if (arguments.length == 1 && typeof (args) == "object") {
	            for (var key in args) {
	                if(args[key]!=undefined){
	                    var reg = new RegExp("({" + key + "})", "g");
	                    result = result.replace(reg, args[key]);
	                }
	            }
	        }
	        else {
	            for (var i = 0; i < arguments.length; i++) {
	                if (arguments[i] != undefined) {
	                	var reg= new RegExp("({)" + i + "(})", "g");
	                    result = result.replace(reg, arguments[i]);
	                }
	            }
	        }
	    }
	    return result;
	}

 Date.prototype.format = function(format){ 
	 var o = { 
	 "M+" : this.getMonth()+1, //month 
	 "d+" : this.getDate(), //day 
	 "h+" : this.getHours(), //hour 
	 "m+" : this.getMinutes(), //minute 
	 "s+" : this.getSeconds(), //second 
	 "q+" : Math.floor((this.getMonth()+3)/3), //quarter 
	 "S" : this.getMilliseconds() //millisecond 
	 } 

	 if(/(y+)/.test(format)) { 
		 format = format.replace(RegExp.$1, (this.getFullYear()+"").substr(4 - RegExp.$1.length)); 
	 } 

	 for(var k in o) { 
			 if(new RegExp("("+ k +")").test(format)) { 
			 format = format.replace(RegExp.$1, RegExp.$1.length==1 ? o[k] : ("00"+ o[k]).substr((""+ o[k]).length)); 
		 } 
	 } 
	 return format; 
} 

 common = {
		 globalLoginOut : function(){
			 location.href = "http://core.api.yy.game.qidian.com/Home/Login/out?url=" + encodeURIComponent(location.href);
			},
			globalQidianSSO : function(url, arg, callBack){
				 var domscript = document.createElement("script");
			        domscript.src = url + '?' + arg;
			        domscript.type = "text/javascript";
			        domscript.id = 'sso' + Math.random();
			        domscript.onloadDone = false;
			        domscript.onload = function() { domscript.onloadDone = true; if (callBack) try { callBack() } catch (e) { }; };
			        domscript.onreadystatechange = function() {
			            if (('loaded' === domscript.readyState || 'complete' === domscript.readyState) && !domscript.onloadDone) {
			                if (callBack) try { callBack() } catch (e) { };
			                domscript.onloadDone = true;
			            };
			        };
			        document.getElementsByTagName('head')[0].appendChild(domscript);
			},
			checkLoginByCookie : function () {
		        var cookieId = "AUTHTEST";
		        if (window.location.href.toLowerCase().indexOf("qidian.com") > -1) {
		            cookieId = "cmfuToken";
		        }

		        if ((common.GetCookie(cookieId) != null && common.GetCookie(cookieId).length > 0)) {
		            return true;
		        }
		        return false;
		    },
		    checkLoginByYwGuid : function () {
		        var cookieId = "AUTHTEST";
		        if (window.location.href.toLowerCase().indexOf("qidian.com") > -1) {
		            cookieId = "ywguid";
		        }

		        if ((common.GetCookie(cookieId) != null && common.GetCookie(cookieId).length > 0)) {
		            return true;
		        }
		        return false;
		    },
		    GetCookie : function (cookieName) {
		    	
		        var cookieString = document.cookie;
		        var start = cookieString.indexOf(cookieName + '=');
		        // 加上等号的原因是避免在某些 Cookie 的值里有
		        // 与 cookieName 一样的字符串。	
		        if (start == -1) // 找不到
		            return null;

		        start += cookieName.length + 1;
		        var end = cookieString.indexOf(';', start);
		        if (end == -1) return unescape(cookieString.substring(start));
		        return unescape(cookieString.substring(start, end));
		    },
			getCookie2 : function(name)
			{
				document.cookie = "domain=game.qidian.com";
				var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
				if(arr=document.cookie.match(reg))
					return unescape(arr[2]);
				else
					return null;
			}
		 
 }
 
 var getQuery = function(name) {
     var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
     var r = window.location.search.substr(1).match(reg);
     if (r != null) {
         return decodeURIComponent(r[2]);
     }
     else
         return null;
 };
 
 var dateFormat = function(dateString,format) {
	    if(!dateString)return "";
	    var time = new Date(dateString.replace(/-/g,'/').replace(/T|Z/g,' '));
	    var o = {
	        "M+": time.getMonth() + 1, //月份
	        "d+": time.getDate(), //日
	        "h+": time.getHours(), //小时
	        "m+": time.getMinutes(), //分
	        "s+": time.getSeconds(), //秒
	        "q+": Math.floor((time.getMonth() + 3) / 3), //季度
	        "S": time.getMilliseconds() //毫秒
	    };
	    if (/(y+)/.test(format)) format = format.replace(RegExp.$1, (time.getFullYear() + "").substr(4 - RegExp.$1.length));
	    for (var k in o)
	        if (new RegExp("(" + k + ")").test(format)) format = format.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
	    return format;
	}
