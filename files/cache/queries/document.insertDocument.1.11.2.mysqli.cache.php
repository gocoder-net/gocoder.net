<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertDocument");
$query->setAction("insert");
$query->setPriority("LOW");

${'document_srl3_argument'} = new Argument('document_srl', $args->{'document_srl'});
${'document_srl3_argument'}->checkFilter('number');
${'document_srl3_argument'}->checkNotNull();
if(!${'document_srl3_argument'}->isValid()) return ${'document_srl3_argument'}->getErrorMessage();
if(${'document_srl3_argument'} !== null) ${'document_srl3_argument'}->setColumnType('number');

${'module_srl4_argument'} = new Argument('module_srl', $args->{'module_srl'});
${'module_srl4_argument'}->checkFilter('number');
${'module_srl4_argument'}->ensureDefaultValue('0');
if(!${'module_srl4_argument'}->isValid()) return ${'module_srl4_argument'}->getErrorMessage();
if(${'module_srl4_argument'} !== null) ${'module_srl4_argument'}->setColumnType('number');

${'category_srl5_argument'} = new Argument('category_srl', $args->{'category_srl'});
${'category_srl5_argument'}->checkFilter('number');
${'category_srl5_argument'}->ensureDefaultValue('0');
if(!${'category_srl5_argument'}->isValid()) return ${'category_srl5_argument'}->getErrorMessage();
if(${'category_srl5_argument'} !== null) ${'category_srl5_argument'}->setColumnType('number');

${'lang_code6_argument'} = new Argument('lang_code', $args->{'lang_code'});
${'lang_code6_argument'}->ensureDefaultValue('');
if(!${'lang_code6_argument'}->isValid()) return ${'lang_code6_argument'}->getErrorMessage();
if(${'lang_code6_argument'} !== null) ${'lang_code6_argument'}->setColumnType('varchar');

${'is_notice7_argument'} = new Argument('is_notice', $args->{'is_notice'});
${'is_notice7_argument'}->ensureDefaultValue('N');
${'is_notice7_argument'}->checkNotNull();
if(!${'is_notice7_argument'}->isValid()) return ${'is_notice7_argument'}->getErrorMessage();
if(${'is_notice7_argument'} !== null) ${'is_notice7_argument'}->setColumnType('char');

${'title8_argument'} = new Argument('title', $args->{'title'});
${'title8_argument'}->checkNotNull();
if(!${'title8_argument'}->isValid()) return ${'title8_argument'}->getErrorMessage();
if(${'title8_argument'} !== null) ${'title8_argument'}->setColumnType('varchar');

${'title_bold9_argument'} = new Argument('title_bold', $args->{'title_bold'});
${'title_bold9_argument'}->ensureDefaultValue('N');
if(!${'title_bold9_argument'}->isValid()) return ${'title_bold9_argument'}->getErrorMessage();
if(${'title_bold9_argument'} !== null) ${'title_bold9_argument'}->setColumnType('char');

${'title_color10_argument'} = new Argument('title_color', $args->{'title_color'});
${'title_color10_argument'}->ensureDefaultValue('N');
if(!${'title_color10_argument'}->isValid()) return ${'title_color10_argument'}->getErrorMessage();
if(${'title_color10_argument'} !== null) ${'title_color10_argument'}->setColumnType('varchar');

${'content11_argument'} = new Argument('content', $args->{'content'});
${'content11_argument'}->checkNotNull();
if(!${'content11_argument'}->isValid()) return ${'content11_argument'}->getErrorMessage();
if(${'content11_argument'} !== null) ${'content11_argument'}->setColumnType('bigtext');

${'readed_count12_argument'} = new Argument('readed_count', $args->{'readed_count'});
${'readed_count12_argument'}->ensureDefaultValue('0');
if(!${'readed_count12_argument'}->isValid()) return ${'readed_count12_argument'}->getErrorMessage();
if(${'readed_count12_argument'} !== null) ${'readed_count12_argument'}->setColumnType('number');

