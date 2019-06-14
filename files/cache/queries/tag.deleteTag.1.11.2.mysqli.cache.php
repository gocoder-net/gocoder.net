<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("deleteTag");
$query->setAction("delete");
$query->setPriority("");

${'document_srl42_argument'} = new ConditionArgument('document_srl', $args->document_srl, 'equal');
${'document_srl42_argument'}->checkFilter('number');
${'document_srl42_argument'}->checkNotNull();
${'document_srl42_argument'}->createConditionValue();
if(!${'document_srl42_argument'}->isValid()) return ${'document_srl42_argument'}->getErrorMessage();
if(${'document_srl42_argument'} !== null) ${'document_srl42_argument'}->setColumnType('number');

$query->setTables(array(
new Table('`xe_tags`', '`tags`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`document_srl`',$document_srl42_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>