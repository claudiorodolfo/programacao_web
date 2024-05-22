<?php
/**
* @package modelo
*/

/**
* Interface com as operações que podem ser realizadas no BD relacionadas a Usuario
*
* @author Cláudio Rodolfo S. de Oliveira
* @version Versão Inicial May 25, 2023
*/
interface IAvaliacaoDAO {

	/**
	* busca por uma Usuario
	* @param Avaliacao $avaliacao objeto POJO de uma Avaliacao
	* @return Avaliacao $avaliacao objeto POJO de uma Avaliacao
	*/
	public function buscarAvaliacaoAluno($avaliacao);

	/**
	* busca por um Aluno
	* @param Usuario $usuario objeto POJO de Usuario
	* @return Avaliacao $avaliacao[]
	*/
	public function buscarPorAluno($aluno);
}
?>