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
class Carro {

	private $id;
    private $marca;
	private $modelo;
	private $anoFabricacao;
	private $anoModelo;
	private $imagem;
	
	public function __construct() {}

	public function getId() {
		return $this->id;
	}
	
	public function setId($id) {
		$this->id = $id;
	}

	public function getMarca() {
		return $this->marca;
	}
	
	public function setMarca($marca) {
		$this->marca = $marca;
	}
	
	public function getModelo() {
		return $this->modelo;
	}
	
	public function setModelo($modelo) {
		$this->modelo = $modelo;
	}

	public function getAnoFabricacao() {
		return $this->anoFabricacao;
	}
	
	public function setAnoFabricacao($anoFabricacao) {
		$this->anoFabricacao = $anoFabricacao;
	}

	public function getAnoModelo() {
		return $this->anoModelo;
	}
	
	public function setAnoModelo($anoModelo) {
		$this->anoModelo = $anoModelo;
	}

	public function getImagem() {
		return $this->imagem;
	}
	
	public function setImagem($imagem) {
		$this->imagem = $imagem;
	}
	
	public function imprimir() {
		return print_r($this);
	}
}
?>