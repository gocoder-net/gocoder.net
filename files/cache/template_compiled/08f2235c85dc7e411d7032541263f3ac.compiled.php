<?php if(!defined("__XE__"))exit;
echo $__Context->module_info->header_text ?>
<?php if($__Context->module_info->title){ ?><div class="page-header">
	<h1><a href="<?php echo getUrl('','mid',$__Context->mid,'listStyle',$__Context->listStyle) ?>"><?php echo $__Context->module_info->title ?></a>
	<small><?php echo $__Context->module_info->sub_title ?></small></h1>
</div><?php } ?>
<?php if($__Context->module_info->comment){ ?><div class="alert alert-info"><?php echo $__Context->module_info->comment ?></div><?php } ?>