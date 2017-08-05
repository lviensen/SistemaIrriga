<html>
	<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
    </head>
	<body>
		<div>
			<?php

				include '../dao/Dados.php';
				$operacao = $_POST["operacao"];
				session_start();

				$dados = new Dados;
				

				 if($operacao == "incluir"){

					$estacao_id = $_POST["estacao_id"];
					$temperatura = $_POST["temperatura"];
					$velocidade_vento = $_POST["velocidade_vento"];
					$umidade = $_POST["umidade"];
					$tipo = $_POST["tipo"];
					
					
					$dados->estacao_id = $estacao_id;
					$dados->temperatura = $temperatura;
					$dados->velocidade_vento = $velocidade_vento;
					$dados->umidade = $umidade;


					$dados->inserirDados();
					$_SESSION['mensagem']='Cadastro realizado com sucesso!';
					$_SESSION['verificador']='SIM';

					echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../views/index.php'>";
				}		

				elseif ($operacao == "alterar"){
					$id = $_POST["id"];
					$nome = $_POST["nome"];
					$temperatura = $_POST["temperatura"];
					$velocidade_vento = $_POST["velocidade_vento"];
					$umidade = $_POST["umidade"];
					
					$dados = new Dados;
					
					$dados->id = $id;
					$dados->nome = $nome;
					$dados->temperatura = $temperatura;
					$dados->velocidade_vento = $velocidade_vento;
					$dados->umidade = $umidade;
					$dados->atualizarDados($id);


					$_SESSION['mensagem']='Dados alterados com sucesso!!';
					$_SESSION['verificador']='SIM';
					echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../views/dados.php'>";					
				}
				elseif ($operacao == "excluir") {
					$id = $_POST['id'];
					$dados->excluir($id);

					echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../views/dados.php'>";
				}	
			?>
		</div>
	</body>	
</html>