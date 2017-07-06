// JavaScript Document
$(function(){
	
	// close add btn
$("#closeimg").rotate({ 
   bind: 
     { 
        mouseover : function() { 
            $(this).rotate({animateTo:180});
        },
        mouseout : function() { 
            $(this).rotate({animateTo:0});
        }
     } 
   
});
//max nav game list
/*$("#maxall").rotate({ 
  bind: 
     { 
	 	click : function () {
           $("#arrow").rotate({animateTo:91});
        },
		mouseout : function(){ 
            $("#arrow").rotate({animateTo:0});
        }
		
	 }
	});*/
	
	});
