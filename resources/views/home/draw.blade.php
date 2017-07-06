<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>jQuery实现多宫格抽奖转盘代码</title>
<style type="text/css">
#lottery{width:574px;height:584px;margin:20px auto 0;background:url({{asset('imagess/bg.jpg')}}) no-repeat;padding:50px 55px;}
#lottery table td{width:142px;height:142px;text-align:center;vertical-align:middle;font-size:24px;color:#333;font-index:-999}
#lottery table td a{width:284px;height:284px;line-height:150px;display:block;text-decoration:none;}
#lottery table td.active{background-color:#ea0000;}
</style>
</head>
<body>
<div id="lottery">
	<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td class="lottery-unit lottery-unit-0"><img src="{{asset('imagess/1.png')}}"></td>
			<td class="lottery-unit lottery-unit-1"><img src="{{asset('imagess/2.png')}}"></td>
			<td class="lottery-unit lottery-unit-2"><img src="{{asset('imagess/4.png')}}"></td>
            <td class="lottery-unit lottery-unit-3"><img src="{{asset('imagess/3.png')}}"></td>
		</tr>
		<tr>
			<td class="lottery-unit lottery-unit-11"><img src="{{asset('imagess/7.png')}}"></td>
			<td colspan="2" rowspan="2"><a href=""></a></td>
			<td class="lottery-unit lottery-unit-4"><img src="{{asset('imagess/5.png')}}"></td>
		</tr>
		<tr>
			<td class="lottery-unit lottery-unit-10"><img src="{{asset('imagess/1.png')}}"></td>
			<td class="lottery-unit lottery-unit-5"><img src="{{asset('imagess/6.png')}}"></td>
		</tr>
        <tr>
			<td class="lottery-unit lottery-unit-9"><img src="{{asset('imagess/3.png')}}"></td>
			<td class="lottery-unit lottery-unit-8"><img src="{{asset('imagess/6.png')}}"></td>
			<td class="lottery-unit lottery-unit-7"><img src="{{asset('imagess/8.png')}}"></td>
            <td class="lottery-unit lottery-unit-6"><img src="{{asset('imagess/7.png')}}"></td>
		</tr>
	</table>
</div>
<script type="text/javascript" src="{{asset('js/jquery-1.8.3.min.js')}}"></script>
<script type="text/javascript">
var lottery={
	index:-1,	//当前转动到哪个位置，起点位置
	count:0,	//总共有多少个位置
	timer:0,	//setTimeout的ID，用clearTimeout清除
	speed:20,	//初始转动速度
	times:0,	//转动次数
	cycle:50,	//转动基本次数：即至少需要转动多少次再进入抽奖环节
	prize:-1,	//中奖位置
	init:function(id){
		if ($("#"+id).find(".lottery-unit").length>0) {
			$lottery = $("#"+id);
			$units = $lottery.find(".lottery-unit");
			this.obj = $lottery;
			this.count = $units.length;
			$lottery.find(".lottery-unit-"+this.index).addClass("active");
		};
	},
	roll:function(){
		var index = this.index;
		var count = this.count;
		var lottery = this.obj;
		$(lottery).find(".lottery-unit-"+index).removeClass("active");
		index += 1;
		if (index>count-1) {
			index = 0;
		};
		$(lottery).find(".lottery-unit-"+index).addClass("active");
		this.index=index;
		return false;
	},
	stop:function(index){
		this.prize=index;
		return false;
	}
};
function roll(){
	lottery.times += 1;
	lottery.roll();
	if (lottery.times > lottery.cycle+10 && lottery.prize==lottery.index) {
		clearTimeout(lottery.timer);
		lottery.prize=-1;
		lottery.times=0;
		click=false;
	}else{
		if (lottery.times<lottery.cycle) {
			lottery.speed -= 10;
		}else if(lottery.times==lottery.cycle) {
			var index = Math.random()*(lottery.count)|0;
			lottery.prize = index;		
		}else{
			if (lottery.times > lottery.cycle+10 && ((lottery.prize==0 && lottery.index==7) || lottery.prize==lottery.index+1)) {
				lottery.speed += 110;
			}else{
				lottery.speed += 20;
			}
		}
		if (lottery.speed<40) {
			lottery.speed=40;
		};
		//console.log(lottery.times+'^^^^^^'+lottery.speed+'^^^^^^^'+lottery.prize);
		lottery.timer = setTimeout(roll,lottery.speed);
	}
	return false;
}
if 
var click=false;
window.onload=function(){
	lottery.init('lottery');
	$("#lottery a").click(function(){
		if(click) {
			return false;
		}else{
			lottery.speed=100;
			roll();
			click=true;
			return false;
		}
	});
};
</script>
</body>
</html>