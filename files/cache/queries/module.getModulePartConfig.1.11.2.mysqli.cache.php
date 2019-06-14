<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getModulePartConfig");
$query->setAction("select");
$query->setPriority("");

${'module18_argument'} = new ConditionArgument('module', $args->module, 'equal');
${'module18_argument'}->checkNotNull();
${'module18_argument'}->createConditionValue();
if(!${'module18_argument'}->isValid()) return ${'module18_argument'}->getErrorMessage();
if(${'module18_argument'} !== null) ${'module18_argument'}->setColumnType('varchar');

${'module_srl19_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl19_argument'}->checkNotNull();
${'module_srl19_argument'}->createConditionValue();
if(!${'module_srl19_argument'}->isValid()) return ${'module_srl19_argument'}->getErrorMessage();
if(${'module_srl19_argument'} !== null) ${'module_srl19_argument'}->setColumnType('number');

$query->setColumns(array(
new SelectExpression('`config`')
));
$query->setTables(array(
new Table('`xe_module_part_config`', '`module_part_config`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module`',$module18_argument,"equal")
,new ConditionWithArgument('`module_srl`',$module_srl19_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>