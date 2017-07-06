var lastestLogin = (function () {
    var i = {};
//    i.Init = function () {
//          $("#login").click(function () {
//            if (!checkLoginByCookie()) {
//               //  Snda.OALoginNew('top');
//               window.location.href='http://game.qidian.com/Login/Login.aspx?url='+encodeURIComponent(location.href)
//                 return false;
//            }
//        });
//        $("#logout").click(function () {
//            GlobalBtn_SdoLoginOut(); 
//        });
//    };

    i.Next = function(){
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
    };
        
    return i;
})();