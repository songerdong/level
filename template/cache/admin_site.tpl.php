<? if (!defined('ROOT')) exit('Can\'t Access !'); include template('admin_header','admin'); if($_GET['get']=='news') { if($_GET['re']=='list') { ?>
<div class="headbar clearfix">
<ul class="tab">
<li <? if(!$_GET[ 'typeid']) { ?>class="selected" <? } ?>>
<a href="<?=Purl(" ?mod=admin&act=site&get=news "); ?>" hidefocus="true">全部分类</a>
</li><? if(is_array($this->getnewstype(10))) { foreach($this->getnewstype(10) as $val) { $selected = $_GET['typeid']==$val['id'] ? 'class="selected"' : ""; ?><li <?=$selected?>>
<a href="<?=Purl(" ?mod=admin&act=site&get=news&typeid=".$val['id']); ?>" hidefocus="true"><?=$val['typename']?></a>
</li><? } } ?><div class="tabright">
<form method="get" action="">
<input type="hidden" name="mod" id="mod" value="<?=$_GET['mod']?>" />
<input type="hidden" name="act" id="act" value="<?=$_GET['act']?>" />
<input type="hidden" name="get" id="get" value="<?=$_GET['get']?>" />
<input type="hidden" name="re" id="re" value="<?=$_GET['re']?>" /> 查询内容：
<input type="text" name="content" id="content" value="<?=$_GET['content']?>" class='skey w120' /> 发布时间：<?=config::form('time',$this->t['str'],'datas');?>
<input type="submit" id="button" value="立即搜索" class='button'>
</form>
</div>
<div style="clear:both;"></div>
</ul>
</div>
<form method="post" action="">
<table border="0" cellspacing="2" cellpadding="4" class="list" name="table" id="table" width="100%">
<thead>
<tr>
<th width="60px"><input type="checkbox" id="chkall" name="chkall" onclick="checkall(this.form, 'id')"></th>
<th align="center">新闻编号</th>
<th align="center">新闻标题</th>
<th align="center">所属分类</th>
<th align="center">发布时间</th>
<th align="center">新闻操作</th>
</tr>
</thead><? if(is_array($this->newslist)) { foreach($this->newslist as $value) { ?><tbody id="remove_<?=$value['id']?>">
<tr class="trhover">
<td align="center"><input type="checkbox" name="id[]" value="<?=$value['id']?>"></td>
<td align="center"><?=$value['id']?></td>
<td align="left" style="padding-left:10px;"><?=$value['title']?></td>
<td align="center"><?=$value['typename']?></td>
<td align="center"><?=$value['addtime']?></td>
<td align="center">
<a href="<?=$value['editurl']?>"><img src="<?=$this->tempdir?>images/icon_edit.gif" title="编辑" /></a> <?=config::form($value['id'],'确认要删除该分类吗','remove');?> </td>
</tr>
</tbody><? } } ?></table>
&nbsp;&nbsp; <?=config::form('button','批量删除','submit','','class=\'button\'');?>
</form>
<div class="page"><span><?=$this->pagetotal?>条记录/<? echo $_GET['page'] ? $_GET['page'] : 1  ?>页</span><?=$this->showpage?></div>
<div class="blank20"></div>
<? } if($_GET['re']=='add'||$_GET['re']=='edit') { ?>
<form method="post" name="form1" action="">
<div>
<table border="0" cellspacing="2" cellpadding="4" class="list" name="table" id="table" width="100%">
<tbody>
<tr class="trhover">
<td class="left">新闻标题</td>
<td> <?=config::form('title',$this->news['title'],'input','','class=\'skey\'');?> </td>
</tr>
<tr class="trhover">
<td class="left">所属分类</td>
<td> <?=config::form('typeid',$this->news['typeid'],'select',$this->typelist);?> </td>
</tr>
<tr class="trhover">
<td class="left">发布时间</td>
<td> <?=config::form('addtime',formattime($this->news['addtime']),'data',true,'datefmt');?> </td>
</tr>
<tr class="trhover">
<td class="left">详细内容</td>
<td> <?=config::form('content',$this->news['content'],'editor','0','
<1@1>','news');?> </td>
</tr>
</tbody>
</table>
</div>
<div class="blank20"></div>
<?=config::form('button','提交','submit','','class=\'button\'');?>
</form>
<? } if($_GET['re']=='type') { ?>
<form method="post" action="" onsubmit="return sinAlert('确认要对所有分类进行修改操作吗？');">
<table border="0" cellspacing="2" cellpadding="4" class="list" name="table" id="table" width="100%">
<thead>
<tr>
<th align="center">分类编号</th>
<th align="center">分类名称</th>
<th align="center">系统公告(0为不是、1为是，登录会员可查看)</th>
<th align="center">分类排序</th>
<th align="center">分类操作</th>
</tr>
</thead>
<tbody id="type"><? if(is_array($this->typelist)) { foreach($this->typelist as $value) { ?><tr class="trhover" id="remove_<?=$value['id']?>">
<td align="center"><?=$value['id']?><input type="hidden" name="id[]" value="<?=$value['id']?>"></td>
<td align="center"> <?=config::form('typename[]',$value['typename'],'input','','class=\'skey\' style=\'width:130px;\'');?> </td>
<td align="center"> <?=config::form('system[]',$value['system'],'input','','class=\'skey\' style=\'width:50px;\'');?> </td>
<td align="center"> <?=config::form('typeorder[]',$value['typeorder'],'input','','class=\'skey\' style=\'width:50px;\'');?> </td>
<td align="center"><?=config::form($value['id'],'确认要删除该分类吗','remove','removetype');?></td>
</tr><? } } ?></tbody>
</table>
<div class="blank20"></div>
<?=config::form('button','确认修改','submit','','class=\'button\'');?>
<input type="button" name="button" id="typebutton" value="添加一个分类" onclick="addnewstype();" class="button" />
</form>
<? } } if($_GET['get']=='about') { if($_GET['re']=='list') { ?>
<div class="headbar clearfix">
<ul class="tab">
<li <? if(!$_GET[ 'typeid']) { ?>class="selected" <? } ?>>
<a href="<?=Purl(" ?mod=admin&act=site&get=about "); ?>" hidefocus="true">全部分类</a>
</li><? if(is_array($this->getabouttype(10))) { foreach($this->getabouttype(10) as $val) { $selected = $_GET['typeid']==$val['id'] ? 'class="selected"' : ""; ?><li <?=$selected?>>
<a href="<?=Purl(" ?mod=admin&act=site&get=about&typeid=".$val['id']); ?>" hidefocus="true"><?=$val['typename']?></a>
</li><? } } ?><div style="clear:both;"></div>
</ul>
</div>
<form method="post" action="" onsubmit="return sinAlert('确认批量删除选中的所有信息吗？');">
<table border="0" cellspacing="2" cellpadding="4" class="list" name="table" id="table" width="100%">
<thead>
<tr>
<th width="60px"><input type="checkbox" id="chkall" name="chkall" onclick="checkall(this.form, 'id')"></th>
<th align="center">编号</th>
<th align="center">单页标题</th>
<th align="center">单页分类</th>
<th align="center">单页操作</th>
</tr>
</thead><? if(is_array($this->aboutlist)) { foreach($this->aboutlist as $value) { ?><tbody id="remove_<?=$value['id']?>">
<tr class="trhover">
<td align="center"><input type="checkbox" name="id[]" value="<?=$value['id']?>"></td>
<td align="center"><?=$value['id']?></td>
<td align="center"><?=$value['name']?></td>
<td align="center"><?=$value['typename']?></td>
<td align="center">
<a href="<?=$value['editurl']?>"><img src="<?=$this->tempdir?>images/icon_edit.gif" title="编辑" /></a> <?=config::form($value['id'],'确认要删除该单页吗','remove');?> </td>
</tr>
</tbody><? } } ?></table>
<?=config::form('button','删除','submit','','class=\'button\'');?>
</form>
<div class="page"><span><?=$this->pagetotal?>条记录/<? echo $_GET['page'] ? $_GET['page'] : 1  ?>页</span><?=$this->showpage?></div>
<div class="blank20"></div>
<? } if($_GET['re']=='add'||$_GET['re']=='edit') { ?>
<form method="post" name="form1" action="">
<div>
<table border="0" cellspacing="2" cellpadding="4" class="list" name="table" id="table" width="100%">
<tbody>
<tr class="trhover">
<td class="left">单页名称</td>
<td> <?=config::form('name',$this->about['name'],'input','','class=\'skey\'');?> <span class="tipser" id="nametip">单页的名称</span></td>
</tr>
<tr class="trhover">
<td class="left">连接地址</td>
<td> <?=config::form('myurl',$this->about['myurl'],'input','','class=\'skey\'');?> <span class="tipser" id="nametip">如果不填写就是连接地址是当前ID</span></td>
</tr>
<tr class="trhover">
<td class="left">所属分类</td>
<td> <?=config::form('typeid',$this->about['typeid'],'select',$this->typelist);?> </td>
</tr>
<tr class="trhover">
<td class="left">详细内容</td>
<td> <?=config::form('content',$this->about['content'],'editor','0','
<1@1>','about');?> <span class="tipser" id="contenttip">单页的详细内容</span></td>
</tr>
</tbody>
</table>
</div>
<div class="blank20"></div>
<?=config::form('button','提交','submit','','class=\'button\'');?>
</form>
<? } if($_GET['re']=='type') { ?>
<form method="post" action="" onsubmit="return sinAlert('确认要对所有分类进行修改操作吗？');">
<table border="0" cellspacing="2" cellpadding="4" class="list" name="table" id="table" width="100%">
<thead>
<tr>
<th align="center">分类编号</th>
<th align="center">分类名称</th>
<th align="center">分类排序</th>
<th align="center">分类操作</th>
</tr>
</thead>
<tbody id="type"><? if(is_array($this->typelist)) { foreach($this->typelist as $value) { ?><tr class="trhover" id="remove_<?=$value['id']?>">
<td align="center"><?=$value['id']?>
<input type="hidden" name="id[]" value="<?=$value['id']?>"></td>
<td align="left" style="padding-left:10px;"> <?=config::form('typename[]',$value['typename'],'input','','class=\'skey\' style=\'width:130px;\'');?> </td>
<td align="left" style="padding-left:10px;"> <?=config::form('typeorder[]',$value['typeorder'],'input','','class=\'skey\' style=\'width:50px;\'');?> </td>
<td align="center"><?=config::form($value['id'],'确认要删除该分类吗','remove','removetype');?></td>
</tr><? } } ?></tbody>
</table>
<div class="blank20"></div>
<?=config::form('button','确认修改','submit','','class=\'button\'');?>
<input type="button" name="button" id="typebutton" value="添加一个分类" onclick="addtype();" class="button" />
</form>
<? } } include template('admin_footer','admin'); ?>
