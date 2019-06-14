<?php

$url = "http://art.sfuhost.com/tools/rssreader/rss.php?url=".$_REQUEST["url"];
$url = $url.$where;

$ch = cURL_init();

cURL_setopt($ch, CURLOPT_URL, $url);
cURL_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$response = cURL_exec($ch);
cURL_close($ch);
echo $response;

?>