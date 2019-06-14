<?php if(!defined("__XE__"))exit;
$__Context->oDB = &DB::getInstance();
 $__Context->query = $__Context->oDB->_query('select count(*) as total from xe_documents where module_srl ='.$__Context->mi->module_srl);
 $__Context->result = $__Context->oDB->_fetch($__Context->query);
 ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/rest_default','_setting.html') ?>
<!--#Meta:modules/board/skins/rest_default/js/jquery.cookie.js--><?php $__tmp=array('modules/board/skins/rest_default/js/jquery.cookie.js','body','','');Context::loadFile($__tmp);unset($__tmp); ?>
<script>//<![CDATA[
var bdLogin = "<?php if(!$__Context->is_logged){;
echo $__Context->lang->bd_login ?>@<?php echo htmlspecialchars_decode(getUrl('act','dispMemberLoginForm'));
} ?>";
jQuery(function($){
	board('#bd_<?php echo $__Context->mi->module_srl ?>_<?php echo $__Context->oDocument->document_srl ?>');
});
//]]></script>
<?php if($__Context->mi->default_style=='video'){;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/rest_default','video.html');
} ?>
<?php if($__Context->mi->default_style=='videolist'){;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/rest_default','videolist.html');
} ?>
<?php if($__Context->mi->default_style!='video' && $__Context->mi->default_style!='videolist'){ ?><div id="bd_<?php echo $__Context->mi->module_srl ?>_<?php echo $__Context->oDocument->document_srl ?>" class="restboard">
	<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/rest_default','_header.html') ?>
	<?php if($__Context->oDocument->isExists() && $__Context->mi->default_style != 'blog'){;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/rest_default','view_document.html');
} ?>
	<?php if($__Context->oDocument->isExists() && $__Context->mi->display_viewdocumentlist== 'N'){ ?>
	<?php }else{ ?>
	
		<div>
			<div class="btn-group btn-group-sm pull-right paddingb10 hidden-xs">
				<?php if($__Context->grant->manager && $__Context->mi->display_setup_button== 'Y'){ ?><a class="btn btn-default" href="<?php echo getUrl('act','dispBoardAdminBoardInfo') ?>" title="<?php echo $__Context->lang->cmd_setup ?>"><i class="fa fa-cog"></i></a><?php } ?>
				<?php if($__Context->mi->display_videoplay=='Y'){ ?><a href='<?php echo getUrl('listStyle','videolist','act','','document_srl','') ?>' class="btn btn-default"  target="_blank" onclick="window.open(this.href,'videolist','width=<?php if($__Context->mi->display_videoplaylistuse=='N'){;
echo $__Context->mi->display_videoplaywidth;
}else{;
echo $__Context->videolistwidth;
} ?>px,height=<?php echo $__Context->mi->display_videoplayheight ?>px'); return false;"><i class="fa fa-video-camera"></i></a><?php } ?>
				<?php if($__Context->mi->display_listset_button== 'Y'){ ?>
					<a class="btn btn-default <?php if($__Context->mi->default_style=='list'){ ?>active<?php } ?>" href="<?php echo getUrl('listStyle','list','act','','document_srl','') ?>" title="Classic Style"><i class="fa fa-list"></i></a>
					<a class="btn btn-default <?php if($__Context->mi->default_style=='webzine'){ ?>active<?php } ?>" href="<?php echo getUrl('listStyle','webzine','act','','document_srl','') ?>" title="Zine Style"><i class="fa fa-th-list"></i></a>
					<a class="btn btn-default <?php if($__Context->mi->default_style=='card'){ ?>active<?php } ?>" href="<?php echo getUrl('listStyle','card','act','','document_srl','') ?>" title="card Style"><i class="fa fa-th"></i></a>
					<a class="btn btn-default <?php if($__Context->mi->default_style=='gallery'){ ?>active<?php } ?>" href="<?php echo getUrl('listStyle','gallery','act','','document_srl','') ?>" title="Gallery Style"><i class="fa fa-th-large"></i></a>
					<?php if($__Context->grant->manager){ ?><a class="btn btn-default" href="<?php echo getUrl('','module','document','act','dispDocumentManageDocument') ?>" onclick="popopen(this.href,'manageDocument'); return false;"><i class="fa fa-check-square-o"></i></a><?php } ?>
				<?php } ?>		
			</div>
			<div class="btn-group visible-xs pull-right">
				<button type="button" class="btn btn-default"><i class="fa fa-cog"></i></button>
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					<span class="caret"></span>
					<span class="sr-only">Toggle Dropdown</span>
				</button>
				<ul class="dropdown-menu" role="menu">
					<li><a href="<?php echo getUrl('listStyle','list','act','','document_srl','') ?>" title="Classic Style"><i class="fa fa-list"></i> 리스트형</a></li>
					<li><a href="<?php echo getUrl('listStyle','webzine','act','','document_srl','') ?>" title="Zine Style"><i class="fa fa-th-list"></i> 웹진형</a></li>
					<li><a href="<?php echo getUrl('listStyle','card','act','','document_srl','') ?>" title="card Style"><i class="fa fa-th"></i> 카드형</a></li>
					<li><a href="<?php echo getUrl('listStyle','gallery','act','','document_srl','') ?>" title="Gallery Style"><i class="fa fa-th-large"></i> 갤러리형</a></li>
					<?php if($__Context->grant->manager){ ?><li><a href="<?php echo getUrl('act','dispBoardAdminBoardInfo') ?>" title="<?php echo $__Context->lang->cmd_setup ?>"><i class="fa fa-cog"></i> 설정</a></li><?php } ?>
					<?php if($__Context->grant->manager){ ?><li><a href="<?php echo getUrl('','module','document','act','dispDocumentManageDocument') ?>" onclick="popopen(this.href,'manageDocument'); return false;"><i class="fa fa-check-square-o"></i> 글관리</a></li><?php } ?>
				</ul>
			</div>		
			<?php if($__Context->mi->use_category=='Y' && $__Context->mi->display_categoryset_button=='pillsa'){ ?><ul class="nav nav-pills pull-left hidden-sm hidden-xs">
				<li<?php if(!$__Context->category){ ?> class="active"<?php } ?>>
					<a href="<?php echo getUrl('category','','page','','document_srl','') ?>" title="<?php echo $__Context->lang->document_count ?> '<?php echo number_format($__Context->total_count) ?>'"><i class="fa fa-home fa-fw"></i> <?php echo $__Context->lang->total ?> <?php if($__Context->mi->display_categoryset_badge=='Y'){ ?><span class="badge"><?php echo $__Context->result->total ?></span><?php } ?></a></li>
				<?php if($__Context->cate_list&&count($__Context->cate_list))foreach($__Context->cate_list as $__Context->key=>$__Context->val){ ?><li<?php if($__Context->category==$__Context->val->category_srl){ ?> class="active"<?php } ?> >
					<a href="<?php echo getUrl(category,$__Context->val->category_srl,'document_srl','', 'page', '') ?>"><?php echo $__Context->val->title ?> <?php if($__Context->mi->display_categoryset_badge=='Y'){ ?><span class="badge"><?php echo $__Context->val->document_count ?></span><?php } ?></a>
				</li><?php } ?>
			</ul><?php } ?>	
			<?php if($__Context->mi->use_category=='Y' && $__Context->mi->display_categoryset_button=='pillsa'){ ?><ul class="nav nav-pills pull-left hidden-md hidden-lg">
				<li<?php if(!$__Context->category){ ?> class="active"<?php } ?>>
					<a href="<?php echo getUrl('category','','page','','document_srl','') ?>" title="<?php echo $__Context->lang->document_count ?> '<?php echo number_format($__Context->total_count) ?>'"><i class="fa fa-home fa-fw"></i> <?php echo $__Context->lang->total ?> <?php if($__Context->mi->display_categoryset_badge=='Y'){ ?><span class="badge"><?php echo $__Context->result->total ?></span><?php } ?></a>
				</li>			
				<li<?php if(!$__Context->category==$__Context->item->category_srl){ ?> class="active"<?php } ?>><a href="#" class=" dropdown-toggle" data-toggle="dropdown">분류 <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						 <?php if($__Context->cate_list&&count($__Context->cate_list))foreach($__Context->cate_list as $__Context->key=>$__Context->val){ ?><li<?php if($__Context->category==$__Context->val->category_srl){ ?> class="active"<?php } ?>>
							<a href="<?php echo getUrl(category,$__Context->val->category_srl,'document_srl','', 'page', '') ?>"><?php echo $__Context->val->title ?> <?php if($__Context->mi->display_categoryset_badge=='Y'){ ?><span class="badge pull-right"><?php echo $__Context->val->document_count ?></span><?php } ?></a>
						</li><?php } ?>
					</ul>
				</li>
			</ul><?php } ?>			
			<div class="clearfix"></div>
		</div>
		
		<?php if($__Context->mi->use_category=='Y' && $__Context->mi->display_categoryset_button=='dropdown'){ ?><ul class="nav nav-pills">
			<li<?php if(!$__Context->category){ ?> class="active"<?php } ?>><a href="<?php echo getUrl('category','','page','','document_srl','') ?>" title="<?php echo $__Context->lang->document_count ?> '<?php echo number_format($__Context->total_count) ?>'"><i class="fa fa-home fa-fw"></i> <?php echo $__Context->lang->total ?> <?php if($__Context->mi->display_categoryset_badge=='Y'){ ?><span class="badge"><?php echo $__Context->result->total ?></span><?php } ?></a></li>
			
			<li<?php if(!$__Context->category==$__Context->item->category_srl){ ?> class="active"<?php } ?>><a href="#" class=" dropdown-toggle" data-toggle="dropdown">분류 <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					 <?php if($__Context->cate_list&&count($__Context->cate_list))foreach($__Context->cate_list as $__Context->key=>$__Context->val){ ?><li<?php if($__Context->category==$__Context->val->category_srl){ ?> class="active"<?php } ?>><a href="<?php echo getUrl(category,$__Context->val->category_srl,'document_srl','', 'page', '') ?>"><?php echo $__Context->val->title ?> <?php if($__Context->mi->display_categoryset_badge=='Y'){ ?><span class="badge pull-right"><?php echo $__Context->val->document_count ?></span><?php } ?></a></li><?php } ?>
				</ul>
			</li>
		</ul><?php } ?>
		<?php if($__Context->mi->use_category=='Y' && $__Context->mi->display_categoryset_button=='pills'){ ?><ul class="nav <?php if($__Context->mi->display_categoryset_button == 'tabs'){ ?>nav-tabs<?php }elseif($__Context->mi->display_categoryset_button == 'nonav'){ ?>hidden<?php }else{ ?>nav-pills<?php } ?>">
			<li<?php if(!$__Context->category){ ?> class="active"<?php } ?>>
				<a href="<?php echo getUrl('category','','page','','document_srl','') ?>" title="<?php echo $__Context->lang->document_count ?> '<?php echo number_format($__Context->total_count) ?>'"><i class="fa fa-home fa-fw"></i> <?php echo $__Context->lang->total ?> <?php if($__Context->mi->display_categoryset_badge=='Y'){ ?><span class="badge"><?php echo $__Context->result->total ?></span><?php } ?></a>
			</li>
			<?php if($__Context->cate_list&&count($__Context->cate_list))foreach($__Context->cate_list as $__Context->key=>$__Context->val){ ?><li class="hidden-sm hidden-xs <?php if($__Context->category==$__Context->val->category_srl){ ?>active<?php } ?>" >
				<a href="<?php echo getUrl(category,$__Context->val->category_srl,'document_srl','', 'page', '') ?>"><?php echo $__Context->val->title ?> <?php if($__Context->mi->display_categoryset_badge=='Y'){ ?><span class="badge"><?php echo $__Context->val->document_count ?></span><?php } ?></a>
			</li><?php } ?>
			<li class="dropdown hidden-lg hidden-md"<?php if($__Context->category){ ?> class="active"<?php } ?>>
			  <a class="dropdown-toggle" data-toggle="dropdown" href="#">
				 분류 &nbsp;<i class="fa fa-sort-asc"></i>
			  </a>
			  <ul class="dropdown-menu" role="menu">
				<?php if($__Context->cate_list&&count($__Context->cate_list))foreach($__Context->cate_list as $__Context->key=>$__Context->val){ ?><li<?php if($__Context->category==$__Context->val->category_srl){ ?> class="active"<?php } ?>><a href="<?php echo getUrl(category,$__Context->val->category_srl,'document_srl','', 'page', '') ?>"><?php echo $__Context->val->title ?> <?php if($__Context->mi->display_categoryset_badge=='Y'){ ?><span class="badge pull-right"><?php echo $__Context->val->document_count ?></span><?php } ?></a></li><?php } ?>
			  </ul>
			</li>
		</ul><?php } ?>
		
		<?php if(!$__Context->document_list && !$__Context->notice_list){ ?><div class="alert alert-info"><?php echo $__Context->lang->no_documents ?></div><?php } ?>
		<?php if($__Context->mi->default_style=='webzine'){ ?>
			<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/rest_default','_style.webzine.html') ?>
		<?php }elseif($__Context->mi->default_style=='gallery'){ ?>
			<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/rest_default','_style.gallery.html') ?>
		<?php }elseif($__Context->mi->default_style=='card'){ ?>
			<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/rest_default','_style.card.html') ?>
		<?php }elseif($__Context->mi->default_style=='blog'){ ?>
		<div style="height:30px;"></div>
		<?php if($__Context->document_list&&count($__Context->document_list))foreach($__Context->document_list as $__Context->no=>$__Context->oDocument){ ?>
			<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/rest_default','view_document.html') ?>
		<?php } ?>
		<?php }else{ ?>	
			<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/rest_default','_style.list.html') ?>
		<?php } ?>			
		<div class="pull-right">
			<?php if($__Context->grant->view){ ?><form action="<?php echo getUrl() ?>" method="get" onsubmit="return procFilter(this, search)" class="form-inline"  role="form"><input type="hidden" name="act" value="<?php echo $__Context->act ?>" />
				<input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
				<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
				<input type="hidden" name="category" value="<?php echo $__Context->category ?>" />
				<div class="form-group">
					<select name="search_target" class="form-control input-sm">
						<?php if($__Context->search_option&&count($__Context->search_option))foreach($__Context->search_option as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->key ?>"<?php if($__Context->search_target==$__Context->key){ ?> selected="selected"<?php } ?>><?php echo $__Context->val ?></option><?php } ?>
					</select>
				</div>
				<div class="form-group">
					<input type="text" name="search_keyword" value="<?php echo htmlspecialchars($__Context->search_keyword) ?>" title="<?php echo $__Context->lang->cmd_search ?>" class="form-control input-sm" />
				</div>
				<button type="submit" class="btn btn-default btn-sm" onclick="xGetElementById('board_search').submit();return false;"><i class="fa fa-search"></i></button>
				<a class="btn btn-default  btn-sm" href="<?php echo getUrl('act','dispBoardTagList') ?>" title="Tag List" role="button">태그</a>
				<?php if($__Context->mi->display_videoplay=='Y'){ ?><a class="btn btn-default btn-sm" href='<?php echo getUrl('listStyle','videolist','act','','document_srl','') ?>' target="_blank" onclick="window.open(this.href,'videolist','width=<?php if($__Context->mi->display_videoplaylistuse=='N'){;
echo $__Context->mi->display_videoplaywidth;
}else{;
echo $__Context->videolistwidth;
} ?>px,height=<?php echo $__Context->mi->display_videoplayheight ?>px'); return false;">전체보기</a><?php } ?>
				<?php if($__Context->grant->write_document){ ?><a class="btn btn-default btn-sm" href="<?php echo getUrl('act','dispBoardWrite','document_srl','') ?>" role="button"><?php echo $__Context->lang->cmd_write ?></a><?php } ?>
				<a class="btn btn-default btn-sm" href="<?php echo getUrl('','mid',$__Context->mid,'page',$__Context->page,'document_srl','','listStyle',$__Context->listStyle) ?>" role="button"><?php echo $__Context->lang->cmd_list ?></a>
			</form><?php } ?>
		</div>
		<div class="clearfix"></div>
		
		<?php if($__Context->document_list || $__Context->notice_list){ ?><ul class="pagination pagination-sm">
			<li><a href="<?php echo getUrl('page','','document_srl','','division',$__Context->division,'last_division',$__Context->last_division) ?>" >&laquo; <?php echo $__Context->lang->first_page ?></a></li> 
			<?php while($__Context->page_no=$__Context->page_navigation->getNextPage()){ ?><li<?php if($__Context->page==$__Context->page_no){ ?> class="active"<?php } ?>>
				<?php if($__Context->page==$__Context->page_no){ ?><a><?php echo $__Context->page_no ?></a><?php } ?>
				<?php if($__Context->page!=$__Context->page_no){ ?><a href="<?php echo getUrl('page',$__Context->page_no,'document_srl','','division',$__Context->division,'last_division',$__Context->last_division) ?>"><?php echo $__Context->page_no ?></a><?php } ?>
			</li><?php } ?>
			<li><a href="<?php echo getUrl('page',$__Context->page_navigation->last_page,'document_srl','','division',$__Context->division,'last_division',$__Context->last_division) ?>"><?php echo $__Context->lang->last_page ?> &raquo;</a></li>
		</ul><?php } ?>
		<div class="clearfix"></div>		
	</div><?php } ?>
		
		<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/rest_default','_footer.html') ?>
	<?php } ?>
<div class="clearfix"></div>