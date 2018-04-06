               <div class="col-md-3 col-sm-6 hero-feature">
					<div class="thumbnail" style="margin-top: 5px;">
					<img style="width: 300px; height: 300px;" src="<?=$jogo['imagem']?>" alt="<?=jogo['detalhes']?>">
					<div class="caption">
		                                <h4 class="pull-right">R$ <?= $jogo['valor']?></h4>
                                <h4><a href="#"><?= $jogo['nome'] ?></a>
                                </h4>
                                <p><?= substr($jogo['detalhes'],0,30);?>.. - See more snippets like this online store item at <a target="_blank" href="https://www.ea.com/pt-br">Bootsnipp - http://bootsnipp.com</a>.</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right"><?= rand(1, 10000)?> reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                </p>
                            </div>
			<div class="caption">
				<h3></h3>


				<p>
					<a href="carrinho.php?codigo=<?= $jogo['codigo'] ?>"
					<?php 
					$_SESSION['tela'] = $_SERVER['SCRIPT_NAME'];
					?>
						class="btn btn-primary">Comprar</a> <a href="#"
						class="btn btn-default">Detalhes</a>
				</p>
			</div>
		</div>
	</div>