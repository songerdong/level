<? if (!defined('ROOT')) exit('Can\'t Access !'); include template('member_header','default/member'); ?>
<div id="main">
<div class="left">
<? include template('member_left','default/member'); ?>
</div>
<div class="right">
<div class="opencard_main">
<div class="track_title">
<a href="<?=Purl(memberpre(1)); ?>" class="<?=!$_GET['typeid'] ? 'menushow' : 'menu'; ?>">所有公告</a><? if(is_array($this->getnewstype(10))) { foreach($this->getnewstype(10) as $val) { ?><a href="<?=Purl(memberpre(1).'&typeid='.$val['id']); ?>" class="<?=$_GET['typeid']==$val['id'] ? 'menushow' : 'menu'; ?>"><?=$val['typename']?></a><? } } ?></div>
<? if($_GET['type']=='list') { ?>
<div class="member_mian">
<form method="GET" action="">
<input type="hidden" name="mod" id="mod" value="<?=$_GET['mod']?>" />
<input type="hidden" name="act" id="act" value="<?=$_GET['act']?>" />
<input type="hidden" name="type" id="type" value="<?=$_GET['type']?>" />
<input type="hidden" name="typeid" id="typeid" value="<?=$_GET['typeid']?>" />
<div class="ex_find">
<div class="ex_text">查询内容</div>
<div class="log_input_box">
<input name="content" type="text" class="log_input" value="<?=$_GET['content']?>" />
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
<th>记录编号</th>
<th>公告标题</th>
<th>浏览次数</th>
<th>所属分类</th>
<th>发布时间</th>
</tr><? if(is_array($this->record)) { foreach($this->record as $value) { ?><tr class="mybg">
<td width="150"><?=$value['id']?></td>
<td class="title">
<a href="<?=$value['url']?>"><?=$value['title']?></a>
</td>
<td><?=$value['clicknumber']?></td>
<td><?=$value['typename']?></td>
<td><?=$value['addtime']?></td>
</tr><? } } ?></table>
<? if(!is_array($this->record)) { ?>
<div class="no_info"><span class="no_info_ico"></span>暂无任何记录</div>
<? } if($this->newpage) { ?>
<div class="pages"><?=$this->newpage?></div>
<? } ?>
</div>
<? } if($_GET['type']=='show') { ?>
<div class="article">
<h1><?=$this->news['title']?></h1>
<p class="time">发布时间：<?=formattime($this->news['addtime']); ?> 点击次数：<?=$this->news['clicknumber']?> </p>
<div class="content"><?=$this->news['content']?></div>
</div>
<? } ?>
</div>
</div>
</div>
<? include template('member_footer','default/member'); ?>
