<?php if(!defined("__XE__"))exit;?><div class="widget_DW">
<?php if($__Context->widget_info->list_type == "gallery"){ ?>
    <?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('widgets/content/skins/Door_cpA','gallery.html') ?>
<?php }elseif($__Context->widget_info->list_type == "large_gallery"){ ?>
    <?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('widgets/content/skins/Door_cpA','large_gallery.html') ?>
<?php }elseif($__Context->widget_info->list_type == "image_title"){ ?>
    <?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('widgets/content/skins/Door_cpA','image_title.html') ?>
<?php }elseif($__Context->widget_info->list_type == "image_title_content"){ ?>
    <?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('widgets/content/skins/Door_cpA','image_title_content.html') ?>
<?php }elseif($__Context->widget_info->list_type == "image_slideA"){ ?>
    <?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('widgets/content/skins/Door_cpA','image_slideA.html') ?>
<?php }elseif($__Context->widget_info->list_type == "image_slideB"){ ?>
    <?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('widgets/content/skins/Door_cpA','image_slideB.html') ?>
<?php }elseif($__Context->widget_info->list_type == "image_slide"){ ?>
    <?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('widgets/content/skins/Door_cpA','image_slide.html') ?>
<?php }elseif($__Context->widget_info->list_type == "rolling_text"){ ?>
    <?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('widgets/content/skins/Door_cpA','rolling_text.html') ?>
<?php }else{ ?>
 <?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('widgets/content/skins/Door_cpA','normal.html') ?>
<?php } ?>
</div>
