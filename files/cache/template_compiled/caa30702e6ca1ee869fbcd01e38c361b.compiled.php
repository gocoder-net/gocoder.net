<?php if(!defined("__XE__"))exit;?>
<?php  $__Context->widget_info->slider_name = 'gySliderBot_'.rand(100000,500000).rand(100000,500000); ?>
<script type="text/javascript">
			jQuery(function($){
			
			  $('.<?php echo $__Context->widget_info->slider_name ?>').owlCarousel({
				nav:true,
				items:1,
				loop:true,
				autoplay:true,
				margin:10,
				responsive:{
					0:{
					items:2
					},
					376:{
						items:2
					},
					533:{
						items:3
					},
					1020:{
						items:2
					}
				}
               
             });
		});
		</script>
<style type="text/css">
  
    .<?php echo $__Context->widget_info->slider_name ?> .item img.DW_img{
        display: block;
        width: 100%;
        height: auto;
    }
</style>
<div class="">
	<div class="owl-small owl-smallB owl-carousel <?php echo $__Context->widget_info->slider_name ?>">
	<?php if($__Context->widget_info->content_items&&count($__Context->widget_info->content_items))foreach($__Context->widget_info->content_items as $__Context->key => $__Context->item){ ?>
		<div class="item">
			<div class="in_item_slide">
				<a href="<?php echo $__Context->item->getLink() ?>" class="DCP_box_link"<?php if($__Context->widget_info->new_window){ ?> target="_blank"<?php } ?>>
					<?php if($__Context->item->getThumbnail()){ ?>
					<img class="DW_img" src="<?php echo $__Context->item->getThumbnail() ?>" alt="">
					<?php }else{ ?>
					<img class="DW_img" src="/widgets/content/skins/Door_cpA/img/noneLarge_img.gif" alt="">
					<?php } ?>
				</a>
			</div>
			<?php for($__Context->j=0,$__Context->c=count($__Context->widget_info->option_view_arr);$__Context->j<$__Context->c;$__Context->j++){ ?>
			 <?php if($__Context->widget_info->option_view_arr[$__Context->j]=='title'){ ?>
			<div class="slide_title">
					<?php if($__Context->widget_info->show_browser_title=='Y' && $__Context->item->getBrowserTitle()){ ?>
                        <a href="<?php echo getSiteUrl($__Context->item->domain, '', 'mid', $__Context->item->get('mid')) ?>" class="board"<?php if($__Context->widget_info->new_window){ ?> target="_blank"<?php } ?>><?php echo $__Context->item->getBrowserTitle() ?></a>
                    <?php } ?>
                    <?php if($__Context->widget_info->show_category=='Y' && $__Context->item->getCategory()){ ?>
                        <a href="<?php echo getSiteUrl($__Context->item->domain,'','mid',$__Context->item->get('mid'),'category',$__Context->item->get('category_srl')) ?>"<?php if($__Context->widget_info->new_window){ ?> target="_blank"<?php } ?>><strong class="category"><?php echo $__Context->item->getCategory() ?></strong></a>
                    <?php } ?>
				<a href="<?php echo $__Context->item->getLink() ?>" class="title"<?php if($__Context->widget_info->new_window){ ?> target="_blank"<?php } ?>><?php echo $__Context->item->getTitle($__Context->widget_info->subject_cut_size) ?></a>
			</div>
			<?php }else if($__Context->widget_info->option_view_arr[$__Context->j]=='nickname'){ ?>
			<div class="wrap_replyNum">
				<span class="slide_block padding_right10"> BY : <a href="#" onclick="return false;" class="author member_<?php echo $__Context->item->getMemberSrl() ?>"<?php if($__Context->widget_info->new_window){ ?> target="_blank"<?php } ?>><?php echo $__Context->item->getNickName($__Context->widget_info->nickname_cut_size) ?></a></span>
				<?php if($__Context->widget_info->option_view_arr[$__Context->j+1]=='regdate'){ ?>
				 <span class="date padding_right10"><span class="slide_block"> DATE : </span><?php echo $__Context->item->getRegdate("m.d") ?></span>
				<?php } ?>
				<?php if($__Context->widget_info->show_comment_count=='Y' && $__Context->item->getCommentCount()){ ?>
					<span class="replyNum  padding_right10" title="Replies"><span class="slide_block"> COMMENT : </span><a href="<?php echo $__Context->item->getLink() ?>#comment"<?php if($__Context->widget_info->new_window){ ?> target="_blank"<?php } ?>><?php echo $__Context->item->getCommentCount() ?></a> </span>
				<?php }elseif($__Context->widget_info->show_comment_count=='Y'){ ?>
					<span class="replyNum  padding_right10" title="Replies"><span class="slide_block"> COMMENT : </span>0</span>
				<?php } ?>
				
			</div>
			 <?php }else if($__Context->widget_info->option_view_arr[$__Context->j]=='content'){ ?>
				<div class="slide_content">
					<a href="<?php echo $__Context->item->getLink() ?>" class="title"<?php if($__Context->widget_info->new_window){ ?> target="_blank"<?php } ?>> <?php echo $__Context->item->getContent() ?></a>	
				</div>
			<?php } ?>
			<?php } ?>
			
		</div>
	<?php } ?>
	</div>
</div>
