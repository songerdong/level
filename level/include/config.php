<?php
if (!defined('ROOT')) exit('Can\'t Access !'); 
return array (
'dbhost'=>'localhost',	// 数据库服务器
'dbuser'=>'root',	// 数据库用户名
'dbpassword'=>'root',	// 数据库密码
'dbname'=>'fenxiao_level',	// 数据库名
'tablepre'=>'sinbegin_', //数据库前缀
'dbconn'=>'conn',  //数据库连接标示
'pconnect'=>false,	//是否持久连接
'charset'=>'utf8', //数据库编码
"error"=>"1", //是否开启报错
"rebug"=>"1", //是否调试
'openfile'=>'1', //
'uploadpath'=>'upload', //附件路径
"filesize"=>"2048", //附件大小限制
"filetype"=>".gif|.jpg|.png|.jpeg", //附件扩展名
"filecount"=>"8", //批量上传个数
"mustcode"=>"1",
"rewrite"=>"0",
"sitepath"=>"/",
"cookiedomain"=>"w.com",
"template_dir"=>"default",
"paytype"=>array('tenpaybank','alipay','tenpay','99bill','chinabank','yeepay','allinpay'),
"tenpaybank"=>array('1002','1003','1005','1020','1052','1001','1009','1027','1008','1006','1022','1004','1032','1010','1021','1025','1024','1028'),
"allinpaybank"=>array('allinpay_cmb','allinpay_icbc','allinpay_ccb','allinpay_abc','allinpay_cmbc','allinpay_spdb','allinpay_cgb','allinpay_cib','allinpay_ceb','allinpay_comm','allinpay_boc','allinpay_citic','allinpay_bos','allinpay_pingan','allinpay_psbc'),
"chinabank0"=>array('1025','3080','105','103','104','301','311','309','305','306','307','314','313','312','316','3230','324','302','310','326','342','335','336'),
"chinabank1"=>array('1027','308','1054','106','3112','3051','3121','3231','3241','303','3261','301','309','307','334'),
//} 

//basic-基本设置{
"siteurl"=>"/", //{title=网站目录}{prompt=一般情况下不建议修改。}{type=input}{values=[<1><开启>][<0><关闭>]}{option=class="skey"}{unit=}
"sitename"=>"慈妙容", //{title=网站名称}{prompt=网站的名称。}{type=input}{values=[<1><开启>][<0><关闭>]}{option=class="skey"}{unit=}
"sitedomain"=>"http://www.huijixingfu.com", //{title=网站域名}{prompt=网站的名称，前面带http://。}{type=input}{values=}{option=class="skey"}{unit=}
"siteicp"=>"滇ICP备14002100号-3", //{title=备案号码}{prompt=}{type=input}{values=}{option=class="skey""}{unit=}
"adminemail"=>"web@huijixingfu.com", //{title=管理邮箱}{prompt=错误接收邮箱，非常重要。}{type=input}{values=}{option=class="skey"}{unit=}
"siteaddress"=>"云南省昆明市西山区大商园A栋2号", //{title=公司地址}{prompt=}{type=input}{values=}{option=class="skey""}{unit=}
"sitephone"=>"15887835880", //{title=客服电话}{prompt=}{type=input}{values=}{option=class="skey""}{unit=}
"kefu"=>"309091579|充值帮助,250502000|制度交流,891150520|婚恋交友", //{title=在线客服}{prompt=在线QQ客服，每个以“,”隔开，QQ号码与名称之间以“|”隔开。例：100929369|系统购买,28908722|售后服务。}{type=textarea}{values=}{option=class="textarea1" cols="40" rows="5"}{unit=}
//}

//show-显示设置{
"closed"=>"0", //{title=关闭前台}{prompt=}{type=radio}{values=[<1><是>][<0><否>]}{option=}{unit=}
"closemsg"=>"升级维护中，预计1小时候可以访问。", //{title=关闭原因}{prompt=网站关闭提示信息。}{type=textarea}{values=}{option=class="textarea1" cols="40" rows="5"}{unit=}
"pagetitle"=>"汇集幸福", //{title=网站标题}{prompt=网站首页标题，title标签}{type=input}{values=}{option=class="skey"}{unit=}
"keywords"=>"汇集幸福,事业平台,创业平台,幸福平台", //{title=网站关键}{prompt=每个之间以“,”隔开。}{type=input}{values=}{option=class="skey"}{unit=}
"description"=>"汇集幸福是一个大型互联网创业平台，贯穿交友婚恋服务，社交服务，软件开发服务等的大型社交创业平台", //{title=网站描述}{prompt=搜索引擎抓取到的网站的描述。}{type=textarea}{values=}{option=class="textarea1" cols="40" rows="5"}{unit=}
"adminpagesize"=>"20", //{title=后台分页}{prompt=}{type=input}{values=}{option=class="skey"}{unit=}
"pagesize"=>"10", //{title=前台分页}{prompt=}{type=input}{values=}{option=class="skey"}{unit=}
"express"=>"金币充值,邮票充值,会员充值,积分充值", //{title=发货快递}{prompt=发货快递，每个以“,”隔开。}{type=textarea}{values=}{option=class="textarea1" cols="40" rows="5"}{unit=}
//}

//email-邮件设置{
"mailsend"=>"1", //{title=邮件发送方式}{prompt=}{type=select}{values=[<1><使用sendmail发送(推荐此方式)>][<0><使用socket连接服务器发送>]}{option=style="width:324px;"}{unit=}
"mailserver"=>"smtp.qq.com", //{title=SMTP服务器}{prompt=}{type=input}{values=}{option=class="skey"}{unit=}	
"mailport"=>"25", //{title=SMTP端口}{prompt=默认为 25}{type=input}{values=}{option=class="skey" style="width:60px;"}{unit=}	
"mailauth"=>"1", //{title=要求身份验证}{prompt=}{type=radio}{values=[<1><是>][<0><否>]}{option=}{unit=}	
"mailfrom"=>"", //{title=发信人地址}{prompt=}{type=input}{values=}{option=class="skey"}{unit=}	
"mailusername"=>"", //{title=SMTP用户名}{prompt=}{type=input}{values=}{option=class="skey"}{unit=}	
"mailpassword"=>"", //{title=SMTP密码}{prompt=}{type=password}{values=}{option=class="skey"}{unit=}	
//}

//pay-支付配置{

"tenpay"=>"2012242083", //{title=财付通商户号}{prompt=财付通商户号}{type=input}{values=}{option=class="skey"}{unit=}
"tenpayname"=>"王洋", //{title=姓名}{prompt=姓名}{type=input}{values=}{option=class="skey"}{unit=}		

"alipay"=>"adddn@163.com", //{title=支付宝帐户}{prompt=您登陆支付宝使用的账户}{type=input}{values=}{option=class="skey"}{unit=}	
"alipayname"=>"王洋", //{title=姓名}{prompt=姓名}{type=input}{values=}{option=class="skey"}{unit=}

"v_mid"=>"20122223322323", //{title=银行卡号}{prompt=您登陆网银在线使用的账户}{type=input}{values=}{option=class="skey"}{unit=}	
"chinabankname"=>"汪洋", //{title=账户姓名}{prompt=账户姓名}{type=input}{values=}{option=class="skey"}{unit=}
"chinabankaddress"=>"小店区", //{title=开户行地址}{prompt=开户行地址}{type=input}{values=}{option=class="skey"}{unit=}

//}
//user-用户设置{
"cookie"=>"0", //{title=储存方式}{prompt=设置登录信息储存方式，一般cookie}{type=radio}{values=[<1><Cookie>][<0><Session>]}{option=}{unit=}
"managertime"=>"3600", //{title=后台失效}{prompt=以秒为单位，如一个小时为3600秒}{type=input}{values=}{option=class="skey"}{unit=}	
"membertime"=>"3600", //{title=前台失效}{prompt=以秒为单位，如一个小时为3600秒}{type=input}{values=}{option=class="skey"}{unit=}
"bankname"=>"支付宝,工商银行,建设银行,农业银行,中国银行,招商银行,平安银行,光大银行,交通银行,民生银行,兴业银行,浦发银行,中信银行,华夏银行,广发银行,邮政储蓄,农村信用社,富滇银行", //{title=提现银行}{prompt=提现支持银行列表，每个以","隔开}{type=textarea}{values=}{option=class="textarea1" cols="40" rows="5"}{unit=}
"atmscale"=>"", //{title=提现手续费}{prompt=提现将扣除综合税金如：10%，不收手续费请留空。}{type=input}{values=}{option=class="skey"}{unit=}
"weihufei"=>"10", //{title=网站维护费}{prompt=网站维护费}{type=input}{values=}{option=class="skey"}{unit=}
//}

//sms-短信配置{
"smsuname"=>"", //{title=短信用户}{prompt=}{type=input}{values=}{option=class="skey"}{unit=}
"smspwd"=>"", //{title=短信密码}{prompt=}{type=password}{values=}{option=class="skey"}{unit=}	
"smsapi"=>"", //{title=短信接口}{prompt=发送短信仅支持HTTP接口，接口填写方式请联系系统开发商。}{type=textarea}{values=}{option=class="textarea1" cols="40" rows="5"}{unit=}
//}

);
?>