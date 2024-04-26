<?php

require_once '../../orm/Empresa.class.php';

class BD {

	public function cadastra($empresa) {
		$bd = mysqli_connect('localhost', 'root', '', 'Projeto');
		//Exemplo de instrução SQL
		//insert into Empresa (nome) values ('Instituto Federal da Bahia')
		$sql = "insert into Empresa (nome) values ('{$empresa->getNome()}')";
		//print $sql;
		print 'Cadastro realizado com sucesso!';
		
		mysqli_query($bd, $sql);
		mysqli_close($bd);
	}	

	public function apaga($empresa) {

	}

	public function atualiza($empresa) {

	}

	public function seleciona($empresa) {

	}

	public function selecionaTodos() {

	}	
}
?>