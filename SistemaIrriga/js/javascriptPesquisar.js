$(function(){
	$("#pesquisa").keyup(function(){
		var pesquisa = $(this).val();
		if(pesquisa != ''){
			var dados = {
				palavra : pesquisa
			}
			$.post('../controller/busca.php', dados, function(retorna){
				$(".resultado").html(retorna);
			});
		}
		else{
			$(".resultado").html('');
		}
		
	});
});

$(function(){
	$("#pesquisaProfessor").keyup(function(){
		var pesquisa = $(this).val();
		if(pesquisa != ''){
			var dados = {
				palavra : pesquisa
			}
			$.post('../controller/buscaProfessor.php', dados, function(retorna){
				$(".resultado").html(retorna);
			});
		}
		else{
			$(".resultado").html('');
		}
		
	});
});