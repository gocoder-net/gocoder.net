<?php if(!defined("__XE__"))exit;
if($__Context->oDocument->get('is_notice')!='Y'){ ?>
<?php $__Context->doc_count = count($__Context->document_list) ?>
    <?php $__Context->z=0 ?>
    <?php if($__Context->document_list&&count($__Context->document_list))foreach($__Context->document_list as $__Context->no => $__Context->document){ ?>
        <?php  $__Context->doc_srl[$__Context->z] = $__Context->document->document_srl ?>
        <?php if($__Context->document->document_srl == $__Context->oDocument->document_srl){ ?>
            <?php  $__Context->now_z = $__Context->z  ?>
        <?php } ?>
        <?php $__Context->z++; ?>
    <?php } ?>
 
    <?php if($__Context->now_z == 0 && $__Context->page > 1){ ?>
 
        <?php 
            $__Context->oModuleModel = &getModel('module');
            $__Context->module_srl_temp = $__Context->oModuleModel->getModuleSrlByMid($__Context->mid);
 
            if(is_array($__Context->module_srl_temp)) $__Context->module_srl = $__Context->module_srl_temp[0];
            else $__Context->module_srl = $__Context->module_srl_temp;
 
            $__Context->args->module_srl = $__Context->module_srl;
            $__Context->args->category_srl = $__Context->category_srl;
            $__Context->args->list_count = $__Context->module_info->list_count;
            $__Context->args->search_target = $__Context->search_target;
            $__Context->args->search_keyword = $__Context->search_keyword;
            $__Context->args->page = $__Context->page-1;
            $__Context->args->sort_index = $__Context->module_info->sort_index;
            $__Context->args->order_type = $__Context->module_info->order_type;
 
            $__Context->docList_output = executeQueryArray('document.getDocumentList', $__Context->args);
         ?>
 
        <?php $__Context->x=0 ?>
        <?php if($__Context->docList_output->data&&count($__Context->docList_output->data))foreach($__Context->docList_output->data as $__Context->doc){ ?>
            <?php if($__Context->x == count($__Context->docList_output->data) - 1){ ?>
                <?php  $__Context->beforeDoc = $__Context->doc->document_srl  ?>
            <?php } ?>
            <?php $__Context->x++; ?>
        <?php } ?>
 
        <?php  $__Context->afterDoc = $__Context->doc_srl[$__Context->now_z+1]  ?>
 
    <?php }else if($__Context->now_z == $__Context->doc_count - 1 && $__Context->page < $__Context->total_page){ ?>
 
        <?php 
            $__Context->oModuleModel = &getModel('module');
            $__Context->module_srl_temp = $__Context->oModuleModel->getModuleSrlByMid($__Context->mid);
 
            if(is_array($__Context->module_srl_temp)) $__Context->module_srl = $__Context->module_srl_temp[0];
            else $__Context->module_srl = $__Context->module_srl_temp;
 
            $__Context->args->module_srl = $__Context->module_srl;
            $__Context->args->category_srl = $__Context->category_srl;
            $__Context->args->list_count = $__Context->module_info->list_count;
            $__Context->args->search_target = $__Context->search_target;
            $__Context->args->search_keyword = $__Context->search_keyword;
            $__Context->args->page = $__Context->page+1;
            $__Context->args->sort_index = $__Context->module_info->sort_index;
            $__Context->args->order_type = $__Context->module_info->order_type;
 
            $__Context->docList_output = executeQueryArray('document.getDocumentList', $__Context->args);
         ?>
 
        <?php $__Context->x=0 ?>
        <?php if($__Context->docList_output->data&&count($__Context->docList_output->data))foreach($__Context->docList_output->data as $__Context->doc){ ?>
            <?php if($__Context->x == 0){ ?>
                <?php  $__Context->afterDoc = $__Context->doc->document_srl  ?>
            <?php } ?>
            <?php $__Context->x++; ?>
        <?php } ?>
 
        <?php  $__Context->beforeDoc = $__Context->doc_srl[$__Context->now_z-1]  ?>
 
    <?php }else{ ?>
 
        <?php  $__Context->beforeDoc = $__Context->doc_srl[$__Context->now_z-1]; $__Context->afterDoc = $__Context->doc_srl[$__Context->now_z+1];  ?>
 
    <?php } ?>
 
    <?php if(!$__Context->beforeDoc){ ?>
        <?php  $__Context->beforeDoc = $__Context->oDocument->document_srl  ?>
    <?php }else if(!$__Context->afterDoc){ ?>
        <?php  $__Context->afterDoc = $__Context->oDocument->document_srl  ?>
    <?php } ?>
	<?php if($__Context->module_info->display_sign != 'N' && ($__Context->oDocument->getProfileImage() || $__Context->oDocument->getSignature())){ ?>	
		<?php 
		 $__Context->MemberModel = &getModel('member');
		 $__Context->member_info = $__Context->MemberModel->getMemberInfoByMemberSrl($__Context->document->getMemberSrl());
		 ?>
	<?php } ?>
<?php } ?>		
<div class="paddingb20 rd restview">
	<h3 class="page-header"><?php echo $__Context->oDocument->getTitle();
