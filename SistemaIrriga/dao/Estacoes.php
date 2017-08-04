<?php
	include '../util/ConexaoBD.php';

	class Estacoes{
		public $id;
		public $serial;
		public $lat;
		public $lon;
		public $nome;

	
		function buscarUsuariosAdm($email){
			$bd = new ConexaoBD;
			$bd->conectar();
			return $bd->query("SELECT id, nome, email, senha
			FROM adm WHERE email='$email'");
			$bd->fechar();
		}

		function mostrarEstacoes(){
			$bd = new ConexaoBD;
			$bd->conectar();
			return $bd->query("SELECT * FROM estacoes");
			$bd->fechar();
		}
		function mostrarProfessorInstrumento($codigo){
			$bd = new ConexaoBD;

			$bd->conectar();
			return $bd->query("SELECT DISTINCT professor.nome as nomeProf, professor.id as idProf, professor.email as emailProf, professor.cidade as cidProf, professor.descricao as descricaoProf FROM professor, prof_inst, instrumento WHERE instrumento.id='$codigo' and prof_inst.idInst='$codigo' and prof_inst.idInst=instrumento.id and prof_inst.idProf=professor.id ORDER BY professor.nome ASC");
			$bd->fechar();
		}		
		function mostrarUsuarioAlterar($id){
			$bd = new ConexaoBD;
			$bd->conectar();
			return $bd->query("SELECT * FROM professor WHERE id='$id'");
			$bd->fechar();
		}
		function atualizarUsuarioProfessor(){
			$bd = new ConexaoBD;
			$bd->conectar();
			$bd->query("UPDATE professor SET nome='$this->nome',
			email='$this->email', cidade='$this->cidade', senha='$this->senha', descricao='$this->descricao' WHERE id='$this->id'");
			$bd->fechar();
		}
		function mostrarAlunosInstrumento($idProf, $idInst){
			$bd = new ConexaoBD;
			$bd->conectar();
			return $bd->query("SELECT * FROM aluno, matricula WHERE matricula.idProf='$idProf' AND matricula.idInst='$idInst' AND matricula.idAlu=aluno.id");
			$bd->fechar();			
		}
		function dadosInstrumento($codigo){
			$bd = new ConexaoBD;
			$bd->conectar();
			return $bd->query("SELECT nome FROM instrumento WHERE id='$codigo'");
			$bd->fechar();
		}
		function inserirAlunoInstrumentoProfessor(){
			$bd = new ConexaoBD;
			$sql = "INSERT INTO matricula (idAlu, idProf, idInst, nota, data, idMatri) VALUES ('$this->idAlu', '$this->idProf', '$this->idInst', NULL, CURRENT_TIMESTAMP, NULL)";
			$bd->conectar();
			$bd->query($sql);
			$bd->fechar();			
		}
		function avaliar(){
			$bd = new ConexaoBD;
			$bd->conectar();
			$bd->query("UPDATE matricula SET nota='$this->nota' WHERE matricula.idMatri='$this->idMatri'");
			$bd->fechar();			
		}
		function buscarNota($idProf, $idInst){
			$bd = new ConexaoBD;
			$bd->conectar();
			return $bd->query("SELECT AVG(matricula.nota) as nota FROM matricula, professor, instrumento WHERE professor.id='$idProf' AND instrumento.id='$idInst' AND matricula.idProf=professor.id AND matricula.idInst=instrumento.id");
			$bd->fechar();				
		}
	}


?>