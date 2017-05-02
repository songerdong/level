<? if (!defined('ROOT')) exit('Can\'t Access !'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title><?=config::get('sitename')?>会员平台</title>
<? include template('../common','default/member'); ?>
<link href="<?=$this->tempdir?>css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?=$this->tempdir?>js/bankcard.js" ></script>
<style>
.opencard_text {
width:85px;
}
.mybankname {
width:188px;
width:180px\0;
height:35px;
float:left;
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
border-radius: 4px;
}
</style>
</head>
<body>
<form id="subform" name="subform" method="post" action="" onsubmit="return checkform()">
  <div class="opencard_box">
    <div class="opencard_h">
      <div class="opencard_text"><span class="text_x_12px">*</span> 银行户名</div>
      <div class="opencard_input_box">
        <input name="truename" id="truename" class="myinput repass" type="text" value="<?=$this->bank['truename']?>" onblur="checktruename();" />
        <span class="tips" id="truenametip"></span></div>
    </div>
    <div class="opencard_h">
      <div class="opencard_text"><span class="text_x_12px">*</span> 开户银行</div>
      <div class="opencard_input_box"><?=config::form('bankname',$this->bank[bankname],'select',formatform(config::get('bankname'),'请选择银行卡开户银行',','),'class=\'mybankname\' onchange=\'checkbankname()\'');?> <span class="tips" id="banknametip"></span></div>
    </div>
    <div class="opencard_h">
      <div class="opencard_text"><span class="text_x_12px">*</span> 开户地址</div>
      <div class="opencard_input_box">
        <input name="bankadd" id="bankadd" class="myinput repass" type="text" value="<?=$this->bank['bankadd']?>" onblur="checkbankadd();"/>
        <span class="tips" id="bankaddtip"></span></div>
    </div>
    <div class="opencard_h">
      <div class="opencard_text"><span class="text_x_12px">*</span> 银行卡号</div>
      <div class="opencard_input_box">
        <input name="bankcard" id="bankcard" class="myinput repass" type="text" value="<?=$this->bank['bankcard']?>" onblur="checkbankcard();"/>
        <span class="tips" id="bankcardtip"></span></div>
    </div>
    <div class="opencard_button_box"><?=config::form('opcardbutton','确 定','submit');?><span class="tips" id="cashtip"></span></div>
  </div>
</form>
</body>
</html>
