<? if (!defined('ROOT')) exit('Can\'t Access !'); include template('member_header','default/member'); ?>
<div id="main">
  <div class="left">
<? include template('member_left','default/member'); ?>
</div>
  <div class="right">
    <div class="opencard_main">
      <? if($_GET['type']=='list') { ?>
      <div class="track_title"> <a href="<?=Purl("?mod=member&act=capital&type=list&method=main"); ?>" class="<?=$_GET['method']=='main' ? 'menushow' : 'menu'; ?>">综合统计</a>
      </div>
      <? if($_GET['method']=='main') { ?>
      <div class="member_mian">
        <form method="GET" action="">
          <input type="hidden" name="mod" id="mod" value="<?=$_GET['mod']?>" />
          <input type="hidden" name="act" id="act" value="<?=$_GET['act']?>" />
          <input type="hidden" name="type" id="type" value="<?=$_GET['type']?>" />
          <input type="hidden" name="method" id="method" value="<?=$_GET['method']?>" />
          <div class="ex_find">
            <div class="ex_text">查询内容</div>
            <div class="log_input_box">
              <input name="content" type="text" class="log_input" value="<?=$_GET['content']?>"  placeholder="如：直推奖，在线充值等" />
            </div>
            <div class="ex_text">查询日期</div>
            <div class="ex_time_box"><?=config::form('time',$this->time_str,'datas');?></div>
            <div class="ex_button_box">
              <input type="submit" id="button" value="查&nbsp;&nbsp;询" class="find_button" />
            </div>
          </div>
        </form>
        <div class="info_bg">
          <div class="info_text">查询统计：总共有 <b class="text_red_line"><?=$this->pagetotal?></b> 条记录，收入总额 <b class="text_red_line">&yen;&nbsp;<?=$this->allmoney['inmoney']?></b>，支出总额 <b class="text_red_line">&yen;&nbsp;<?=$this->allmoney['outmoney']?></b>，利润总额 <b class="text_red_line">&yen;&nbsp;<?=$this->allmoney['margin']?></b></div>
        </div>
        <? if(is_array($this->record)) { ?>
        <div id="index_diagram">
         <div id="chartspie" style="width:49%;float:left;"></div>
         <div id="chartscolumn" style="width:49%;float:left;"></div>
        </div>
        <? } ?>
        <table class="sheet">
          <tr>
            <th>记录编号</th>
            <th>订单编号</th>
            <th>代理名称</th>
            <th>分红奖</th>
            <th>招商奖</th>
            <th>进阶奖</th>
            <th>收入金额</th>
            <th>时间</th>
          </tr>
          <? if(is_array($this->record)) { foreach($this->record as $value) { ?>          <tr class="mybg">
            <td><?=$value['id']?></td>
            <td><?=$value['oid']?></td>
            <td><?=$value['username']?></td>
            <td><?=$value['share_money']?></td>
            <td><?=$value['rebate']?></td>
            <td><?=$value['up_bonus']?></td>
            <td class="red"><?=$value['money'] ? $value['money'] : "0.00"; ?></td>
            <td><?=formattime($value['addtime'],'Y-m-d H:i:s'); ?></td>
          </tr>
          <? } } ?>        </table>
        <? if(!is_array($this->record)) { ?>
        <div class="no_info"><span class="no_info_ico"></span>暂无任何记录</div>
        <? } ?>
        <? if($this->newpage) { ?>
        <div class="pages"><?=$this->newpage?></div>
        <? } ?>
      </div>
      <? if(is_array($this->record)) { ?>
<script language="javascript"> 
$(function() { 
   chart('chartscolumn',"column",['综合统计'],[{name:'分红奖',data:[<?=$this->allmoney['share_money']?>]},{name:'招商奖',data:[<?=$this->allmoney['rebate']?>]},{name:'进阶奖',data:[<?=$this->allmoney['up_bonus']?>]},{name:'总计',data: [<?=$this->allmoney['margin']?>]}]);
   /*chart('chartspie',"pie",['综合统计'],[['分红奖励',0.1],['直荐奖励',<?=$this->allmoney['refereemoney']?>], ['股东奖励',<?=$this->allmoney['money']?>],['报单奖励',<?=$this->allmoney['regmoney']?>]]);*/
});
</script>
      <? } ?>
      <? } ?>
      <? if($_GET['method']=='money'||$_GET['method']=='regmoney'||$_GET['method']=='shopmoney'||$_GET['method']=='balance') { ?>
      <div class="member_mian">
        <form method="GET" action="">
          <input type="hidden" name="mod" id="mod" value="<?=$_GET['mod']?>" />
          <input type="hidden" name="act" id="act" value="<?=$_GET['act']?>" />
          <input type="hidden" name="type" id="type" value="<?=$_GET['type']?>" />
          <input type="hidden" name="method" id="method" value="<?=$_GET['method']?>" />
          <div class="ex_find">
            <div class="ex_text">查询内容</div>
            <div class="log_input_box">
              <input name="content" type="text" class="log_input" value="<?=$_GET['content']?>"  placeholder="如：直推奖，在线充值等" />
            </div>
            <div class="ex_text">查询日期</div>
            <div class="ex_time_box"><?=config::form('time',$this->t['str'],'datas');?></div>
            <div class="ex_button_box">
              <input type="submit" id="button" value="查&nbsp;&nbsp;询" class="find_button" />
            </div>
          </div>
        </form>
        <div class="info_bg">
          <div class="info_text">查询统计：总共有 <b class="text_red_line"><?=$this->pagetotal?></b> 条记录，收入 <b class="text_red_line">&yen;<?=$this->allmoney['inmoney']?></b>，支出 <b class="text_red_line">&yen;<?=$this->allmoney['outmoney']?></b></div>
        </div>
        <? if($this->categories) { ?>
        <div id="container"></div>
        <? } ?>
        <table class="sheet">
          <tr>
            <th>记录编号</th>
            <th>记录说明</th>
            <th>金额变动</th>
            <th>当时余额</th>
            <th>产生时间</th>
          </tr>
          <? if(is_array($this->record)) { foreach($this->record as $value) { ?>          <tr class="mybg">
            <td><?=$value['id']?></td>
            <td><?=$value['content']?></td>
            <td class="red"><?=$value['lognum']?></td>
            <td class="red">&yen;<?=$value['balance']?></td>
            <td><?=formattime($value['addtime'],'Y-m-d H:i:s'); ?></td>
          </tr>
          <? } } ?>        </table>
        <? if(!is_array($this->record)) { ?>
        <div class="no_info"><span class="no_info_ico"></span>暂无任何记录</div>
        <? } ?>
        <? if($this->newpage) { ?>
        <div class="pages"><?=$this->newpage?></div>
        <? } ?>
      </div>
      <? if($this->categories) { ?>
<script language="javascript"> 
$(function(){
   chart('container','line',[<?=$this->categories?>],[{name:'收入',data:[<?=$this->inmoney?>]},{name:'支出',data:[<?=$this->outmoney?>]}]);	   
});
</script>
      <? } ?>
      <? } ?>
      <? } ?>
      <? if($_GET['type']=='change') { ?>
      <div class="track_title"> <a class="<?=$_GET['method']==''?'menushow':'menu'; ?>" href="<?=Purl("?mod=member&act=capital&type=change"); ?>">现金币转注册币</a></div>
      <div class="order-prompt order-promptbommton"><span></span>现金币转换成注册币种后将不能转回，请务必考虑清楚后转换，以免造成资金损失。</div>
      <? if($_GET['method']=='') { ?>
      <div class="opencard_box">
        <div class="opencard_h">
          <div class="opencard_text"><span class="text_x_12px">*</span> 现金余额</div>
          <div class="opencard_input_box"><span class="dis-input"><?=$this->member['money']?> 元</span><span class="tips" id="moneytip"></span></div>
        </div>
        <div class="opencard_h">
          <div class="opencard_text"><span class="text_x_12px">*</span> 转注册币</div>
          <div class="opencard_input_box">
            <input name="howmoney" id="howmoney" class="myinput" type="text" onblur="checkmoney()"/>
            <input type="hidden" name="mymoney" id="mymoney" value="<?=$this->member['money']?>" />
            <input type="hidden" name="method" id="method" value="<?=$_GET['method']?>" />
            <span class="tips" id="howmoneytip"></span></div>
        </div>
        <div class="opencard_button_box"><?=config::form('opcardbutton','确认转换','submit');?><span class="tips" id="cashtip"></span></div>
      </div>
      <? } ?>
      <? if($_GET['method']=='shop') { ?>
      <div class="opencard_box">
        <div class="opencard_h">
          <div class="opencard_text"><span class="text_x_12px">*</span> 现金余额</div>
          <div class="opencard_input_box"><span class="dis-input"><?=$this->member['money']?> 元</span><span class="tips" id="moneytip"></span></div>
        </div>
        <div class="opencard_h">
          <div class="opencard_text"><span class="text_x_12px">*</span> 转购物币</div>
          <div class="opencard_input_box">
            <input name="howmoney" id="howmoney" class="myinput" type="text" onblur="checkmoney()"/>
            <input type="hidden" name="mymoney" id="mymoney" value="<?=$this->member['money']?>" />
            <input type="hidden" name="method" id="method" value="<?=$_GET['method']?>" />
            <span class="tips" id="howmoneytip"></span></div>
        </div>
        <div class="opencard_button_box"><?=config::form('opcardbutton','确认转换','submit');?><span class="tips" id="cashtip"></span></div>
      </div>
      <? } ?>
      <? } ?>
      <? if($_GET['type']=='transfer') { ?>
      <div class="opencards_title">
        <div class="opencards_title_b">现金转账</div>
        <div class="opencards_title_a">提示：<span class="text_x_12px">*</span> 为必填项目！</div>
      </div>
      <div class="order-prompt order-promptbommton"><span></span>请务必确认会员金额以及收款人后转账，以免造成资金损失。</div>
      <div class="opencard_box">
        <div class="opencard_h">
          <div class="opencard_text"><span class="text_x_12px">*</span> 现金余额</div>
          <div class="opencard_input_box"><span class="dis-input"><?=$this->member['money']?> 元</span><span class="tips" id="moneytip"></span></div>
        </div>
        <div class="opencard_h">
          <div class="opencard_text"><span class="text_x_12px">*</span> 要转账给</div>
          <div class="opencard_input_box">
            <input name="username" id="username" class="myinput" type="text" placeholder="用户名/电子邮箱/绑定手机" onblur="checkusername()"/>
            <span class="tips" id="usernametip"></span></div>
        </div>
      </div>
      <div class="opencard_h">
        <div class="opencard_text"><span class="text_x_12px">*</span> 转账金额</div>
        <div class="opencard_input_box">
          <input name="howmoney" id="howmoney" class="myinput" type="text" onblur="checkmoney()"/>
          <input type="hidden" name="mymoney" id="mymoney" value="<?=$this->member['money']?>" />
          <span class="tips" id="howmoneytip"></span></div>
      </div>
      <div class="opencard_button_box"><?=config::form('opcardbutton','确认转账','submit');?><span class="tips" id="cashtip"></span></div>
    </div>
    <? } ?>
    <? if($_GET['type']=='payment') { ?>
    <div class="track_title"> <a class="<?=$_GET['method']==''?'menushow':'menu'; ?>" href="<?=Purl("?mod=member&act=capital&type=payment"); ?>">在线充值</a> <a class="<?=$_GET['method']=='record'?'menushow':'menu'; ?>" href="<?=Purl("?mod=member&act=capital&type=payment&method=record"); ?>">充值记录</a> </div>
    <? if($_GET['method']=='') { ?>
    <div class="order-prompt order-promptbommton">请务必确认登录密码与支付密码完全不同！密码相同会导致支付密码失效，使您的帐户资金无法得到安全保障。</div>
    <form action="" method="post" target="_blank" onSubmit="return checkform();">
      <div class="opencard_box">
        <div class="opencard_h">
          <div class="opencard_text"><span class="text_x_12px">*</span> 充值金额</div>
          <div class="opencard_input_box">
            <input class="myinput" name="money" id="howmoney" value="" type="text" />
            <span class="tips" id="howmoneytip"></span></div>
        </div>
        <div class="openpay">
          <div class="opencard_text"><span class="text_x_12px">*</span> 支付方式</div>
          <ul class="imgradio">
            <? if(is_array(config::get('paytype'))) { foreach(config::get('paytype') as $key=>$value) { ?>            <? if(config::get($value."open")) { ?>
            <? if($value=='tenpaybank') { ?>
            <input type="hidden" value="tenpay"  name="mybanktype"/>
            <? if(is_array(config::get('tenpaybank'))) { foreach(config::get('tenpaybank') as $k=>$val) { ?>            <li onclick="clickchked('<?=$val?>_<?=$k?>','paytype');">
              <input type="radio" id="<?=$val?>_<?=$k?>" name="paytype" value="<?=$val?>" >
              <img src="<?=$this->hempdir?>images/paytype/bank<?=$val?>.gif" width="112" height="32" /></li>
            <? } } ?>            <? } else { ?>
            <? if($value=='allinpay') { ?>
            <? if(is_array(config::get('allinpaybank'))) { foreach(config::get('allinpaybank') as $k=>$val) { ?>            <li onclick="clickchked('<?=$val?>_<?=$k?>','paytype');">
              <input type="radio" id="<?=$val?>_<?=$k?>" name="paytype" value="<?=$val?>" >
              <img src="<?=$this->hempdir?>images/paytype/<?=$val?>.gif" width="112" height="32" /></li>
            <? } } ?>            <? } ?>
            <? if($value=='chinabank') { ?>
            <input type="hidden" value="chinabank"  name="mybanktype"/>
            <div class="forgot-title" id="changebaktype"> <em class="current">储蓄卡(借记卡)</em> <em>信用卡(贷记卡)</em>
              <div style="clear:both;"></div>
            </div>
            <div style="clear:both;"></div>
            <div class="banttype" id="bantype0">
              <? if(is_array(config::get('chinabank0'))) { foreach(config::get('chinabank0') as $k=>$val) { ?>              <li onclick="clickchked('<?=$val?>_<?=$k?>','paytype');">
                <input type="radio" id="<?=$val?>_<?=$k?>" name="paytype" value="<?=$val?>" >
                <img src="<?=$this->hempdir?>images/chinabank0/<?=$val?>.gif"/></li>
              <? } } ?>              <div style="clear:both;"></div>
            </div>
            <div class="banttype" id="bantype1" style="display:none;">
              <? if(is_array(config::get('chinabank1'))) { foreach(config::get('chinabank1') as $k=>$val) { ?>              <li onclick="clickchked('<?=$val?>_<?=$k?>','paytype');">
                <input type="radio" id="<?=$val?>_<?=$k?>" name="paytype" value="<?=$val?>" >
                <img src="<?=$this->hempdir?>images/chinabank1/<?=$val?>.gif"/></li>
              <? } } ?>              <div style="clear:both;"></div>
            </div>
            <? } ?>
            <? } ?>
            <? } ?>
            <? } } ?>          </ul>
          <div style="clear:both;"></div>
        </div>
      </div>
      <div class="opencard_button_box"><?=config::form('opcardbutton','马上充值','submit');?><span class="tips" id="_onlinepaytip"></span></div>
    </form>
    <div class="pop" id="new_payment" style="display:none;">
      <div class="pop-payment">
        <div class="pop-paymentpro"><span class="payment-icon"></span>请在新打开的页面上完成付款！</div>
        <p>付款完成前请不要关闭此窗口。<br />
          完成付款后请根据您的情况点击下面的按钮。</p>
        <a class="paymentbut01" href="<?=Purl("?mod=member&act=capital&type=payment&method=record"); ?>">已完成付款</a> <a class="paymentbut02" href="javascript:window.location.reload();;">付款遇到问题</a><br />
      </div>
    </div>
    <? } ?>
    <? if($_GET['method']=='record') { ?>
    <div class="member_mian">
      <form method="GET" action="">
        <input type="hidden" name="mod" id="mod" value="<?=$_GET['mod']?>" />
        <input type="hidden" name="act" id="act" value="<?=$_GET['act']?>" />
        <input type="hidden" name="type" id="type" value="<?=$_GET['type']?>" />
        <input type="hidden" name="method" id="method" value="<?=$_GET['method']?>" />
        <div class="ex_find">
          <div class="ex_text">流水号</div>
          <div class="log_input_box">
            <input name="orderid" type="text" class="log_input" value="<?=$_GET['orderid']?>"  />
          </div>
          <div class="ex_text">查询日期</div>
          <div class="ex_time_box"><?=config::form('time',$this->time_str,'datas');?></div>
          <div class="ex_button_box">
            <input type="submit" id="button" value="查&nbsp;&nbsp;询" class="find_button" />
          </div>
        </div>
      </form>
      <div class="info_bg">
        <div class="info_text">查询统计：总共有 <b class="text_red_line"><?=$this->pagetotal?></b> 条记录，已支付 <b class="text_red_line">&yen;<?=$this->yespay?></b>，未支付 <b class="text_red_line">&yen;<?=$this->nopay?></b></div>
      </div>
      <? if($this->categories) { ?>
      <div id="container"></div>
      <? } ?>
      <table class="sheet">
        <tr>
          <th>充值编号</th>
          <th>流水号</th>
          <th>充值金额</th>
          <th>充值方式</th>
          <th>目前状态</th>
          <th>充值时间</th>
        </tr>
        <? if(is_array($this->record)) { foreach($this->record as $value) { ?>        <tbody id="payorder_<?=$value['orderid']?>">
          <tr class="mybg">
            <td><?=$value['id']?></td>
            <td><?=$value['orderid']?></td>
            <td class="red">&yen;<?=formatnum($value['total_fee']); ?></td>
            <td><?=$value['paytype']?></td>
            <td><?=paycheck($value['checked'],$value['orderid']); ?></td>
            <td><?=formattime($value['addtime']); ?></td>
          </tr>
        </tbody>
        <? } } ?>      </table>
      <? if(!is_array($this->record)) { ?>
      <div class="no_info"><span class="no_info_ico"></span>暂无任何记录</div>
      <? } ?>
      <? if($this->newpage) { ?>
      <div class="pages"><?=$this->newpage?></div>
      <? } ?>
    </div>
    <? if($this->categories) { ?>
    <script language="javascript"> 
$(function() {
    $('#container').highcharts({
        chart: {
            type: 'line',
            renderTo: 'analysis',
            defaultSeriesType: 'line',
            spacingLeft: 1,
            marginRight: 130,
            marginBottom: 100

        },
        title: {
            text: '收支趋势图',
            x: -20
            //center

        },
        subtitle: {
            text: '',
            x: -20

        },
        xAxis: {
            categories: [<?=$this->categories?>],
            labels: {
                rotation: 45,
                y: 30,
                formatter: function() {
                    if (this.value.length == 8) {
                        return this.value.substring(4, this.value.length);

                    } else {
                        return this.value;

                    }

                },
                style: {
                    fontFamily: '宋体',
                    fontSize: '14px'

                }

            }

        },
        yAxis: {
            title: {
                text: '金额'

            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'

            }]
            //min:0

        },
        tooltip: {
            valueSuffix: '(元)'

        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -10,
            y: 100,
            borderWidth: 0

        },
        exporting: {
            enabled: false

        },
        series: [{name: '已支付',data: [<?=$this->yespaymoney?>]},{name: '未支付',data: [<?=$this->nopaymoney?>]}]

    });

});
</script>
    <? } ?>
    <? } ?>
    <? } ?>
    <? if($_GET['type']=='myatm') { ?>
    <script language="javascript">
var atmscale="<?=config::get('atmscale')?>";
</script>
    <div class="track_title"> <a class="<?=$_GET['method']==''?'menushow':'menu'; ?>" href="<?=Purl("?mod=member&act=capital&type=myatm"); ?>">申请提现</a> <a class="<?=$_GET['method']=='record'?'menushow':'menu'; ?>" href="<?=Purl("?mod=member&act=capital&type=myatm&method=record"); ?>">提现记录</a> </div>
    <? if($_GET['method']=='') { ?>
    <div class="to-cash" id="to-cash">
      <div class="to-cash-tit"><span>选择提现银行</span>
        <? $count = 5-count($this->bank); ?>        <div class="add-banks <? if($count>0) { ?>showbanks<? } ?>" id="banks"> <a href="javascript:addbank();">添加银行卡</a>（还可添<a id="bankcount"><?=$count?></a>个） </div>
      </div>
      <table cellpadding="0" cellspacing="0" border="0">
        <tbody>
          <tr>
            <th>银行名称</th>
            <th>开户名</th>
            <th>银行卡号</th>
            <th>开户地址</th>
            <th>操作</th>
          </tr>
        </tbody>
        <tbody id="hasSetBanks" class="hasbanks <? if(!is_array($this->bank)) { ?>showbanks<? } ?>">
          <tr style="float: right;">
            <td colspan="15" align="center" style="border: none;">您还没有设置用于提现的银行！<a href="javascript:addbank();">添加银行卡</a></td>
          </tr>
        </tbody>
        <input name="atmbank" id="atmbank" type="hidden" value="" />
        <tbody id="banklist">
          <? if(is_array($this->bank)) { foreach($this->bank as $value) { ?>          <? $value['bankimages'] = bankimages($value['bankname']); ?>          <tr>
            <td onclick="changebank('<?=$value['id']?>')"><input name="bankid" id="bankid_<?=$value['id']?>" type="radio" value="<?=$value['id']?>" />
              <img src="<?=$this->hempdir?>images/chinabank0/<?=$value['bankimages']?>"/> <?=$value['bankname']?>
              </li></td>
            <td><?=$value['truename']?></td>
            <td><?=$value['bankcard']?></td>
            <td><?=$value['bankadd']?></td>
            <td><a href="javascript:editbank('<?=$value['id']?>');">编辑</a> <a href="javascript:delbank('<?=$value['id']?>');">删除</a></td>
          </tr>
          <? } } ?>        </tbody>
      </table>
    </div>
    <div class="to-cash">
      <div class="to-cash-tit"><span>确认提现金额</span></div>
      <div class="opencard_box" style="margin-top:20px;">
        <div class="opencard_h">
          <div class="opencard_text"><span class="text_x_12px">*</span> 现金余额</div>
          <div class="opencard_input_box"><span class="dis-input"><?=$this->member['money']?>元</span><span class="tips" id="moneytip"></span></div>
        </div>
        <div class="opencard_h">
          <div class="opencard_text"><span class="text_x_12px">*</span> 提现金额</div>
          <div class="opencard_input_box">
            <input name="howmoney" id="howmoney" class="myinput" type="text" onblur="checkmoney()"/>
            <input type="hidden" name="mymoney" id="mymoney" value="<?=$this->member['money']?>" />
            <span class="tips" id="howmoneytip"></span></div>
        </div>
      </div>
      <div class="opencard_button_box"><?=config::form('opcardbutton','确认提现','submit');?><span class="tips" id="cashtip"></span></div>
    </div>
    <? } ?>
    <? if($_GET['method']=='record') { ?>
    <div class="member_mian">
      <form method="GET" action="">
        <input type="hidden" name="mod" id="mod" value="<?=$_GET['mod']?>" />
        <input type="hidden" name="act" id="act" value="<?=$_GET['act']?>" />
        <input type="hidden" name="type" id="type" value="<?=$_GET['type']?>" />
        <input type="hidden" name="method" id="method" value="<?=$_GET['method']?>" />
        <div class="ex_find">
          <div class="ex_text">流水号</div>
          <div class="log_input_box">
            <input name="orderid" type="text" class="log_input" value="<?=$_GET['orderid']?>"  />
          </div>
          <div class="ex_text">查询日期</div>
          <div class="ex_time_box"><?=config::form('time',$this->time_str,'datas');?></div>
          <div class="ex_button_box">
            <input type="submit" id="button" value="查&nbsp;&nbsp;询" class="find_button" />
          </div>
        </div>
      </form>
      <div class="info_bg">
        <div class="info_text">查询统计：总共有 <b class="text_red_line"><?=$this->pagetotal?></b> 条记录，已支付 <b class="text_red_line">&yen;<?=$this->yespay?></b>，未支付 <b class="text_red_line">&yen;<?=$this->nopay?></b></div>
      </div>
      <? if($this->categories) { ?>
      <div id="container"></div>
      <? } ?>
      <table class="sheet">
        <tr>
          <th>提现编号</th>
          <th>流水号</th>
          <th>提现金额</th>
          <th>实收金额</th>
          <th>开户银行</th>
          <th>银行户名</th>
          <th>银行卡号</th>
          <th>目前状态</th>
          <th>申请时间</th>
        </tr>
        <? if(is_array($this->record)) { foreach($this->record as $value) { ?>        <tbody id="payorder_<?=$value['orderid']?>">
          <tr class="mybg">
            <td><?=$value['id']?></td>
            <td><?=$value['orderid']?></td>
            <td class="red">&yen;<?=$value['lognum']?></td>
            <td align="red">&yen;<?=formatnum($value['lognum']-($value['lognum']*(float)config::get("atmscale")/100)); ?></td>
            <td title="<?=$value['bankadd']?><?=$value['bankname']?>"><?=$value['bankname']?></td>
            <td><?=$value['truename']?></td>
            <td><?=substr($value['bankcard'],0,4)."***".substr($value['bankcard'],-4,4); ?></td>
            <td><?=atmcheck($value['checked']); ?></td>
            <td><?=formattime($value['addtime']); ?></td>
          </tr>
        </tbody>
        <? } } ?>      </table>
      <? if(!is_array($this->record)) { ?>
      <div class="no_info"><span class="no_info_ico"></span>暂无任何记录</div>
      <? } ?>
      <? if($this->newpage) { ?>
      <div class="pages"><?=$this->newpage?></div>
      <? } ?>
    </div>
    <? if($this->categories) { ?>
    <script language="javascript"> 
$(function() {
    $('#container').highcharts({
        chart: {
            type: 'line',
            renderTo: 'analysis',
            defaultSeriesType: 'line',
            spacingLeft: 1,
            marginRight: 130,
            marginBottom: 100
        },
        title: {
            text: '收支趋势图',
            x: -20
        },
        subtitle: {
            text: '',
            x: -20
        },
        xAxis: {
            categories: [<?=$this->categories?>],
            labels: {
                rotation: 45,
                y: 30,
                formatter: function() {
                    if (this.value.length == 8) {
                        return this.value.substring(4, this.value.length);
                    } else {
                        return this.value;
                    }
                },
                style: {
                    fontFamily: '宋体',
                    fontSize: '14px'
                }
            }
        },
        yAxis: {
            title: {
                text: '金额'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'

            }]
        },
        tooltip: {
            valueSuffix: '(元)'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -10,
            y: 100,
            borderWidth: 0
        },
        exporting: {
            enabled: false
        },
        series: [{name:'已支付',data:[<?=$this->yespaymoney?>]},{name:'未支付',data:[<?=$this->nopaymoney?>]}]
    });
});
</script>
    <? } ?>
    <? } ?>
    <? } ?>
  </div>
</div>
</div>
<? include template('member_footer','default/member'); ?>
