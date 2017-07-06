var vote = (function() {
	var i = {};
	i.Init = function() {
		i.getVote();
	};
	i.Vote = function(id) {
		var optionNo = $("input[type=radio][name='voteName']:checked").val();
		if (optionNo == undefined) {
			$("#msg").html('请选择后进行提交！');
			Show('question', 'popfade');
			return;
		}
		// var optionNo = options.val();
		var cook = common.getCookie2('game_vote');
		if (cook != null || cook != undefined) {
			$("#msg").html('已经投票成功，不能重复投票！');
			Show('question', 'popfade');
			return;
		}
		$.post('/Home/Index/doVote',{'questionNo':id,'optionNo':optionNo},function(data){
			if(data && data["ReturnCode"] == 0){
				$("#msg").html('投票成功，感谢您的参与！');
			}else {
				$("#msg").html(data['ReturnMessage']);
			}
			Show('question', 'popfade');
		},'json');
	};
	i.result = function(questionNo) {
		$.post('/Home/Index/result',{'questionNo':questionNo},function(data){
			if(data && data["ReturnCode"] == 0){
				var d = data['ReturnData']['data'];
				var total = data['ReturnData']['total'];
				var dt = '<dt><h1>{0}<i>{1}({2}%)</i></h1></dt><dd><span style="width: {2}%"></span></dd>';
				var lbs = "";
				for ( var i = 0 ; i < d.length; i++) {
					lbs += dt.format(d[i]['questionName'],d[i]['hit'],parseInt(d[i]['hit']/total * 100));
				}
				$('#_resultDetail').html('<dl>'+lbs+'</dl>');
				Show('Qresult', 'popfade')
			}else{
				Show('Qresult', 'popfade')
			}
		},'json');
	};
	i.getVote = function(){
		$.post('/Home/Index/vote',{'gameId':'2wscde'},function(data){
			if(data && data["ReturnCode"] == 0){
				var d = data['ReturnData']['data'];
				var dt = ' <dt title='+d['question']+'><span>Q</span>'+d['question']+'</dt>';
				var dd = '<dd>{0}<a id="submit" href="javascript:" onclick="vote.Vote('+d['id']+')" class="Qsubmit">提交</a><a id="result" href="javascript:" onclick="vote.result('+d['id']+')" class="Qresult">查看结果</a></dd>';
				var label = ' <label class="amount" title="{0}"><input type="radio" name="voteName" value="{1}"/>{0}</label>';
				var lbs = "";
			    var answers = $.parseJSON(d['answer']);  
				for ( var i = 0 ; i < answers.length; i++) {
					lbs += label.format(answers[i],i+1);
				}
				var html = dt + dd.format(lbs);
				$('#vote').html(html);
			}
		},'json');
	};
	return i;
})();