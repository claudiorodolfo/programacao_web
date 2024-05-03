<?php

require_once '../../orm/Empresa.php';

class BD {

	public function cadastra($empresa) {
		$bd = mysqli_connect('localhost', 'root', '', 'Projeto');
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
		$bd = mysqli_connect('localhost', 'root', '', 'Projeto');
		$sql = "select * from empresa";
		$dados = mysqli_query($bd, $sql);
		$arrayEmpresas = [];
		for($i = 0; $i< mysqli_num_rows($dados); $i++) {
			$linha = mysqli_fetch_array($dados);
			$e = new Empresa();
			$e->setId($linha['id']);
			$e->setNome($linha['nome']);
			$arrayEmpresas[$i] = $e;
		}
		return $arrayEmpresas;

	}	
}
?>