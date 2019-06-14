<?
ob_start(); // 버퍼링 시작
?>

PHP 언어로 캐시 파일을 페이지를 구워보자
<table border="1">
	<Tr>
		<Td> 이름</td>
		<Td> 블로거</td>
		<Td> 홈페이지</td>
	</tr>
	<Tr>
		<Td> 고코더</td>
		<Td> gocoder.tistory.com</td>
		<Td> gocoder.net</td>
	</tr>
</table>
<?
$html = ob_get_contents(); //버퍼에 출력된 화면에 출력된 화면을 가져와 변수로 담는다					

$handle = fopen("test.html", 'w'); //쓸 페이지 파일을 열고
$result = fwrite($handle, $html);    //파일에 내용을 그대로 쓴다.

fclose($handle); // 파일 닫기 

?>