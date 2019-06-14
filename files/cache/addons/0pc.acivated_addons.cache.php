<?php if(!defined("__XE__")) exit();
$_m = Context::get('mid');
$before_time = microtime(true);
$rm = '';
$ml = array(
);
$addon_file = './addons/autolink/autolink.addon.php';
if(file_exists($addon_file)){
if($rm === 'no_run_selected'){
if(!isset($ml[$_m])){
unset($addon_info); $addon_info = unserialize(base64_decode('')); @include($addon_file);
}}else{
if(isset($ml[$_m]) || count($ml) === 0){
unset($addon_info); $addon_info = unserialize(base64_decode('')); @include($addon_file);
}}}
$after_time = microtime(true);
$addon_time_log = new stdClass();
$addon_time_log->caller = $called_position;
$addon_time_log->called = "autolink";
$addon_time_log->called_extension = "autolink";
writeSlowlog("addon",$after_time-$before_time,$addon_time_log);
$before_time = microtime(true);
$rm = '';
$ml = array(
);
$addon_file = './addons/captcha/captcha.addon.php';
if(file_exists($addon_file)){
if($rm === 'no_run_selected'){
if(!isset($ml[$_m])){
unset($addon_info); $addon_info = unserialize(base64_decode('')); @include($addon_file);
}}else{
if(isset($ml[$_m]) || count($ml) === 0){
unset($addon_info); $addon_info = unserialize(base64_decode('')); @include($addon_file);
}}}
$after_time = microtime(true);
$addon_time_log = new stdClass();
$addon_time_log->caller = $called_position;
$addon_time_log->called = "captcha";
$addon_time_log->called_extension = "captcha";
writeSlowlog("addon",$after_time-$before_time,$addon_time_log);
$before_time = microtime(true);
$rm = 'run_selected';
$ml = array(
'chatting' => 1,
'dev_toon' => 1,
'DeveloperSite' => 1,
'home' => 1,
'blog' => 1,
'seminar' => 1,
'Lecture' => 1,
'life_toon' => 1,
'notice' => 1,
'qna' => 1,
'WebTools' => 1,
);
$addon_file = './addons/counter/counter.addon.php';
if(file_exists($addon_file)){
if($rm === 'no_run_selected'){
if(!isset($ml[$_m])){
unset($addon_info); $addon_info = unserialize(base64_decode('Tzo4OiJzdGRDbGFzcyI6Mzp7czoxNToieGVfdmFsaWRhdG9yX2lkIjtzOjMxOiJtb2R1bGVzL2FkZG9uL3RwbC9zZXR1cF9hZGRvbi8xIjtzOjEzOiJ4ZV9ydW5fbWV0aG9kIjtzOjEyOiJydW5fc2VsZWN0ZWQiO3M6ODoibWlkX2xpc3QiO2E6MTE6e2k6MDtzOjg6ImNoYXR0aW5nIjtpOjE7czo4OiJkZXZfdG9vbiI7aToyO3M6MTM6IkRldmVsb3BlclNpdGUiO2k6MztzOjQ6ImhvbWUiO2k6NDtzOjQ6ImJsb2ciO2k6NTtzOjc6InNlbWluYXIiO2k6NjtzOjc6IkxlY3R1cmUiO2k6NztzOjk6ImxpZmVfdG9vbiI7aTo4O3M6Njoibm90aWNlIjtpOjk7czozOiJxbmEiO2k6MTA7czo4OiJXZWJUb29scyI7fX0=')); @include($addon_file);
}}else{
if(isset($ml[$_m]) || count($ml) === 0){
unset($addon_info); $addon_info = unserialize(base64_decode('Tzo4OiJzdGRDbGFzcyI6Mzp7czoxNToieGVfdmFsaWRhdG9yX2lkIjtzOjMxOiJtb2R1bGVzL2FkZG9uL3RwbC9zZXR1cF9hZGRvbi8xIjtzOjEzOiJ4ZV9ydW5fbWV0aG9kIjtzOjEyOiJydW5fc2VsZWN0ZWQiO3M6ODoibWlkX2xpc3QiO2E6MTE6e2k6MDtzOjg6ImNoYXR0aW5nIjtpOjE7czo4OiJkZXZfdG9vbiI7aToyO3M6MTM6IkRldmVsb3BlclNpdGUiO2k6MztzOjQ6ImhvbWUiO2k6NDtzOjQ6ImJsb2ciO2k6NTtzOjc6InNlbWluYXIiO2k6NjtzOjc6IkxlY3R1cmUiO2k6NztzOjk6ImxpZmVfdG9vbiI7aTo4O3M6Njoibm90aWNlIjtpOjk7czozOiJxbmEiO2k6MTA7czo4OiJXZWJUb29scyI7fX0=')); @include($addon_file);
}}}
$after_time = microtime(true);
$addon_time_log = new stdClass();
$addon_time_log->caller = $called_position;
$addon_time_log->called = "counter";
$addon_time_log->called_extension = "counter";
writeSlowlog("addon",$after_time-$before_time,$addon_time_log);
$before_time = microtime(true);
$rm = 'no_run_selected';
$ml = array(
);
$addon_file = './addons/header_editor/header_editor.addon.php';
if(file_exists($addon_file)){
if($rm === 'no_run_selected'){
if(!isset($ml[$_m])){
unset($addon_info); $addon_info = unserialize(base64_decode('Tzo4OiJzdGRDbGFzcyI6Mzp7czoxNToieGVfdmFsaWRhdG9yX2lkIjtzOjMxOiJtb2R1bGVzL2FkZG9uL3RwbC9zZXR1cF9hZGRvbi8xIjtzOjM6ImhkMSI7czozOTQ6IjwhLS0g6rWs6riAIOyVoOuTnOyEvOyKpCAtLT4NCg0KPHNjcmlwdCBhc3luYyBzcmM9Ii8vcGFnZWFkMi5nb29nbGVzeW5kaWNhdGlvbi5jb20vcGFnZWFkL2pzL2Fkc2J5Z29vZ2xlLmpzIj48L3NjcmlwdD4NCjxzY3JpcHQ+DQogICAgIChhZHNieWdvb2dsZSA9IHdpbmRvdy5hZHNieWdvb2dsZSB8fCBbXSkucHVzaCh7DQogICAgICAgICAgZ29vZ2xlX2FkX2NsaWVudDogImNhLXB1Yi03MDIxNTg4NjA4NjU1MzA2IiwNCiAgICAgICAgICBlbmFibGVfcGFnZV9sZXZlbF9hZHM6IHRydWUNCiAgICAgfSk7DQo8L3NjcmlwdD4NCg0KPCEtLSDruZkg7J247KadLS0+DQo8bWV0YSBuYW1lPSJtc3ZhbGlkYXRlLjAxIiBjb250ZW50PSIwMEVFRkQ0NDg0QkU4NkVCREZDNDczNTQyNzlCNkQxMCIgLz4iO3M6MTM6InhlX3J1bl9tZXRob2QiO3M6MTU6Im5vX3J1bl9zZWxlY3RlZCI7fQ==')); @include($addon_file);
}}else{
if(isset($ml[$_m]) || count($ml) === 0){
unset($addon_info); $addon_info = unserialize(base64_decode('Tzo4OiJzdGRDbGFzcyI6Mzp7czoxNToieGVfdmFsaWRhdG9yX2lkIjtzOjMxOiJtb2R1bGVzL2FkZG9uL3RwbC9zZXR1cF9hZGRvbi8xIjtzOjM6ImhkMSI7czozOTQ6IjwhLS0g6rWs6riAIOyVoOuTnOyEvOyKpCAtLT4NCg0KPHNjcmlwdCBhc3luYyBzcmM9Ii8vcGFnZWFkMi5nb29nbGVzeW5kaWNhdGlvbi5jb20vcGFnZWFkL2pzL2Fkc2J5Z29vZ2xlLmpzIj48L3NjcmlwdD4NCjxzY3JpcHQ+DQogICAgIChhZHNieWdvb2dsZSA9IHdpbmRvdy5hZHNieWdvb2dsZSB8fCBbXSkucHVzaCh7DQogICAgICAgICAgZ29vZ2xlX2FkX2NsaWVudDogImNhLXB1Yi03MDIxNTg4NjA4NjU1MzA2IiwNCiAgICAgICAgICBlbmFibGVfcGFnZV9sZXZlbF9hZHM6IHRydWUNCiAgICAgfSk7DQo8L3NjcmlwdD4NCg0KPCEtLSDruZkg7J247KadLS0+DQo8bWV0YSBuYW1lPSJtc3ZhbGlkYXRlLjAxIiBjb250ZW50PSIwMEVFRkQ0NDg0QkU4NkVCREZDNDczNTQyNzlCNkQxMCIgLz4iO3M6MTM6InhlX3J1bl9tZXRob2QiO3M6MTU6Im5vX3J1bl9zZWxlY3RlZCI7fQ==')); @include($addon_file);
}}}
$after_time = microtime(true);
$addon_time_log = new stdClass();
$addon_time_log->caller = $called_position;
$addon_time_log->called = "header_editor";
$addon_time_log->called_extension = "header_editor";
writeSlowlog("addon",$after_time-$before_time,$addon_time_log);
$before_time = microtime(true);
$rm = '';
$ml = array(
);
$addon_file = './addons/member_communication/member_communication.addon.php';
if(file_exists($addon_file)){
if($rm === 'no_run_selected'){
if(!isset($ml[$_m])){
unset($addon_info); $addon_info = unserialize(base64_decode('')); @include($addon_file);
}}else{
if(isset($ml[$_m]) || count($ml) === 0){
unset($addon_info); $addon_info = unserialize(base64_decode('')); @include($addon_file);
}}}
$after_time = microtime(true);
$addon_time_log = new stdClass();
$addon_time_log->caller = $called_position;
$addon_time_log->called = "member_communication";
$addon_time_log->called_extension = "member_communication";
writeSlowlog("addon",$after_time-$before_time,$addon_time_log);
$before_time = microtime(true);
$rm = '';
$ml = array(
);
$addon_file = './addons/member_extra_info/member_extra_info.addon.php';
if(file_exists($addon_file)){
if($rm === 'no_run_selected'){
if(!isset($ml[$_m])){
unset($addon_info); $addon_info = unserialize(base64_decode('')); @include($addon_file);
}}else{
if(isset($ml[$_m]) || count($ml) === 0){
unset($addon_info); $addon_info = unserialize(base64_decode('')); @include($addon_file);
}}}
$after_time = microtime(true);
$addon_time_log = new stdClass();
$addon_time_log->caller = $called_position;
$addon_time_log->called = "member_extra_info";
$addon_time_log->called_extension = "member_extra_info";
writeSlowlog("addon",$after_time-$before_time,$addon_time_log);
$before_time = microtime(true);
$rm = '';
$ml = array(
);
$addon_file = './addons/resize_image/resize_image.addon.php';
if(file_exists($addon_file)){
if($rm === 'no_run_selected'){
if(!isset($ml[$_m])){
unset($addon_info); $addon_info = unserialize(base64_decode('')); @include($addon_file);
}}else{
if(isset($ml[$_m]) || count($ml) === 0){
unset($addon_info); $addon_info = unserialize(base64_decode('')); @include($addon_file);
}}}
$after_time = microtime(true);
$addon_time_log = new stdClass();
$addon_time_log->caller = $called_position;
$addon_time_log->called = "resize_image";
$addon_time_log->called_extension = "resize_image";
writeSlowlog("addon",$after_time-$before_time,$addon_time_log);
$before_time = microtime(true);
$rm = '';
$ml = array(
);
$addon_file = './addons/stop_spambot_xe/stop_spambot_xe.addon.php';
if(file_exists($addon_file)){
if($rm === 'no_run_selected'){
if(!isset($ml[$_m])){
unset($addon_info); $addon_info = unserialize(base64_decode('')); @include($addon_file);
}}else{
if(isset($ml[$_m]) || count($ml) === 0){
unset($addon_info); $addon_info = unserialize(base64_decode('')); @include($addon_file);
}}}
$after_time = microtime(true);
$addon_time_log = new stdClass();
$addon_time_log->caller = $called_position;
$addon_time_log->called = "stop_spambot_xe";
$addon_time_log->called_extension = "stop_spambot_xe";
writeSlowlog("addon",$after_time-$before_time,$addon_time_log);