<?php
/**
 * @package model
 */

/**
 * Classe para conexão com arquivo de texto. Ela utiliza o Padrão de Projeto Singleton
 * 
 * @author Cláudio Rodolfo S. de Oliveira
 * @version Versão Inicial
 */ 
class ConexaoFile {

	/** @var ConexaoMySQL $instancia é uma referência a esta própria classe */
	private static $instancia;
	/** @var Resource $conexao é um ponteiro para um conexão com o arquivo de texto */
	private $conexao;
	
   /**
	* Cria uma conexão específica com um arquivo de texto
	*/
    private function __construct() {
		$this->conexao = fopen("../model/carros.txt","a+");
	}
	
   /**
	* Cria uma instância ou retorna uma instância, se já existir, dessa classe
	* @return ConexaoFile
	*/
 	public static function getInstance() {
        if (!isset(self::$instancia)) {
        	self::$instancia = new ConexaoFile();
        }
        return self::$instancia;
 	}
	
   /**
	* Retorna um ponteiro para um arquivo de texto
	* @return Resource 
	*/
	public function getConexao() {
		return $this->conexao;
	}
	
   /**
	* Desconecta do arquivo de texto
	*/
	public function desconectar() {
		fclose($this->conexao);
	}
}
 
?>