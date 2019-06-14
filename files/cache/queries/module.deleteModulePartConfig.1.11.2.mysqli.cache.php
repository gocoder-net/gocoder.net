<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("deleteModulePartConfig");
$query->setAction("delete");
$query->setPriority("");

${'module4_argument'} = new ConditionArgument('module', $args->module, 'equal');
${'module4_argument'}->checkNotNull();
${'module4_argument'}->createConditionValue();
if(!${'module4_argument'}->isValid()) return ${'module4_argument'}->getErrorMessage();
if(${'module4_argument'} !== null) ${'module4_argument'}->setColumnType('varchar');

${'module_srl5_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl5_argument'}->checkNotNull();
${'module_srl5_argument'}->createConditionValue();
if(!${'module_srl5_argument'}->isValid()) return ${'module_srl5_argument'}->getErrorMessage();
if(${'module_srl5_argument'} !== null) ${'module_srl5_argument'}->setColumnType('number');

$query->setTables(array(
new Table('`xe_module_part_config`', '`module_part_config`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module`',$module4_argument,"equal")
,new ConditionWithArgument('`module_srl`',$module_srl5_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>