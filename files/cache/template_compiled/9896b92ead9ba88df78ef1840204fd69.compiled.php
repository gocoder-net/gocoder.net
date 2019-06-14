<?php if(!defined("__XE__"))exit;?>
<?php if($__Context->notice_list&&count($__Context->notice_list))foreach($__Context->notice_list as $__Context->no=>$__Context->document){ ?><tr class="<?php if($__Context->document->getExtraEidValue('video')){ ?>info<?php }else{ ?>active<?php } ?>">
	<?php if($__Context->list_config&&count($__Context->list_config))foreach($__Context->list_config as $__Context->key=>$__Context->val){ ?>
		<?php if($__Context->val->type=='no' && $__Context->val->idx==-1){ ?><td class="hidden-xs width70 text-center">
			<?php if($__Context->document_srl==$__Context->document->document_srl){ ?>&raquo;<?php } ?>
			<?php if($__Context->document_srl!=$__Context->document->document_srl){ ?><strong><?php echo $__Context->lang->notice ?></strong><?php } ?>
		</td><?php } ?>
		<?php if($__Context->val->type=='title' && $__Context->val->idx==-1){ ?>
		<?php if($__Context->mi->use_category=='Y'){ ?><td class="hidden-xs tablecate"><strong><?php echo $__Context->category_list[$__Context->document->get('category_srl')]->title ?></strong></td><?php } ?>
		<td>
			<a href="<?php echo getUrl('document_srl',$__Context->document->document_srl, 'listStyle', $__Context->listStyle, 'cpage','') ?>"><strong><?php echo $__Context->document->getTitle($__Context->mi->subject_cut_size) ?></strong></a>
			 <?php if($__Context->document->getCommentCount()){ ?><small><a href="<?php echo getUrl('document_srl', $__Context->document->document_srl) ?>#comment"><?php echo $__Context->document->getCommentCount() ?></a></small><?php } ?>
			 <?php if($__Context->document->getTrackbackCount()){ ?><small><a href="<?php echo getUrl('document_srl', $__Context->document->document_srl) ?>#trackback"><?php echo $__Context->document->getTrackbackCount() ?></a></small><?php } ?>
			<?php if((int)($__Context->document->getRegdate('YmdHis')>date("YmdHis", time()-$__Context->mi->duration_new*60*60))){ ?>
			<span class="label label-primary marginlabel">new</span>
			<?php }elseif((int)(zdate($__Context->document->get('last_update'),'YmdHis')>date("YmdHis", time()-$__Context->mi->duration_new*60*60))){ ?>
			<span class="label label-success marginlabel">update</span>
			<?php } ?>
			<?php if($__Context->document->hasUploadedFiles()){ ?><span class="label label-info marginlabel">File</span><?php } ?>
			<?php if($__Context->document->variables[status]=='SECRET'){ ?><span class="label label-warning marginlabel">Secret</span><?php } ?>
		</td>
		<?php } ?>
		<?php if($__Context->val->type=='nick_name' && $__Context->val->idx==-1){ ?><td class="hidden-xs tableuser"><a href="#popup_menu_area" class="member_<?php echo $__Context->document->get('member_srl') ?> nocolorlist" onclick="return false" title="<?php echo $__Context->document->getNickName() ?>"><?php echo $__Context->document->getNickName() ?></a></td><?php } ?>
		<?php if($__Context->val->type=='user_id' && $__Context->val->idx==-1){ ?><td class="hidden-xs tableuser"><?php echo $__Context->document->getUserID() ?></td><?php } ?>
		<?php if($__Context->val->type=='user_name' && $__Context->val->idx==-1){ ?><td class="hidden-xs tableuser"><?php echo $__Context->document->getUserName() ?></td><?php } ?>
		<?php if($__Context->val->type=='regdate' && $__Context->val->idx==-1){ ?><td class="tabledate" title="<?php echo getTimeGap($__Context->document->get('regdate'), "H:i") ?>"><?php echo $__Context->document->getRegdate('Y.m.d') ?></td><?php } ?>
		<?php if($__Context->val->type=='last_update' && $__Context->val->idx==-1){ ?><td class="hidden-xs tabledate"><?php echo zdate($__Context->document->get('last_update'),'Y.m.d') ?></td><?php } ?>
		<?php if($__Context->val->type=='last_post' && $__Context->val->idx==-1){ ?><td class="hidden-xs tabledate">
			<?php if((int)($__Context->document->get('comment_count'))>0){ ?><a href="<?php echo getUrl('document_srl',$__Context->document->document_srl) ?>#<?php echo $__Context->document->document_srl ?>_comment" title="<?php echo getTimeGap($__Context->document->get('last_update'), "H:i") ?>"><?php echo zdate($__Context->document->get('last_update'),'Y.m.d');
if($__Context->document->getLastUpdater()){ ?><small>(by <?php echo $__Context->document->getLastUpdater() ?>)</small><?php } ?></a><?php } ?>
			<?php if((int)($__Context->document->get('comment_count'))==0){ ?>&nbsp;<?php } ?>
		</td><?php } ?>
		<?php if($__Context->val->type=='readed_count' && $__Context->val->idx==-1){ ?><td class="hidden-xs width70"><?php echo $__Context->document->get('readed_count')>0?$__Context->document->get('readed_count'):'0' ?></td><?php } ?>
		<?php if($__Context->val->type=='voted_count' && $__Context->val->idx==-1){ ?><td class="hidden-xs width70"><?php echo $__Context->document->get('voted_count')!=0?$__Context->document->get('voted_count'):'0' ?></td><?php } ?>
		<?php if($__Context->val->type=='blamed_count' && $__Context->val->idx==-1){ ?><td class="hidden-xs width70"><?php echo $__Context->document->get('blamed_count')!=0?$__Context->document->get('blamed_count'):'0' ?></td><?php } ?>
		<?php if($__Context->val->eid=='video'){ ?>
		<?php if($__Context->val->idx!=-1){ ?><td class="width50 hidden-xs">
			<?php if($__Context->document->getExtraValueHTML($__Context->val->idx)){ ?><a href="#" onclick="window.open('<?php echo getUrl('document_srl',$__Context->document->document_srl,'listStyle','video','page','') ?>','video','width=<?php echo $__Context->mi->display_videoplaywidth ?>,height=<?php echo $__Context->mi->display_videoplayheight ?>,resizable=yes');return false">보기</a><?php } ?>
		</td><?php } ?>
		<?php }else{ ?>
		<?php if($__Context->val->idx!=-1){ ?><td class="width70 hidden-xs">
			<?php echo $__Context->document->getExtraValueHTML($__Context->val->idx) ?>
		</td><?php } ?>			
		<?php } ?>
	<?php } ?>
	<?php if($__Context->grant->manager){ ?><td class="width30"><input class="checkbox" type="checkbox" name="cart" value="<?php echo $__Context->document->document_srl ?>" title="Check This Article" onclick="doAddDocumentCart(this)"<?php if($__Context->document->isCarted()){ ?> checked="checked"<?php } ?> /></td><?php } ?>
</tr><?php } ?>