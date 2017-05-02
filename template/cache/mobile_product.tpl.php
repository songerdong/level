<? if (!defined('ROOT')) exit('Can\'t Access !'); ?>
<!DOCTYPE html>
<html>

<head>
<title>商品详情</title>
<meta charset="UTF-8">
<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
        
<? include template('../common','default/mobile'); ?>
    <link rel="stylesheet" href="<?=$this->tempdir?>css/common.css" type="text/css" />
    <link rel="stylesheet" href="<?=$this->tempdir?>css/style.css" type="text/css" />
    <script type="text/javascript" src="<?=$this->tempdir?>js/common.js" ></script>
    <script type="text/javascript" src="<?=$this->tempdir?>js/jquery-1.8.3.js" ></script>
    <script type="text/javascript" src="<?=$this->tempdir?>js/product.js" ></script>
</head>

<body style="background: #f0f0f0;padding-bottom: 60px">
<div class="tab-head">
            <span>
            <a href="javascript:history.back();">
            <i></i>
            </a>
            </span>
                <?=$this->member['groupname']?>
</div>
<div class="pro_pic">
            <img src="<?=$this->agentgoods['picurl']?>" alt="">
<h1><?=$this->agentgoods['goods_name']?></h1>
</div>
<div class="price">
<ul class="clearBoth">
<li>
<h2>代理价格：</h2>
<p>¥ <span><?=$this->agentgoods['agent_price']?></span></p>
<span>/箱</span>
<div></div>
</li>
<li>
<h2>产品价格：</h2>
<p>¥ <span><?=$this->agentgoods['mk_price']?></span></p>
<span>/箱</span>
</li>
</ul>
<div class="company">
<p>单位：<?=$this->agentgoods['unit_rate']?>件/箱</p>
</div>
</div>
<div class="pro_cont">
<ul class="pro_cont_up">
<li class="pro_cont_one">
<p>您的级别：</p>
<h1><?=$this->member['groupname']?></h1>
</li>
<li class="pro_cont_two">
<p>提成：</p>
<h1><?=$this->agentgoods['bonus']?><span>元/箱</span></h1>
</li>
</ul>
<ul class="pro_cont_down">
<li class="pro_cont_two">
<p>分红：</p>
<h1><?=$this->agentgoods['share_money']?><span>元/箱</span></h1>
</li>
<li class="pro_cont_one">
<p>返点：</p>
<h1 style="color: #bf2664;"><?=$this->agentgoods['rebate']?><span>元/箱</span></h1>
</li>
</ul>
</div>
<div class="policy-detail">
<h2>政策详情</h2>
            <div class="policy-title policy-on">
                分享租赁
            </div>
            <div class="policy-title">
                分享推广
            </div>
            <div class="policy-title">
                推广分享奖励
            </div>
            <div class="policy-title">
                市场推广奖励
            </div>
