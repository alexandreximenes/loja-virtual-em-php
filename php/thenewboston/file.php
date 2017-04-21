<?php

$nomeArquivo = "arq.txt";
$escrever = fopen($nomeArquivo, 'a');
fwrite($escrever, "escrevendo no meu arquivo");
fclose($escrever);


// $ler = fopen($nomeArquivo, "r");
// echo '<br>'.fread($ler, filesize($nomeArquivo));
// fclose($ler);


$ler2 = fopen($nomeArquivo, 'r');
$texto = fread($ler2, 1000);

$lista = str_replace(" ", "-", $texto);
echo $lista;

$list = explode(" ", $texto);
foreach($list as $x){
	echo "<br>". $x;
}




// $reader = fopen("arq.txt", 'r');

// $r = fread($reader, 1000);
// echo $r;