<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getDocumentSrlByStatus");
$query->setAction("select");
$query->setPriority("");

${'status1_argument'} = new ConditionArgument('status', $args->status, 'equal');
${'status1_argument'}->checkNotNull();
${'status1_argument'}->createConditionValue();
if(!${'status1_argument'}->isValid()) return ${'status1_argument'}->getErrorMessage();
if(${'status1_argument'} !== null) ${'status1_argument'}->setColumnType('varchar');
if(isset($args->except_module_srl)) {
${'except_module_srl2_argument'} = new ConditionArgument('except_module_srl', $args->except_module_srl, 'notin');
${'except_module_srl2_argument'}->checkFilter('number');
${'except_module_srl2_argument'}->createConditionValue();
if(!${'except_module_srl2_argument'}->isValid()) return ${'except_module_srl2_argument'}->getErrorMessage();
} else
${'except_module_srl2_argument'} = NULL;if(${'except_module_srl2_argument'} !== null) ${'except_module_srl2_argument'}->setColumnType('number');

${'page4_argument'} = new Argument('page', $args->{'page'});
${'page4_argument'}->ensureDefaultValue('1');
if(!${'page4_argument'}->isValid()) return ${'page4_argument'}->getErrorMessage();

${'page_count5_argument'} = new Argument('page_count', $args->{'page_count'});
${'page_count5_argument'}->ensureDefaultValue('10');
if(!${'page_count5_argument'}->isValid()) return ${'page_count5_argument'}->getErrorMessage();

${'list_count6_argument'} = new Argument('list_count', $args->{'list_count'});
${'list_count6_argument'}->ensureDefaultValue('20');
if(!${'list_count6_argument'}->isValid()) return ${'list_count6_argument'}->getErrorMessage();

${'list_order3_argument'} = new Argument('list_order', $args->{'list_order'});
${'list_order3_argument'}->ensureDefaultValue('list_order');
if(!${'list_order3_argument'}->isValid()) return ${'list_order3_argument'}->getErrorMessage();

$query->setColumns(array(
new SelectExpression('`document_srl`')
));
$query->setTables(array(
new Table('`xe_documents`', '`documents`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`status`',$status1_argument,"equal")
,new ConditionWithArgument('`module_srl`',$except_module_srl2_argument,"notin", 'and')))
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'list_order3_argument'}, "asc")
));
$query->setLimit(new Limit(${'list_count6_argument'}, ${'page4_argument'}, ${'page_count5_argument'}));
return $query; ?>