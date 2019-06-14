<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("updateCounterPageview");
$query->setAction("update");
$query->setPriority("");

${'pageview6_argument'} = new Argument('pageview', NULL);
${'pageview6_argument'}->setColumnOperation('+');
${'pageview6_argument'}->ensureDefaultValue(1);
if(!${'pageview6_argument'}->isValid()) return ${'pageview6_argument'}->getErrorMessage();
if(${'pageview6_argument'} !== null) ${'pageview6_argument'}->setColumnType('number');

${'regdate7_argument'} = new ConditionArgument('regdate', $args->regdate, 'in');
${'regdate7_argument'}->checkNotNull();
${'regdate7_argument'}->createConditionValue();
if(!${'regdate7_argument'}->isValid()) return ${'regdate7_argument'}->getErrorMessage();
if(${'regdate7_argument'} !== null) ${'regdate7_argument'}->setColumnType('number');

$query->setColumns(array(
new UpdateExpression('`pageview`', ${'pageview6_argument'})
));
$query->setTables(array(
new Table('`xe_counter_status`', '`counter_status`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`regdate`',$regdate7_argument,"in")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>