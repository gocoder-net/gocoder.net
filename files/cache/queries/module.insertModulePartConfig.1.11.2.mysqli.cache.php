<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertModulePartConfig");
$query->setAction("insert");
$query->setPriority("");

${'module6_argument'} = new Argument('module', $args->{'module'});
${'module6_argument'}->checkNotNull();
if(!${'module6_argument'}->isValid()) return ${'module6_argument'}->getErrorMessage();
if(${'module6_argument'} !== null) ${'module6_argument'}->setColumnType('varchar');

${'module_srl7_argument'} = new Argument('module_srl', $args->{'module_srl'});
${'module_srl7_argument'}->checkNotNull();
if(!${'module_srl7_argument'}->isValid()) return ${'module_srl7_argument'}->getErrorMessage();
if(${'module_srl7_argument'} !== null) ${'module_srl7_argument'}->setColumnType('number');
if(isset($args->config)) {
${'config8_argument'} = new Argument('config', $args->{'config'});
if(!${'config8_argument'}->isValid()) return ${'config8_argument'}->getErrorMessage();
} else
${'config8_argument'} = NULL;if(${'config8_argument'} !== null) ${'config8_argument'}->setColumnType('text');

${'regdate9_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate9_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'regdate9_argument'}->isValid()) return ${'regdate9_argument'}->getErrorMessage();
if(${'regdate9_argument'} !== null) ${'regdate9_argument'}->setColumnType('date');

$query->setColumns(array(
new InsertExpression('`module`', ${'module6_argument'})
,new InsertExpression('`module_srl`', ${'module_srl7_argument'})
,new InsertExpression('`config`', ${'config8_argument'})
,new InsertExpression('`regdate`', ${'regdate9_argument'})
));
$query->setTables(array(
new Table('`xe_module_part_config`', '`module_part_config`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>