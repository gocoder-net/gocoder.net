<?php if(!defined("__XE__"))exit;?><script type="text/javascript">
 jQuery("link[rel=stylesheet][href*='common/css/xe.min.css']").remove();
</script>
<?php echo Context::set("admin_bar", "false"); ?>
<?php 
	$__Context->mi = $__Context->module_info;
	$__Context->mi->write_option = unserialize($__Context->mi->write_option);
	if($__Context->_COOKIE['bd_editor']) $__Context->mi->cmt_wrt = $__Context->_COOKIE['bd_editor'];	
	if(!$__Context->mi->display_mediadocument) $__Context->mi->display_mediadocument = 'N';	
	if(!$__Context->mi->cmt_wrt) $__Context->mi->cmt_wrt = 'simple';
	if(!$__Context->mi->content_cut_size) $__Context->mi->content_cut_size = 800;
	if(!$__Context->mi->duration_new) $__Context->mi->duration_new = 24;	
	if(!$__Context->mi->fontsize12) $__Context->mi->fontsize12 = 'Y';
	if(!$__Context->mi->default_style) $__Context->mi->default_style = 'list';
	if(!$__Context->mi->display_setup_button) $__Context->mi->display_setup_button = 'Y';
	if(!$__Context->mi->display_listset_button) $__Context->mi->display_listset_button = 'Y';
	if(!$__Context->mi->display_categoryset_button) $__Context->mi->display_categoryset_button = 'pills';
	if(!$__Context->mi->display_categoryset_badge) $__Context->mi->display_categoryset_badge = 'N';
	if(!$__Context->mi->display_listheadset_button) $__Context->mi->display_listheadset_button = 'Y';
	if(!$__Context->mi->display_listtable) $__Context->mi->display_listtable = 'Y';	
	if(!$__Context->mi->display_thumbnailborder) $__Context->mi->display_thumbnailborder = 'Y';
	if(!$__Context->mi->display_thumbnailcover) $__Context->mi->display_thumbnailcover = 'button';
	if(!$__Context->mi->display_thumbnaileffect) $__Context->mi->display_thumbnaileffect = 'Y';
	if(!$__Context->mi->display_thumbnailnum) $__Context->mi->display_thumbnailnum = 'three';
	if(!$__Context->mi->display_thumbnail_col) $__Context->mi->display_thumbnail_col = '';	
	if(!$__Context->mi->display_webzineborder) $__Context->mi->display_webzineborder = 'Y';
	if(!$__Context->mi->thumbnail_width) $__Context->mi->thumbnail_width = 280;
	if(!$__Context->mi->thumbnail_height) $__Context->mi->thumbnail_height = 210;
	if(!$__Context->mi->thumbnail_type) $__Context->mi->thumbnail_type = 'crop';
	if(!$__Context->mi->display_marketing) $__Context->mi->display_marketing = 'N';
	if(!$__Context->mi->display_cardthumb) $__Context->mi->display_cardthumb = 'Y';
	if(!$__Context->mi->display_videoplay) $__Context->mi->display_videoplay = 'N';
	if(!$__Context->mi->display_videoplaylistuse) $__Context->mi->display_videoplaylistuse = 'Y';
	if(!$__Context->mi->display_videoplaylist) $__Context->mi->display_videoplaylist = 'N';	
	if(!$__Context->mi->display_videoplaydoc) $__Context->mi->display_videoplaydoc = 'Y';
	if(!$__Context->mi->display_videoplaydocname) $__Context->mi->display_videoplaydocname = 'Y';
	if(!$__Context->mi->display_videoplaywidth) $__Context->mi->display_videoplaywidth = '800';
	$__Context->videolistwidth	= $__Context->mi->display_videoplaywidth+280 ;
	if(!$__Context->mi->display_videoplayheight) $__Context->mi->display_videoplayheight = '500';
	if(!$__Context->mi->display_youtubelink) $__Context->mi->display_youtubelink = '';	
	if(!$__Context->mi->display_viewdocumentlist) $__Context->mi->display_viewdocumentlist = 'Y';
	if(!$__Context->mi->display_commentwrite) $__Context->mi->display_commentwrite = 'N';
	if(!$__Context->mi->cmt_wrt_position) $__Context->mi->cmt_wrt_position = 'cmt_wrt_btm';	
	if(!$__Context->mi->display_photogallery) $__Context->mi->display_photogallery = 'N';
	if(!$__Context->mi->display_photogalleryheight) $__Context->mi->display_photogalleryheight = '';
	if(!$__Context->mi->display_list_cthumbnail) $__Context->mi->display_list_cthumbnail = 'N';
	if(!$__Context->mi->display_ip_address) $__Context->mi->display_ip_address = 'N';	
	if(!$__Context->mi->display_sign) $__Context->mi->display_sign = 'Y';	
	if(!$__Context->mi->display_profileimg_width) $__Context->mi->display_profileimg_width = 100;	
	if(!$__Context->mi->display_profileimg_height) $__Context->mi->display_profileimg_height = 75;	
	if(!$__Context->mi->thumbnail_heightp) $__Context->mi->thumbnail_heightp = 75;
 ?>
