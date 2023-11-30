<?php
/**
 * @package modelo
 */

/**
 * Classe para conexão com BD MySQL. Ela utiliza o Padrão de Projeto Singleton
 * 
 * @author Cláudio Rodolfo S. de Oliveira
 * @version Versão Inicial May 18, 2023
 */ 
class ConexaoMySQL {

	/** @var ConexaoMySQL $instancia é uma referência a esta própria classe */
	private static $instancia;
	/** @var Resource $conexao é um ponteiro para um conexão com o BD MySQL */
	private $conexao;
	
   /**
	* Cria uma conexão específica com um BD MySQL
	*/
    private function __construct() {
		$dados = file_get_contents("../modelo/conexoes/bd.json");
		 $json = json_decode($dados);
		$this->conexao = mysqli_connect($json->hostname,$json->username,$json->password,$json->schema);
		mysqli_set_charset($this->conexao,"utf8");
	}
	
   /**
	* Cria uma instância ou retorna uma instância, se já existir, dessa classe
	* @return ConexaoMySQL
	*/
 	public static function getInstance() {
        if (!isset(self::$instancia)) {
        	self::$instancia = new ConexaoMySQL();
        }
        return self::$instancia;
 	}

   /**
	* Retorna um ponteiro para um conexão com o BD MySQL
	* @return Resource 
	*/
	public function getConexao() {
		return $this->conexao;
	}
	
   /**
	* Desconecta do BD MySQL
	*/
	public function desconectar() {
		mysqli_close($this->conexao);
	}
}
?>