</div>
        <div class="policy-list">
            <div class="item-wrap ">
                <ul class="item-title-50">
                    <li>一级分享师</li>
                    <li>阖家康团租价</li>
                    <li>体验会员价</li>
                    <li>全国线上线下统一零售价</li>
                </ul>
                <ul class="item-content-50">
                    <li>15个*1990元=29850元</li>
                    <li>5个*3480元=17400元</li>
                    <li>2个*3680元=10400元</li>
                    <li>3980元/个</li>
                </ul>
            </div>
            <div class="item-wrap " style="display: none">
                <ul class="item-title-34">
                    <li style="line-height: 45px" >分享级别</li>
                    <li> </li>
                    <li>城市总管
                        <span>（拥有5个一级分享师）</span></li>
                    <li>大区总管 <span>（拥有三个直系城市）</span>
                    </li>
                    <li>项目合伙人 <span>（拥有三个直系大区总管）</span></li>
                    <li>项目股东 <span>（拥有三个直系项目合伙人）</span></li>
                </ul>
                <ul class="item-content-33">
                    <li>起订量</li>
                    <li>15个/1箱</li>
                    <li>6箱</li>
                    <li>19箱</li>
                    <li>58箱</li>
                    <li>175箱</li>
                </ul>
                <ul class="item-content-33">
                    <li>生产订金</li>
                    <li>29850元</li>
                    <li>179100元</li>
                    <li>567150元</li>
                    <li>1731300元</li>
                    <li>5223750元</li>
                </ul>
            </div>
            <div class="item-wrap " style="display: none">
                <h4 class="item-wrap-title">招商返点</h4>
                <ul class="item-content-100">
                    <li>一级分享师：返1500元/箱</li>
                    <li>城市总管：返1500元/箱</li>
                    <li>大区总管：返1500元/箱</li>
                </ul>
                <h4 class="item-wrap-title">推广提成&nbsp;&nbsp;公司分润</h4>
                <ul class="item-title-34" style="line-height: 45px">
                    <li>级别</li>
                    <li>城市总管</li>
                    <li>大区总管</li>
                    <li>项目合伙人</li>
                    <li>项目股东</li>
                </ul>
                <ul class="item-content-33">
                    <li>业绩提成</li>
                    <li>1000元/箱</li>
                    <li>1200元/箱</li>
                    <li>1400元/箱</li>
                    <li>1600元/箱</li>
                </ul>
                <ul class="item-content-33">
                    <li>公司分润</li>
                    <li>800元/箱</li>
                    <li>1000元/箱</li>
                    <li>1200元/箱</li>
                    <li>1400元/箱</li>
                </ul>
            </div>
            <div class="item-wrap " style="display: none">
                <h4 class="item-wrap-title">积分奖励</h4>
                <p class="item-wrap-par">一.任何一级分享管理方均向自己直属上级分享管理方进货，进货渠道终身制，除一级分享师以外均享受送等值推广积分。</p>
                <p class="item-wrap-par">二.推广积分可换购 可转让。可上HSTC华商通码商城以会员价消费购买任何产品。</p>
                <p class="item-wrap-par">三.推广积分可参与公司年度分红奖励，每箱450元。</p>
                <h4 class="item-wrap-title">特殊贡献奖</h4>
                <p class="item-wrap-par">任何分享级别凡累积分享租赁满5000个KANGTELI炭氢水杯，品牌总部奖励梅赛德斯2017款C200轿跑汽车一辆；推广分享租赁满8000个KANGTELI炭氢水杯，由品牌总部另奖励梅赛德斯2017款GLC200一辆，推广分享租赁满12000个KANGTELI炭氢水杯，由品牌总部另奖励2017款卡宴SUV一辆。推广分享租赁满20000个KANGTELI炭氢水杯，由品牌总部另奖励梅赛德斯G500一辆。
                </p>
            </div>
        </div>
        <div class="policy-pro-wrap">
            <p class="policy-pro">注：产品大包装单位为箱，一箱15个杯，团租及会员体验均属于健康体验会员群体，炭氢
                杯租赁体验均以4个月起租。每月租金为360元 起租6个月，每月租金为240元，起租9个月
                每月租金180元 起租一年，每月租金为120元。超过一年为永久租赁，享受三年的产品免费
                售后维护维修服务。</p>
            <p class="policy-pro" style="display: none">注：产品包装为15个每箱，各级总管均以1990元/个价格进货，招商
                批发统一实行返点、分红积分兑付等奖励政策。</p>
        </div>
        <input type="hidden" name="goods_id" value="<?=$this->agentgoods['goods_id']?>">
<div class="pro_foot">
<button type="button" onclick="submit()">提交订单</button>
<ul>
                <li><span class="jian num">—</span></li>
<li><input type="number" name="number" id="pronumb" value="1" /></li>
<li><span class="jia num">＋</span></li>
</ul>
            <div class="pro-submit clearBoth">
                <h6>折后金额：</h6>
                <input type="hidden" name="zhprice" id="zhprice" value="<?=$this->agentgoods['re_money']?>">
                <p>¥<span id="allmoney"><?=$this->agentgoods['re_money']?></span></p>
            </div>
</div>
</body>
    <script type="text/javascript">
    
    $(".jia").click(function () {
        var val = $("#pronumb").val();
        var num = parseInt(val) + 1;
        var money = <?=$this->agentgoods['re_money']?>;
        $("#pronumb").val(num);
        $("#allmoney").html(parseInt(money)*num);

    });
    $(".jian").click(function () {
        var val = $("#pronumb").val();
        if (val == 1) {
            var num = 1;
        } else {
            var num = parseInt(val) - 1;
            $("#pronumb").val(num)
        }
        var money = <?=$this->agentgoods['re_money']?>;

        var zhprice = parseInt(money)*num;
        $("#allmoney").html(zhprice);
        $("#zhprice").val();
        $("#zhprice").val(zhprice);

    });
    $("#pronumb").focusout(function () {
        if ($("#pronumb").val() == "") {
            $("#pronumb").val(1)
        }
    });

    function submit(){
        var number = $("#pronumb").val();
        var zhprice = $("#zhprice").val();
        $.ajax({
        url:"<?=Purl('mobile_subOrder')?>",
        type:'POST', //GET
        async:true,    //或false,是否异步
        data:{
            'goods_id':<?=$this->agentgoods['goods_id']?>,'number':number,'zhprice':zhprice
        },
        timeout:5000,    //超时时间
        dataType:'json',    //返回的数据格式：json/xml/html/script/jsonp/text
        success:function(rs){
        if (rs) {
            location.href =rs;
            }
        },
        })
    }

    </script>
</html>
