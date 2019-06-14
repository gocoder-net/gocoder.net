<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getMenuItemByUrl");
$query->setAction("select");
$query->setPriority("");

${'url1_argument'} = new ConditionArgument('url', $args->url, 'equal');
${'url1_argument'}->checkNotNull();
${'url1_argument'}->createConditionValue();
if(!${'url1_argument'}->isValid()) return ${'url1_argument'}->getErrorMessage();
if(${'url1_argument'} !== null) ${'url1_argument'}->setColumnType('varchar');
if(isset($args->is_shortcut)) {
${'is_shortcut2_argument'} = new ConditionArgument('is_shortcut', $args->is_shortcut, 'equal');
${'is_shortcut2_argument'}->createConditionValue();
if(!${'is_shortcut2_argument'}->isValid()) return ${'is_shortcut2_argument'}->getErrorMessage();
} else
${'is_shortcut2_argument'} = NULL;if(${'is_shortcut2_argument'} !== null) ${'is_shortcut2_argument'}->setColumnType('char');

${'site_srl3_argument'} = new ConditionArgument('site_srl', $args->site_srl, 'equal');
${'site_srl3_argument'}->checkNotNull();
${'site_srl3_argument'}->createConditionValue();
if(!${'site_srl3_argument'}->isValid()) return ${'site_srl3_argument'}->getErrorMessage();

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_menu_item`', '`MI`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`MI`.`url`',$url1_argument,"equal")
,new ConditionWithArgument('`MI`.`is_shortcut`',$is_shortcut2_argument,"equal", 'and')
,new ConditionSubquery('`MI`.`menu_srl`',new Subquery('`getSiteSrl`', array(
new SelectExpression('`menu_srl`')
), 
array(
new Table('`xe_menu`', '`M`')
),
array(
new ConditionGroup(array(
new ConditionWithArgument('`M`.`site_srl`',$site_srl3_argument,"equal")))
),
array(),
array(),
null
),"in", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>