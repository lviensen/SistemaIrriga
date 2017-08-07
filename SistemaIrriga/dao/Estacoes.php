<?php
	include '../util/ConexaoBD.php';

	class Estacoes{
		public $id;
		public $serial;
		public $lat;
		public $lon;
		public $nome;

	
		function mostrarEstacoes(){
			$bd = new ConexaoBD;
			$bd->conectar();
			return $bd->query("SELECT * FROM estacoes");
			$bd->fechar();
		}


		function dadosInstrumento($codigo){
			$bd = new ConexaoBD;
			$bd->conectar();
			return $bd->query("SELECT nome FROM instrumento WHERE id='$codigo'");
			$bd->fechar();
		}
	}


?>