<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
</head>

<script>
function falseIn(){
   
   var text = "<input type='text' name='gocoder[]' value='gc' />";
   $('#inHereFalse').append(text);
}
function trueIn(){
   
   var text = "<input type='text' name='gocoder[]' value='gc' />";
   $('#inHereTrue').append(text);
}
</script>
<body>

<table>
<form method='get' action='test_ok.php'>
   <input type='text' name='gocoder[]' value='gocoder' />
   <a href="javascript:falseIn();">추가</a>
   <input type="submit" value="안받아지는 보내기(X)">
   <div id="inHereFalse"></div>
</form>
</table>


<form method='get' action='test_ok.php'>
<table>
   <input type='text' name='gocoder[]' value='gocoder' />
   <a href="javascript:trueIn();">추가</a>
   <input type="submit" value="받아지는 보내기(O)">
   <div id="inHereTrue"></div>
</table>
</form>


</body>
</html>


<?php
//1부터 100개의 숫자를 생성
for ($i=1 ; $i <= 100 ; $i++) {
    $num[$i] += $i;
}
echo "1개의 랜덤 수 : ".array_rand($num,1);
echo "<Br>";
echo "2개의 랜덤 수 : ".implode(",",array_rand($num,2));

?>