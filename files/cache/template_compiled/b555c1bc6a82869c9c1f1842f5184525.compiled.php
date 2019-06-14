<?php if(!defined("__XE__"))exit;
if($__Context->grant->write_comment && $__Context->oDocument->isEnableComment()){ ?><div class="cmt_editor">
<a name="commentwriteed_<?php echo $__Context->oDocument->document_srl ?>"></a>
	<div id="commentwrite_<?php echo $__Context->oDocument->document_srl ?>" class="collapse paddingtb10 form-inline <?php if($__Context->module_info->display_commentwrite == 'Y'){ ?>in<?php } ?>">
		<form action="./" method="post" onsubmit="return procFilter(this, insert_comment)" class="bd_wrt cmt_wrt"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
			<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
			<input type="hidden" name="document_srl" value="<?php echo $__Context->oDocument->document_srl ?>" />
			<input type="hidden" name="comment_srl" value="" />
			<input type="hidden" name="content" value="" />
			<?php if($__Context->mi->cmt_wrt=='editor'){ ?><div class="cmt_editor"><?php echo $__Context->oDocument->getCommentEditor() ?></div><?php } ?>
			<?php if($__Context->mi->cmt_wrt=='simple'){ ?><div class="simple_wrt paddingb10">
				<div>
					<input type="hidden"  id="htm_<?php echo $__Context->oDocument->document_srl ?>"  value="n" />
					<textarea id="editor_<?php echo $__Context->oDocument->document_srl ?>" class="form-control" cols="50" rows="4"></textarea>
				</div>
			</div><?php } ?>	
			<div<?php if($__Context->mi->cmt_wrt!='editor'){ ?> style="display:none"<?php } ?>>
				<?php if(!$__Context->is_logged){ ?>
				<div class="paddingb10">
					<input class="form-control" type="text" name="nick_name" value="<?php echo $__Context->lang->writer ?>"  title="<?php echo $__Context->lang->writer ?>" onfocus="if(this.value==this.title)this.value='';return false;" />
					<input class="form-control" type="password" name="password" value="<?php echo $__Context->lang->password ?>" title="<?php echo $__Context->lang->password ?>" onfocus="if(this.value==this.title)this.value='';return false;" />
					<input class="form-control" type="text" name="email_address" value="<?php echo $__Context->lang->email_address ?>" title="<?php echo $__Context->lang->email_address ?>" onfocus="if(this.value==this.title)this.value='';return false;" />
					<input class="form-control" type="text" name="homepage" value="<?php echo $__Context->lang->homepage ?>" title="<?php echo $__Context->lang->homepage ?>" onfocus="if(this.value==this.title)this.value='';return false;" />
				</div>
				<div class="clearfix"></div>
				<?php } ?>
				<div class="pull-left">
					<a class="btn btn-default btn-sm" href="#" onclick="jQuery.cookie('bd_editor','simple');location.reload();return false">텍스트모드</a>
					<a class="btn btn-default btn-sm" href="#" onclick="jQuery.cookie('bd_editor','editor');location.reload();return false">에디터모드</a>
				</div>			
				<div class="pull-right">
				<?php if($__Context->is_logged){ ?>
					<label class="checkbox-inline" for="notify_message_<?php echo $__Context->oDocument->document_srl ?>">
					<input type="checkbox" name="notify_message" value="Y" id="notify_message_<?php echo $__Context->oDocument->document_srl ?>"/>
					<?php echo $__Context->lang->notify ?> </label>
					<?php } ?>
					<?php if($__Context->module_info->use_status!='PUBLIC'){ ?>
					<label class="checkbox-inline" for="is_secret_<?php echo $__Context->oDocument->document_srl ?>">
					<input type="checkbox" name="is_secret" value="Y" id="is_secret_<?php echo $__Context->oDocument->document_srl ?>"/>
					비밀글 </label>
					<?php } ?>
					<input class="btn btn-default btn-sm" type="submit" value="<?php echo $__Context->lang->cmd_submit ?>"/>
				</div>
			</div>
			<div class="clearfix"></div>
		</form>
	</div>
</div><?php } ?>