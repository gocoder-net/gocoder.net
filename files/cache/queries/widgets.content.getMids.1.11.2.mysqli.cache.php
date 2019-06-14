<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getMids");
$query->setAction("select");
$query->setPriority("");
if(isset($args->site_srl)) {
${'site_srl22_argument'} = new ConditionArgument('site_srl', $args->site_srl, 'equal');
${'site_srl22_argument'}->createConditionValue();
if(!${'site_srl22_argument'}->isValid()) return ${'site_srl22_argument'}->getErrorMessage();
} else
${'site_srl22_argument'} = NULL;if(${'site_srl22_argument'} !== null) ${'site_srl22_argument'}->setColumnType('number');
if(isset($args->module_srls)) {
${'module_srls23_argument'} = new ConditionArgument('module_srls', $args->module_srls, 'in');
${'module_srls23_argument'}->createConditionValue();
if(!${'module_srls23_argument'}->isValid()) return ${'module_srls23_argument'}->getErrorMessage();
} else
${'module_srls23_argument'} = NULL;if(${'module_srls23_argument'} !== null) ${'module_srls23_argument'}->setColumnType('number');

$query->setColumns(array(
new SelectExpression('`modules`.`site_srl`')
,new SelectExpression('`modules`.`module_srl`')
,new SelectExpression('`modules`.`mid`')
,new SelectExpression('`modules`.`browser_title`')
,new SelectExpression('`sites`.`domain`')
));
$query->setTables(array(
new Table('`xe_modules`', '`modules`')
,new JoinTable('`xe_sites`', '`sites`', "left join", array(
new ConditionGroup(array(
new ConditionWithoutArgument('`sites`.`site_srl`','`modules`.`site_srl`',"equal")))
))
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`modules`.`site_srl`',$site_srl22_argument,"equal", 'and')
,new ConditionWithArgument('`modules`.`module_srl`',$module_srls23_argument,"in", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>