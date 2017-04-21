<?php require_once("cabecalho.php");
      require_once("banco-produto.php"); 
      require_once("logica-usuario.php");
      require_once("class/Produto.php");
      require_once("class/Categoria.php");
      

if(!usuarioEstaLogado()){
	$_SESSION['danger'] = "Voce nao tem acesso a esta funcionalidade!";
	header("Location:index.php");
}else{
?>

<?php mostraAlerta("success"); ?>


<table class="table table-striped table-bordered">

    <?php
        $produtos = listaProdutos($conexao);
        foreach($produtos as $produto) :
        
        $preco = $produto->getPreco();
        $desconto = $produto->precoComDesconto();
        
    ?>
    <tr>
        <td><?= $produto->nome ?></td>
        <td><?= $preco ?></td>
        <td><?= $desconto;?></td>
        <td><?= $preco - $desconto?></td>
        <td><?= substr($produto->descricao, 0, 40) ?></td>
        <td><?= $produto->categorias->nome ?></td>
        <td><a class="btn btn-primary" href="produto-altera-formulario.php?id=<?=$produto->id?>">alterar</a></td>
        <td>
            <form action="remove-produto.php" method="post">
                <input type="hidden" name="id" value="<?=$produto->id?>" />
                <button class="btn btn-danger">remover</button>
            </form>
        </td>
    </tr>
    <?php
        endforeach;
    ?>
</table>
<?php } ?>
<?php include("rodape.php"); ?>
