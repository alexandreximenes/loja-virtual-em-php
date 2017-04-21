<?php require_once("cabecalho.php");
require_once("banco-categoria.php");
require_once("banco-produto.php");

$produto = "";
$categorias = listaCategorias($conexao);

if(isset($_GET['id'])){
	$produto = buscaProduto($conexao, $_GET);
}
$usado = $produto->usado ? "checked='checked'" : "";
?>

<h1>Alterando produto</h1>
<form action="altera-produto.php" method="post">
    <input type="hidden" name="id" value="<?=$produto->id?>" />
    <table class="table">
        <tr>
            <td>Nome</td>
            <td><input class="form-control" type="text" name="nome" value="<?=$produto->nome?>" /></td>
        </tr>
        <tr>
            <td>Preço</td>
            <td><input class="form-control" type="number" name="preco" value="<?=$produto->getPreco()?>" /></td>
        </tr>
        <tr>
            <td>Descrição</td>
            <td><textarea class="form-control" name="descricao"><?=$produto->descricao?></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="checkbox" name="usado" <?=$usado?> value="true"> Usado
        </tr>
        <tr>
            <td>Categoria</td>
            <td>
                <select class="form-control" name="categorias_id">
                    <?php 
                    
                    foreach($categorias as $categoria) :
                        $essaEhACategoria = $produto->categorias->id == $categoria->id;
                        $selecao = $essaEhACategoria ? "selected='selected'" : "";
                    ?>
                        <option value="<?=$categoria->id?>" <?=$selecao?>>
                            <?=$categoria->nome?>
                        </option>
                    <?php endforeach ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><button class="btn btn-primary" type="submit">Alterar</button></td>
        </tr>
    </table>
</form>

<?php include("rodape.php"); ?>