${'blamed_count13_argument'} = new Argument('blamed_count', $args->{'blamed_count'});
${'blamed_count13_argument'}->ensureDefaultValue('0');
if(!${'blamed_count13_argument'}->isValid()) return ${'blamed_count13_argument'}->getErrorMessage();
if(${'blamed_count13_argument'} !== null) ${'blamed_count13_argument'}->setColumnType('number');

${'voted_count14_argument'} = new Argument('voted_count', $args->{'voted_count'});
${'voted_count14_argument'}->ensureDefaultValue('0');
if(!${'voted_count14_argument'}->isValid()) return ${'voted_count14_argument'}->getErrorMessage();
if(${'voted_count14_argument'} !== null) ${'voted_count14_argument'}->setColumnType('number');

${'comment_count15_argument'} = new Argument('comment_count', $args->{'comment_count'});
${'comment_count15_argument'}->ensureDefaultValue('0');
if(!${'comment_count15_argument'}->isValid()) return ${'comment_count15_argument'}->getErrorMessage();
if(${'comment_count15_argument'} !== null) ${'comment_count15_argument'}->setColumnType('number');

${'trackback_count16_argument'} = new Argument('trackback_count', $args->{'trackback_count'});
${'trackback_count16_argument'}->ensureDefaultValue('0');
if(!${'trackback_count16_argument'}->isValid()) return ${'trackback_count16_argument'}->getErrorMessage();
if(${'trackback_count16_argument'} !== null) ${'trackback_count16_argument'}->setColumnType('number');

${'uploaded_count17_argument'} = new Argument('uploaded_count', $args->{'uploaded_count'});
${'uploaded_count17_argument'}->ensureDefaultValue('0');
if(!${'uploaded_count17_argument'}->isValid()) return ${'uploaded_count17_argument'}->getErrorMessage();
if(${'uploaded_count17_argument'} !== null) ${'uploaded_count17_argument'}->setColumnType('number');
if(isset($args->password)) {
${'password18_argument'} = new Argument('password', $args->{'password'});
if(!${'password18_argument'}->isValid()) return ${'password18_argument'}->getErrorMessage();
} else
${'password18_argument'} = NULL;if(${'password18_argument'} !== null) ${'password18_argument'}->setColumnType('varchar');

${'nick_name19_argument'} = new Argument('nick_name', $args->{'nick_name'});
${'nick_name19_argument'}->checkNotNull();
if(!${'nick_name19_argument'}->isValid()) return ${'nick_name19_argument'}->getErrorMessage();
if(${'nick_name19_argument'} !== null) ${'nick_name19_argument'}->setColumnType('varchar');

${'member_srl20_argument'} = new Argument('member_srl', $args->{'member_srl'});
${'member_srl20_argument'}->checkFilter('number');
${'member_srl20_argument'}->ensureDefaultValue('0');
if(!${'member_srl20_argument'}->isValid()) return ${'member_srl20_argument'}->getErrorMessage();
if(${'member_srl20_argument'} !== null) ${'member_srl20_argument'}->setColumnType('number');

${'user_id21_argument'} = new Argument('user_id', $args->{'user_id'});
${'user_id21_argument'}->ensureDefaultValue('');
if(!${'user_id21_argument'}->isValid()) return ${'user_id21_argument'}->getErrorMessage();
if(${'user_id21_argument'} !== null) ${'user_id21_argument'}->setColumnType('varchar');

