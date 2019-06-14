<?php if(!defined("__XE__"))exit;
if($__Context->document->thumbnailExists($__Context->mi->thumbnail_width, $__Context->mi->thumbnail_height, $__Context->mi->thumbnail_type)){ ?>
	<?php  $__Context->thumbnaillink = $__Context->document->getThumbnail($__Context->mi->thumbnail_width, $__Context->mi->thumbnail_height, $__Context->mi->thumbnail_type) ?>
<?php }else{ ?>
	<?php if($__Context->document->getExtraEidValue('video') || $__Context->mi->display_list_cthumbnail=='Y'){ ?>
		<?php if($__Context->document->getExtraEidValue('video')){ ?>
		<?php 	$__Context->thumbnaillink = $__Context->document->getExtraEidValue('video'); ?>
		<?php }elseif($__Context->mi->display_list_cthumbnail=='Y'){ ?>
		<?php  $__Context->documentcontent = $__Context->document->getContent();
			preg_match_all("`href=\"(http|https)://(www.youtube|youtu|vimeo|www.vimeo)(.com|.be)/(.+?)\"`",$__Context->documentcontent,$__Context->out, PREG_PATTERN_ORDER); 
			 $__Context->out = str_replace('href=','',$__Context->out[0][0]);
			 $__Context->thumbnaillink = str_replace('"','',$__Context->out);
		 ?>	
		<?php } ?>		
		<?php if(preg_match('/youtu/', $__Context->thumbnaillink)){ ?>
			<?php if(preg_match('/v=/', $__Context->thumbnaillink)){ ?>
			<?php 	$__Context->thumbnaillink = explode('v=',$__Context->thumbnaillink);
				$__Context->thumbnaillink = $__Context->thumbnaillink[1]; ?>	
			<?php }else{ ?>
			<?php 	$__Context->thumbnaillink = str_replace('https://','http://',$__Context->thumbnaillink);
				$__Context->thumbnaillink = str_replace('http://youtu.be/','',$__Context->thumbnaillink);
				$__Context->thumbnaillink = str_replace('http://www.youtube.com/embed/','',$__Context->thumbnaillink); ?>
			<?php } ?>
			<?php 	$__Context->thumbnaillink = substr($__Context->thumbnaillink,0,11);
				$__Context->thumbnaillink = 'http://img.youtube.com/vi/'.$__Context->thumbnaillink.'/0.jpg'; ?>
		<?php }elseif(preg_match('/vimeo/', $__Context->thumbnaillink)){ ?>
		<?php 	$__Context->vimeothumbnail = substr($__Context->thumbnaillink,-8); ?>
			<script>	
			//<!--<![CDATA[ 
			jQuery(function(){ 
				jQuery("#rthumbnail .rthumbnailimg").each(function(index){ 
				var vimeoVideoID = jQuery(this).attr("id"); 
				jQuery.getJSON('http://www.vimeo.com/api/v2/video/' + vimeoVideoID + '.json?callback=?', {format: "json"}, function(data) { 
					jQuery("#"+vimeoVideoID).attr('src', data[0].thumbnail_medium); 
					}); 
			  
				}); 
			}); 
			//]]>--> 
			</script>
		<?php }else{ ?>
		<?php  $__Context->thumbnaillink = '0'; ?>
		<?php } ?>
	<?php }else{ ?>
	<?php  $__Context->thumbnaillink = '0'; ?>
	<?php } ?>
<?php } ?>	