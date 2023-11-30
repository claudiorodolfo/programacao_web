<?php
/**
 * @package entidades
 */

/**
 * Classe POJO para mapeamento ORM
 * 
 * @author Cláudio Rodolfo S. de Oliveira
 * @version Versão Inicial May 18, 2023
 */
class Usuario {
    private $id;
	private $nome;
	private $email;
	private $cpf;
	private $dataNascimento;
	private $telefone;
	private $endereco;
	private $nivelCondutor;
	private $nivelConduzido;
	private $foto;
	private $tipo;	
	private $estaAtivo;
    private $senha;

	public function __construct() {}

	public function getId() {
		return $this->id;
	}
	
	public function setId($id) {
		$this->id = $id;
	}

	public function getNome() {
		return $this->nome;
	}
	
	public function setNome($nome) {
		$this->nome = $nome;
	}
	
	public function getEmail() {
		return $this->email;
	}
	
	public function setEmail($email) {
		$this->email = $email;
	}

	public function getCpf() {
		return $this->cpf;
	}
	
	public function setCpf($cpf) {
		$this->cpf = $cpf;
	}

	public function getDataNascimento() {
		return $this->dataNascimento;
	}
	
	public function setDataNascimento($dataNascimento) {
		$this->dataNascimento = $dataNascimento;
	}

	public function getTelefone() {
		return $this->telefone;
	}
	
	public function setTelefone($telefone) {
		$this->telefone = $telefone;
	}
	
	public function getEndereco() {
		return $this->endereco;
	}
	
	public function setEndereco($endereco) {
		$this->endereco = $endereco;
	}

	public function getNivelCondutor() {
		return $this->nivelCondutor;
	}
	
	public function setNivelCondutor($nivelCondutor) {
		$this->nivelCondutor = $nivelCondutor;
	}

	public function getNivelConduzido() {
		return $this->nivelConduzido;
	}
	
	public function setNivelConduzido($nivelConduzido) {
		$this->nivelConduzido = $nivelConduzido;
	}

    public function getFoto() {
		return $this->foto;
	}
	
	public function setFoto($foto) {
		$this->foto = $foto;
	}

    public function getTipo() {
		return $this->tipo;
	}
	
	public function setTipo($tipo) {
		$this->tipo = $tipo;
	}

    public function getEstaAtivo() {
		return $this->estaAtivo;
	}
	
	public function setEstaAtivo($estaAtivo) {
		$this->estaAtivo = $estaAtivo;
	}

    public function getSenha() {
		return $this->senha;
	}
	
	public function setSenha($senha) {
		$this->senha = $senha;
	}

	public function imprimir() {
		return print_r($this);
	}
}