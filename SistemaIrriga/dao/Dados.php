<?php
	include '../util/ConexaoBD.php';

	class Dados{
		public $id;
		public $estacao_id;
		public $temperatura;
		public $velocidade_vento;
		public $umidade;
		public $data;
		public $tipo;

		function inserirDados(){
			$bd = new ConexaoBD;
			$sql = "INSERT INTO dados (estacao_id, temperatura, velocidade_vento, umidade, data)
			VALUES ('$this->estacao_id', '$this->temperatura', '$this->velocidade_vento', '$this->umidade', CURRENT_TIMESTAMP)";
			$bd->conectar();
			$bd->query($sql);
			$bd->fechar();
		}
		function inserirPro(){
			$bd = new ConexaoBD;
			$sql = "INSERT INTO professor (nome, email, cidade, senha, descricao)
			VALUES ('$this->nome', '$this->email', '$this->cidade', '$this->senha', '$this->descricao')";
			$bd->conectar();
			$bd->query($sql);
			$bd->fechar();
		}
		function inserirProfInst(){ 
			$bd = new ConexaoBD;
			$sql = "INSERT INTO prof_inst (idProf, idInst)
			VALUES ($this->idProf, $this->idInst)";
			$bd->conectar();
			$bd->query($sql);
			$bd->fechar();
		}		
		function buscarUsuariosAdm($email){
			$bd = new ConexaoBD;
			$bd->conectar();
			return $bd->query("SELECT id, nome, email, senha
			FROM adm WHERE email='$email'");
			$bd->fechar();
		}
		function buscarUsuariosAlu($email){
			$bd = new ConexaoBD;
			$bd->conectar();
			return $bd->query("SELECT email, senha, id, nome, cidade, descricao
			FROM aluno WHERE email='$email'");
			$bd->fechar();
		}
		function buscarUsuariosPro($email){
			$bd = new ConexaoBD;
			$bd->conectar();
			return $bd->query("SELECT email, senha, id, nome, cidade, descricao
			FROM professor WHERE email='$email'");
			$bd->fechar();
		}
		function mostrarProfessor(){
			$bd = new ConexaoBD;
			$bd->conectar();
			return $bd->query("SELECT * FROM professor");
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