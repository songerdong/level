<? if (!defined('ROOT')) exit('Can\'t Access !'); include template('member_header','default/member'); ?>
<div id="main">
  <div class="left">
<? include template('member_left','default/member'); ?>
</div>
  <div class="right">
    <div class="opencard_main">
      <div class="track_title"> <a href="<?=Purl(memberpre(1).'&method=sendfrom'); ?>" class="<?=$_GET['method']=='sendfrom' ? 'menushow' : 'menu'; ?>">收件箱</a> <a href="<?=Purl(memberpre(1).'&method=sendto'); ?>" class="<?=$_GET['method']=='sendto' ? 'menushow' : 'menu'; ?>">发件箱</a> <a href="<?=Purl(memberpre(1).'&method=send'); ?>" class="<?=$_GET['method']=='send' ? 'menushow' : 'menu'; ?>">写信件</a> </div>
      <? if($_GET['method']=='sendfrom') { ?>
      <div class="member_mian">
        <form method="GET" action="">
          <input type="hidden" name="mod" id="mod" value="<?=$_GET['mod']?>" />
          <input type="hidden" name="act" id="act" value="<?=$_GET['act']?>" />
          <input type="hidden" name="method" id="method" value="<?=$_GET['method']?>" />
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
            <th>信件编号</th>
            <th>信件主题</th>
            <th>是否已读</th>
            <th>发布时间</th>
            <th>删除信件</th>
          </tr>
          <? if(is_array($this->record)) { foreach($this->record as $value) { ?>          <tr class="mybg" id="remove_<?=$value['id']?>">
            <td width="150"><?=$value['id']?></td>
            <td class="title"><a href="javascript:listTable.message(<?=$value['id']?>);"><img id="mess_<?=$value['id']?>" src="<?=$this->tempdir?>images/message_<?=$value['ico']?>.gif"/><?=$value['title']?></a></td>
            <td id="read_<?=$value['id']?>"><?=$value['checked']?></td>
            <td><?=$value['addtime']?></td>
            <td><a href="javascript:listTable.memberRemove('<?=$value['id']?>','确定要删除该信件吗');">删除</a></td>
          </tr>
          <? } } ?>        </table>
        <? if(!is_array($this->record)) { ?>
        <div class="no_info"><span class="no_info_ico"></span>暂无任何记录</div>
        <? } ?>
        <? if($this->newpage) { ?>
        <div class="pages"><?=$this->newpage?></div>
        <? } ?>
      </div>
      <? } ?>
      <? if($_GET['method']=='sendto') { ?>
      <div class="member_mian">
        <form method="GET" action="">
          <input type="hidden" name="mod" id="mod" value="<?=$_GET['mod']?>" />
          <input type="hidden" name="act" id="act" value="<?=$_GET['act']?>" />
          <input type="hidden" name="type" id="type" value="<?=$_GET['type']?>" />
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
            <th>信件编号</th>
            <th>信件主题</th>
            <th>是否已读</th>
            <th>发布时间</th>
            <th>删除信件</th>
          </tr>
          <? if(is_array($this->record)) { foreach($this->record as $value) { ?>          <tr class="mybg" id="remove_<?=$value['id']?>">
            <td width="150"><?=$value['id']?></td>
            <td class="title"><a href="javascript:listTable.message(<?=$value['id']?>);"><img id="mess_<?=$value['id']?>" src="<?=$this->tempdir?>images/message_<?=$value['ico']?>.gif"/><?=$value['title']?></a></td>
            <td><?=$value['checked']?></td>
            <td><?=$value['addtime']?></td>
            <td><a href="javascript:listTable.memberRemove('<?=$value['id']?>','确定要删除该信件吗');">删除</a></td>
          </tr>
          <? } } ?>        </table>
        <? if(!is_array($this->record)) { ?>
        <div class="no_info"><span class="no_info_ico"></span>暂无任何记录</div>
        <? } ?>
        <? if($this->newpage) { ?>
        <div class="pages"><?=$this->newpage?></div>
        <? } ?>
      </div>
      <? } ?>
      <? if($_GET['method']=='send') { ?>
      <div class="order-prompt order-promptbommton">写给管理员的信，请尽量用最简单最明了的语言表达出您的意思，以免增加管理员的工作压力。</div>
      <form action="" method="POST" onsubmit="return checkform()">
        <div class="opencard_box">
          <div class="opencard_h">
            <div class="opencard_text"><span class="text_x_12px">*</span> 信件主题</div>
            <div class="opencard_input_box">
              <input name="title" id="title" class="myinput" type="text" value="" onblur="checktitle()"/>
              <span class="tips" id="titletip"></span></div>
          </div>
          <div class="opencard_h100">
            <div class="opencard_text"><span class="text_x_12px">*</span> 信件内容</div>
            <div class="opencard_input_box">
              <textarea name="content" id="content" onblur="checkcontent()" class="mytextarea"></textarea>
              <span class="tips" id="contenttip"></span> </div>
          </div>
        </div>
        <div class="opencard_button_box"><?=config::form('opcardbutton','发 送','submit');?></div>
      </form>
      <? } ?>
    </div>
  </div>
</div>
</div>
<? include template('member_footer','default/member'); ?>
