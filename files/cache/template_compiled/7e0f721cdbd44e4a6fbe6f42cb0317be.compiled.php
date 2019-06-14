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
	
<div class="restgallery row">
	<?php if($__Context->document_list&&count($__Context->document_list))foreach($__Context->document_list as $__Context->no=>$__Context->document){ ?><div class="<?php if($__Context->mi->display_thumbnail_col){;
echo $__Context->mi->display_thumbnail_col;
}else{;
if($__Context->mi->display_thumbnailnum=='two'){ ?>col-lg-6 col-md-6 col-sm-6 col-xs-12<?php }elseif($__Context->mi->display_thumbnailnum=='three'){ ?>col-lg-4 col-md-4 col-sm-4 col-xs-12<?php }else{ ?>col-lg-3 col-md-3 col-sm-3 col-xs-12<?php };
} ?>">
		<div class="relative<?php if($__Context->mi->display_thumbnailborder=='Y'){ ?> thumbnail<?php }else{ ?> marginb30<?php };
if($__Context->mi->display_thumbnailcover=='button'){ ?> marketing<?php }elseif($__Context->mi->display_thumbnailcover=='info'){ ?> viewinfo<?php }elseif($__Context->mi->display_thumbnailcover=='flat'){ ?> flatinfo<?php };
if($__Context->mi->display_thumbnaileffect=='Y'){ ?> effect<?php }else{ ?> noeffect<?php } ?>">
			<a href="<?php echo getUrl('document_srl',$__Context->document->document_srl,'listStyle',$__Context->listStyle, 'cpage','') ?>" class="pull-left rthumb" title="<?php echo $__Context->document->getTitle() ?>" style="width:100%;">
				<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/rest_default','_rest.thumbnaillink.html') ?>
				<?php if($__Context->thumbnaillink!='0' && ($__Context->document->variables[status]!='SECRET' || $__Context->logged_info->is_admin=='Y' || $__Context->logged_info->member_srl==$__Context->document->variables[member_srl])){ ?>
					<div class="imgwh">
						<div id="rthumbnail" class="wrap">						
							<img <?php if(preg_match('/vimeo/', $__Context->thumbnaillink)){ ?>id="<?php echo $__Context->vimeothumbnail ?>"<?php }else{ ?>src="<?php echo $__Context->thumbnaillink ?>"<?php } ?> class="rthumbnailimg thumbnailgrow" alt=""/> 
						</div>
					</div>
				<?php }else{ ?>
					<div class="imgwh"><div class="wrap thumbnailfocus"></div></div>
				<?php } ?>				
				<div class="caption <?php if($__Context->thumbnaillink!='0' && ($__Context->document->variables[status]!='SECRET' || $__Context->logged_info->is_admin=='Y' || $__Context->logged_info->member_srl==$__Context->document->variables[member_srl])){;
}else{ ?>nothumbnail<?php } ?>">
					<?php if($__Context->mi->display_thumbnailcover=='button'){ ?>
						<div class="top">	
							<?php if($__Context->list_config['title']){ ?><h4 class="title"><?php echo $__Context->document->getTitle($__Context->mi->subject_cut_size) ?></h4><?php } ?>
							<?php if($__Context->list_config['summary']){ ?><p class="content"><?php echo $__Context->document->getSummary($__Context->mi->content_cut_size) ?></p><?php } ?>
						</div>	
						<div class="viewbtn"><span class="btn btn-default" role="button">View details &raquo;</span></div>
					<?php }else{ ?>
						<?php if($__Context->list_config['title']){ ?><h5 class="title"><b><?php echo $__Context->document->getTitle($__Context->mi->subject_cut_size) ?></b></h5><?php } ?>
						<?php if($__Context->mi->use_category=='Y'||$__Context->list_config['nick_name']||$__Context->list_config['user_id']||$__Context->list_config['user_name']){ ?><p>
							<?php if($__Context->mi->use_category=='Y'){;
echo $__Context->category_list[$__Context->document->get('category_srl')]->title;
} ?>
							<?php if($__Context->list_config['nick_name']){ ?>by <?php echo $__Context->document->getNickName();
} ?>
							<?php if($__Context->list_config['user_id']){ ?>ID <?php echo $__Context->document->getUserID();
} ?>
							<?php if($__Context->list_config['user_name']){ ?>Name <?php echo $__Context->document->getUserName();
} ?>
						</p><?php } ?>
						<?php if($__Context->list_config['regdate']||$__Context->list_config['last_update']||$__Context->list_config['comment_status']){ ?><p class="date">
							<?php if($__Context->list_config['regdate']){;
echo $__Context->document->getRegdate("M d, Y");
} ?>	
							<?php if($__Context->list_config['last_update']){ ?>최종수정 <?php echo zdate($__Context->document->get('last_update'),'M d, Y') ?> <?php if($__Context->document->getLastUpdater()){ ?>(<?php echo $__Context->document->getLastUpdater() ?>)<?php };
} ?>
							<?php if($__Context->list_config['comment_status']){ ?>댓글 <?php echo $__Context->document->getCommentCount();
} ?>
							<?php if($__Context->document->getTrackbackCount()){ ?>트랙백 <?php echo $__Context->document->getTrackbackCount();
} ?>
						</p><?php } ?>	
						<?php if($__Context->list_config['readed_count']||$__Context->list_config['voted_count']||$__Context->list_config['blamed_count']){ ?><p>								
							<?php if($__Context->list_config['readed_count']){ ?>조회  <?php echo $__Context->document->get('readed_count')>0?$__Context->document->get('readed_count'):'0';
} ?>
							<?php if($__Context->list_config['voted_count']){ ?>추천 <?php echo $__Context->document->get('voted_count')!=0?$__Context->document->get('voted_count'):'0';
} ?>
							<?php if($__Context->list_config['blamed_count']){ ?>비추천 <?php echo $__Context->document->get('blamed_count')!=0?$__Context->document->get('blamed_count'):'0';
} ?>	
						</p><?php } ?>
						<?php if($__Context->mi->display_thumbnailcover=='flat'){ ?><p><i class="fa fa-search"></i></p><?php } ?>
					<?php } ?>	
				</div>	
				<?php if((int)($__Context->document->getRegdate('YmdHis')>date("YmdHis", time()-$__Context->mi->duration_new*60*60))){ ?>
				<span class="ribonicon label label-primary">new</span>
				<?php }elseif((int)(zdate($__Context->document->get('last_update'),'YmdHis')>date("YmdHis", time()-$__Context->mi->duration_new*60*60))){ ?>
				<span class="ribonicon label label-success">update</span>					
				<?php }elseif($__Context->document->variables[status]=='SECRET'){ ?>
				<span class="ribonicon label label-success">secret</span>				
				<?php } ?>				
				<?php if($__Context->grant->manager){ ?><input class="checkbox pull-right" type="checkbox" name="cart" value="<?php echo $__Context->document->document_srl ?>" title="Check this" onclick="doAddDocumentCart(this)"<?php if($__Context->document->isCarted()){ ?> checked="checked"<?php } ?> /><?php } ?>
			</a>	
			<?php if($__Context->document->getExtraValueHTML($__Context->val->idx)){;
if($__Context->list_config&&count($__Context->list_config))foreach($__Context->list_config as $__Context->key=>$__Context->val){;
if($__Context->val->idx!=-1 && $__Context->val->eid=='video'){ ?><a  href="#" onclick="window.open('<?php echo getUrl('document_srl',$__Context->document->document_srl,'listStyle','video','page','') ?>','video','width=<?php echo $__Context->mi->display_videoplaywidth ?>,height=<?php echo $__Context->mi->display_videoplayheight ?>,resizable=yes');return false" class="videobtn btn btn-primary btn-xs"><i class="fa fa-video-camera fa-fw"></i> 보기</a><?php }}} ?>	
			<div class="clearfix"></div>
		</div>
	</div><?php } ?>
</div>	
</fieldset>
</form>