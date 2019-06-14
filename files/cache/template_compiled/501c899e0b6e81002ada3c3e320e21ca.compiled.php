<?php if(!defined("__XE__"))exit;?><ul class="widgetTabDW clearBoth widgetTab">
<?php $__Context->i=0 ?>
<?php if($__Context->widget_info->tab&&count($__Context->widget_info->tab))foreach($__Context->widget_info->tab as $__Context->module_srl => $__Context->tab){ ?>
    <li<?php if($__Context->i==0){ ?> class="active"<?php } ?>><a href="#" onclick="content_widget_tab_show(jQuery(this),jQuery(this).parents('ul.widgetTab').next('dl.widgetDivider'),<?php echo $__Context->i ?>,1,'<?php echo $__Context->tab->url ?>');return false"><?php echo $__Context->tab->title ?></a></li>
<?php $__Context->i++ ?>
<?php } ?>
</ul>
<dl class="widgetDivider">
<?php $__Context->i=0 ?>
<?php if($__Context->widget_info->tab&&count($__Context->widget_info->tab))foreach($__Context->widget_info->tab as $__Context->module_srl => $__Context->tab){ ?>
    <dt><?php echo $__Context->tab->title ?></dt>
    <dd<?php if($__Context->i==0){ ?> class="open"<?php } ?>>
		<a class="tab_more" href="<?php echo $__Context->tab->url ?>">more +</a>
        <?php $__Context->widget_info->content_items = $__Context->tab->content_items ?>
        <?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('widgets/content/skins/Door_cpA','_tab_none.html') ?>
    </dd>
<?php $__Context->i++ ?>
<?php } ?>
</dl>
