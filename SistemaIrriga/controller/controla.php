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
					$cidade = $_POST["cidade"];
					$email = $_POST["email"];
					$senha = $_POST["senha"];
					$descricao = $_POST["descricao"];
					
					$u = new Usuario;
					
					$u->id = $id;
					$u->nome = $nome;
					$u->cidade = $cidade;
					$u->email = $email;
					$u->senha = $senha;
					$u->descricao = $descricao;
					$u->atualizarUsuarioProfessor();
					
					$_SESSION['mensagem']='Usuário alterado com sucesso';
					$_SESSION['local']='perfil.php';
					$_SESSION['nome'] = $nome;
					$_SESSION['cidade'] = $cidade;
					$_SESSION['email'] = $email;
					$_SESSION['senha'] = $senha;
					$_SESSION['descricao'] = $descricao;

					$_SESSION['mensagem']='Dados alterados com sucesso!!';
					$_SESSION['verificador']='SIM';
					echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../views/perfil.php'>";					
				}
				elseif ($operacao == "cadastrarProfInst") { 
					$idProf = $_POST["idProf"];
					$idInst = $_POST["idInst"];	
					$user->idInst = $idInst;
					$user->idProf = $idProf;

					$user->inserirProfInst();
					
					$_SESSION['mensagem']='Cadastro realizado com sucesso!';
					$_SESSION['verificador']='SIM';
					echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../views/home.php'>";
						
				}
				elseif ($operacao == "cadastroAlunoInstrumentoProfessor") {
					$idAlu = $_POST['idAlu'];
					$idProf = $_POST['idProf'];
					$idInst = $_POST['idInst'];

					$user->idAlu = $idAlu;
					$user->idProf = $idProf;
					$user->idInst = $idInst;

					$user->inserirAlunoInstrumentoProfessor();
					$_SESSION['mensagem']='Matrícula realizada com sucesso!';
					$_SESSION['verificador']='SIM';					
					echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../views/homeAluno.php'>";				
				}
				elseif ($operacao == "avaliar") {

					$idMatri = $_POST['idMatri'];
					$nota = $_POST['nota'];

					$user->idMatri = $idMatri;
					$user->nota = $nota;

					$user->avaliar();

					echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../views/homeAluno.php'>";
				}
			?>
		</div>
	</body>	
</html>