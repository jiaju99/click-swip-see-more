<?php
header('Content-Type: application/json; charset=utf-8');

function fl_get_currurl(){
$pageurl='http';if(isset($_SERVER['HTTPS'])&&($_SERVER['HTTPS']=='on')){$pageurl.='s';}
$pageurl.='://';
if($_SERVER['SERVER_PORT'] != '80'){
$pageurl.= $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
}else{
$pageurl.= $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
}
return $pageurl;
}

//根据客户端传来的参数，获取url上jquery 随机生成的函数名: jQuery1910861577213442264_1426600251734
$passurl=fl_get_currurl();$x=$_GET['flfnis'];


/*
 id="more1" data-url="server/seemore.php?ac=seemore&obj=comm&list=hot" data-pageto="1"
*/
$obj=$_GET['obj'];$list=$_GET['list'];$paged=$_GET['pageto'];


/*然后存储处理相关数据 略 */


if($obj=='book'){

/*此为服务端处理后的即将返回到客户端的 json数据 */
$books='[{
"bookid":"321", "booktit":"爱在<b class=\"emp\">成都</b>市","bookavg":"skin/bookface.jpg",

"bookdesc":"我是书籍的简介1文本一般精简哦",
"starsidx":"2",

"authorid":"80","authorname":"杨炸炸",

"readuid":"90","readmobi":"13533584286",

"readpercent":"14%","readate":"3小时前",

"notenum":"25","notedate":"2分钟前",

"buydate":"2015-02-12"

},{
"bookid":"321", "booktit":"希望<b class=\"emp\">成都</b>","bookavg":"skin/bookface.jpg",

"bookdesc":"我是书籍的简介文本2一般精简哦",
"starsidx":"2",

"authorid":"80","authorname":"杨炸炸",

"readuid":"90","readmobi":"13533584286",

"readpercent":"14%","readate":"3小时前",

"notenum":"25","notedate":"2分钟前",

"buydate":"2015-02-12"

},{
"bookid":"321", "booktit":"北京到<b class=\"emp\">成都</b>","bookavg":"skin/bookface.jpg",


"bookdesc":"我是书籍的简介文本一般3精简哦",
"starsidx":"3",

"authorid":"80","authorname":"杨炸炸",

"readuid":"90","readmobi":"13533584286",

"readpercent":"14%","readate":"3小时前",

"notenum":"25","notedate":"2分钟前",

"buydate":"2015-02-12"

}

]';

$y='{"jsonurl":"'.$passurl.'",
"obj":"'.$obj.'","paged":"'.$paged.'","maxpage":"4",
"objects":'.$books.',
"saved":"yes"}';

}






if($obj=='commtest'){

/*此为服务端处理后的即将返回到客户端的 json数据 */
$comms='[{"commid":"abc'.$paged.'"}]';

$y='{"jsonurl":"'.$passurl.'",
"obj":"'.$obj.'","paged":"'.$paged.'","maxpage":"5",
"objects":'.$comms.',
"saved":"yes"}';

}



if($obj=='comm'){

/*此为服务端处理后的即将返回到客户端的 json数据 */
$comms='[{"commid":"43","iduser":"90","urluser":"user.html","avguser":"skin/singer.jpg","nameuser":"黄秋生","commtxt":"说的很有道理 我竟无言以对","starnow":"2","starnum":"565","cmbkdesc":"第一时间了解最新《瑞丽时尚先锋》的精彩内容,参与杂志活动,潮流之旅、时尚先锋夜都在等你时尚先锋夜都在等你时尚先锋夜都在等你时尚先锋夜都在等你时尚先锋夜都在等你!","cmbkimg":"skin/top1.jpg","cmbktit":"2015时尚先锋","cmbkauthor":"柳传志","commdate":"5小时前","ibadonum":"52","igoodonum":"43","bookid":"321","upc":"1","dnc":"0"},
{"commid":"29","iduser":"80","urluser":"user.html","avguser":"skin/singer.jpg","nameuser":"黄秋生","commtxt":"说的很有道理 我竟无言以对","starnow":"2","starnum":"565","cmbkdesc":"第一时间了解最新《瑞丽时尚先锋》的精彩内容,参与杂志活动,潮流之旅、时尚先锋夜都在等你时尚先锋夜都在等你时尚先锋夜都在等你时尚先锋夜都在等你时尚先锋夜都在等你!","cmbkimg":"skin/top1.jpg","cmbktit":"2015时尚先锋","cmbkauthor":"柳传志","commdate":"5小时前","ibadonum":"52","igoodonum":"43","bookid":"123","upc":"0","dnc":"0"}]';

$y='{"jsonurl":"'.$passurl.'",
"obj":"'.$obj.'","paged":"'.$paged.'","maxpage":"5",
"objects":'.$comms.',
"saved":"yes"}';

}



