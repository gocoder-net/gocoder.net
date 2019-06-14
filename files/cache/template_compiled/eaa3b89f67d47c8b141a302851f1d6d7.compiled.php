<?php if(!defined("__XE__"))exit;?>
<?php if(!$__Context->layout_info->slide_speed){;
$__Context->layout_info->slide_speed = "7000";
} ?>
<!--#Meta:layouts/Door_cpA_limit/css/owl.carousel.css--><?php $__tmp=array('layouts/Door_cpA_limit/css/owl.carousel.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:layouts/Door_cpA_limit/css/da-owl.css--><?php $__tmp=array('layouts/Door_cpA_limit/css/da-owl.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:layouts/Door_cpA_limit/js/owl.carousel.min.js--><?php $__tmp=array('layouts/Door_cpA_limit/js/owl.carousel.min.js','body','','');Context::loadFile($__tmp);unset($__tmp); ?>
<div class="wrap-mobile-owl">
	<div class="da-owl mobile-owl owl-carousel">
		<?php if($__Context->layout_info->Mslide_img1){ ?><div class="item">
		  <img class="main_slide_img" src="<?php echo $__Context->layout_info->Mslide_img1 ?>" alt="<?php echo $__Context->layout_info->Mslide_title1 ?>" />
		</div><?php } ?>
		<?php if($__Context->layout_info->Mslide_img2){ ?><div class="item">
		  <img class="main_slide_img" src="<?php echo $__Context->layout_info->Mslide_img2 ?>" alt="<?php echo $__Context->layout_info->Mslide_title2 ?>" />
		</div><?php } ?>
		<?php if($__Context->layout_info->Mslide_img3){ ?><div class="item">
		  <img class="main_slide_img" src="<?php echo $__Context->layout_info->Mslide_img3 ?>" alt="<?php echo $__Context->layout_info->Mslide_title3 ?>" />
		</div><?php } ?>
		<?php if($__Context->layout_info->Mslide_img4){ ?><div class="item">
		  <img class="main_slide_img" src="<?php echo $__Context->layout_info->Mslide_img4 ?>" alt="<?php echo $__Context->layout_info->Mslide_title4 ?>" />
		</div><?php } ?>
		<?php if($__Context->layout_info->Mslide_img5){ ?><div class="item">
		  <img class="main_slide_img" src="<?php echo $__Context->layout_info->Mslide_img5 ?>" alt="<?php echo $__Context->layout_info->Mslide_title5 ?>" />
		</div><?php } ?>
	</div>
</div>
		<script type="text/javascript">
			jQuery(function($){
			
			  $('.mobile-owl').owlCarousel({
				nav:true,
                items: 1,
                loop: true,
				autoplay:false,
				
				autoplayTimeout:7000,
				autoplayHoverPause:true,
                margin:0
               
              });
			 
			
		});
		</script>	
