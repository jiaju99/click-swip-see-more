/*
flupmore.js
点击或向上提，翻页功能。
*/


var wrap=$('.wrap');
$('<p class="loadinfo" style="display:none;"></p>').appendTo(wrap);
var loadinfo=$('.loadinfo');//全局定量
var gotp=1;//全局定量




/*1个模块，或2个以上全显示模块.*/
function fl_load1(n,hua){
for (var i=1;i<=n;i++){
var to=$('#more'+i),where=$('#morefu'+i),area=wrap;//局部变量

/*打开页面，每个模块显示第1页,准备第2页. */
fl_outputp(to,where,0);

/*是否需要滑？在每个模块的可滑动区域内滑动，显示接下来的第(N+1)页.一般采用追加方式.*/
if(hua){fl_swipetp(to,where,0,area,0);}

}
}
/*0.5*/




/*有2个以上切换模块.
 tab模式异cot: same=0,curr=1. 使用：
	fltabtogs('.wrap','.navfx a','.comms','tab');
	fl_load2(2,0,1);
	
	或alt模式同cot: same=1,curr=1 使用：
	fltabtogs('.wrap','.navfx a','','tab');
	fl_load2(2,1,1);
	
	k:默认显示第几个.
	*/
function fl_load2(n,same,k){
for (var i=1;i<=n;i++){
var to=$('#more'+i),where=$('#morefu'+i),area=wrap;//局部变量
if(same){where=$('#morefu1');}

/*打开页面，默认显示第几个选项卡.一般是第1个 */
if(i==k){fl_outputp(to,where,0);}

/*点击谁，就显示谁*/
fl_clicktp(to,where,same);

/*在可滑动区域内滑动，显示接下来的第(N+1)页.一般采用追加方式. 必须curr=1 */
fl_swipetp(to,where,0,area,1);

}
}
/*0.5*/





/*子函数准备*/
function fl_beforetp(){loadinfo.html('<i class="icw iw2 iload"></i>loading....').show();}
function fl_failtp(){loadinfo.html('加载失败').show().fadeOut(800);}
function fl_donetp(){gotp=1;}
function fl_endtp(where){loadinfo.html('加载完毕').show().fadeOut(800);where.find('.nextstep').removeClass('hide');gotp=1;}




/*在未指定条件，输出某一页，准备下一页。
only:
1覆盖模式(覆盖显示第1页,准备第2页) 
0追加模式(追加显示指定页，准备下一页)*/
function fl_outputp(to,where,only){

/*发送的数据收集*/
var pageto=parseFloat(to.attr('data-pageto'));
var maxpg=parseFloat(to.attr('data-maxpg')),torequest=(maxpg>=pageto)||!maxpg;
var dataurl=to.attr('data-url'),serverurl=baseurl+dataurl;
if(only){pageto=1;torequest=1;}

		/*成功则处理返回结果*/
		var hdr0=function(result){
				//console.log(result);
				console.log('torequestpageto'+pageto+'='+torequest+'='+result.jsonurl);
				var allpage=parseFloat(result.maxpage),ispage=parseFloat(result.paged);
				
				if(allpage&&(allpage>=ispage)){
					to.attr('data-maxpg',allpage).attr('data-pageto',pageto+1);
				/*组装数据字符串*/
				var what=to.attr('data-what'),lis=flobjlis(result.objects,what);
				/*追加或覆盖数据到页面指定位置*/
				if(only){$(where).html('');}
				$(lis).appendTo(where);loadinfo.fadeOut(800);
				}else if(!allpage){
					var notip=to.attr('data-notip');loadinfo.html(notip).show();
				}else{fl_endtp(where);
				}
				
		};
//console.log('torequestpageto'+pageto+'='+torequest);
if(torequest){
	to.attr('data-pageto',pageto+1);fl_jsonp(serverurl,'pageto='+pageto,fl_beforetp,hdr0,fl_failtp,fl_donetp);}else{fl_endtp(where);}

}/*0.5*/







//点击始发地，只输出第1页,准备下一页
function fl_clicktp(to,where,only){
to.click(function(){/*console.log(to.attr('id'));*/
fl_outputp(to,where,only);
});
}/*0.5*/





/*滑动(swipe)某区域（area）时，(只)输出某一页，准备下一页.
curr: 是否检查to.curr,以便确定谁(to.curr)来响应滑动显示数据.*/
function fl_swipetp(to,where,only,area,curr){
area.on('swipe',function(ev){
	if(ev.direction=='up'){
  if(curr){if(to.hasClass('now')){
			console.log(to.attr('id'));
		fl_bartp(to,where,only,area);}}else{fl_bartp(to,where,only,area);}
 }
});
}/*0.5*/



function fl_bartp(to,where,only,area){
			
				/*检测此区域(比如.wrap,必须有高度，内容溢出滚动)的滚动条状态*/
				var box=area.eq(0)[0].clientHeight;/*容器有多高*/
				var cot=area.eq(0)[0].scrollHeight;/*内部有多高;*/
				var gunall=cot-box;/*共需滚动多高*/
				var guned=area.scrollTop();/*已滚动了多高*/
				var gunleft=gunall-guned; /*剩下需滚动多高*/
				//如果页面已滚动到底部.或者根本不需要滚动 
				if((gunleft<=0)&&gotp){gotp=0;/*短时间内即使条件符合也只让执行一次*/
				/*console.log('gunleft/gunall='+gunleft+'/'+gunall);*/
				fl_outputp(to,where,only);
				
}
}/*0.5*/


/*20150317-feilong.org*/
