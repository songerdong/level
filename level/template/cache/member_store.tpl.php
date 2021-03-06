<? if (!defined('ROOT')) exit('Can\'t Access !'); include template('member_header','default/member'); ?>
<div id="main">
  <div class="left">
<? include template('member_left','default/member'); ?>
</div>
  <div class="right">
    <div class="opencard_main">
      <!--我的订货-->
      <? if($_GET['type']=='list') { ?>
        <? if(!$this->member['is_admin'] ) { ?>
          <? if($_GET['id']) { ?>
            <div class="xm-box uc-box">
              <div class="hd">
                <h3 class="title">订货单号：<?=$this->order['id']?></h3>
              </div>
              <? $shop = $this->getgoods(1,"goods_id='".$this->order['goods_id']."'"); ?>              <div class="bd">
                <div class="order-delivery-items">
                  <div class="order-delivery-item">
                    <table class="order-delivery-table">
                      <thead>
                        <tr>
                          <th class="cell-order-goods">商品信息</th>
                          <th class="cell-order-total">订单金额</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="cell-order-goods">
                              <div class="order-goods-info"><?=$shop['goods_name']?></div>
                              <div class="order-goods-amount"><?=$shop['agent_price']?>元/件</div>
                              <div class="order-goods-amount">x <?=$shop['unit_rate']?>件/箱</div>

                              <div class="order-goods-price">x <?=$this->order['store']?>箱</div>
                              <div class="order-goods-amount">x <?=$shop['ding_rate']?>%</div>
                          </td>
                          <td rowspan="<?=count($this->order['goods']); ?>"><?=$this->order['ding_price']?>元</td>
                          
                        </tr>                 
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="order-delivery-address clearfix">
                  <? if($this->paytype) { ?>
                  <div class="order-text-section-l">
                    <h4>支付账号信息</h4>

                    <table class="order-text-table">
                      <tr style="background: #ececec;">
                        <th>类型</th>
                        <th>账号</th>
                        <th>账户</th>
                        <th>地址</th>
                      </tr>
                      <? if(is_array($this->paytype)) { foreach($this->paytype as $val) { ?>                      <tr>
                        <td><?=$val['type']?></td>
                        <td><?=$val['payno']?></td>
                        <td><?=$val['payname']?></td>
                        <td><?=$val['bankadd']?></td>
                      </tr>
                      <? } } ?> 
                    </table>
                  </div>
                  <div class="order-text-section-l">
                    <? if($this->order['status'] == 0) { ?>
                      <form method="post" name="shopform" id="shopform" action="" onsubmit="return goodscheckForm()" enctype="multipart/form-data">
                          <div id="table_box_3"><br />
                            <table border="0" cellspacing="2" cellpadding="4" class="list" name="table" id="table" width="100%">
                              <tr style="border: 0;">
                                  <th style="background:none;border:0; text-align:center;display: block;background: #997F41;color: #fff;width: 104px;" align="right";>上传凭证：</th>
                                  <td style="background:none; border:0;display: block;position: absolute;top: 185px;left: 5px"><input class="middle" name="" type="hidden" />
                                  <div class="upload_btn"><span id="upload"></span></div>
                                  <label><span id="upload_tip">图片不超过2MB</span></label></td>
                              </tr>
                            </table>
                            <div id="uploadPic">
                              <ul id="uploadlist" style=" height:90px; overflow:hidden;">
                                <? if(is_array($this->add['goods_thumb'])) { foreach($this->add['goods_thumb'] as $k=>$v) { ?>                                <? $cover = $k==0 ? "凭证" : "&nbsp;"; ?>                                <li>
                                  <div><img src="<?=$v?>" /></div>
                                  <a class="delete" href="javascript:void(0);"></a>
                                  <input type="hidden" name="huiyuan_img[]" id="thumb_list" value="<?=$v?>" class="thumb_list" />
                                </li>
                                <? } } ?>                              </ul>
                              <div style="clear:both;"></div>
                            </div>
                        </div>
                          <?=config::form('button','提交','submit','','class=\'button\'');?>
                      </form>
                    <? } else { ?>         
                      <div style="position: relative;">
                        <h4 style="position: absolute;top: 0;left: 0;">支付凭证：</h4>
                        <img src="<?=$this->order['huiyuan_img']?>" style="width:355px;position: absolute;top: 70px;" />
                      </div>
                    <? } ?>
                  </div>
                  <? } else { ?>
                  <div class="order-text-section-l">
                  <p>请先联系上家，设置支付信息！</p>  
                  </div>
                  
                  <? } ?>
                </div>
              </div>
            </div>
            <script type="text/javascript">
            $(window).load(pageInit);
            function pageInit(){
              var uploadurl='<?=Purl('tools_upload')?>',ext='<?=$this->ftype?>',size='<?=$this->fsize?>',count='<?=$this->fcount?>',useget=0,params={}//默认值
              ext = ext.match(/([^\(]+?)\s*\(\s*([^\)]+?)\s*\)/i);
              swfu = new SWFUpload({
                flash_url : "<?=config::get('sitepath')?>app/swfupload/swfupload.swf",
                prevent_swf_caching : false,//是否缓存SWF文件
                upload_url: uploadurl, //上传文件
                file_post_name : "imgFile",
                post_params:  {'mychatpath':'goods','imgcut':'1'},//随文件上传一同向上传接收程序提交的Post数据
                use_query_string : false,//是否用GET方式发送参数
                file_types : ext[2],//文件格式限制
                file_types_description : ext[1],//文件格式描述
                file_size_limit : size, //文件大小限制
                file_queue_limit:0,//上传队列总数
                custom_settings : {
                  test : "aaa"
                },
                file_queued_handler : fileQueued,//添加成功
                file_queue_error_handler : fileQueueError,//添加失败
                file_dialog_complete_handler : fileDialogComplete,
                upload_start_handler : uploadStart,//上传开始
                upload_progress_handler : uploadProgress,//上传进度
                upload_error_handler : uploadError,//上传失败
                upload_success_handler : uploadSuccess,//上传成功
                upload_complete_handler : uploadComplete,//上传结束
                button_placeholder_id : "upload",
                button_width: 30,
                button_height: 21,
                button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT,
                button_cursor: SWFUpload.CURSOR.HAND,
                button_text : '上传',
                button_text_style: ".theFont { font-size: 12px; }",
                button_text_left_padding: 0,
                button_text_top_padding: 0,
                debug: false
              });
            }
            </script>
          <!-- <? } ?>-->
          <!--详情页结束-->

          <!--列表页-->
          <? if(!$_GET['id']) { ?>
           <div class="track_title"> 
              <a href="<?=Purl(memberpre(1)."&type=list"); ?>" class="<?=!$_GET['method'] ? 'menushow' : 'menu'; ?>">全部</a> 
              <a href="<?=Purl(memberpre(1)."&type=list&method=nopay"); ?>" class="<?=$_GET['method']=='nopay' ? 'menushow' : 'menu'; ?>">待付款</a> 
              <a href="<?=Purl(memberpre(1)."&type=list&method=yespay"); ?>" class="<?=$_GET['method']=='yespay' ? 'menushow' : 'menu'; ?>">待确认</a> 
              <a href="<?=Purl(memberpre(1)."&type=list&method=confirm"); ?>" class="<?=$_GET['method']=='yessend' ? 'menushow' : 'menu'; ?>">已确认</a> 
             </div>
             <div class="member_mian">
                <form method="GET" action="">
                  <input type="hidden" name="mod" id="mod" value="<?=$_GET['mod']?>" />
                  <input type="hidden" name="act" id="act" value="<?=$_GET['act']?>" />
                  <input type="hidden" name="type" id="type" value="<?=$_GET['type']?>" />
                  <div class="ex_find">
                    <div class="ex_text">订单编号</div>
                    <div class="log_input_box">
                      <input name="storeid" type="text" class="log_input" value="<?=$_GET['storeid']?>" />
                    </div>
                    <div class="ex_text">查询日期</div>
                    <div class="ex_time_box"><?=config::form('time',$this->t['str'],'datas');?></div>
                    <div class="ex_button_box">
                      <input type="submit" id="button" value="查&nbsp;&nbsp;询" class="find_button" />
                    </div>
                  </div>
                </form>
                <div class="info_bg">
                  <div class="info_text">查询统计：总共有 <b class="text_red_line"><?=$this->pagetotal?></b> 条记录</div>
                </div>
                <table class="sheet">
                  <tr>
                    <th>预定货号</th>
                    <th>产品列表(名称，单价，数量，预付比例)</th>
                    <th>订单总额</th>
                    <th>预付总额</th>
                    <th>订购时间</th>
                     <th>支付凭证</th>
                    <th>目前状态</th>
                  </tr>
                  <? if(is_array($this->order)) { foreach($this->order as $value) { ?>                  <tbody id="remove_<?=$value['id']?>">
                  <tr class="mybg">
                    <td width="12%"><?=$value['id']?></td>
                    <td class="order-delivery-table" style="width:40%">
                      <? $shop = $this->getgoods(1,"goods_id='".$value['goods_id']."'"); ?>                       <div class="order-goods-info" style="padding-top:0;padding-bottom:0;"><?=$shop['goods_name']?></div>
                       <div class="order-goods-price" style="padding-top:0;padding-bottom:0;"><?=$shop['agent_price']?>元</div>
                       <div class="order-goods-amount" style="padding-top:0;padding-bottom:0;">x <?=$value['store']?>箱</div>
                       <div class="order-goods-amount" style="padding-top:0;padding-bottom:0;">x 10%</div>
                       <div style="clear:both;"></div>
                    </td>
                    <td width="10%" class="red">&yen;<?=$value['ding_price']*10; ?></td>
                    <td width="10%" class="red">&yen;<?=$value['ding_price']?></td>
                    <td width="10%"><?=$value['addtime']?></td>
                    <td width="10%">
                    <? if($value['status']>0) { ?>
                     <a target="blank" href="<?=$value['huiyuan_img']?>"><img src="<?=$value['huiyuan_img']?>" width='30' height='30' style='vertical-align:middle;cursor:pointer'/></a>
                    <? } ?>
                    </td>
                    <td width="12%" style="line-height:24px;padding:10px 0;">
                    <? if($value['status'] ==1) { ?>
                    <span  price="<?=$this->order['price']?>">等待确认</span>
                    <? } elseif($value['status'] ==2) { ?>
                    <span  price="<?=$this->order['price']?>">已完成</span>
                    <? } else { ?>
                    <a href="<?=Purl("?mod=member&act=store&type=list&id=".$value['id']); ?>">确认支付</a>
                    <? } ?>
                    </td>
                  </tr>
                  </tbody>
                  <? } } ?>                </table>
                <? if(!is_array($this->order)) { ?>
                <div class="no_info"><span class="no_info_ico"></span>暂无任何记录</div>
                <? } ?>
                <? if($this->newpage) { ?>
                <div class="pages"><?=$this->newpage?></div>
                <? } ?>
             </div>
          <? } ?>
          <!--列表页结束-->
        <? } else { ?>
        <div class="no_info"><span class="no_info_ico"></span>管理员股东无需订货！</div>
        <? } ?>
      <? } ?>
      <!--我的订货结束-->

      <!--商品订货-->
      <? if($_GET['type']=='detail') { ?>
        <? if(!$this->member['is_admin']) { ?>
          <div class="opencards_title">
            <div class="opencards_title_b">我的会员</div>
          </div>
          <div class="member_mian">
            <div class="info_bg">
              <div class="info_text">当前剩余库存： <b class="text_red_line"><?=$this->member['store']?></b> 箱</div>
            </div>
            <form method="post"  name="goodsfrom" id="storefrom" action="" onsubmit="return checkform()">
            <table class="sheet table">
              <tr>
                <th>产品编号</th>
                <th>产品名称</th>
                <th>产品价格</th>
                <th>单位比例</th>
                <th>定金比例</th>
                <!--<th>剩余库存</th>-->
                <th>起定量</th>
                <th>价格共计</th>
                <th>定金</th>

              </tr>
              <? if(is_array($this->record)) { foreach($this->record as $value) { ?>              <tr class="mybg">
                <td><?=$value['goods_id']?></td>
                <td><?=$value['goods_name']?></td>
                 <td class="red">&yen; <?=$value['agent_price']?>/件</td>
                 <td class="red"><?=$value['unit_rate']?>件/箱</td>
                 <td class="red"><?=$value['ding_rate']?>%</td>
                <td>          
                  <div class="change-goods-num clearfix changeGoodsNum info_<?=$value['goods_id']?>" data-value="<?=$value['agent_price']?>" data-unit ="<?=$value['unit_rate']?>" data-ding ="<?=$value['ding_rate']?>">
                      <a href="javascript:_number(-1,<?=$value['goods_id']?>,<?=$value['minimum']?>);">
                      <span class="icon-common icon-common-negative"></span>
                      </a>
                      <input tyep="hidden" name="goods_id" value="<?=$value['goods_id']?>" style="display:none;" />
                      <input tyep="text" name="number" value="<?=$value['minimum']?>"  onblur="return _input(this,'<?=$value['minimum']?>');" class="goods-num" id="number_<?=$value['goods_id']?>">
                      <a href="javascript:_number(1,<?=$value['goods_id']?>,<?=$value['minimum']?>);"><span class="icon-common icon-common-add"></span></a>箱
                   </div>
                </td>
                <td class="red">&yen; <span id='price' ><?=$value['minimum']*$value['agent_price']*$value['unit_rate']; ?></span></td>
                <td class="red">&yen; <span class='ding_price' ><?=$value['minimum']*$value['agent_price']*$value['unit_rate']*$value['ding_rate']*0.01; ?></span></td>
              </tr>
              
              <? } } ?>            </table>
            <div class="shop-cart-count">
              <div class="shop-cart-total">
                <p class="total-price">应付定金：<span><strong class='ding_price'><?=$value['minimum']*$value['agent_price']*$value['unit_rate']*$value['ding_rate']*0.01; ?></strong>元</span></p>
              </div>
            </div>  
            <?=config::form('shop-cart-btns','现在去结账','submit','','class=\'shop-cart-btns\'');?>
            <div class="shop-cart-btns nobtns">暂不订购了</div>
           </form>
            <? if(!is_array($this->record)) { ?>
            <div class="no_info"><span class="no_info_ico"></span>暂无任何记录</div>
            <? } ?>
            <? if($this->newpage) { ?>
            <div class="pages"><?=$this->newpage?></div>
            <? } ?>
          </div>
        <? } else { ?>
        <div class="no_info"><span class="no_info_ico"></span>管理员股东无需订货！</div>
        <? } ?>
      <? } ?>
      <!--商品订货结束-->

      <!--下级订货-->
      <? if($_GET['type']=='childlist') { ?>
       <div class="track_title"> 
        <a href="<?=Purl(memberpre(1)."&type=childlist"); ?>" class="<?=!$_GET['method'] ? 'menushow' : 'menu'; ?>">全部</a> 
        <a href="<?=Purl(memberpre(1)."&type=childlist&method=yespay"); ?>" class="<?=$_GET['method']=='yespay' ? 'menushow' : 'menu'; ?>">待确认</a> 
        <a href="<?=Purl(memberpre(1)."&type=childlist&method=confirm"); ?>" class="<?=$_GET['method']=='confirm' ? 'menushow' : 'menu'; ?>">已确认</a> 
       </div>
       <div class="member_mian">
        <form method="GET" action="">
          <input type="hidden" name="mod" id="mod" value="<?=$_GET['mod']?>" />
          <input type="hidden" name="act" id="act" value="<?=$_GET['act']?>" />
          <input type="hidden" name="type" id="type" value="<?=$_GET['type']?>" />
          <div class="ex_find">
            <div class="ex_text">订货单编号</div>
            <div class="log_input_box">
              <input name="id" type="text" class="log_input" value="<?=$_GET['id']?>" />
            </div>
            <div class="ex_text">查询日期</div>
            <div class="ex_time_box"><?=config::form('time',$this->t['str'],'datas');?></div>
            <div class="ex_button_box">
              <input type="submit" id="button" value="查&nbsp;&nbsp;询" class="find_button" />
            </div>
          </div>
        </form>
        <div class="info_bg">
          <div class="info_text">查询统计：总共有 <b class="text_red_line"><?=$this->pagetotal?></b> 条记录</div>
        </div>
        <table class="sheet">
          <tr>
            <th>预定货号</th>
            <th>产品列表(名称，单价，数量，预付比例)</th>
            <th>订单总额</th>
            <th>预付总额</th>
            <th>订购时间</th>
            <th>支付凭证</th>
            <th>目前状态</th>
          </tr>
          <? if(is_array($this->order)) { foreach($this->order as $value) { ?>          <tbody id="remove_<?=$value['id']?>">
          <tr class="mybg">
            <td width="12%"><?=$value['id']?></td>
            <td class="order-delivery-table" style="width:40%">
              <? $shop = $this->getgoods(1,"goods_id='".$value['goods_id']."'"); ?>               <div class="order-goods-info" style="padding-top:0;padding-bottom:0;"><?=$shop['goods_name']?></div>
               <div class="order-goods-price" style="padding-top:0;padding-bottom:0;"><?=$shop['agent_price']?>元</div>
               <div class="order-goods-amount" style="padding-top:0;padding-bottom:0;">x <?=$value['store']?>箱</div>
               <div class="order-goods-amount" style="padding-top:0;padding-bottom:0;">x 10%</div>
               <div style="clear:both;"></div>
            </td>
            <td width="10%" class="red">&yen;<?=$value['ding_price']*10; ?></td>
            <td width="10%" class="red">&yen;<?=$value['ding_price']?></td>
            <td width="10%"><?=$value['addtime']?></td>
            <td width="10%"> <a target="blank" href="<?=$value['huiyuan_img']?>"><img src="<?=$value['huiyuan_img']?>" width='30' height='30' style='vertical-align:middle;cursor:pointer'/></a></td>
            
            <td width="12%" style="line-height:24px;padding:10px 0;">
            <? if($value['status'] ==1) { ?>
            <span class="ordtin" style="display: block;">已付款</span><button id="confirmstore" data-value="<?=$value['id']?>" class="ent">确认收款</button>   
            <? } elseif($value['status'] ==2) { ?>
            <span  price="<?=$this->order['price']?>">已完成</span>
            <? } ?>
           
            </td>
          </tr>
          </tbody>
          <? } } ?>        </table>
        <? if(!is_array($this->order)) { ?>
        <div class="no_info"><span class="no_info_ico"></span>暂无任何记录</div>
        <? } ?>
        <? if($this->newpage) { ?>
        <div class="pages"><?=$this->newpage?></div>
        <? } ?>
       </div>
      <? } ?>
      <!--下级订货结束-->
    </div>
  </div>
</div>
</div>
<script type="text/javascript">
  $('#confirmstore').click(function(event) {
    var id = $(this).data('value');
    showhandle({
      html:'<table class="lotab"><tr><th><label>支付密码：</label></th><td><input id="repass" class="myinput repass" type="password"></td></tr></table>',
      width:320,
      height:140,
      id:'cancelorder',
      title:'确认收款'
    },function(){
    $("#controlLoad").show();
    removetip("cancelorder");
       $.getJSON(get_url('act=paydingorder&sendway=user&id='+id),function(res){      
      $("#controlLoad").hide();                                    
      if(res.error=='0'){
      hidebox('cancelorder',true);
      $("#remove_"+id).remove();
      }else{
      addtip("cancelorder",res.error);
      }               
      });
    });  
  });
</script>
<? include template('member_footer','default/member'); ?>
