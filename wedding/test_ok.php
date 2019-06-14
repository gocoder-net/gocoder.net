<?php

for($i = 0; $i < count($_GET["gocoder"]); $i++) {
	echo $i."번째 value 값 :".$_GET["gocoder"][$i]."<Br>";	
}

?>