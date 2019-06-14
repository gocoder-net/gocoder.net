<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getCommentPageList");
$query->setAction("select");
$query->setPriority("");
if(isset($args->status)) {
${'status3_argument'} = new ConditionArgument('status', $args->status, 'equal');
${'status3_argument'}->createConditionValue();
if(!${'status3_argument'}->isValid()) return ${'status3_argument'}->getErrorMessage();
} else
${'status3_argument'} = NULL;if(${'status3_argument'} !== null) ${'status3_argument'}->setColumnType('number');

${'document_srl4_argument'} = new ConditionArgument('document_srl', $args->document_srl, 'equal');
${'document_srl4_argument'}->checkNotNull();
${'document_srl4_argument'}->createConditionValue();
if(!${'document_srl4_argument'}->isValid()) return ${'document_srl4_argument'}->getErrorMessage();
if(${'document_srl4_argument'} !== null) ${'document_srl4_argument'}->setColumnType('number');

${'page8_argument'} = new Argument('page', $args->{'page'});
${'page8_argument'}->ensureDefaultValue('1');
if(!${'page8_argument'}->isValid()) return ${'page8_argument'}->getErrorMessage();

${'page_count9_argument'} = new Argument('page_count', $args->{'page_count'});
${'page_count9_argument'}->ensureDefaultValue('10');
if(!${'page_count9_argument'}->isValid()) return ${'page_count9_argument'}->getErrorMessage();

${'list_count10_argument'} = new Argument('list_count', $args->{'list_count'});
${'list_count10_argument'}->ensureDefaultValue('list_count');
if(!${'list_count10_argument'}->isValid()) return ${'list_count10_argument'}->getErrorMessage();

${'list_order7_argument'} = new Argument('list_order', $args->{'list_order'});
${'list_order7_argument'}->ensureDefaultValue('comments_list.arrange');
if(!${'list_order7_argument'}->isValid()) return ${'list_order7_argument'}->getErrorMessage();

${'list_order6_argument'} = new Argument('list_order', $args->{'list_order'});
${'list_order6_argument'}->ensureDefaultValue('comments_list.head');
if(!${'list_order6_argument'}->isValid()) return ${'list_order6_argument'}->getErrorMessage();

${'list_order5_argument'} = new Argument('list_order', $args->{'list_order'});
${'list_order5_argument'}->ensureDefaultValue('comments.status');
if(!${'list_order5_argument'}->isValid()) return ${'list_order5_argument'}->getErrorMessage();

$query->setColumns(array(
new SelectExpression('`comments`.*')
,new SelectExpression('`comments_list`.`depth`', '`depth`')
));
$query->setTables(array(
new Table('`xe_comments`', '`comments`')
,new Table('`xe_comments_list`', '`comments_list`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`comments`.`status`',$status3_argument,"equal", 'and')
,new ConditionWithArgument('`comments_list`.`document_srl`',$document_srl4_argument,"equal", 'and')
,new ConditionWithoutArgument('`comments_list`.`comment_srl`','`comments`.`comment_srl`',"equal", 'and')
,new ConditionWithoutArgument('`comments_list`.`head`','0',"more", 'and')
,new ConditionWithoutArgument('`comments_list`.`arrange`','0',"more", 'and')))
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'list_order5_argument'}, "desc")
,new OrderByColumn(${'list_order6_argument'}, "asc")
,new OrderByColumn(${'list_order7_argument'}, "asc")
));
$query->setLimit(new Limit(${'list_count10_argument'}, ${'page8_argument'}, ${'page_count9_argument'}));
return $query; ?>