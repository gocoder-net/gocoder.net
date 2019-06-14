<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getMidInfo");
$query->setAction("select");
$query->setPriority("");
if(isset($args->mid)) {
${'mid8_argument'} = new ConditionArgument('mid', $args->mid, 'equal');
${'mid8_argument'}->createConditionValue();
if(!${'mid8_argument'}->isValid()) return ${'mid8_argument'}->getErrorMessage();
} else
${'mid8_argument'} = NULL;if(${'mid8_argument'} !== null) ${'mid8_argument'}->setColumnType('varchar');
if(isset($args->module_srl)) {
${'module_srl9_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl9_argument'}->createConditionValue();
if(!${'module_srl9_argument'}->isValid()) return ${'module_srl9_argument'}->getErrorMessage();
} else
${'module_srl9_argument'} = NULL;if(${'module_srl9_argument'} !== null) ${'module_srl9_argument'}->setColumnType('number');
if(isset($args->site_srl)) {
${'site_srl10_argument'} = new ConditionArgument('site_srl', $args->site_srl, 'equal');
${'site_srl10_argument'}->createConditionValue();
if(!${'site_srl10_argument'}->isValid()) return ${'site_srl10_argument'}->getErrorMessage();
} else
${'site_srl10_argument'} = NULL;if(${'site_srl10_argument'} !== null) ${'site_srl10_argument'}->setColumnType('number');

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_modules`', '`modules`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`mid`',$mid8_argument,"equal")
,new ConditionWithArgument('`module_srl`',$module_srl9_argument,"equal", 'and')
,new ConditionWithArgument('`site_srl`',$site_srl10_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>