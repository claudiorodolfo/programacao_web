<?php

require_once '../../orm/Cliente.php';

class BD {

	public function cadastra($cliente) {
		$bd = mysqli_connect('localhost', 'root', '', 'Projeto');
		//Exemplo de instrução SQL
		//insert into cliente (nome,email,id_empresa) values ('Claudio Rodolfo', 'claudiorodolfo@ifba.edu.br', 1)
		$sql = "insert into cliente (nome,email,senha, id_empresa) values ('{$cliente->getNome()}','{$cliente->getEmail()}','{$cliente->getSenha()}',{$cliente->getIdEmpresa()})";
		//print $sql;
		print 'Cadastro realizado com sucesso!';
		
		mysqli_query($bd, $sql);
		mysqli_close($bd);
	}	

	public function autentica($cliente) {
		$bd = mysqli_connect('localhost', 'root', '', 'Projeto');
		$sql = "select id from cliente where email = '{$cliente->getEmail()}' and senha = '{$cliente->getSenha()}'";
		//print $sql;
		
		$linhas = mysqli_query($bd, $sql);
		mysqli_close($bd);
		if (mysqli_num_rows($linhas) == 1)
			return true;
		else
			return false;
	}
	
	public function apaga($cliente) {

	}

	public function atualiza($cliente) {

	}

	public function seleciona($cliente) {

	}

	public function selecionaTodos() {
		$bd = mysqli_connect('localhost', 'root', '', 'Projeto');
		$sql = "select * from cliente";
		$dados = mysqli_query($bd, $sql);
		$arrayClientes = [];
		for($i = 0; $i< mysqli_num_rows($dados); $i++) {
			$linha = mysqli_fetch_array($dados);
			$c = new Cliente();
			$c->setId($linha['id']);
			$c->setNome($linha['nome']);
			$c->setEmail($linha['email']);
			//$c->setSenha($linha['senha']); //Não retornar as senhas
			$c->setIdEmpresa($linha['id_empresa']);
			$arrayClientes[$i] = $c;
		}
		return $arrayClientes;
	}
}
?>