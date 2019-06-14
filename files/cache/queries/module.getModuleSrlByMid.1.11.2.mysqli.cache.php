<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getModuleSrlByMid");
$query->setAction("select");
$query->setPriority("");
if(isset($args->site_srl)) {
${'site_srl4_argument'} = new ConditionArgument('site_srl', $args->site_srl, 'equal');
${'site_srl4_argument'}->createConditionValue();
if(!${'site_srl4_argument'}->isValid()) return ${'site_srl4_argument'}->getErrorMessage();
} else
${'site_srl4_argument'} = NULL;if(${'site_srl4_argument'} !== null) ${'site_srl4_argument'}->setColumnType('number');

${'mid5_argument'} = new ConditionArgument('mid', $args->mid, 'in');
${'mid5_argument'}->checkNotNull();
${'mid5_argument'}->createConditionValue();
if(!${'mid5_argument'}->isValid()) return ${'mid5_argument'}->getErrorMessage();
if(${'mid5_argument'} !== null) ${'mid5_argument'}->setColumnType('varchar');

$query->setColumns(array(
new SelectExpression('`module_srl`')
));
$query->setTables(array(
new Table('`xe_modules`', '`modules`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`site_srl`',$site_srl4_argument,"equal")
,new ConditionWithArgument('`mid`',$mid5_argument,"in", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>