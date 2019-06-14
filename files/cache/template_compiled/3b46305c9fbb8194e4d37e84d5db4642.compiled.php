<?php if(!defined("__XE__"))exit;
if($__Context->oDocument->getCommentCount()){ ?><div id="reply">
	<div class="nocolor paddingtb10 pageheader">
		<a data-toggle="collapse" data-parent="#reply" href="#comments">
			<i class="fa fa-comment fa-fw"></i> <?php echo $__Context->lang->comment ?> <?php echo $__Context->oDocument->getCommentcount() ?>개가 있습니다.
		</a>	
	</div>	
	<div id="comments" class="collapse in">
		<?php  $__Context->_comment_list = $__Context->oDocument->getComments()  ?>
		<?php if($__Context->_comment_list&&count($__Context->_comment_list))foreach($__Context->_comment_list as $__Context->key => $__Context->comment){ ?>
		<ul class="media-list">
			<li class="media"  id="comment_<?php echo $__Context->comment->comment_srl ?>"<?php if($__Context->comment->get('depth')){ ?> style="margin-left:<?php echo ($__Context->comment->get('depth'))*20 ?>px"<?php } ?>>
				<div class="media-body">
					<ul class="viewinfo list-inline text-mute nocolor">
						<li>
							<i class="fa fa-pencil fa-fw"></i>
								<?php if(!$__Context->comment->member_srl){ ?>
									<?php if($__Context->comment->homepage){ ?>
										<a href="<?php echo $__Context->comment->getHomepageUrl() ?>" onclick="window.open(this.href);return false;"><?php echo $__Context->comment->getNickName() ?></a>
									<?php }else{ ?>
										<?php echo $__Context->comment->getNickName() ?>
									<?php } ?>
								<?php }else{ ?>
										<a href="#popup_menu_area" class="member_<?php echo $__Context->comment->member_srl ?>" onclick="return false"><?php echo $__Context->comment->getNickName() ?></a>
								<?php } ?>
						</li>		
						<li><i class="fa fa-calendar fa-fw"></i> <?php echo $__Context->comment->getRegdate('M d, Y') ?> (<?php echo $__Context->comment->getRegdate('H:i:s') ?>)</li>
						<?php if($__Context->grant->manager || $__Context->mi->display_ip_address!='N'){ ?><li><?php echo $__Context->comment->getIpaddress() ?></li><?php } ?>
						<?php if($__Context->comment->get('voted_count')!=0){ ?><li><?php echo $__Context->lang->cmd_vote ?> <?php echo $__Context->comment->get('voted_count')?$__Context->comment->get('voted_count'):0 ?></li><?php } ?>
						<?php if($__Context->comment->get('blamed_count') != 0){ ?><li><?php echo $__Context->lang->cmd_vote_down ?> <?php echo $__Context->comment->get('blamed_count')?$__Context->comment->get('blamed_count'):0 ?></li><?php } ?>
						<?php if($__Context->is_logged){ ?><li><a href="#popup_menu_area" class="comment_<?php echo $__Context->comment->comment_srl ?>"><?php echo $__Context->lang->cmd_comment_do ?></a></li><?php } ?>
						<?php if($__Context->grant->write_comment && $__Context->oDocument->isEnableComment() ){ ?>
						<?php if($__Context->mi->cmt_wrt!='editor'){ ?><li><a class="re_comment" href="<?php echo getUrl('act','dispBoardReplyComment','comment_srl',$__Context->comment->comment_srl) ?>" onclick="reComment(<?php echo $__Context->comment->get('document_srl') ?>,<?php echo $__Context->comment->get('comment_srl') ?>,'<?php echo getUrl('act','dispBoardReplyComment','comment_srl',$__Context->comment->comment_srl) ?>');jQuery('#mod_cmt').fadeOut().parent().find('.mod_comment').focus('#re_cmt');return false"><?php echo $__Context->lang->cmd_reply ?></a></li><?php } ?>
						<?php if($__Context->mi->cmt_wrt=='editor'){ ?><li><a href="<?php echo getUrl('act','dispBoardReplyComment','comment_srl',$__Context->comment->comment_srl) ?>"><?php echo $__Context->lang->cmd_reply ?></a></li><?php } ?>						
						<?php } ?>
						<?php if($__Context->comment->isGranted() || !$__Context->comment->get('member_srl')){ ?>
						<?php if($__Context->mi->cmt_wrt!='editor'){ ?><li><a href="<?php echo getUrl('act','dispBoardModifyComment','comment_srl',$__Context->comment->comment_srl) ?>" onclick="modComment(<?php echo $__Context->comment->get('comment_srl') ?>,<?php echo $__Context->comment->get('member_srl') ?>,'<?php echo getUrl('act','dispBoardModifyComment','comment_srl',$__Context->comment->comment_srl) ?>');jQuery('#re_cmt').fadeOut().parent().find('.re_comment').focus('#mod_cmt');return false"><?php echo $__Context->lang->cmd_modify ?></a></li><?php } ?>
						<?php if($__Context->mi->cmt_wrt=='editor'){ ?><li><a href="<?php echo getUrl('act','dispBoardModifyComment','comment_srl',$__Context->comment->comment_srl) ?>"><?php echo $__Context->lang->cmd_modify ?></a></li><?php } ?>						
						<li><a href="<?php echo getUrl('act','dispBoardDeleteComment','comment_srl',$__Context->comment->comment_srl) ?>" onclick="delComment(<?php echo $__Context->comment->get('comment_srl') ?>);return false"><?php echo $__Context->lang->cmd_delete ?></a></li>
						<?php } ?>
						<?php if($__Context->comment->hasUploadedFIles()){ ?><li><a data-toggle="collapse" data-target="#commentfile_<?php echo $__Context->comment->get('comment_srl') ?>" href="javascript:;"><i class="fa fa-download"></i> <?php echo $__Context->lang->uploaded_file ?>파일 <?php echo $__Context->comment->get('uploaded_count') ?>개</a></li><?php } ?>
					</ul>
					<?php if($__Context->comment->hasUploadedFiles()){ ?><ul id="commentfile_<?php echo $__Context->comment->get('comment_srl') ?>" class="viewinfo commentfile collapse nocolor">
						<?php  $__Context->_uploaded_files = $__Context->comment->getUploadedFiles()  ?>
						<?php if($__Context->_uploaded_files&&count($__Context->_uploaded_files))foreach($__Context->_uploaded_files as $__Context->key => $__Context->file){ ?>
						<li><i class="fa fa-check"></i> <a href="<?php echo getUrl('');
echo $__Context->file->download_url ?>"><?php echo $__Context->file->source_filename ?> [File Size:<?php echo FileHandler::filesize($__Context->file->file_size) ?>/Download <?php echo number_format($__Context->file->download_count) ?>]</a></li>
						<?php } ?>
					</ul><?php } ?>
					<div class="commentcont">
						<?php if(!$__Context->comment->isAccessible()){ ?>
							<div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-4">
								<form action="./" method="get" onsubmit="return procFilter(this, input_password)"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
									<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
									<input type="hidden" name="page" value="<?php echo $__Context->page ?>" />
									<input type="hidden" name="document_srl" value="<?php echo $__Context->comment->get('document_srl') ?>" />
									<input type="hidden" name="comment_srl" value="<?php echo $__Context->comment->get('comment_srl') ?>" />
									<label class="control-label"><?php echo $__Context->lang->msg_is_secret ?></label>
									<div class="input-group">
										<span class="input-group-addon">비밀번호</span>
										<input type="password" name="password" class="form-control">
										<span class="input-group-btn">
											<button class="btn btn-default" type="submit"><?php echo $__Context->lang->cmd_input ?></button>
										</span>
									</div>
								</form>
							</div>
						<?php }else{ ?>				
							<?php if($__Context->comment->getProfileImage()){ ?><img class="commentprofileimg pull-right" style="width:<?php echo $__Context->mi->display_profileimg_width ?>px;height:<?php echo $__Context->mi->display_profileimg_height ?>px;" src="<?php echo $__Context->comment->getProfileImage() ?>" alt="profile" /><?php } ?>
							<div id="cmt-content-<?php echo $__Context->comment->comment_srl ?>" class="comment_<?php echo $__Context->comment->comment_srl ?>_<?php echo $__Context->comment->member_srl ?>">
								<?php echo $__Context->comment->getContent(false) ?>
							</div>
						<?php } ?>
						<div class="clearfix"></div>
					</div>
				</div>	
		     </li>
		</ul>
		<?php } ?>
	</div>
	<div class="clearfix"></div>	
	
	<?php if($__Context->oDocument->comment_page_navigation){ ?><ul class="pagination pagination-sm">
		<li><a<?php if($__Context->cpage&&$__Context->cpage>1){ ?> href="<?php echo getUrl('cpage',1) ?>#comment"<?php } ?>>&laquo;</a></li>
		<?php while($__Context->page_no=$__Context->oDocument->comment_page_navigation->getNextPage()){ ?><li<?php if($__Context->cpage==$__Context->page_no){ ?> class="active"<?php } ?>>
			<?php if($__Context->cpage==$__Context->page_no){ ?><a ><?php echo $__Context->page_no ?></a><?php } ?>
			<?php if($__Context->cpage!=$__Context->page_no){ ?><a href="<?php echo getUrl('cpage',$__Context->page_no) ?>#comment"><?php echo $__Context->page_no ?></a><?php } ?>
		</li><?php } ?>
		<li><a<?php if($__Context->cpage!=$__Context->oDocument->comment_page_navigation->last_page){ ?> href="<?php echo getUrl('cpage',$__Context->oDocument->comment_page_navigation->last_page) ?>#comment"<?php } ?>>&raquo;</a></li>
	</ul><?php } ?>	
	<div class="clearfix"></div>
</div><?php } ?>