${'user_name22_argument'} = new Argument('user_name', $args->{'user_name'});
${'user_name22_argument'}->ensureDefaultValue('');
if(!${'user_name22_argument'}->isValid()) return ${'user_name22_argument'}->getErrorMessage();
if(${'user_name22_argument'} !== null) ${'user_name22_argument'}->setColumnType('varchar');
if(isset($args->email_address)) {
${'email_address23_argument'} = new Argument('email_address', $args->{'email_address'});
${'email_address23_argument'}->checkFilter('email');
if(!${'email_address23_argument'}->isValid()) return ${'email_address23_argument'}->getErrorMessage();
} else
${'email_address23_argument'} = NULL;if(${'email_address23_argument'} !== null) ${'email_address23_argument'}->setColumnType('varchar');

${'homepage24_argument'} = new Argument('homepage', $args->{'homepage'});
${'homepage24_argument'}->checkFilter('homepage');
${'homepage24_argument'}->ensureDefaultValue('');
if(!${'homepage24_argument'}->isValid()) return ${'homepage24_argument'}->getErrorMessage();
if(${'homepage24_argument'} !== null) ${'homepage24_argument'}->setColumnType('varchar');
if(isset($args->tags)) {
${'tags25_argument'} = new Argument('tags', $args->{'tags'});
if(!${'tags25_argument'}->isValid()) return ${'tags25_argument'}->getErrorMessage();
} else
${'tags25_argument'} = NULL;if(${'tags25_argument'} !== null) ${'tags25_argument'}->setColumnType('text');
if(isset($args->extra_vars)) {
${'extra_vars26_argument'} = new Argument('extra_vars', $args->{'extra_vars'});
if(!${'extra_vars26_argument'}->isValid()) return ${'extra_vars26_argument'}->getErrorMessage();
} else
${'extra_vars26_argument'} = NULL;if(${'extra_vars26_argument'} !== null) ${'extra_vars26_argument'}->setColumnType('text');

