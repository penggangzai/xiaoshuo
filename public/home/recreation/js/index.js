var index  = {
	init : function(){
		index.recentOpen();
	},	
	recentOpen :  function(){
		 if ($("#servalue").val() == "1") {
		        $('#severInfo').css({ top: '0px' });
		        $('#moreNext').text('查看下一页');
		    };
		    function moreNext() {
		        $("#severInfo").css({ top: '-352px' });
		        $('#moreNext').text('查看上一页');
		        $("#servalue").val("352");
		    };
		    function morePre() {
		        $('#severInfo').css({ top: '0px' });
		        $('#moreNext').text('查看下一页');
		        $("#servalue").val("1");
		    };
		    $('#moreNext').bind('click', function() {
		        if ($("#servalue").val() == "352") {
		            morePre();
		        } else {
		            moreNext();
		        }
		    }) 
	}
};
