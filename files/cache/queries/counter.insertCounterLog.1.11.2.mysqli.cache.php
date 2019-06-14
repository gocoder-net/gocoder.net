<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertCounterLog");
$query->setAction("insert");
$query->setPriority("");

${'site_srl1_argument'} = new Argument('site_srl', $args->{'site_srl'});
${'site_srl1_argument'}->ensureDefaultValue('0');
${'site_srl1_argument'}->checkNotNull();
if(!${'site_srl1_argument'}->isValid()) return ${'site_srl1_argument'}->getErrorMessage();
if(${'site_srl1_argument'} !== null) ${'site_srl1_argument'}->setColumnType('number');

${'regdate2_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate2_argument'}->ensureDefaultValue(date("YmdHis"));
${'regdate2_argument'}->checkNotNull();
if(!${'regdate2_argument'}->isValid()) return ${'regdate2_argument'}->getErrorMessage();
if(${'regdate2_argument'} !== null) ${'regdate2_argument'}->setColumnType('date');

${'ipaddress3_argument'} = new Argument('ipaddress', $args->{'ipaddress'});
${'ipaddress3_argument'}->ensureDefaultValue($_SERVER['REMOTE_ADDR']);
${'ipaddress3_argument'}->checkNotNull();
if(!${'ipaddress3_argument'}->isValid()) return ${'ipaddress3_argument'}->getErrorMessage();
if(${'ipaddress3_argument'} !== null) ${'ipaddress3_argument'}->setColumnType('varchar');
if(isset($args->user_agent)) {
${'user_agent4_argument'} = new Argument('user_agent', $args->{'user_agent'});
if(!${'user_agent4_argument'}->isValid()) return ${'user_agent4_argument'}->getErrorMessage();
} else
${'user_agent4_argument'} = NULL;if(${'user_agent4_argument'} !== null) ${'user_agent4_argument'}->setColumnType('varchar');

$query->setColumns(array(
new InsertExpression('`site_srl`', ${'site_srl1_argument'})
,new InsertExpression('`regdate`', ${'regdate2_argument'})
,new InsertExpression('`ipaddress`', ${'ipaddress3_argument'})
,new InsertExpression('`user_agent`', ${'user_agent4_argument'})
));
$query->setTables(array(
new Table('`xe_counter_log`', '`counter_log`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>