${'regdate27_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate27_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'regdate27_argument'}->isValid()) return ${'regdate27_argument'}->getErrorMessage();
if(${'regdate27_argument'} !== null) ${'regdate27_argument'}->setColumnType('date');

${'last_update28_argument'} = new Argument('last_update', $args->{'last_update'});
${'last_update28_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'last_update28_argument'}->isValid()) return ${'last_update28_argument'}->getErrorMessage();
if(${'last_update28_argument'} !== null) ${'last_update28_argument'}->setColumnType('date');
if(isset($args->last_updater)) {
${'last_updater29_argument'} = new Argument('last_updater', $args->{'last_updater'});
if(!${'last_updater29_argument'}->isValid()) return ${'last_updater29_argument'}->getErrorMessage();
} else
${'last_updater29_argument'} = NULL;if(${'last_updater29_argument'} !== null) ${'last_updater29_argument'}->setColumnType('varchar');

${'ipaddress30_argument'} = new Argument('ipaddress', $args->{'ipaddress'});
${'ipaddress30_argument'}->ensureDefaultValue($_SERVER['REMOTE_ADDR']);
if(!${'ipaddress30_argument'}->isValid()) return ${'ipaddress30_argument'}->getErrorMessage();
if(${'ipaddress30_argument'} !== null) ${'ipaddress30_argument'}->setColumnType('varchar');

${'list_order31_argument'} = new Argument('list_order', $args->{'list_order'});
${'list_order31_argument'}->ensureDefaultValue('0');
if(!${'list_order31_argument'}->isValid()) return ${'list_order31_argument'}->getErrorMessage();
if(${'list_order31_argument'} !== null) ${'list_order31_argument'}->setColumnType('number');

${'update_order32_argument'} = new Argument('update_order', $args->{'update_order'});
${'update_order32_argument'}->ensureDefaultValue('0');
if(!${'update_order32_argument'}->isValid()) return ${'update_order32_argument'}->getErrorMessage();
if(${'update_order32_argument'} !== null) ${'update_order32_argument'}->setColumnType('number');

${'allow_trackback33_argument'} = new Argument('allow_trackback', $args->{'allow_trackback'});
${'allow_trackback33_argument'}->ensureDefaultValue('Y');
if(!${'allow_trackback33_argument'}->isValid()) return ${'allow_trackback33_argument'}->getErrorMessage();
if(${'allow_trackback33_argument'} !== null) ${'allow_trackback33_argument'}->setColumnType('char');

${'notify_message34_argument'} = new Argument('notify_message', $args->{'notify_message'});
${'notify_message34_argument'}->ensureDefaultValue('N');
if(!${'notify_message34_argument'}->isValid()) return ${'notify_message34_argument'}->getErrorMessage();
if(${'notify_message34_argument'} !== null) ${'notify_message34_argument'}->setColumnType('char');

${'status35_argument'} = new Argument('status', $args->{'status'});
${'status35_argument'}->ensureDefaultValue('PUBLIC');
if(!${'status35_argument'}->isValid()) return ${'status35_argument'}->getErrorMessage();
if(${'status35_argument'} !== null) ${'status35_argument'}->setColumnType('varchar');

${'commentStatus36_argument'} = new Argument('commentStatus', $args->{'commentStatus'});
${'commentStatus36_argument'}->ensureDefaultValue('ALLOW');
if(!${'commentStatus36_argument'}->isValid()) return ${'commentStatus36_argument'}->getErrorMessage();
if(${'commentStatus36_argument'} !== null) ${'commentStatus36_argument'}->setColumnType('varchar');

$query->setColumns(array(
new InsertExpression('`document_srl`', ${'document_srl3_argument'})
,new InsertExpression('`module_srl`', ${'module_srl4_argument'})
,new InsertExpression('`category_srl`', ${'category_srl5_argument'})
,new InsertExpression('`lang_code`', ${'lang_code6_argument'})
,new InsertExpression('`is_notice`', ${'is_notice7_argument'})
,new InsertExpression('`title`', ${'title8_argument'})
,new InsertExpression('`title_bold`', ${'title_bold9_argument'})
,new InsertExpression('`title_color`', ${'title_color10_argument'})
,new InsertExpression('`content`', ${'content11_argument'})
,new InsertExpression('`readed_count`', ${'readed_count12_argument'})
,new InsertExpression('`blamed_count`', ${'blamed_count13_argument'})
,new InsertExpression('`voted_count`', ${'voted_count14_argument'})
,new InsertExpression('`comment_count`', ${'comment_count15_argument'})
,new InsertExpression('`trackback_count`', ${'trackback_count16_argument'})
,new InsertExpression('`uploaded_count`', ${'uploaded_count17_argument'})
,new InsertExpression('`password`', ${'password18_argument'})
,new InsertExpression('`nick_name`', ${'nick_name19_argument'})
,new InsertExpression('`member_srl`', ${'member_srl20_argument'})
,new InsertExpression('`user_id`', ${'user_id21_argument'})
,new InsertExpression('`user_name`', ${'user_name22_argument'})
,new InsertExpression('`email_address`', ${'email_address23_argument'})
,new InsertExpression('`homepage`', ${'homepage24_argument'})
,new InsertExpression('`tags`', ${'tags25_argument'})
,new InsertExpression('`extra_vars`', ${'extra_vars26_argument'})
,new InsertExpression('`regdate`', ${'regdate27_argument'})
,new InsertExpression('`last_update`', ${'last_update28_argument'})
,new InsertExpression('`last_updater`', ${'last_updater29_argument'})
,new InsertExpression('`ipaddress`', ${'ipaddress30_argument'})
,new InsertExpression('`list_order`', ${'list_order31_argument'})
,new InsertExpression('`update_order`', ${'update_order32_argument'})
,new InsertExpression('`allow_trackback`', ${'allow_trackback33_argument'})
,new InsertExpression('`notify_message`', ${'notify_message34_argument'})
,new InsertExpression('`status`', ${'status35_argument'})
,new InsertExpression('`comment_status`', ${'commentStatus36_argument'})
));
$query->setTables(array(
new Table('`xe_documents`', '`documents`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>