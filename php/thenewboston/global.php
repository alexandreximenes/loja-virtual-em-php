<?php

$ip = $_SERVER['REMOTE_ADDR'];
verIp();
function verIp(){
	global $ip;
	echo "seu ip é : " . $ip;
}

// function dadosServer(){
// 	$dados = $_SERVER[];
// 	foreach ($dados as $d) : 
// 		echo $d;
// 	endforeach;
// }