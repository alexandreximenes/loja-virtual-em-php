
<tr>
<td>Nome</td>
<td><input class="form-control" type="text" name="nome" value="<?=$produto['nome']?>" /></td>
		</tr>
		<tr>
		<td>Preco</td>
		<td><input class="form-control" type="number" name="preco" value="<?=$produto['preco']?>" /></td>
				</tr>
				<tr>
				<td>Descricao</td>
				<td><textarea class="form-control" name="descricao"><?=$produto['descricao']?></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="checkbox" name="usado" <?=$usado?> value="true"> Usado
        </tr>
        <tr>
            <td>Categoria</td>
            <td>
                <select class="form-control" name="categoria_id">
                    <?php foreach($categorias as $categoria) :
                        $essaEhACategoria = $produto['categoria_id'] == $categoria['id'];
                        $selecao = $essaEhACategoria ? "selected='selected'" : "";
                    ?>
                        <option value="<?=$categoria['id']?>" <?=$selecao?>>
                            <?=$categoria['nome']?>
                        </option>
                    <?php endforeach ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><button class="btn btn-primary" type="submit">Alterar</button></td>
        </tr>
