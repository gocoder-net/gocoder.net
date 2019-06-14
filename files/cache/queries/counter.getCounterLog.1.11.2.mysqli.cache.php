<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getCounterLog");
$query->setAction("select");
$query->setPriority("");

${'site_srl3_argument'} = new ConditionArgument('site_srl', $args->site_srl, 'equal');
${'site_srl3_argument'}->ensureDefaultValue('0');
${'site_srl3_argument'}->createConditionValue();
if(!${'site_srl3_argument'}->isValid()) return ${'site_srl3_argument'}->getErrorMessage();
if(${'site_srl3_argument'} !== null) ${'site_srl3_argument'}->setColumnType('number');
if(isset($args->ipaddress)) {
${'ipaddress4_argument'} = new ConditionArgument('ipaddress', $args->ipaddress, 'equal');
${'ipaddress4_argument'}->createConditionValue();
if(!${'ipaddress4_argument'}->isValid()) return ${'ipaddress4_argument'}->getErrorMessage();
} else
${'ipaddress4_argument'} = NULL;if(${'ipaddress4_argument'} !== null) ${'ipaddress4_argument'}->setColumnType('varchar');

${'regdate5_argument'} = new ConditionArgument('regdate', $args->regdate, 'like_prefix');
${'regdate5_argument'}->checkNotNull();
${'regdate5_argument'}->createConditionValue();
if(!${'regdate5_argument'}->isValid()) return ${'regdate5_argument'}->getErrorMessage();
if(${'regdate5_argument'} !== null) ${'regdate5_argument'}->setColumnType('date');

$query->setColumns(array(
new SelectExpression('count(*)', '`count`')
));
$query->setTables(array(
new Table('`xe_counter_log`', '`counter_log`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`site_srl`',$site_srl3_argument,"equal", 'and')
,new ConditionWithArgument('`ipaddress`',$ipaddress4_argument,"equal", 'and')
,new ConditionWithArgument('`regdate`',$regdate5_argument,"like_prefix", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>