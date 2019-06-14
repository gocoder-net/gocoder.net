<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/sketchbook5','_header.html') ?>
<!--#Meta:modules/board/skins/sketchbook5/js/editor.js--><?php $__tmp=array('modules/board/skins/sketchbook5/js/editor.js','body','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php if($__Context->oSourceComment->isExists()){ ?>
<div class="context_data">
	<div class="fdb_itm" style="margin:0;padding:0;border:0">
		<div class="meta">
			<b><?php echo $__Context->oSourceComment->getNickName() ?></b><span class="date"><?php echo $__Context->oSourceComment->getRegdate("Y.m.d H:i") ?></span>
		</div>
		<?php echo $__Context->oSourceComment->getContent(false) ?>
	</div>
</div>
<div class="context_message"></div>
<div class="cmt_line">▼</div>
<?php }else{ ?>
<div class="context_data">
	<h3 class="title">&quot;<?php echo $__Context->lang->cmd_reply ?> <?php echo $__Context->lang->cmd_modify ?>&quot;</h3>
	<?php if(Mobile::isMobileCheckByAgent()){ ?><p>※ <?php echo $__Context->lang->m_editor_notice ?>.</p><?php } ?>
</div>
<div class="context_message" style="margin-bottom:40px"></div>
<?php } ?>
<form action="./" method="post" onsubmit="<?php if(Mobile::isMobileCheckByAgent() && !$__Context->mi->m_editor){ ?>jQuery(this).find('input[name=content]').val(jQuery('#editor').html());<?php } ?>return procFilter(this, insert_comment)" class="bd_wrt bd_wrt_main clear"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
	<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
	<input type="hidden" name="document_srl" value="<?php echo $__Context->oComment->get('document_srl') ?>" />
	<input type="hidden" name="comment_srl" value="<?php echo $__Context->oComment->get('comment_srl') ?>" />
	<input type="hidden" name="content" value="<?php echo htmlspecialchars($__Context->oComment->get('content')) ?>" />
	<input type="hidden" name="parent_srl" value="<?php echo $__Context->oComment->get('parent_srl') ?>" />
	<?php if(!Mobile::isMobileCheckByAgent() || $__Context->mi->m_editor==3){ ?><div class="get_editor"><?php echo $__Context->oComment->getEditor() ?></div><?php } ?>
	<?php if(Mobile::isMobileCheckByAgent() && $__Context->mi->m_editor!=3){ ?><div class="m_editor">
<!-- Textarea -->
<?php if($__Context->mi->m_editor==2){ ?>
<!--#Meta:modules/editor/tpl/js/editor_common.min.js--><?php $__tmp=array('modules/editor/tpl/js/editor_common.min.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/editor/skins/xpresseditor/js/xe_textarea.min.js--><?php $__tmp=array('modules/editor/skins/xpresseditor/js/xe_textarea.min.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
		<input type="hidden" name="use_html" value="Y" />
		<input type="hidden" id="htm_1" value="n" />
		<textarea id="editor_1" col="50" rows="8"></textarea>
<script>
	editorStartTextarea(1,"content","document_srl");
</script>
<?php } ?>
<!-- WYSIWYG -->
<?php if(!$__Context->mi->m_editor){ ?>
<!--#Meta:modules/board/skins/sketchbook5/css/m_editor.css--><?php $__tmp=array('modules/board/skins/sketchbook5/css/m_editor.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/board/skins/sketchbook5/js/editor_wysiwyg.js--><?php $__tmp=array('modules/board/skins/sketchbook5/js/editor_wysiwyg.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/board/skins/sketchbook5/js/bootstrap-wysiwyg.js--><?php $__tmp=array('modules/board/skins/sketchbook5/js/bootstrap-wysiwyg.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/board/skins/sketchbook5/js/jquery.hotkeys.js--><?php $__tmp=array('modules/board/skins/sketchbook5/js/jquery.hotkeys.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
		<div id="alerts"></div>
		<div class="btn-toolbar clear" data-role="editor-toolbar" data-target="#editor">
			<div class="btn-group">
				<a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
				<a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
				<a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
			</div>
			<div class="btn-group">
				<a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
				<a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
				
			</div>
			<div class="btn-group hide_w320">
				<a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
				
			</div>
			<div class="btn-group fr">
				<a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
				<a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
			</div>
			<div class="blind"><input type="text" data-edit="inserthtml" id="inserthtml" /></div>
		</div>
		<div id="editor"><p>&nbsp;</p></div>
<?php } ?>
	</div><?php } ?>
	<div class="edit_opt">
		<?php if(!$__Context->is_logged){ ?>
		<span class="itx_wrp">
			<label for="nick_name"><?php echo $__Context->lang->writer ?></label>
			<input type="text" name="nick_name" id="nick_name" class="itx n_p" value="<?php echo $__Context->oComment->getNickName() ?>" />
		</span>
		<span class="itx_wrp">
			<label for="password"><?php echo $__Context->lang->password ?></label>
			<input type="password" name="password" id="password" class="itx n_p" />
		</span>	
		<span class="itx_wrp">
			<label for="email_address"><?php echo $__Context->lang->email_address ?></label>
			<input type="text" name="email_address" id="email_address" class="itx m_h" />
		</span>	
		<span class="itx_wrp">
			<label for="homepage"><?php echo $__Context->lang->homepage ?></label>
			<input type="text" name="homepage" id="homepage" class="itx m_h" />
		</span>
		<?php } ?>
	</div>
	<div class="opt_chk clear">
		<?php if($__Context->is_logged){ ?>
		<input type="checkbox" name="notify_message" value="Y" id="notify_message"<?php if($__Context->oComment->get('notify_message')=='Y' || ($__Context->oComment->get('notify_message')!='Y' && @in_array('notify',$__Context->mi->wrt_opt))){ ?> checked="checked"<?php } ?> />
		<label for="notify_message"><?php echo $__Context->lang->notify ?></label>
		<?php } ?>
		<?php if($__Context->mi->use_status!='PUBLIC'){ ?>
		<input type="checkbox" name="is_secret" value="Y" id="is_secret"<?php if($__Context->oComment->get('is_secret')=='Y' || ($__Context->oComment->get('is_secret')!='Y' && @in_array('secret',$__Context->mi->wrt_opt))){ ?> checked="checked"<?php } ?> />
		<label for="is_secret"><?php echo $__Context->lang->secret ?></label>
		<?php } ?>
	</div>
	<div class="regist">
		<button type="button" onclick="history.back()" class="bd_btn"><?php echo $__Context->lang->cmd_back ?></button>
		<input type="submit" value="<?php echo $__Context->lang->cmd_registration ?>" class="bd_btn blue" />
	</div>
</form>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/sketchbook5','_footer.html') ?>