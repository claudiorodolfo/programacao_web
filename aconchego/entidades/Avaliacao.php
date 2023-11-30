<?php
/**
 * @package entidades
 */

/**
 * Classe POJO para mapeamento ORM
 * 
 * @author Cláudio Rodolfo S. de Oliveira
 * @version Versão Inicial May 26, 2023
 */
class Avaliacao {
    private $id;
	private $aluno;
	private $professor;
	private $exame;
	private $papel;
	private $nivel;
	private $observacao;
	private $status;
	private $rascunho;

	public function __construct() {}

	public function getId() {
		return $this->id;
	}
	
	public function setId($id) {
		$this->id = $id;
	}

	public function getAluno() {
		return $this->aluno;
	}
	
	public function setAluno($aluno) {
		$this->aluno = $aluno;
	}

	public function getProfessor() {
		return $this->professor;
	}
	
	public function setProfessor($professor) {
		$this->professor = $professor;
	}

	public function getExame() {
		return $this->exame;
	}
	
	public function setExame($exame) {
		$this->exame = $exame;
	}

	public function getPapel() {
		return $this->papel;
	}
	
	public function setPapel($papel) {
		$this->papel = $papel;
	}

	public function getNivel() {
		return $this->nivel;
	}
	
	public function setNivel($nivel) {
		$this->nivel = $nivel;
	}

	public function getObservacao() {
		return $this->observacao;
	}
	
	public function setObservacao($observacao) {
		$this->observacao = $observacao;
	}
	public function getStatus() {
		return $this->status;
	}
	
	public function setStatus($status) {
		$this->status = $status;
	}

	public function getRascunho() {
		return $this->rascunho;
	}
	
	public function setRascunho($rascunho) {
		$this->rascunho = $rascunho;
	}

	public function imprimir() {
		return print_r($this);
	}
}