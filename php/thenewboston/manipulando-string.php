`<?php

$palavra= "    o senhor e o meu pastor e nada me faltara . ";

echo $palavra;
echo $p = "<br>total antes do trim = " .strlen($palavra);
echo $p = "<br>tirando espacos com trim = " . trim($palavra);
echo $p = "<br>total apos trim = " . strlen(trim($palavra));
echo $p = "<br>qtde de palavras = " .str_word_count($palavra);
echo $p = "<br>mistura de palavras = " .str_shuffle($palavra);
echo $p = "<br>substr = " . substr($palavra, 0, 20);
echo $p = "<br>string reverse = " . strrev($palavra);
echo $p = "<br>string strtolower = " . strtolower($palavra);
echo $p = "<br>string strtoupper = " . strtoupper($palavra);
echo $p = "<br>string strtopos = " . strpos($palavra, 'r');

$s = 'this is a string, and it is an example';
$search = 'is';
echo "<br>string strtopos = " . strpos($s, $search);

similar_text($palavra, 'o senhor e o meu salvador', $result); 
echo $p = "<br>palavras similares = " . $result;

echo $p = "<br>procurando por meu pastor 0 nao encontra 1 encontra = " 
		. preg_match('/pastor/', $palavra);

$search = array(' ','e','meu','faltara');
$replace = array('_','E','MEU','FALTARA');
echo "<br>string st_replace = " . str_replace($search, $replace, $palavra);
$data = date('d/m/Y');
echo  "<br>convertendo data = " . date('Y-m-d', strtotime($data));
echo  "<br>convertendo data = " . date('d-m-Y', strtotime(date('Y-m-d')));

$meuarray = "alexandre;tiago;ximenes;arthur;ximenes;dayane;ximenes";
echo "<br>posicao meuarray ; " .strpos($meuarray, ";");

$token = explode(";", $meuarray);

echo "<br>tamanho meuarray " .strlen($meuarray);
echo "<br>tamanho token " .count($token);

foreach($token as $t):
	echo "<br>". $t;
endforeach;

$data2 = date('d/m/Y');
$padrao = '/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{1,4}$/';
$resultado = preg_match($padrao, $data2);

if($resultado == 1){
	echo "<br>".$data2;
}else{
	echo "<br>Data nao e valida!";
}

$data3 = explode("/", $data2);
var_dump($data3);
$resultado = checkdate($data3[1], $data3[0], $data3[2]);
echo "<br>" .var_dump($resultado);


$padrao = '/^.+(\.pdf|\.zip|\.jpg|\.jpeg)$/';
$escrever = 'file.jpg';
$resultado = preg_match($padrao, $escrever);
echo "<br>" .var_dump($resultado);
if($resultado == 1){
	echo "<br>". $escrever;
}else{
	echo "<br>arquivo nao e valida!";
}


?>

<form action="manipulando-string.php" method="post" enctype="multipart/form-data">
	<input type="file" name="anexo" />
	<input type="submit" value="Enviar Imagem" />

</form>

<?php 
	$destino = 'img/'.rand(1,100). $_FILES['anexo']['name'];
	echo count($destino) . " + ". $destino;
	
	echo 'Voce enviou o arquivo: <strong>' . $_FILES[ 'anexo' ][ 'name' ] . '</strong><br />';
	echo 'Este arquivo e do tipo: <strong > ' . $_FILES[ 'anexo' ][ 'type' ] . ' </strong ><br />';
	echo 'Temporariamente foi salvo em: <strong>' . $_FILES[ 'anexo' ][ 'tmp_name' ] . '</strong><br />';
	echo 'Seu tamanho e: <strong>' . $_FILES[ 'anexo' ][ 'size' ] . '</strong> Bytes<br /><br />';
	
	$arquivo_tmp = $_FILES['anexo']['tmp_name'];
	$extensao = pathinfo ( $destino, PATHINFO_EXTENSION );
	echo $extensao;
	$padrao = '/^.+(\.pdf|\.zip|\.jpg|\.jpeg|\.png)$/';
	$resultado = preg_match($padrao, strtolower($destino));
	var_dump($destino);
	
	if(!strtolower($resultado)){
		echo "Nao foi possivel fazer upload dessa imagem";
	}else{
		move_uploaded_file($arquivo_tmp, $destino);
		echo "<br> ".$destino;
	}
	
		
?>