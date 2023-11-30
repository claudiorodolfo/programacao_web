<?php
/**
* @package modelo
*/

/**
* Interface com as operações que podem ser realizadas no BD relacionadas a Usuario
*
* @author Cláudio Rodolfo S. de Oliveira
* @version Versão Inicial June 05, 2023
*/
interface INotaDAO {

	/**
	* busca por uma Usuario
	* @param Avaliacao $avaliacao objeto POJO de uma Avaliacao
	* @return Nota $nota[] objeto POJO de uma Nota
	*/
	public function buscarNotasAvaliacao($avaliacao);

}
?>