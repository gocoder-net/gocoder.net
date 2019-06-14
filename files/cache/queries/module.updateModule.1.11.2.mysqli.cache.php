<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("updateModule");
$query->setAction("update");
$query->setPriority("");

${'module8_argument'} = new Argument('module', $args->{'module'});
${'module8_argument'}->checkNotNull();
if(!${'module8_argument'}->isValid()) return ${'module8_argument'}->getErrorMessage();
if(${'module8_argument'} !== null) ${'module8_argument'}->setColumnType('varchar');
if(isset($args->module_category_srl)) {
${'module_category_srl9_argument'} = new Argument('module_category_srl', $args->{'module_category_srl'});
if(!${'module_category_srl9_argument'}->isValid()) return ${'module_category_srl9_argument'}->getErrorMessage();
} else
${'module_category_srl9_argument'} = NULL;if(${'module_category_srl9_argument'} !== null) ${'module_category_srl9_argument'}->setColumnType('number');
if(isset($args->layout_srl)) {
${'layout_srl10_argument'} = new Argument('layout_srl', $args->{'layout_srl'});
if(!${'layout_srl10_argument'}->isValid()) return ${'layout_srl10_argument'}->getErrorMessage();
} else
${'layout_srl10_argument'} = NULL;if(${'layout_srl10_argument'} !== null) ${'layout_srl10_argument'}->setColumnType('number');
if(isset($args->skin)) {
${'skin11_argument'} = new Argument('skin', $args->{'skin'});
if(!${'skin11_argument'}->isValid()) return ${'skin11_argument'}->getErrorMessage();
} else
${'skin11_argument'} = NULL;if(${'skin11_argument'} !== null) ${'skin11_argument'}->setColumnType('varchar');

${'is_skin_fix12_argument'} = new Argument('is_skin_fix', $args->{'is_skin_fix'});
${'is_skin_fix12_argument'}->ensureDefaultValue('N');
if(!${'is_skin_fix12_argument'}->isValid()) return ${'is_skin_fix12_argument'}->getErrorMessage();
if(${'is_skin_fix12_argument'} !== null) ${'is_skin_fix12_argument'}->setColumnType('char');
if(isset($args->mskin)) {
${'mskin13_argument'} = new Argument('mskin', $args->{'mskin'});
if(!${'mskin13_argument'}->isValid()) return ${'mskin13_argument'}->getErrorMessage();
} else
${'mskin13_argument'} = NULL;if(${'mskin13_argument'} !== null) ${'mskin13_argument'}->setColumnType('varchar');

${'is_mskin_fix14_argument'} = new Argument('is_mskin_fix', $args->{'is_mskin_fix'});
${'is_mskin_fix14_argument'}->ensureDefaultValue('N');
if(!${'is_mskin_fix14_argument'}->isValid()) return ${'is_mskin_fix14_argument'}->getErrorMessage();
if(${'is_mskin_fix14_argument'} !== null) ${'is_mskin_fix14_argument'}->setColumnType('char');
if(isset($args->menu_srl)) {
${'menu_srl15_argument'} = new Argument('menu_srl', $args->{'menu_srl'});
${'menu_srl15_argument'}->checkFilter('number');
if(!${'menu_srl15_argument'}->isValid()) return ${'menu_srl15_argument'}->getErrorMessage();
} else
${'menu_srl15_argument'} = NULL;if(${'menu_srl15_argument'} !== null) ${'menu_srl15_argument'}->setColumnType('number');

${'mid16_argument'} = new Argument('mid', $args->{'mid'});
${'mid16_argument'}->checkNotNull();
if(!${'mid16_argument'}->isValid()) return ${'mid16_argument'}->getErrorMessage();
if(${'mid16_argument'} !== null) ${'mid16_argument'}->setColumnType('varchar');

${'browser_title17_argument'} = new Argument('browser_title', $args->{'browser_title'});
${'browser_title17_argument'}->checkNotNull();
if(!${'browser_title17_argument'}->isValid()) return ${'browser_title17_argument'}->getErrorMessage();
if(${'browser_title17_argument'} !== null) ${'browser_title17_argument'}->setColumnType('varchar');

${'description18_argument'} = new Argument('description', $args->{'description'});
${'description18_argument'}->ensureDefaultValue('');
if(!${'description18_argument'}->isValid()) return ${'description18_argument'}->getErrorMessage();
if(${'description18_argument'} !== null) ${'description18_argument'}->setColumnType('text');

${'is_default19_argument'} = new Argument('is_default', $args->{'is_default'});
${'is_default19_argument'}->ensureDefaultValue('N');
${'is_default19_argument'}->checkNotNull();
if(!${'is_default19_argument'}->isValid()) return ${'is_default19_argument'}->getErrorMessage();
if(${'is_default19_argument'} !== null) ${'is_default19_argument'}->setColumnType('char');
if(isset($args->content)) {
${'content20_argument'} = new Argument('content', $args->{'content'});
if(!${'content20_argument'}->isValid()) return ${'content20_argument'}->getErrorMessage();
} else
${'content20_argument'} = NULL;if(${'content20_argument'} !== null) ${'content20_argument'}->setColumnType('bigtext');
if(isset($args->mcontent)) {
${'mcontent21_argument'} = new Argument('mcontent', $args->{'mcontent'});
if(!${'mcontent21_argument'}->isValid()) return ${'mcontent21_argument'}->getErrorMessage();
} else
${'mcontent21_argument'} = NULL;if(${'mcontent21_argument'} !== null) ${'mcontent21_argument'}->setColumnType('bigtext');

