<?php
/**
 * @package entidades
 */

/**
 * Classe POJO para mapeamento ORM
 * 
 * @author Cláudio Rodolfo S. de Oliveira
 * @version Versão Inicial May 25, 2023
 */
class Nota {
    private $idAvaliacao;
	private $velocidade;
	private $quesito;
	private $nota;

	public function __construct() {}

	public function getIdAvaliacao() {
		return $this->idAvaliacao;
	}
	
	public function setIdAvaliacao($idAvaliacao) {
		$this->idAvaliacao = $idAvaliacao;
	}

	public function getVelocidade() {
		return $this->velocidade;
	}
	
	public function setVelocidade($velocidade) {
		$this->velocidade = $velocidade;
	}

	public function getQuesito() {
		return $this->quesito;
	}
	
	public function setQuesito($quesito) {
		$this->quesito = $quesito;
	}

	public function getNota() {
		return $this->nota;
	}
	
	public function setNota($nota) {
		$this->nota = $nota;
	}

	public function imprimir() {
		return print_r($this);
	}
}