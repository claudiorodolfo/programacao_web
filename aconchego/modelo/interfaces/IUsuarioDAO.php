<?php
/**
* @package modelo
*/

/**
* Interface com as operações que podem ser realizadas no BD relacionadas a Usuario
*
* @author Cláudio Rodolfo S. de Oliveira
* @version Versão Inicial May 18, 2023
*/
interface IUsuarioDAO {

	/**
	* autentica um Usuario
	* @param Usuario $usuario objeto POJO de uma Usuario
	*/
	public function autenticar($item);

	/**
	* cria uma Usuario
	* @param Usuario $usuario objeto POJO de uma Usuario
	*/
	public function criar($item);

	/**
	* busca por uma Usuario
	* @param Usuario $usuario objeto POJO de uma Usuario
	*/
	public function buscar($item);

	/**
	* atualiza as informações de uma Usuario
	* @param Usuario $usuario objeto POJO de uma Usuario
	*/
	public function atualizar($item);

	/**
	* apaga uma Usuario
	* @param Usuario $usuario objeto POJO de uma Usuario
	*/
	public function apagar($usuario);

	/**
	* busca todos os usuarios
	*/
	public function buscarTodos();
	}
?>