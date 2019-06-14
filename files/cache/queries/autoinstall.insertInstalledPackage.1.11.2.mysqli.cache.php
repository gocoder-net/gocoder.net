<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertInstalledPackage");
$query->setAction("insert");
$query->setPriority("");

${'package_srl12_argument'} = new Argument('package_srl', $args->{'package_srl'});
${'package_srl12_argument'}->checkFilter('number');
${'package_srl12_argument'}->checkNotNull();
if(!${'package_srl12_argument'}->isValid()) return ${'package_srl12_argument'}->getErrorMessage();
if(${'package_srl12_argument'} !== null) ${'package_srl12_argument'}->setColumnType('number');

${'version13_argument'} = new Argument('version', $args->{'version'});
${'version13_argument'}->checkNotNull();
if(!${'version13_argument'}->isValid()) return ${'version13_argument'}->getErrorMessage();
if(${'version13_argument'} !== null) ${'version13_argument'}->setColumnType('varchar');

${'current_version14_argument'} = new Argument('current_version', $args->{'current_version'});
${'current_version14_argument'}->checkNotNull();
if(!${'current_version14_argument'}->isValid()) return ${'current_version14_argument'}->getErrorMessage();
if(${'current_version14_argument'} !== null) ${'current_version14_argument'}->setColumnType('varchar');
if(isset($args->need_update)) {
${'need_update15_argument'} = new Argument('need_update', $args->{'need_update'});
if(!${'need_update15_argument'}->isValid()) return ${'need_update15_argument'}->getErrorMessage();
} else
${'need_update15_argument'} = NULL;if(${'need_update15_argument'} !== null) ${'need_update15_argument'}->setColumnType('char');

$query->setColumns(array(
new InsertExpression('`package_srl`', ${'package_srl12_argument'})
,new InsertExpression('`version`', ${'version13_argument'})
,new InsertExpression('`current_version`', ${'current_version14_argument'})
,new InsertExpression('`need_update`', ${'need_update15_argument'})
));
$query->setTables(array(
new Table('`xe_ai_installed_packages`', '`ai_installed_packages`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>