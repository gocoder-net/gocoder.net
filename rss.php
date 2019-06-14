<?php

$url = "http://art.sfuhost.com/test.php";

$ch = cURL_init();

cURL_setopt($ch, CURLOPT_URL, $url);
cURL_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$response = cURL_exec($ch);
cURL_close($ch);
echo $response;

?>