echo $__Context->aa_count ?></h3>
	<ul class="viewinfo list-inline text-muted nocolor">
		<?php if($__Context->module_info->use_category=='Y'){ ?><li><i class="fa fa-bookmark fa-fw"></i> <?php echo $__Context->category_list[$__Context->oDocument->get('category_srl')]->title ?></li><?php } ?>
		<?php if($__Context->list_config['nick_name']){ ?><li><a href="#popup_menu_area" class="member_<?php echo $__Context->oDocument->get('member_srl') ?>" onclick="return false"><i class="fa fa-pencil fa-fw"></i> <?php echo $__Context->oDocument->getNickName() ?></a></li><?php } ?>
		<?php if($__Context->list_config['user_id']){ ?><li><i class="fa fa-pencil fa-fw"></i> <?php echo $__Context->oDocument->getUserID() ?></li><?php } ?>
		<?php if($__Context->list_config['user_name']){ ?><li><i class="fa fa-pencil fa-fw"></i> <?php echo $__Context->oDocument->getUserName() ?></li><?php } ?>
		<?php if($__Context->list_config['regdate']){ ?><li><i class="fa fa-calendar fa-fw"></i> <?php echo $__Context->oDocument->getRegdate("M d, Y") ?></li><?php } ?>							
		<?php if($__Context->list_config['last_update']){ ?><li><i class="fa fa-calendar-o fa-fw"></i> <?php echo zdate($__Context->oDocument->get('last_update'),'M d, Y') ?> <?php if($__Context->oDocument->getLastUpdater()){ ?>by <?php echo $__Context->oDocument->getLastUpdater();
} ?></li><?php } ?>
		<?php if($__Context->list_config['comment_status']&&$__Context->oDocument->getCommentCount()){ ?><li><a href="<?php echo getUrl('document_srl', $__Context->oDocument->document_srl) ?>#comment"><i class="fa fa-comment fa-fw"></i> <?php echo $__Context->oDocument->getCommentCount() ?></a></li><?php } ?>
		<?php if($__Context->oDocument->getTrackbackCount()){ ?><li><i class="fa fa-comments fa-fw"></i> <a href="<?php echo getUrl('document_srl', $__Context->document->document_srl) ?>#trackback"><?php echo $__Context->oDocument->getTrackbackCount() ?></a></li><?php } ?>
		<?php if($__Context->list_config['readed_count']){ ?><li><i class="fa fa-coffee fa-fw"></i> <?php echo $__Context->oDocument->get('readed_count')>0?$__Context->oDocument->get('readed_count'):'0' ?></li><?php } ?>
		<?php if($__Context->list_config['voted_count']){ ?><li><i class="fa fa-thumbs-up fa-fw"></i> <?php echo $__Context->oDocument->get('voted_count')!=0?$__Context->oDocument->get('voted_count'):'0' ?></li><?php } ?>
		<?php if($__Context->list_config['blamed_count']){ ?><li><i class="fa fa-thumbs-down fa-fw"></i> <?php echo $__Context->oDocument->get('blamed_count')!=0?$__Context->oDocument->get('blamed_count'):'0' ?></a></li><?php } ?>	
		<?php if($__Context->oDocument->getTrackbackCount()){ ?><li><i class="fa fa-comments fa-fw"></i> <a href="#trackback"><?php echo $__Context->oDocument->getTrackbackCount() ?></li><?php } ?>
		<?php if($__Context->oDocument->hasUploadedFiles()){ ?><li><a href="#documentfile<?php echo $__Context->key ?>" data-toggle="collapse"><i class="fa fa-download fa-fw"></i> <?php echo $__Context->lang->uploaded_file ?> <?php echo $__Context->oDocument->get('uploaded_count') ?>개</a></li><?php } ?>
	</ul>
	<?php if($__Context->oDocument->hasUploadedFiles()){ ?><ul class="viewinfo list-inline nocolor collapse" id="documentfile<?php echo $__Context->key ?>">
		<?php  $__Context->uploaded_list = $__Context->oDocument->getUploadedFiles()  ?>
		<?php if($__Context->uploaded_list&&count($__Context->uploaded_list))foreach($__Context->uploaded_list as $__Context->key => $__Context->file){ ?>
		<li><i class="fa fa-check"></i> <a href="<?php echo getUrl('');
echo $__Context->file->download_url ?>"><?php echo $__Context->file->source_filename ?> [File Size:<?php echo FileHandler::filesize($__Context->file->file_size) ?>]</a></li>
		<?php } ?>
	</ul><?php } ?>
	<?php if($__Context->oDocument->isExtraVarsExists() && (!$__Context->oDocument->isSecret() || $__Context->oDocument->isGranted())){ ?>
		<?php if($__Context->oDocument->getExtraVars()&&count($__Context->oDocument->getExtraVars()))foreach($__Context->oDocument->getExtraVars() as $__Context->key => $__Context->val){ ?>			
			<?php if($__Context->val->eid !='video'){ ?>
				<?php if($__Context->oDocument->getExtraValueHTML($__Context->val->idx)){ ?><ul summary="Extra Form" class="viewinfo list-unstyled list-inline text-muted">
					<li> <?php echo $__Context->val->name ?> &nbsp;<?php echo $__Context->val->getValueHTML() ?></li>
				</ul><?php } ?>
			<?php }elseif($__Context->module_info->display_videoplaydoc=='Y' && $__Context->oDocument->getExtraValueHTML($__Context->val->idx)){ ?>
				<?php if($__Context->module_info->display_videoplaydocname=='Y'){ ?><ul summary="Extra Form" class="viewinfo list-unstyled list-inline text-muted">
					<li><i class="fa fa-video-camera fa-fw"></i> <?php echo $__Context->val->name ?> &nbsp;<?php echo $__Context->val->getValueHTML() ?></li>
				</ul><?php } ?>
				<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/rest_default','_rest.viewdocvideo.html') ?>				
			<?php } ?>				
		<?php } ?>
	<?php } ?>
	<div class="clearfix"></div>
	<div class="restdocument">
	<?php if($__Context->oDocument->isSecret() && !$__Context->oDocument->isGranted()){ ?>
		<div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-4">
			<form action="./" method="get" onsubmit="return procFilter(this, input_password)"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
				<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
				<input type="hidden" name="page" value="<?php echo $__Context->page ?>" />
				<input type="hidden" name="document_srl" value="<?php echo $__Context->oDocument->document_srl ?>" />
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
		<?php if($__Context->module_info->display_photogallery=='Y'){;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/rest_default','_rest.viewdocphoto.html');
} ?>	
			<?php echo $__Context->oDocument->getContent() ?>
	<?php } ?>
	<div class="clearfix"></div>
	</div>
	
	<?php  $__Context->tag_list = $__Context->oDocument->get('tag_list')  ?>
	<?php if(count($__Context->tag_list)){ ?><div class="viewtag">
		<i class="fa fa-tag fa-fw"></i> 
		<?php for($__Context->i=0;$__Context->i<count($__Context->tag_list);$__Context->i++){;
$__Context->tag = $__Context->tag_list[$__Context->i];  ?> <a href="<?php echo getUrl('search_target','tag','search_keyword',$__Context->tag,'document_srl','') ?>" rel="tag" class="label label-default"><?php echo htmlspecialchars($__Context->tag) ?></a><?php } ?>
	</div><?php } ?>	
	<div class="clearfix"></div>
	<?php if($__Context->module_info->display_sign != 'N' && ($__Context->oDocument->getProfileImage() || $__Context->oDocument->getSignature())){ ?><div class="signature panel panel-default">
		<div class="panel-body">
			<?php if($__Context->oDocument->getProfileImage()){ ?><img src="<?php echo $__Context->oDocument->getProfileImage() ?>" alt="profile" class="pull-left"/><?php } ?>
			<?php if($__Context->oDocument->getSignature()){;
echo $__Context->oDocument->getSignature();
} ?>
		</div>
	</div><?php } ?>
	<div class="clearfix"></div>	
	
	<div class="pull-right">
		<?php if($__Context->oDocument->allowComment() && $__Context->grant->write_comment && $__Context->oDocument->isEnableComment()){ ?><button class="btn btn-default btn-sm" data-toggle="collapse" data-target="#commentwrite_<?php echo $__Context->oDocument->document_srl ?>" ><?php echo $__Context->lang->cmd_reply ?></button><?php } ?>
        <?php if($__Context->oDocument->isEditable()){ ?>
		<a class="btn btn-default btn-sm"  href="<?php echo getUrl('act','dispBoardWrite','document_srl',$__Context->oDocument->document_srl,'comment_srl','') ?>"><?php echo $__Context->lang->cmd_modify ?></a>
		<a class="btn btn-default btn-sm"  href="<?php echo getUrl('act','dispBoardDelete','document_srl',$__Context->oDocument->document_srl,'comment_srl','') ?>"><?php echo $__Context->lang->cmd_delete ?></a>
        <?php } ?>
		<?php if($__Context->module_info->default_style != 'blog'){ ?>
		<a class="btn btn-default btn-sm" href="<?php echo getUrl('document_srl',$__Context->beforeDoc,'listStyle',$__Context->listStyle, 'cpage','', 'page', '') ?>">이전글</a>
		<a class="btn btn-default btn-sm" href="<?php echo getUrl('document_srl',$__Context->afterDoc,'listStyle',$__Context->listStyle, 'cpage','', 'page', '') ?>">다음글</a>
		<a class="btn btn-default btn-sm"  href="<?php echo getUrl('document_srl','') ?>"><?php echo $__Context->lang->cmd_list ?></a>
        <?php } ?>
    </div>	
	<div class="clearfix"></div>
	
	<?php if($__Context->oDocument->allowTrackback){;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/rest_default','trackback.html');
} ?>	
	<div id="<?php echo $__Context->oDocument->document_srl ?>_comment">
		<a name="comment"></a>
		<?php if($__Context->oDocument->allowComment() && $__Context->mi->cmt_wrt_position=='cmt_wrt_top'){;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/rest_default','_comment_write.html');
} ?>
		<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/rest_default','comment.html') ?>	
		<?php if($__Context->oDocument->allowComment() && $__Context->mi->cmt_wrt_position=='cmt_wrt_btm'){;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/rest_default','_comment_write.html');
} ?>
	</div>
