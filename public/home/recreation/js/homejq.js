// JavaScript Document


function settab ( i ){ selecttab(i);}
  function selecttab ( i ){
	  switch(i){
		  case 1:
		  document.getElementById("TabCon1").style.display="block";
		  document.getElementById("TabCon2").style.display="none";
		  document.getElementById("TabCon3").style.display="none";
		  break;
		  
		  case 2:
		  document.getElementById("TabCon1").style.display="none";
		  document.getElementById("TabCon2").style.display="block";
		  document.getElementById("TabCon3").style.display="none";
		  break;

		  case 3:
		  document.getElementById("TabCon1").style.display="none";
		  document.getElementById("TabCon2").style.display="none";
		  document.getElementById("TabCon3").style.display="block";
		  break;
		  }
	  }
  $(function(){
		$("#monthGame").xslider({
			unitdisplayed:3,
			movelength:3,
			unitlen:296,
			autoscroll:null
			});
		$("#adaptGame").xslider({
			unitdisplayed:3,
			movelength:3,
			unitlen:296,
			autoscroll:null
			});
	  });	
$(document).ready(function(){


//Ωπµ„Õº
$('#minPic .thumb a').each(function(i) {
	$(this).addClass( 'itm'+i );
	$(this).click(function() {
		$('#homeslide').trigger( 'slideTo', [i, 0, true] );
		return false;
	});
});
$('#minPic a.itm0').addClass( 'pichover' );

$('#homeslide').carouFredSel({
	direction: 'left',
	circular: true,
	infinite: false,
	items: 1,
	auto: true,
	scroll: {
		fx: 'directscroll',
		onBefore: function() {
			var pos = $(this).triggerHandler( 'currentPosition' );
			$('#minPic a').removeClass( 'pichover' );
			$('#minPic a.itm'+pos).addClass( 'pichover' );
			var page = Math.floor( pos / 4 );
			$('#minPic').trigger( 'slideToPage', page );
		}
	}
});
$('#minPic').carouFredSel({
	direction: 'left',
	circular: true,
	infinite: false,
	items: 4,
	align: false,
	auto: false,
	prev: '#prev',
	next: '#next'
});
});