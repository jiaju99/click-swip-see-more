/*
flbase.js
通用函数
*/

var baseurl='http://feilong.org/m/woread/';


//jsonp 跨域通用函数
function fl_jsonp(flserverurl,fldatapage,fl_beforesend,fl_success,fl_fail,fl_done){
$.ajax({
async:false,
url:flserverurl,
type:'get',
dataType: 'jsonp',
data: fldatapage,
timeout: 50000,
jsonp:'flfnis',
//jsonpCallback: 'fl_fnabc',
contentType: 'application/jsonp; charset=utf-8',
beforeSend: fl_beforesend, 
success: fl_success
}).fail(fl_fail).done(fl_done);
}/*0.5*/


/*显示返回数据组通用函数 */
function flobjlis(objs,what){
var lis=new Array(),li;
$.each(objs,function(i,obj){
var li=flobjli(obj,what);
lis[i]=li;
});
lis=lis.join("\n");
return lis;
}	/*0.5*/


/*20150317-feilong.org*/
