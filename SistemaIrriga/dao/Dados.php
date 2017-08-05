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
		function mostrarDados($id){
			$bd = new ConexaoBD;
			$bd->conectar();
			return $bd->query("SELECT DISTINCT *, dados.id as idDados, estacoes.id as idEstacoes FROM dados, estacoes WHERE dados.estacao_id='$id' and estacoes.id='$id'");
			$bd->fechar();
		}		
		function mostrarDadosAlterar($id){
			$bd = new ConexaoBD;
			$bd->conectar();
			return $bd->query("SELECT * FROM dados WHERE id='$id'");
			$bd->fechar();
		}
		function atualizarDados($id){
			$bd = new ConexaoBD;
			$bd->conectar();
			$bd->query("UPDATE dados SET temperatura='$this->temperatura', velocidade_vento='$this->velocidade_vento', umidade='$this->umidade' WHERE id='$this->id'");
			$bd->fechar();
		}
		function excluir($id){
			$bd = new ConexaoBD;
			$sql = "DELETE FROM dados WHERE id='$id'";
			$bd->conectar();
			$bd->query($sql);
			$bd->fechar();			
		}
	}
?>