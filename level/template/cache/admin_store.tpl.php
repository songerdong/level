<? if (!defined('ROOT')) exit('Can\'t Access !'); include template('admin_header','admin'); if($_GET['get']=='storelog') { ?>
<div class="headbar clearfix">
  <ul class="tab" name="menu1">
    <div class="tabright">
      <form method="get" action="">
        <input type="hidden" name="mod" id="mod" value="<?=$_GET['mod']?>" />
        <input type="hidden" name="act" id="act" value="<?=$_GET['act']?>" />
        <input type="hidden" name="get" id="get" value="<?=$_GET['get']?>" />
        <input type="hidden" name="re" id="re" value="<?=$_GET['re']?>" />
        <input type="hidden" name="type" id="type" value="<?=$_GET['type']?>" />
        订货单号：
        <input type="text" name="id" id="orderid" value="<?=$_GET['id']?>" class='skey w120'/>
        时间段：<?=config::form('time',$this->t['str'],'datas');?>
        <input type="submit" id="button" value="立即搜索" class='button'>
      </form>
    </div>
    <div style="clear:both;"></div> 
  </ul>
</div><? if(is_array($this->orderlog)) { foreach($this->orderlog as $value) { $user = $this->user->sql($value['uid']); ?><table width="100%" class="cart_table t_c">
  <thead>
    <tr>
      <th align="left" colspan="3" style="text-align:left; font-weight:normal;">&nbsp;&nbsp; 时间：<?=formattime($value['addtime']); ?>  代理账号：<?=$user['username']?> <? if($user['mobile']) { ?> 联系电话：<?=$user['mobile']?> <? } ?></th>
    </tr>
  </thead>
  <tr bgcolor="#FFFFFF">
    <td width="50%" style="border-right:#CCC 1px solid;"><table width="100%" cellpadding="0" cellspacing="0">
        <tbody>
        <? $shop = $this->getgoods(1,"goods_id='9'"); ?>        <tr>
          <td width="10%" align="center">编号<br /><?=$value['id']?></td>
          <td width="10%" align="center">单据编号<br /><?=$value['oid']?></td>
          <td width="10%" align="center">类型<br /><? if($value['type'] =='1') { ?> 订货<? } else { ?> 售货<? } ?></td>
          <td width="10%" align="center">数量<br /><?=$value['num']?>箱</td>
        </tr>
      </tbody>
    </td>
  </tr> 
</table>
<br /><? } } ?><div class="blank20"></div>
<div class="page"><span><?=$this->pagetotal?>条记录/<? echo $_GET['page'] ? $_GET['page'] : 1  ?>页</span><?=$this->showpage?></div>
<div class="blank20"></div>
<? } if($_GET['get']=='store') { ?>
<div class="headbar clearfix">
  <ul class="tab" name="menu1">
    <li<? if($_GET['checked']=='') { ?> class="selected"<? } ?>><a href="<?=Purl(adminpre()); ?>">全部记录</a></li>
    <li<? if($_GET['checked']=='1') { ?> class="selected"<? } ?>><a href="<?=Purl("?mod=admin&act=store&get=store&checked=1"); ?>" hidefocus="true">已付款</a></li>
    <li<? if($_GET['checked']=='2') { ?> class="selected"<? } ?>><a href="<?=Purl("?mod=admin&act=store&get=store&checked=2"); ?>" hidefocus="true">已完成</a></li>
    <div class="tabright">
      <form method="get" action="">
        <input type="hidden" name="mod" id="mod" value="<?=$_GET['mod']?>" />
        <input type="hidden" name="act" id="act" value="<?=$_GET['act']?>" />
        <input type="hidden" name="get" id="get" value="<?=$_GET['get']?>" />
        <input type="hidden" name="re" id="re" value="<?=$_GET['re']?>" />
        <input type="hidden" name="type" id="type" value="<?=$_GET['type']?>" />
        订单号：
        <input type="text" name="orderid" id="orderid" value="<?=$_GET['id']?>" class='skey w120'/>
        时间段：<?=config::form('time',$this->t['str'],'datas');?>
        <input type="submit" id="button" value="立即搜索" class='button'>
      </form>
    </div>
    <div style="clear:both;"></div> 
  </ul>
</div><? if(is_array($this->order)) { foreach($this->order as $value) { $user = $this->user->sql($value['uid']); ?><table width="100%" class="cart_table t_c">
  <thead>
    <tr>
      <th align="left" colspan="4" style="text-align:left; font-weight:normal;">&nbsp;&nbsp;订货单号:<?=$value['id']?> 会员：<?=$user['username']?> 时间：<?=formattime($value['addtime']); ?>  代理账号：<?=$user['username']?> <? if($user['mobile']) { ?> 联系电话：<?=$user['mobile']?> <? } ?></th>
    </tr>
  </thead>
  <tr bgcolor="#FFFFFF">
    <td width="50%" style="border-right:#CCC 1px solid;"><table width="100%" cellpadding="0" cellspacing="0">
        <tbody>

        <? $shop = $this->getgoods(1,"goods_id='9'"); ?>        <tr>
          <td style="padding-left:10px;line-height:18px;" width="40%" align="left"><?=$shop['goods_name']?></td>
          <td width="10%" align="center">产品单价<br /><?=$shop['agent_price']?>元/件</td>
          <td width="10%" align="center">单位比例<br />15件/箱</td>
          <td width="10%" align="center">订购数量<br /><?=$value['store']?>箱</td>
          <td width="10%" align="center">产品小计<br />&yen;<?=$shop['agent_price']*15*$value['store']; ?></td>
        </tr>
      </table></td>
    <td width="20%" align="center" style="border-right:#CCC 1px solid;">预付定金:<b style="color:#F30;">&yen;<?=$value['ding_price']?></b></td>
    <td width="20%" align="center" style="border-right:#CCC 1px solid;"><p>已上传凭证图片</p><a href="<?=$value['huiyuan_img']?>"><img src="<?=$value['huiyuan_img']?>" style="width:50px;" /></a><b style="color:#F30;"></b></td>
    <td id="check_user_<?=$value['id']?>" width="10%">
      <? if($value['status']==1) { ?>
      <span class="ordtin" id="check_user_<?=$value['id']?>">已付款</span>
      <button id="confirmstore" data-value="<?=$value['id']?>">确认收款</button>&nbsp;<button id="cancestorepic" data-value="<?=$value['id']?>">重置上传凭证</button>    
      <? } elseif($value['status']==2) { ?>  
      <span class="ordtin">已完成</span>
      <? } else { ?>
      <span class="ordtin">未付款</span>
      <? } ?>
    </td>
  </tr>
  </tbody>  
</table>
<br /><? } } ?><div class="blank20"></div>
<div class="page"><span><?=$this->pagetotal?>条记录/<? echo $_GET['page'] ? $_GET['page'] : 1  ?>页</span><?=$this->showpage?></div>
<div class="blank20"></div>
<? } ?>
<script type="text/javascript">
  $('#confirmstore').click(function(event) {
    var id = $(this).data('value');
    showhandle({
      html:'<table class="lotab"><tr><th><label>支付密码：</label></th><td><input id="repass" class="myinput repass" type="password"></td></tr></table>',
      width:320,
      height:140,
      id:'yeshave',
      title:'确认收货'
    },function(){
    
    $("#controlLoad").show();
    removetip("yeshave");
      $.getJSON(get_url('act=paydingorder&type=admin&repass='+$("#repass").val()+'&id='+id),function(res){
      $("#controlLoad").hide();                                    
      if(res.error=='0'){
      hidebox('yeshave',true);
      $("#check_user_"+id).html('<span class="ordtin">已完成</span>');
      }else{
      addtip("yeshave",res.error);
      }               
      });
    });
    /*if(confirm("是否收到货款？")){
          $.getJSON(get_url('act=paydingorder&sendway=confirm&id='+id),function(res){      
          console.log(res);                           
          if(res.error=='0'){
             location.reload();
            }else{
              addtip("cancelorder",res.error); 
            }  ;      
          })
      }    */
  });
  $('#cancestorepic').click(function(event) {
    var id = $(this).data('value');
    if(confirm("是否确认重置？")){
          $.getJSON(get_url('act=paydingorder&sendway=confirm&id='+id),function(res){      
          console.log(res);                           
          if(res.error=='0'){
             location.reload();
            }else{
              addtip("cancelorder",res.error); 
            }  ;      
          })
      }    
  });
</script>
<? include template('admin_footer','admin'); ?>
