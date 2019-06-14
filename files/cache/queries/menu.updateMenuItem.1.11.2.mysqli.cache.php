<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("updateMenuItem");
$query->setAction("update");
$query->setPriority("");
if(isset($args->menu_srl)) {
${'menu_srl29_argument'} = new Argument('menu_srl', $args->{'menu_srl'});
if(!${'menu_srl29_argument'}->isValid()) return ${'menu_srl29_argument'}->getErrorMessage();
} else
${'menu_srl29_argument'} = NULL;if(${'menu_srl29_argument'} !== null) ${'menu_srl29_argument'}->setColumnType('number');
if(isset($args->parent_srl)) {
${'parent_srl30_argument'} = new Argument('parent_srl', $args->{'parent_srl'});
if(!${'parent_srl30_argument'}->isValid()) return ${'parent_srl30_argument'}->getErrorMessage();
} else
${'parent_srl30_argument'} = NULL;if(${'parent_srl30_argument'} !== null) ${'parent_srl30_argument'}->setColumnType('number');
if(isset($args->name)) {
${'name31_argument'} = new Argument('name', $args->{'name'});
if(!${'name31_argument'}->isValid()) return ${'name31_argument'}->getErrorMessage();
} else
${'name31_argument'} = NULL;if(${'name31_argument'} !== null) ${'name31_argument'}->setColumnType('text');
if(isset($args->desc)) {
${'desc32_argument'} = new Argument('desc', $args->{'desc'});
if(!${'desc32_argument'}->isValid()) return ${'desc32_argument'}->getErrorMessage();
} else
${'desc32_argument'} = NULL;if(${'desc32_argument'} !== null) ${'desc32_argument'}->setColumnType('varchar');
if(isset($args->url)) {
${'url33_argument'} = new Argument('url', $args->{'url'});
if(!${'url33_argument'}->isValid()) return ${'url33_argument'}->getErrorMessage();
} else
${'url33_argument'} = NULL;if(${'url33_argument'} !== null) ${'url33_argument'}->setColumnType('varchar');
if(isset($args->is_shortcut)) {
${'is_shortcut34_argument'} = new Argument('is_shortcut', $args->{'is_shortcut'});
if(!${'is_shortcut34_argument'}->isValid()) return ${'is_shortcut34_argument'}->getErrorMessage();
} else
${'is_shortcut34_argument'} = NULL;if(${'is_shortcut34_argument'} !== null) ${'is_shortcut34_argument'}->setColumnType('char');
if(isset($args->open_window)) {
${'open_window35_argument'} = new Argument('open_window', $args->{'open_window'});
if(!${'open_window35_argument'}->isValid()) return ${'open_window35_argument'}->getErrorMessage();
} else
${'open_window35_argument'} = NULL;if(${'open_window35_argument'} !== null) ${'open_window35_argument'}->setColumnType('char');
if(isset($args->expand)) {
${'expand36_argument'} = new Argument('expand', $args->{'expand'});
if(!${'expand36_argument'}->isValid()) return ${'expand36_argument'}->getErrorMessage();
} else
${'expand36_argument'} = NULL;if(${'expand36_argument'} !== null) ${'expand36_argument'}->setColumnType('char');
if(isset($args->normal_btn)) {
${'normal_btn37_argument'} = new Argument('normal_btn', $args->{'normal_btn'});
if(!${'normal_btn37_argument'}->isValid()) return ${'normal_btn37_argument'}->getErrorMessage();
} else
${'normal_btn37_argument'} = NULL;if(${'normal_btn37_argument'} !== null) ${'normal_btn37_argument'}->setColumnType('varchar');
if(isset($args->hover_btn)) {
${'hover_btn38_argument'} = new Argument('hover_btn', $args->{'hover_btn'});
if(!${'hover_btn38_argument'}->isValid()) return ${'hover_btn38_argument'}->getErrorMessage();
} else
${'hover_btn38_argument'} = NULL;if(${'hover_btn38_argument'} !== null) ${'hover_btn38_argument'}->setColumnType('varchar');
if(isset($args->active_btn)) {
${'active_btn39_argument'} = new Argument('active_btn', $args->{'active_btn'});
if(!${'active_btn39_argument'}->isValid()) return ${'active_btn39_argument'}->getErrorMessage();
} else
${'active_btn39_argument'} = NULL;if(${'active_btn39_argument'} !== null) ${'active_btn39_argument'}->setColumnType('varchar');
if(isset($args->group_srls)) {
${'group_srls40_argument'} = new Argument('group_srls', $args->{'group_srls'});
if(!${'group_srls40_argument'}->isValid()) return ${'group_srls40_argument'}->getErrorMessage();
} else
${'group_srls40_argument'} = NULL;if(${'group_srls40_argument'} !== null) ${'group_srls40_argument'}->setColumnType('text');

${'menu_item_srl41_argument'} = new ConditionArgument('menu_item_srl', $args->menu_item_srl, 'equal');
${'menu_item_srl41_argument'}->checkFilter('number');
${'menu_item_srl41_argument'}->checkNotNull();
${'menu_item_srl41_argument'}->createConditionValue();
if(!${'menu_item_srl41_argument'}->isValid()) return ${'menu_item_srl41_argument'}->getErrorMessage();
if(${'menu_item_srl41_argument'} !== null) ${'menu_item_srl41_argument'}->setColumnType('number');

$query->setColumns(array(
new UpdateExpression('`menu_srl`', ${'menu_srl29_argument'})
,new UpdateExpression('`parent_srl`', ${'parent_srl30_argument'})
,new UpdateExpression('`name`', ${'name31_argument'})
,new UpdateExpression('`desc`', ${'desc32_argument'})
,new UpdateExpression('`url`', ${'url33_argument'})
,new UpdateExpression('`is_shortcut`', ${'is_shortcut34_argument'})
,new UpdateExpression('`open_window`', ${'open_window35_argument'})
,new UpdateExpression('`expand`', ${'expand36_argument'})
,new UpdateExpression('`normal_btn`', ${'normal_btn37_argument'})
,new UpdateExpression('`hover_btn`', ${'hover_btn38_argument'})
,new UpdateExpression('`active_btn`', ${'active_btn39_argument'})
,new UpdateExpression('`group_srls`', ${'group_srls40_argument'})
));
$query->setTables(array(
new Table('`xe_menu_item`', '`menu_item`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`menu_item_srl`',$menu_item_srl41_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>