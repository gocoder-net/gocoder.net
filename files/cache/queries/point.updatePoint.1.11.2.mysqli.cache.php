<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("updatePoint");
$query->setAction("update");
$query->setPriority("");
if(isset($args->point)) {
${'point40_argument'} = new Argument('point', $args->{'point'});
if(!${'point40_argument'}->isValid()) return ${'point40_argument'}->getErrorMessage();
} else
${'point40_argument'} = NULL;if(${'point40_argument'} !== null) ${'point40_argument'}->setColumnType('number');

${'member_srl41_argument'} = new ConditionArgument('member_srl', $args->member_srl, 'equal');
${'member_srl41_argument'}->checkFilter('number');
${'member_srl41_argument'}->checkNotNull();
${'member_srl41_argument'}->createConditionValue();
if(!${'member_srl41_argument'}->isValid()) return ${'member_srl41_argument'}->getErrorMessage();
if(${'member_srl41_argument'} !== null) ${'member_srl41_argument'}->setColumnType('number');

$query->setColumns(array(
new UpdateExpression('`point`', ${'point40_argument'})
));
$query->setTables(array(
new Table('`xe_point`', '`point`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`member_srl`',$member_srl41_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>