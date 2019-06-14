<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getNoticeList");
$query->setAction("select");
$query->setPriority("");
if(isset($args->module_srl)) {
${'module_srl13_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'in');
${'module_srl13_argument'}->checkFilter('number');
${'module_srl13_argument'}->createConditionValue();
if(!${'module_srl13_argument'}->isValid()) return ${'module_srl13_argument'}->getErrorMessage();
} else
${'module_srl13_argument'} = NULL;if(${'module_srl13_argument'} !== null) ${'module_srl13_argument'}->setColumnType('number');
if(isset($args->category_srl)) {
${'category_srl14_argument'} = new ConditionArgument('category_srl', $args->category_srl, 'equal');
${'category_srl14_argument'}->createConditionValue();
if(!${'category_srl14_argument'}->isValid()) return ${'category_srl14_argument'}->getErrorMessage();
} else
${'category_srl14_argument'} = NULL;if(${'category_srl14_argument'} !== null) ${'category_srl14_argument'}->setColumnType('number');

${'sort_index15_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index15_argument'}->ensureDefaultValue('document_srl');
if(!${'sort_index15_argument'}->isValid()) return ${'sort_index15_argument'}->getErrorMessage();

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_documents`', '`documents`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module_srl`',$module_srl13_argument,"in")
,new ConditionWithoutArgument('`is_notice`',"'Y'","equal", 'and')
,new ConditionWithArgument('`category_srl`',$category_srl14_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'sort_index15_argument'}, "desc")
));
$query->setLimit();
return $query; ?>