<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getNewestDocuments");
$query->setAction("select");
$query->setPriority("");

${'module_srl25_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'in');
${'module_srl25_argument'}->checkFilter('number');
${'module_srl25_argument'}->checkNotNull();
${'module_srl25_argument'}->createConditionValue();
if(!${'module_srl25_argument'}->isValid()) return ${'module_srl25_argument'}->getErrorMessage();
if(${'module_srl25_argument'} !== null) ${'module_srl25_argument'}->setColumnType('number');
if(isset($args->category_srl)) {
${'category_srl26_argument'} = new ConditionArgument('category_srl', $args->category_srl, 'equal');
${'category_srl26_argument'}->createConditionValue();
if(!${'category_srl26_argument'}->isValid()) return ${'category_srl26_argument'}->getErrorMessage();
} else
${'category_srl26_argument'} = NULL;if(${'category_srl26_argument'} !== null) ${'category_srl26_argument'}->setColumnType('number');
if(isset($args->statusList)) {
${'statusList27_argument'} = new ConditionArgument('statusList', $args->statusList, 'in');
${'statusList27_argument'}->createConditionValue();
if(!${'statusList27_argument'}->isValid()) return ${'statusList27_argument'}->getErrorMessage();
} else
${'statusList27_argument'} = NULL;if(${'statusList27_argument'} !== null) ${'statusList27_argument'}->setColumnType('varchar');

${'list_count30_argument'} = new Argument('list_count', $args->{'list_count'});
${'list_count30_argument'}->ensureDefaultValue('20');
if(!${'list_count30_argument'}->isValid()) return ${'list_count30_argument'}->getErrorMessage();

${'sort_index28_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index28_argument'}->ensureDefaultValue('documents.list_order');
if(!${'sort_index28_argument'}->isValid()) return ${'sort_index28_argument'}->getErrorMessage();

${'order_type29_argument'} = new SortArgument('order_type29', $args->order_type);
${'order_type29_argument'}->ensureDefaultValue('asc');
if(!${'order_type29_argument'}->isValid()) return ${'order_type29_argument'}->getErrorMessage();

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_documents`', '`documents`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`documents`.`module_srl`',$module_srl25_argument,"in", 'and')
,new ConditionWithArgument('`documents`.`category_srl`',$category_srl26_argument,"equal", 'and')
,new ConditionWithArgument('`status`',$statusList27_argument,"in", 'and')))
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'sort_index28_argument'}, $order_type29_argument)
));
$query->setLimit(new Limit(${'list_count30_argument'}));
return $query; ?>