<?php
$this->mysql->query("DROP TABLE IF EXISTS `sinbegin_user`;");
$this->mysql->query("CREATE TABLE `sinbegin_user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL COMMENT '用户名',
  `repass` varchar(255) DEFAULT NULL COMMENT '二级密码',
  `password` varchar(255) NOT NULL COMMENT '密码',
  `loginnum` int(11) DEFAULT '0' COMMENT '登陆次数',
  `userphone` varchar(50) DEFAULT '' COMMENT '联系电话',
  `mtime` int(11) DEFAULT NULL,
  `msalt` int(11) DEFAULT NULL,
  `mcheck` int(1) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL COMMENT '地址',
  `truename` varchar(50) DEFAULT NULL COMMENT '姓名',
  `forgotpassword` varchar(32) DEFAULT NULL COMMENT '找回密码',
  `status` int(1) DEFAULT '1' COMMENT '用户状态',
  `salt` varchar(8) NOT NULL DEFAULT '' COMMENT '密码前缀',
  `groupid` int(1) DEFAULT NULL COMMENT '用户组ID',
  `regip` varchar(20) DEFAULT '' COMMENT '注册IP',
  `email` varchar(40) NOT NULL DEFAULT '' COMMENT '注册邮箱',
  `echeck` int(1) DEFAULT NULL COMMENT '邮箱是否验证',
  `authemail` varchar(32) DEFAULT '',
  `money` decimal(11,2) DEFAULT '0.00' COMMENT '现金币',
  `regmoney` decimal(11,2) DEFAULT '0.00',
  `shopmoney` decimal(11,2) DEFAULT '0.00' COMMENT '购物币',
  `balance` decimal(11,2) DEFAULT '0.00' COMMENT '兑换币',
  `opentime` int(11) DEFAULT '0' COMMENT '开通时间',
  `regtime` int(11) DEFAULT NULL COMMENT '免费注册时间',
  `lasttime` int(11) DEFAULT NULL COMMENT '登录时间',
  `lastip` varchar(20) DEFAULT '' COMMENT '登陆IP',
  `left` int(11) DEFAULT '0' COMMENT '左边会员数',
  `right` int(11) DEFAULT '0' COMMENT '右边会员数',
  `_left` varchar(50) DEFAULT '' COMMENT '左边安置会员名',
  `_right` varchar(50) DEFAULT '' COMMENT '右边安置会员名',
  `referee` varchar(50) DEFAULT '' COMMENT '直接上线',
  `__right` mediumtext COMMENT '右边上线集合',
  `__sleft` mediumtext COMMENT '系统左边上线集合',
  `_referee` varchar(50) DEFAULT '' COMMENT '安排会员上线',
  `__referee` mediumtext COMMENT '安排上线集合',
  `position` varchar(10) DEFAULT '' COMMENT '所在位置',
  `canlogin` int(1) DEFAULT '1' COMMENT '可否登陆',
  `sleft` int(11) DEFAULT '0' COMMENT '系统左边会员数',
  `sright` int(11) DEFAULT '0' COMMENT '系统右边会员数',
  `_sleft` varchar(50) DEFAULT '' COMMENT '左边系统会员名',
  `_sright` varchar(50) DEFAULT '' COMMENT '右边系统会员名',
  `_sreferee` varchar(50) DEFAULT '' COMMENT '系统会员上线',
  `__sright` mediumtext COMMENT '系统右边上线集合',
  `__sreferee` mediumtext COMMENT '系统上线集合',
  `sposition` varchar(10) DEFAULT '' COMMENT '系统所在位置',
  `_maxmoney` decimal(11,2) DEFAULT '0.00' COMMENT '已获见点奖',
  `__left` mediumtext COMMENT '左边上线集合',
  `leftmoney` decimal(11,2) DEFAULT '0.00' COMMENT '左区剩余业绩',
  `rightmoney` decimal(11,2) DEFAULT '0.00' COMMENT '右区剩余业绩',
  `maxmoney` decimal(11,2) DEFAULT '0.00' COMMENT '已获静态奖',
  `moneytime` int(11) DEFAULT '0' COMMENT '最后获取静态奖时间',
  `service` int(1) DEFAULT '0',
  `reguser` int(11) DEFAULT '0',
  `_leftmoney` decimal(11,2) DEFAULT '0.00' COMMENT '左区总业绩',
  `_rightmoney` decimal(11,2) DEFAULT '0.00' COMMENT '右区总业绩',
  `locktime` varchar(20) DEFAULT '',
  `newphone` varchar(11) DEFAULT '',
  `newmsalt` int(11) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `county` varchar(100) DEFAULT '',
  `centre` int(11) DEFAULT '0' COMMENT '中间会员数',
  `_centre` varchar(50) DEFAULT '' COMMENT '中间会员名',
  `__centre` mediumtext COMMENT '中间上线集合',
  `order` decimal(11,2) DEFAULT '0.00',
  `idcard` varchar(50) NOT NULL,
  `qq` varchar(50) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8");
$this->mysql->query("replace into `sinbegin_user` values('1','system','7e12d81969a4b5e6b73e9858d8c68740','242d90fe43a5fc1f8823bab4bf1a6676','12','13888919606','1413899242','5544',NULL,NULL,'系统会员',NULL,'1','402c5b','5','106.37.236.229','',NULL,'','0.00','0.00','0.00','0.00','1413897012','1413897012','1414840802','123.1.155.157','0','0','','','',NULL,NULL,'',NULL,'','1','0','0','','','',NULL,NULL,'','0.00',NULL,'0.00','0.00','0.00','0','1','0','0.00','0.00','','',NULL,NULL,NULL,'','0','',NULL,'0.00','530000000000000000','309091579');");
?>