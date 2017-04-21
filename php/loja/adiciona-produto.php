<?php require_once("cabecalho.php");
require_once("banco-produto.php");
require_once("logica-usuario.php");
require_once("class/Produto.php");

verificaUsuario();

if(insereProduto($conexao, $_POST)) { ?>
    <p class="text-success">O produto <?= $produto->nome; ?>, <?= $produto->preco; ?> adicionado com sucesso!</p>
<?php } else {
    $msg = mysqli_error($conexao);
?>
    <p class="text-danger">O produto <?= $produto->nome; ?> nao foi adicionado: <?= $msg ?></p>
<?php
}
?>

<?php include("rodape.php"); ?>