<?php if($__Context->module_info->bootstrap_js=='Y'){ ?>
<?php }else{ ?>
<!--#Meta:modules/board/skins/rest_default/css/bootstrap.min.css--><?php $__tmp=array('modules/board/skins/rest_default/css/bootstrap.min.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/board/skins/rest_default/js/bootstrap.min.js--><?php $__tmp=array('modules/board/skins/rest_default/js/bootstrap.min.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php } ?>
<!--#Meta:modules/board/skins/rest_default/css/board.css--><?php $__tmp=array('modules/board/skins/rest_default/css/board.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/board/skins/rest_default/js/board.js--><?php $__tmp=array('modules/board/skins/rest_default/js/board.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/board/skins/rest_default/css/font-awesome.min.css--><?php $__tmp=array('modules/board/skins/rest_default/css/font-awesome.min.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php if($__Context->order_type == "desc"){ ?>
    <?php  $__Context->order_type = "asc";  ?>
<?php }else{ ?>
    <?php  $__Context->order_type = "desc";  ?>
<?php } ?>
<?php if($__Context->listStyle=='gallery'){ ?>
    <?php  $__Context->mi->default_style = 'gallery' ?>
<?php }elseif($__Context->listStyle=='webzine'){ ?>
    <?php  $__Context->mi->default_style = 'webzine' ?>
<?php }elseif($__Context->listStyle=='list'){ ?>
    <?php  $__Context->mi->default_style = 'list' ?>
<?php }elseif($__Context->listStyle=='card'){ ?>
    <?php  $__Context->mi->default_style = 'card' ?>	
<?php }elseif($__Context->listStyle=='video'){ ?>
    <?php  $__Context->mi->default_style = 'video' ?>	
<?php }elseif($__Context->listStyle=='videolist'){ ?>
    <?php  $__Context->mi->default_style = 'videolist' ?>
<?php }elseif($__Context->listStyle=='blog'){ ?>
	<?php  $__Context->mi->default_style = 'blog' ?>
<?php }elseif(!in_array($__Context->mi->default_style,array('list','webzine','gallery','card','blog','video','videolist'))){ ?>
    <?php  $__Context->mi->default_style = 'list' ?>
<?php } ?>
<?php  $__Context->cate_list = array(); $__Context->current_key = null;  ?>
<?php if($__Context->category_list&&count($__Context->category_list))foreach($__Context->category_list as $__Context->key=>$__Context->val){ ?>
	<?php if(!$__Context->val->depth){ ?>
		<?php 
			$__Context->cate_list[$__Context->key] = $__Context->val;
			$__Context->cate_list[$__Context->key]->children = array();
			$__Context->current_key = $__Context->key;
		 ?>
	<?php }elseif($__Context->current_key){ ?>
		<?php  $__Context->cate_list[$__Context->current_key]->children[] = $__Context->val  ?>
	<?php } ?>
<?php } ?>
<?php if($__Context->mi->fontsize12=='Y'){ ?>
<style type="text/css"> 
.restboard p {font-size:12px;}
.restboard table {font-size:12px;}
.restboard td {vertical-align:middle;}
.restboard div {font-size:12px;}
.restboard li {font-size:12px;}
.restboard .label {font-family:"Helvetica Neue", Helvetica, Arial, sans-serif;}
 </style>
<?php } ?>
<?php if($__Context->mi->thumbnail_heightp){ ?>
<style type="text/css">
.restboard .imgwh {padding-bottom:<?php echo $__Context->mi->thumbnail_heightp ?>%;}
 </style>
 <?php } ?>