</div>	
<div class="clearfix"></div>
<?php if($__Context->module_info->default_style != 'blog'){ ?>
<script language="JavaScript">
function checkHotkey(){
	if ( (event.srcElement.tagName != 'INPUT') && (event.srcElement.tagName != 'TEXTAREA') ){
    if (event.keyCode=='110') location.replace('<?php echo getUrl('document_srl',$__Context->beforeDoc,'listStyle',$__Context->listStyle, 'cpage','', 'page', '') ?>');
	if (event.keyCode=='98') location.replace('<?php echo getUrl('document_srl',$__Context->afterDoc,'listStyle',$__Context->listStyle, 'cpage','', 'page', '') ?>');
  }
}
document.onkeypress=checkHotkey;
</script>	
<?php } ?>
<?php if($__Context->mi->cmt_wrt=='simple' && $__Context->grant->write_comment && $__Context->oDocument->isEnableComment()){ ?>
<?php if($__Context->rd_idx==0){ ?><div id="mod_cmt" class="collapse">
	<form action="./" method="post" onsubmit="return procFilter(this,insert_comment)" class="bd_wrt"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
		<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
		<input type="hidden" name="document_srl" value="<?php echo $__Context->oDocument->get('document_srl') ?>" />
		<input type="hidden" name="comment_srl" value="" />
		<input type="hidden" name="content" value="" />
		<div class="simple_wrt paddingb10">
			<input type="hidden" id="htm_3" value="n" />
			<textarea id="editor_3" class="form-control" cols="50" rows="4"></textarea>
		</div>
		<?php if(!$__Context->is_logged){ ?>
		<div class="form-inline paddingb10">
			<input class="form-control" type="text" name="nick_name" value="<?php echo $__Context->lang->writer ?>"  title="<?php echo $__Context->lang->writer ?>" onfocus="if(this.value==this.title)this.value='';return false;" />
			<input class="form-control" type="password" name="password" value="<?php echo $__Context->lang->password ?>" title="<?php echo $__Context->lang->password ?>" onfocus="if(this.value==this.title)this.value='';return false;" />
			<input class="form-control" type="text" name="email_address" value="<?php echo $__Context->lang->email_address ?>" title="<?php echo $__Context->lang->email_address ?>" onfocus="if(this.value==this.title)this.value='';return false;" />
			<input class="form-control" type="text" name="homepage" value="<?php echo $__Context->lang->homepage ?>" title="<?php echo $__Context->lang->homepage ?>" onfocus="if(this.value==this.title)this.value='';return false;" />
		</div>	
		<div class="clearfix"></div>	
		<?php } ?>
		<div>
			<div class="pull-left">
				<a class="btn btn-sm btn-default" href="<?php echo getUrl('act','dispBoardModifyComment','comment_srl',$__Context->comment->comment_srl) ?>">에디터모드</a>
			</div>	
			<div class="pull-right form-inline">			
				<?php if($__Context->is_logged){ ?>
					<label class="checkbox-inline">
					<input type="checkbox" name="notify_message" value="Y" id="notify_message" />
					<?php echo $__Context->lang->notify ?> </label>
				<?php } ?>
					<?php if($__Context->module_info->use_status!='PUBLIC'){ ?>
					<label class="checkbox-inline">
					<input type="checkbox" name="is_secret" value="Y" id="is_secret"/>
					비밀글 </label>
					<?php } ?>
					<input class="btn btn-default btn-sm bd_btn fr"  type="submit" value="<?php echo $__Context->lang->cmd_modify ?>" onclick="setTimeout('location.reload()',700);"/>	
					<a href="#" class="btn btn-default btn-sm" onclick="jQuery('#mod_cmt').fadeOut().parent().find('.mod_comment').focus();return false"><?php echo $__Context->lang->cmd_close ?></a>
			</div>
		</div>
		<div class="clearfix"></div>	
	</form>
</div><?php } ?>
<?php if($__Context->rd_idx==0){ ?><div id="re_cmt" class="collapse">
	<form action="./" method="post" onsubmit="return procFilter(this,insert_comment)" class="bd_wrt"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
		<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
		<input type="hidden" name="document_srl" value="<?php echo $__Context->oDocument->document_srl ?>" />
		<input type="hidden" name="content" value="" />
		<input type="hidden" name="parent_srl" value="" />
		<div class="simple_wrt paddingb10">
			<input type="hidden" id="htm_2" value="n" />
			<textarea id="editor_2" class="form-control" cols="50" rows="4"></textarea>
		</div>
		<?php if(!$__Context->is_logged){ ?>
		<div class="form-inline paddingb10">
			<input class="form-control" type="text" name="nick_name" value="<?php echo $__Context->lang->writer ?>"  title="<?php echo $__Context->lang->writer ?>" onfocus="if(this.value==this.title)this.value='';return false;" />
			<input class="form-control" type="password" name="password" value="<?php echo $__Context->lang->password ?>" title="<?php echo $__Context->lang->password ?>" onfocus="if(this.value==this.title)this.value='';return false;" />
			<input class="form-control" type="text" name="email_address" value="<?php echo $__Context->lang->email_address ?>" title="<?php echo $__Context->lang->email_address ?>" onfocus="if(this.value==this.title)this.value='';return false;" />
			<input class="form-control" type="text" name="homepage" value="<?php echo $__Context->lang->homepage ?>" title="<?php echo $__Context->lang->homepage ?>" onfocus="if(this.value==this.title)this.value='';return false;" />
		</div>	
		<div class="clearfix"></div>
		<?php } ?>
		<div>
			<div class="pull-left">
				<a class="wysiwyg m_no btn btn-sm btn-default" href="#">에디터모드</a>
			</div>
			<div class="pull-right form-inline">
				<?php if($__Context->is_logged){ ?>
				<label class="checkbox-inline">
				<input type="checkbox" name="notify_message" value="Y" id="notify_message"/>
				<?php echo $__Context->lang->notify ?> </label>
				<?php } ?>
				<?php if($__Context->module_info->use_status!='PUBLIC'){ ?>
				<label class="checkbox-inline">
				<input type="checkbox" name="is_secret" value="Y" id="is_secret"/>
				비밀글 </label>
				<?php } ?>
				<input class="btn btn-default btn-sm"  type="submit" value="<?php echo $__Context->lang->cmd_submit ?>"/>	
				<a href="#" class="btn btn-default btn-sm"  onclick="jQuery('#re_cmt').fadeOut().parent().find('.re_comment').focus();return false"><?php echo $__Context->lang->cmd_close ?></a>
			</div>
		</div>
		<div class="clearfix"></div>
	</form>
</div><?php } ?>
<?php } ?>