if($obj=='note'){

/*此为服务端处理后的即将返回到客户端的 json数据 */
$notes='[{
"noteid":"112","notedate":"4分钟前",
"bookid":"321","bookzjid":"99","bookzjtit":"第五章：时间隧道","bookciteid":"39033321","bookcite":"情与情总是牵心的心与心总是关心总是关情都是情的。不论男人或女人。",
"noteuid":"90","saidtxt":"这一段我很喜欢"
},{
"noteid":"111","notedate":"10分钟前",
"bookid":"321","bookzjid":"90","bookzjtit":"第四章：难忘时刻","bookciteid":"39033321","bookcite":"万水千山总是情。",
"noteuid":"90","saidtxt":"哈哈这是老歌曲了。"
}]';

$y='{"jsonurl":"'.$passurl.'",
"obj":"'.$obj.'","paged":"'.$paged.'","maxpage":"3",
"objects":'.$notes.',
"saved":"yes"}';

}


if($obj=='news'){
	
/*此为服务端处理后的即将返回到客户端的 json数据 */
$newses='[
{"newsid":"23","urlfx":"faxian-news.html","facefx":"skin/facefx.jpg",
"titfx":"如清风拂过花瓣，一梦很多年","txtfx":"说起这赠送给胡个拍摄计划，还要回到四年前，相处五年的女朋友提出结婚。","metafx":"爱情",

"faved":"yes","faveuid":"90"},


{"newsid":"24","urlfx":"faxian-news.html","facefx":"skin/facefx.jpg",
"titfx":"如清风拂过花瓣，一梦很多年","txtfx":"说起这赠送给胡个拍摄计划，还要回到四年前，相处五年的女朋友提出结婚。","metafx":"佛家",

"faved":"no","faveuid":"90"}

]';




$y='{"jsonurl":"'.$passurl.'",
"obj":"'.$obj.'","paged":"'.$paged.'","maxpage":"3",
"objects":'.$newses.',
"saved":"yes"}';

}




if($obj=='app'){
	
/*此为服务端处理后的即将返回到客户端的 json数据 */
$apps='[
{"appid":"55","appico":"skin/app.png","apptit":"APP标题",
"appdesc":"app描述查最靠谱的书影音评分",
"apphref":"url/to/app12345.apk",

"downed":"no","downuid":"90"},


{"appid":"55","appico":"skin/app.png","apptit":"APP标题",
"appdesc":"app描述查最靠谱的书影音评分",
"apphref":"url/to/app12345.apk",

"downed":"no","downuid":"90"}

]';

$y='{"jsonurl":"'.$passurl.'",
"obj":"'.$obj.'","paged":"'.$paged.'","maxpage":"3",
"objects":'.$apps.',
"saved":"yes"}';

}




if($obj=='huodong'){

/*此为服务端处理后的即将返回到客户端的 json数据 */
$huodongs='[{
"hdid":"112","hddate":"2014-09-12",
"hdtit":"六一儿童节好书推荐活动",
"hdavg":"skin/banfx.jpg",
"hdnum":"90"
},{
"hdid":"112","hddate":"2014-09-12",
"hdtit":"六一儿童节好书推荐活动",
"hdavg":"skin/banfx.jpg",
"hdnum":"90"
},
{
"hdid":"112","hddate":"2014-09-12",
"hdtit":"六一儿童节好书推荐活动",
"hdavg":"skin/banfx.jpg",
"hdnum":"90"
},{
"hdid":"112","hddate":"2014-09-12",
"hdtit":"六一儿童节好书推荐活动",
"hdavg":"skin/banfx.jpg",
"hdnum":"90"
},
{
"hdid":"112","hddate":"2014-09-12",
"hdtit":"六一儿童节好书推荐活动",
"hdavg":"skin/banfx.jpg",
"hdnum":"90"
},{
"hdid":"112","hddate":"2014-09-12",
"hdtit":"六一儿童节好书推荐活动",
"hdavg":"skin/banfx.jpg",
"hdnum":"90"
}]';

$y='{"jsonurl":"'.$passurl.'",
"obj":"'.$obj.'","paged":"'.$paged.'","maxpage":"3",
"objects":'.$huodongs.',
"saved":"yes"}';

}





if($obj=='cat'){

/*此为服务端处理后的即将返回到客户端的 json数据 */
$cats='[{
"catid":"112","catname":"人文社科",
"catdesc":"这个类别的说明描述文本",
"catavg":"skin/facefx.jpg",
"catnum":"920"
},{
"catid":"122","catname":"文学",
"catdesc":"这个类别的说明描述文本",
"catavg":"skin/facefx.jpg",
"catn，um":"190"
},{
"catid":"132","catname":"人文社科",
"catdesc":"这个类别的说明描述文本",
"catavg":"skin/facefx.jpg",
"catnum":"490"
},{
"catid":"142","catname":"经济",
"catdesc":"这个类别的说明描述文本",
"catavg":"skin/facefx.jpg",
"catnum":"960"
}]';

$y='{"jsonurl":"'.$passurl.'",
"obj":"'.$obj.'","paged":"'.$paged.'","maxpage":"4",
"objects":'.$cats.',
"saved":"yes"}';

}

$y=$y?$y:'{"jsonurl":"'.$passurl.'","paged":"1","maxpage":"0","saved":"none"}';

/*打印一下字符串: jQuery1910861577213442264_1426600251734({"name":"feilong","age":"30"});  */
echo $x.'('.$y.');';

?>