${'open_rss22_argument'} = new Argument('open_rss', $args->{'open_rss'});
${'open_rss22_argument'}->ensureDefaultValue('Y');
${'open_rss22_argument'}->checkNotNull();
if(!${'open_rss22_argument'}->isValid()) return ${'open_rss22_argument'}->getErrorMessage();
if(${'open_rss22_argument'} !== null) ${'open_rss22_argument'}->setColumnType('char');

${'header_text23_argument'} = new Argument('header_text', $args->{'header_text'});
${'header_text23_argument'}->ensureDefaultValue('');
if(!${'header_text23_argument'}->isValid()) return ${'header_text23_argument'}->getErrorMessage();
if(${'header_text23_argument'} !== null) ${'header_text23_argument'}->setColumnType('text');

${'footer_text24_argument'} = new Argument('footer_text', $args->{'footer_text'});
${'footer_text24_argument'}->ensureDefaultValue('');
if(!${'footer_text24_argument'}->isValid()) return ${'footer_text24_argument'}->getErrorMessage();
if(${'footer_text24_argument'} !== null) ${'footer_text24_argument'}->setColumnType('text');
if(isset($args->mlayout_srl)) {
${'mlayout_srl25_argument'} = new Argument('mlayout_srl', $args->{'mlayout_srl'});
if(!${'mlayout_srl25_argument'}->isValid()) return ${'mlayout_srl25_argument'}->getErrorMessage();
} else
${'mlayout_srl25_argument'} = NULL;if(${'mlayout_srl25_argument'} !== null) ${'mlayout_srl25_argument'}->setColumnType('number');

${'use_mobile26_argument'} = new Argument('use_mobile', $args->{'use_mobile'});
${'use_mobile26_argument'}->ensureDefaultValue('N');
if(!${'use_mobile26_argument'}->isValid()) return ${'use_mobile26_argument'}->getErrorMessage();
if(${'use_mobile26_argument'} !== null) ${'use_mobile26_argument'}->setColumnType('char');

${'site_srl27_argument'} = new ConditionArgument('site_srl', $args->site_srl, 'equal');
${'site_srl27_argument'}->checkFilter('number');
${'site_srl27_argument'}->ensureDefaultValue('0');
${'site_srl27_argument'}->checkNotNull();
${'site_srl27_argument'}->createConditionValue();
if(!${'site_srl27_argument'}->isValid()) return ${'site_srl27_argument'}->getErrorMessage();
if(${'site_srl27_argument'} !== null) ${'site_srl27_argument'}->setColumnType('number');

${'module_srl28_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl28_argument'}->checkFilter('number');
${'module_srl28_argument'}->checkNotNull();
${'module_srl28_argument'}->createConditionValue();
if(!${'module_srl28_argument'}->isValid()) return ${'module_srl28_argument'}->getErrorMessage();
if(${'module_srl28_argument'} !== null) ${'module_srl28_argument'}->setColumnType('number');

$query->setColumns(array(
new UpdateExpression('`module`', ${'module8_argument'})
,new UpdateExpression('`module_category_srl`', ${'module_category_srl9_argument'})
,new UpdateExpression('`layout_srl`', ${'layout_srl10_argument'})
,new UpdateExpression('`skin`', ${'skin11_argument'})
,new UpdateExpression('`is_skin_fix`', ${'is_skin_fix12_argument'})
,new UpdateExpression('`mskin`', ${'mskin13_argument'})
,new UpdateExpression('`is_mskin_fix`', ${'is_mskin_fix14_argument'})
,new UpdateExpression('`menu_srl`', ${'menu_srl15_argument'})
,new UpdateExpression('`mid`', ${'mid16_argument'})
,new UpdateExpression('`browser_title`', ${'browser_title17_argument'})
,new UpdateExpression('`description`', ${'description18_argument'})
,new UpdateExpression('`is_default`', ${'is_default19_argument'})
,new UpdateExpression('`content`', ${'content20_argument'})
,new UpdateExpression('`mcontent`', ${'mcontent21_argument'})
,new UpdateExpression('`open_rss`', ${'open_rss22_argument'})
,new UpdateExpression('`header_text`', ${'header_text23_argument'})
,new UpdateExpression('`footer_text`', ${'footer_text24_argument'})
,new UpdateExpression('`mlayout_srl`', ${'mlayout_srl25_argument'})
,new UpdateExpression('`use_mobile`', ${'use_mobile26_argument'})
));
$query->setTables(array(
new Table('`xe_modules`', '`modules`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`site_srl`',$site_srl27_argument,"equal")
,new ConditionWithArgument('`module_srl`',$module_srl28_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>