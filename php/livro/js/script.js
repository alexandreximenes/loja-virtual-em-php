function avaliacao(value){
	var avaliacao = document.querySelector("#avaliacao");
	console.log(avaliacao);
	var definicao_avaliacao = document.querySelector("#definicao_avaliacao");
	switch (value){
				case '1 estrela': definicao_avaliacao.textContent = "Ruim"; break;
				case '2 estrela': definicao_avaliacao.textContent = "Bom";
				case '3 estrela': definicao_avaliacao.textContent = "Bom"; break;
				case '4 estrela': definicao_avaliacao.textContent = "Otimo";
				case '5 estrela': definicao_avaliacao.textContent = "Otimo";break;
			}
	});

	
}
