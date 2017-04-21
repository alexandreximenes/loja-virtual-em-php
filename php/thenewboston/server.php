<?php

$result = $_SERVER['REMOTE_ADDR'];
echo "<br>REMOTE_ADDR ".$result;
$result = $_SERVER['SCRIPT_FILENAME'];
echo "<br> SCRIPT_FILENAME ".$result;
$result = $_SERVER['SCRIPT_NAME'];
echo "<br>SCRIPT_NAME ".$result;
$result = $_SERVER['SERVER_SOFTWARE'];
echo "<br>SERVER_SOFTWARE ".$result;

$result = $_SERVER['SERVER_PROTOCOL'];
echo "<br>SERVER_PROTOCOL ".$result;

$result = $_SERVER['HTTP_USER_AGENT'];
echo "<br>HTTP_USER_AGENT ".$result."<br><br>";

$result = $_SERVER;
foreach($result as $s => $key){
	echo "<br> ". $s . "<br> ". $key;
	
}

//$result = '<html><head><script type="text/javascript">alert("Ola mundo");</script></head><body>>OI OI OI</body></html>';
//echo $result;

$result = addslashes('<html><head><script type="text/javascript">alert("addSlashes()");</script></head><body>OI OI OI</body></html>');
echo '<p>' .var_dump($result);

$result = htmlentities('<html><head><script type="text/javascript">alert("htmlentities()");</script></head><body>>OI OI OI</body></html>');
echo $result;

// $result = get_browser(null ,true);
// foreach($result as $r){
// 	echo "<br>". $r;
// }