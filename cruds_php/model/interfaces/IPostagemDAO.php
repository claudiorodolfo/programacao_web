<?php
/**
* @package model
*/

/**
* Interface com as operações que podem ser realizadas no BD relacionadas a Postagem
*
* @author Cláudio Rodolfo S. de Oliveira
* @version Versão Inicial
*/
interface IPostagemDAO {

	/**
	* cria uma postagem
	* @param Postagem $postagem objeto POJO de uma postagem
	*/
	public function criar($postagem);

	/**
	* busca por uma postagem
	* @param Postagem $postagem objeto POJO de uma postagem
	*/
	public function buscar($postagem);

	/**
	* atualiza as informações de uma postagem
	* @param Postagem $postagem objeto POJO de uma postagem
	*/
	public function atualizar($postagem);

	/**
	* apaga uma postagem
	* @param Postagem $postagem objeto POJO de uma postagem
	*/
	public function apagar($postagem);

	/**
	* busca todas as postagens
	*/
	public function buscarTodos();
	}
?>