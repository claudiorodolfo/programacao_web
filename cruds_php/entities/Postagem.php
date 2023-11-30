<?php
/**
 * @package entities
 */

/**
 * Classe POJO para mapeamento ORM
 * 
 * @author Cláudio Rodolfo S. de Oliveira
 * @version Versão Inicial
 */
class Postagem {

    private $id;
	private $titulo;
	private $descricao;
	private $categoria;
	private $conteudo;
	
	public function __construct() {}

	public function getId() {
		return $this->id;
	}
	
	public function setId($id) {
		$this->id = $id;
	}

	public function getTitulo() {
		return $this->titulo;
	}
	
	public function setTitulo($titulo) {
		$this->titulo = $titulo;
	}
	
	public function getDescricao() {
		return $this->descricao;
	}
	
	public function setDescricao($descricao) {
		$this->descricao = $descricao;
	}

	public function getCategoria() {
		return $this->categoria;
	}
	
	public function setCategoria($categoria) {
		$this->categoria = $categoria;
	}

	public function getConteudo() {
		return $this->conteudo;
	}
	
	public function setConteudo($conteudo) {
		$this->conteudo = $conteudo;
	}
	
	public function imprimir() {
		return print_r($this);
	}
}
?>