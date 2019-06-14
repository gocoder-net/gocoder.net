<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getDocumentListWithinTag");
$query->setAction("select");
$query->setPriority("");
if(isset($args->module_srl)) {
${'module_srl1_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'in');
${'module_srl1_argument'}->checkFilter('number');
${'module_srl1_argument'}->createConditionValue();
if(!${'module_srl1_argument'}->isValid()) return ${'module_srl1_argument'}->getErrorMessage();
} else
${'module_srl1_argument'} = NULL;if(${'module_srl1_argument'} !== null) ${'module_srl1_argument'}->setColumnType('number');
if(isset($args->exclude_module_srl)) {
${'exclude_module_srl2_argument'} = new ConditionArgument('exclude_module_srl', $args->exclude_module_srl, 'notin');
${'exclude_module_srl2_argument'}->checkFilter('number');
${'exclude_module_srl2_argument'}->createConditionValue();
if(!${'exclude_module_srl2_argument'}->isValid()) return ${'exclude_module_srl2_argument'}->getErrorMessage();
} else
${'exclude_module_srl2_argument'} = NULL;if(${'exclude_module_srl2_argument'} !== null) ${'exclude_module_srl2_argument'}->setColumnType('number');
if(isset($args->category_srl)) {
${'category_srl3_argument'} = new ConditionArgument('category_srl', $args->category_srl, 'in');
${'category_srl3_argument'}->checkFilter('number');
${'category_srl3_argument'}->createConditionValue();
if(!${'category_srl3_argument'}->isValid()) return ${'category_srl3_argument'}->getErrorMessage();
} else
${'category_srl3_argument'} = NULL;if(${'category_srl3_argument'} !== null) ${'category_srl3_argument'}->setColumnType('number');
if(isset($args->member_srl)) {
${'member_srl4_argument'} = new ConditionArgument('member_srl', $args->member_srl, 'equal');
${'member_srl4_argument'}->checkFilter('number');
${'member_srl4_argument'}->createConditionValue();
if(!${'member_srl4_argument'}->isValid()) return ${'member_srl4_argument'}->getErrorMessage();
} else
${'member_srl4_argument'} = NULL;if(${'member_srl4_argument'} !== null) ${'member_srl4_argument'}->setColumnType('number');
if(isset($args->member_srls)) {
${'member_srls5_argument'} = new ConditionArgument('member_srls', $args->member_srls, 'in');
${'member_srls5_argument'}->checkFilter('number');
${'member_srls5_argument'}->createConditionValue();
if(!${'member_srls5_argument'}->isValid()) return ${'member_srls5_argument'}->getErrorMessage();
} else
${'member_srls5_argument'} = NULL;if(${'member_srls5_argument'} !== null) ${'member_srls5_argument'}->setColumnType('number');

${'s_tags6_argument'} = new ConditionArgument('s_tags', $args->s_tags, 'like');
${'s_tags6_argument'}->checkNotNull();
${'s_tags6_argument'}->createConditionValue();
if(!${'s_tags6_argument'}->isValid()) return ${'s_tags6_argument'}->getErrorMessage();
if(${'s_tags6_argument'} !== null) ${'s_tags6_argument'}->setColumnType('varchar');
if(isset($args->statusList)) {
${'statusList7_argument'} = new ConditionArgument('statusList', $args->statusList, 'in');
${'statusList7_argument'}->createConditionValue();
if(!${'statusList7_argument'}->isValid()) return ${'statusList7_argument'}->getErrorMessage();
} else
${'statusList7_argument'} = NULL;if(${'statusList7_argument'} !== null) ${'statusList7_argument'}->setColumnType('varchar');

${'page10_argument'} = new Argument('page', $args->{'page'});
${'page10_argument'}->ensureDefaultValue('1');
if(!${'page10_argument'}->isValid()) return ${'page10_argument'}->getErrorMessage();

${'page_count11_argument'} = new Argument('page_count', $args->{'page_count'});
${'page_count11_argument'}->ensureDefaultValue('10');
if(!${'page_count11_argument'}->isValid()) return ${'page_count11_argument'}->getErrorMessage();

${'list_count12_argument'} = new Argument('list_count', $args->{'list_count'});
${'list_count12_argument'}->ensureDefaultValue('20');
if(!${'list_count12_argument'}->isValid()) return ${'list_count12_argument'}->getErrorMessage();

${'sort_index8_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index8_argument'}->ensureDefaultValue('documents.list_order');
if(!${'sort_index8_argument'}->isValid()) return ${'sort_index8_argument'}->getErrorMessage();

${'order_type9_argument'} = new SortArgument('order_type9', $args->order_type);
${'order_type9_argument'}->ensureDefaultValue('asc');
if(!${'order_type9_argument'}->isValid()) return ${'order_type9_argument'}->getErrorMessage();

$query->setColumns(array(
new SelectExpression('`documents`.`document_srl`')
,new SelectExpression('`documents`.`list_order`')
));
$query->setTables(array(
new Table('`xe_documents`', '`documents`')
,new Table('`xe_tags`', '`tags`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`documents`.`module_srl`',$module_srl1_argument,"in")
,new ConditionWithArgument('`documents`.`module_srl`',$exclude_module_srl2_argument,"notin", 'and')
,new ConditionWithoutArgument('`documents`.`document_srl`','`tags`.`document_srl`',"equal", 'and')
,new ConditionWithArgument('`documents`.`category_srl`',$category_srl3_argument,"in", 'and')
,new ConditionWithArgument('`documents`.`member_srl`',$member_srl4_argument,"equal", 'and')
,new ConditionWithArgument('`documents`.`member_srl`',$member_srls5_argument,"in", 'and')
,new ConditionWithArgument('`tags`.`tag`',$s_tags6_argument,"like", 'and')
,new ConditionWithArgument('`documents`.`status`',$statusList7_argument,"in", 'and')))
));
$query->setGroups(array(
'`documents`.`document_srl`' ));
$query->setOrder(array(
new OrderByColumn(${'sort_index8_argument'}, $order_type9_argument)
));
$query->setLimit(new Limit(${'list_count12_argument'}, ${'page10_argument'}, ${'page_count11_argument'}));
return $query; ?>