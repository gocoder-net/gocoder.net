<?php if(!defined("__XE__"))exit;
$__Context->widget_info->slider_name = 'gySliderBot_'.rand(100000,500000).rand(100000,500000); ?>
<script type="text/javascript">
			jQuery(function($){
			
			  $('.<?php echo $__Context->widget_info->slider_name ?>').owlCarousel({
				nav:true,
				items:1,
				loop:true,
				autoplay:true,
				autoplayTimeout:7000,
				margin:0
               
             });
		});
		</script>
<div class="wrap_owl owl-normal owl-normal-ITC">
	<div class="owl-carousel <?php echo $__Context->widget_info->slider_name ?> ">
	<?php if($__Context->widget_info->content_items&&count($__Context->widget_info->content_items))foreach($__Context->widget_info->content_items as $__Context->key => $__Context->item){ ?>
		<div class="item">
			<?php if($__Context->item->getThumbnail()){ ?>
			<a class="slide_link" href="<?php echo $__Context->item->getLink() ?>"<?php if($__Context->widget_info->new_window){ ?> target="_blank"<?php } ?>><img src="<?php echo $__Context->item->getThumbnail() ?>" alt=""></a>
			<?php }else{ ?>
			<a class="slide_link" href="<?php echo $__Context->item->getLink() ?>"<?php if($__Context->widget_info->new_window){ ?> target="_blank"<?php } ?>><img src="/widgets/content/skins/Door_cpA/img/noneLarge_img.gif" alt=""></a>
			<?php } ?>
			<div class="wrap_slide_title door_bg">
			<?php for($__Context->j=0,$__Context->c=count($__Context->widget_info->option_view_arr);$__Context->j<$__Context->c;$__Context->j++){ ?>
				<?php if($__Context->widget_info->option_view_arr[$__Context->j]=='title'){ ?>
				<h3 class="slide_title">
					<a href="<?php echo $__Context->item->getLink() ?>" class="title"<?php if($__Context->widget_info->new_window){ ?> target="_blank"<?php } ?>><?php echo $__Context->item->getTitle($__Context->widget_info->subject_cut_size) ?></a>
				</h3>
				<?php }else if($__Context->widget_info->option_view_arr[$__Context->j]=='content'){ ?>
				<p class="DWcontent">
					<a href="<?php echo $__Context->item->getLink() ?>" class="title"<?php if($__Context->widget_info->new_window){ ?> target="_blank"<?php } ?>><?php echo $__Context->item->getContent() ?></a>	
				</p>
				<!-- <a href="<?php echo $__Context->item->getLink() ?>"<?php if($__Context->widget_info->new_window){ ?> target="_blank"<?php } ?> class="slide_more">More</a> -->
				<div class="wrap_DW_Rep">
					<?php if($__Context->widget_info->show_comment_count=='Y' && $__Context->item->getCommentCount()){ ?>
					<span class="DW_Rep">
						<i class="xi-message"></i><a href="<?php echo $__Context->item->getLink() ?>#comment" class="DW_Replies"><span><?php echo $__Context->item->getCommentCount() ?></span></a>
					</span>
					<?php }elseif($__Context->widget_info->show_comment_count=='Y'){ ?>
					<span class="DW_Rep">
						<i class="xi-message"></i><span class="DW_Replies">0</span>
					</span>
					<?php } ?>
					 <span class="wrap_date"><i class="xi-calendar"></i><span class="slide_block"><?php echo $__Context->item->getRegdate("m-d") ?></span></span>
				</div>
				<?php } ?>
			<?php } ?>
				<a class="ornament door_bg" href="<?php echo $__Context->item->getLink() ?>"<?php if($__Context->widget_info->new_window){ ?> target="_blank"<?php } ?>></a>
			</div>
			
		</div>
	<?php } ?>
	</div>
</div>
