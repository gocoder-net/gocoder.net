<?php if(!defined("__XE__"))exit;?><form action="./" method="get" class="boardListForm"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
<fieldset>
<?php if($__Context->document_list || $__Context->notice_list){ ?><table class="table table-hover restlist">
	<?php if($__Context->mi->display_listheadset_button== 'Y'){;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/rest_default','_style.table_head.html');
} ?>
	<tbody>
	<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/rest_default','_style.table_notice.html') ?>
	</tbody>	
</table><?php } ?>
<ul class="restwebzine media-list">
	<?php if($__Context->document_list&&count($__Context->document_list))foreach($__Context->document_list as $__Context->no=>$__Context->document){ ?><li class="media relative <?php if($__Context->mi->display_webzineborder=='N'){ ?>webzineborder<?php }else{ ?>thumbnail<?php } ?>">
		<?php if($__Context->val->idx!=-1 && $__Context->val->eid=='video' && $__Context->document->getExtraValueHTML($__Context->val->idx) && $__Context->mi->display_videoplaylist=='Y'){ ?>
			<?php if($__Context->list_config&&count($__Context->list_config))foreach($__Context->list_config as $__Context->key=>$__Context->val){;
if($__Context->val->idx!=-1 && $__Context->val->eid=='video' && $__Context->document->getExtraValueHTML($__Context->val->idx)){ ?><div class="pull-left rthumb">
				<div  class="imgwh" style="width:<?php echo $__Context->mi->thumbnail_width ?>px;height:<?php echo $__Context->mi->thumbnail_height ?>px;">
					<div class="wrap" style="background-color:#000;">
						<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/rest_default','_rest.viewlistvideo.html') ?>
					</div>
				</div>	
			</div><?php }} ?>	
		<?php }else{ ?>
			<?php if($__Context->list_config['thumbnail']){ ?><a href="<?php echo getUrl('document_srl',$__Context->document->document_srl,'listStyle',$__Context->listStyle, 'cpage','') ?>" class="pull-left rthumb" title="<?php echo $__Context->document->getTitle() ?>">
				<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/rest_default','_rest.thumbnaillink.html') ?>
				<?php if($__Context->thumbnaillink!='0' && ($__Context->document->variables[status]!='SECRET' || $__Context->logged_info->is_admin=='Y' || $__Context->logged_info->member_srl==$__Context->document->variables[member_srl])){ ?>
					<div class="imgwh" style="width:<?php echo $__Context->mi->thumbnail_width ?>px;height:<?php echo $__Context->mi->thumbnail_height ?>px;">
						<div id="rthumbnail" class="wrap">
							<img <?php if(preg_match('/vimeo/', $__Context->thumbnaillink)){ ?>id="<?php echo $__Context->vimeothumbnail ?>"<?php }else{ ?>src="<?php echo $__Context->thumbnaillink ?>"<?php } ?> class="rthumbnailimg thumbnailgrow" alt="" />
						</div>
					</div>
				<?php }else{ ?>
					<div class="imgwh" style="width:<?php echo $__Context->mi->thumbnail_width ?>px;height:<?php echo $__Context->mi->thumbnail_height ?>px;"><div class="wrap thumbnailfocus"></div></div>
				<?php } ?>
			</a><?php } ?>
		<?php } ?>
		<div class="media-body">
			<?php if($__Context->list_config['title']){ ?><h5 class="media-heading">
				<a href="<?php echo getUrl('document_srl',$__Context->document->document_srl,'listStyle',$__Context->listStyle, 'cpage','') ?>" title="<?php echo $__Context->document->getTitle() ?>"><?php echo $__Context->document->getTitle($__Context->mi->subject_cut_size) ?></a>
				<?php if((int)($__Context->document->getRegdate('YmdHis')>date("YmdHis", time()-$__Context->mi->duration_new*60*60))){ ?>
				<span class="label label-primary marginlabel">new</span>
				<?php }elseif((int)(zdate($__Context->document->get('last_update'),'YmdHis')>date("YmdHis", time()-$__Context->mi->duration_new*60*60))){ ?>
				<span class="label label-success marginlabel">update</span>
				<?php } ?>
				<?php if($__Context->document->hasUploadedFiles()){ ?><span class="label label-info font9 marginlabel">file</span><?php } ?>
				<?php if($__Context->document->variables[status]=='SECRET'){ ?><span class="label label-warning font9 marginlabel">secret</span><?php } ?>
				<?php if($__Context->grant->manager){ ?><input class="pull-right checkbox" type="checkbox" name="cart" value="<?php echo $__Context->document->document_srl ?>" title="Check" onclick="doAddDocumentCart(this)"<?php if($__Context->document->isCarted()){ ?> checked="checked"<?php } ?> /><?php } ?>
			</h5><?php } ?>
			<ul class="list-inline viewinfo nocolor">
				<?php if($__Context->mi->use_category=='Y'){ ?><li><i class="fa fa-bookmark"></i> <?php echo $__Context->category_list[$__Context->document->get('category_srl')]->title ?></li><?php } ?>
				<?php if($__Context->list_config['nick_name']){ ?><li><i class="fa fa-pencil"></i> <a href="#popup_menu_area" class="member_<?php echo $__Context->document->get('member_srl') ?>" onclick="return false"><?php echo $__Context->document->getNickName() ?></a></li><?php } ?>
				<?php if($__Context->list_config['user_id']){ ?><li><i class="fa fa-pencil"></i> <?php echo $__Context->document->getUserID() ?></li><?php } ?>
				<?php if($__Context->list_config['user_name']){ ?><li><i class="fa fa-pencil-square"></i> <?php echo $__Context->document->getUserName() ?></li><?php } ?>
				<?php if($__Context->list_config['regdate']){ ?><li><i class="fa fa-calendar"></i> <?php echo $__Context->document->getRegdate("M d, Y") ?></li><?php } ?>							
				<?php if($__Context->list_config['last_update']){ ?><li><i class="fa fa-calendar-o"></i> <?php echo zdate($__Context->document->get('last_update'),'M d, Y') ?> <?php if($__Context->document->getLastUpdater()){ ?>by <?php echo $__Context->document->getLastUpdater();
} ?></li><?php } ?>
				<?php if($__Context->list_config['comment_status'] && $__Context->document->getCommentCount()){ ?><li><i class="fa fa-comment"></i> <a href="<?php echo getUrl('document_srl', $__Context->document->document_srl) ?>#comment"><?php echo $__Context->document->getCommentCount() ?></a></li><?php } ?>
				<?php if($__Context->document->getTrackbackCount()){ ?><li><i class="fa fa-comments"></i> <a href="<?php echo getUrl('document_srl', $__Context->document->document_srl) ?>#trackback"><?php echo $__Context->document->getTrackbackCount() ?></a></li><?php } ?>
				<?php if($__Context->list_config['readed_count']){ ?><li><i class="fa fa-coffee"></i> <?php echo $__Context->document->get('readed_count')>0?$__Context->document->get('readed_count'):'0' ?></li><?php } ?>
				<?php if($__Context->list_config['voted_count']){ ?><li><i class="fa fa-thumbs-up"></i> <?php echo $__Context->document->get('voted_count')!=0?$__Context->document->get('voted_count'):'0' ?></li><?php } ?>
				<?php if($__Context->list_config['blamed_count']){ ?><li><i class="fa fa-thumbs-down"></i> <?php echo $__Context->document->get('blamed_count')!=0?$__Context->document->get('blamed_count'):'0' ?></li><?php } ?>
				<?php if($__Context->list_config&&count($__Context->list_config))foreach($__Context->list_config as $__Context->key=>$__Context->val){;
if($__Context->val->eid!='video' && $__Context->val->idx!=-1 && $__Context->document->getExtraValueHTML($__Context->val->idx)){ ?><li>
					<?php echo $__Context->val->name ?> : <?php echo $__Context->document->getExtraValueHTML($__Context->val->idx) ?>
				</li><?php }} ?>
			</ul>							
			<?php if($__Context->list_config['summary']){ ?><p><?php echo $__Context->document->getSummary($__Context->mi->content_cut_size) ?></p><?php } ?>
			<?php if($__Context->list_config&&count($__Context->list_config))foreach($__Context->list_config as $__Context->key=>$__Context->val){;
if($__Context->val->idx!=-1 && $__Context->val->eid=='video' && $__Context->document->getExtraValueHTML($__Context->val->idx)){ ?><a href="#" onclick="window.open('<?php echo getUrl('document_srl',$__Context->document->document_srl,'listStyle','video','page','') ?>','video','width=<?php echo $__Context->mi->display_videoplaywidth ?>,height=<?php echo $__Context->mi->display_videoplayheight ?>,resizable=yes');return false" class="videobtn btn btn-primary btn-xs pull-right"><i class="fa fa-video-camera"></i> 보기</a><?php }} ?>
		</div>
	</li><?php } ?>
</ul>	
</fieldset>
</form>