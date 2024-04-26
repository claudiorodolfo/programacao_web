<?php
/**
* @package model
*/

/**
* Interface com as operações que podem ser realizadas no BD relacionadas a Carro
*
* @author Cláudio Rodolfo S. de Oliveira
* @version Versão Inicial
*/
interface ICarroDAO {

	/**
	* cria uma Carro
	* @param Carro $Carro objeto POJO de um Carro
	*/
	public function criar($carro);

	/**
	* busca por uma Carro
	* @param Carro $Carro objeto POJO de um Carro
	*/
	public function buscar($carro);

	/**
	* atualiza as informações de um carro
	* @param Carro $carro objeto POJO de um carro
	*/
	//public function atualizar($carro);
	
	/**
	* apaga uma carro
	* @param Carro $carro objeto POJO de um carro
	*/
	//public function apagar($carro);
	
	/**
	* busca todos os Carros
	*/
	public function buscarTodos();
	}
?>