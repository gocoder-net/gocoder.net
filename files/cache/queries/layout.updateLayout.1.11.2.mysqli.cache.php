<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("updateLayout");
$query->setAction("update");
$query->setPriority("");
if(isset($args->title)) {
${'title10_argument'} = new Argument('title', $args->{'title'});
if(!${'title10_argument'}->isValid()) return ${'title10_argument'}->getErrorMessage();
} else
${'title10_argument'} = NULL;if(${'title10_argument'} !== null) ${'title10_argument'}->setColumnType('varchar');
if(isset($args->extra_vars)) {
${'extra_vars11_argument'} = new Argument('extra_vars', $args->{'extra_vars'});
if(!${'extra_vars11_argument'}->isValid()) return ${'extra_vars11_argument'}->getErrorMessage();
} else
${'extra_vars11_argument'} = NULL;if(${'extra_vars11_argument'} !== null) ${'extra_vars11_argument'}->setColumnType('text');
if(isset($args->layout)) {
${'layout12_argument'} = new Argument('layout', $args->{'layout'});
if(!${'layout12_argument'}->isValid()) return ${'layout12_argument'}->getErrorMessage();
} else
${'layout12_argument'} = NULL;if(${'layout12_argument'} !== null) ${'layout12_argument'}->setColumnType('varchar');
if(isset($args->layout_path)) {
${'layout_path13_argument'} = new Argument('layout_path', $args->{'layout_path'});
if(!${'layout_path13_argument'}->isValid()) return ${'layout_path13_argument'}->getErrorMessage();
} else
${'layout_path13_argument'} = NULL;if(${'layout_path13_argument'} !== null) ${'layout_path13_argument'}->setColumnType('varchar');

${'layout_srl14_argument'} = new ConditionArgument('layout_srl', $args->layout_srl, 'equal');
${'layout_srl14_argument'}->checkFilter('number');
${'layout_srl14_argument'}->checkNotNull();
${'layout_srl14_argument'}->createConditionValue();
if(!${'layout_srl14_argument'}->isValid()) return ${'layout_srl14_argument'}->getErrorMessage();
if(${'layout_srl14_argument'} !== null) ${'layout_srl14_argument'}->setColumnType('number');

$query->setColumns(array(
new UpdateExpression('`title`', ${'title10_argument'})
,new UpdateExpression('`extra_vars`', ${'extra_vars11_argument'})
,new UpdateExpression('`layout`', ${'layout12_argument'})
,new UpdateExpression('`layout_path`', ${'layout_path13_argument'})
));
$query->setTables(array(
new Table('`xe_layouts`', '`layouts`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`layout_srl`',$layout_srl14_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>