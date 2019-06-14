<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/sketchbook5','_header.html') ?>
<style>
.rd{padding:0}
.rd_hd{margin:0}
.rd_body{padding:20px 20px 80px;text-align:justify}
.rd_body a{padding:0 8px;font-size:13px;line-height:2;text-decoration:none;color:#666}
.rd_body a:hover{text-decoration:underline;background:#FFC;font-weight:bold}
.rd_body .rank1{font-weight:bold;font-size:18px;color:red}
.rd_body .rank2{font-size:16px;color:red}
.rd_body .rank3{font-weight:bold;font-size:16px;color:#333}
.rd_body .rank4{font-weight:bold;color:#333}
<?php if($__Context->mi->colorset=='black'){ ?>
.rd_body a{color:#999}
.rd_body a:hover{background:#292929;color:#CCC}
.rd_body .rank2{color:#EEE}
<?php } ?>
</style>
<a href="<?php echo getUrl('act','') ?>" style="position:absolute;top:4px;right:4px;font-size:11px"><?php echo $__Context->lang->cmd_back ?></a>
<div class="rd">
	<div class="rd_hd">
		<div class="blog v2">
			<h1 class="<?php echo $__Context->mi->rd_tl_font ?>">TAG Cloud</h1>
		</div>
	</div>
	<div class="rd_body">
	<?php if($__Context->tag_list&&count($__Context->tag_list))foreach($__Context->tag_list as $__Context->val){ ?>
		<?php if($__Context->val->count>5){ ?>
			<?php  $__Context->tag_class = "rank1"  ?>
		<?php }elseif($__Context->val->count>3){ ?>
			<?php  $__Context->tag_class = "rank2"  ?>
		<?php }elseif($__Context->val->count>2){ ?>
			<?php  $__Context->tag_class = "rank3"  ?>
		<?php }elseif($__Context->val->count>1){ ?>
			<?php  $__Context->tag_class = "rank4"  ?>
		<?php }else{ ?>
			<?php  $__Context->tag_class = "rank5"  ?>
		<?php } ?>
		<?php if($__Context->layout_info->mid){ ?>
			<a<?php if($__Context->tag_class){ ?> class="<?php echo $__Context->tag_class ?>"<?php } ?> href="<?php echo getUrl('','mid',$__Context->layout_info->mid,'search_target','tag','search_keyword',$__Context->val->tag) ?>"><?php echo htmlspecialchars($__Context->val->tag) ?></a>
		<?php }else{ ?>
			<a<?php if($__Context->tag_class){ ?> class="<?php echo $__Context->tag_class ?>"<?php } ?> href="<?php echo getUrl('','mid',$__Context->mid,'search_target','tag','search_keyword',$__Context->val->tag) ?>"><?php echo htmlspecialchars($__Context->val->tag) ?></a>
		<?php } ?>
	<?php } ?>
	</div>
</div>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/sketchbook5','_footer.html') ?>