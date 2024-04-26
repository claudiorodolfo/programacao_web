<?php
/**
 * @package model
 */
require_once '../entities/Carro.php';
require_once 'interfaces/ICarroDAO.php';
require_once 'connections/ConexaoFile.php';

/**
 * Classe com a implementação das operações que podem ser realizadas no arquivo de texto
 * 
 * @author Cláudio Rodolfo S. de Oliveira
 * @version Versão Inicial
 */
class CarroDAOFile implements ICarroDAO {

	/** @var conexao é um ponteiro para um arquivo de texto */
	private $conexao;
	/** @var mysqlDB é uma instância da classe de manipulação da conexão com o arquivo*/
	private static $fileDB;

   /**
	* Cria uma instância do arquivo e retorna o ponteiro de manipulação.
	*/
	public function __construct() {
		self::$fileDB = ConexaoFile::getInstance();
		$this->conexao = self::$fileDB->getConexao();
	}
	
   /**
	* Insere uma nova Carro no arquivo de texto
	* @param Carro $carro objeto POJO de uma Carro
	* @return void
	*/
	public function criar($carro) {
			
		$linha = $carro->getId()."$#$".
			$carro->getMarca()."$#$".
			$carro->getModelo()."$#$".
			$carro->getAnoFabricacao()."$#$".
			$carro->getAnoModelo()."$#$".
			$carro->getImagem();
		
		if ((filesize("../model/carros.txt") != 0)) {
			$linha = "\r\n". $linha;
		}
		//var_dump($this->conexao);
		fwrite($this->conexao, $linha);
	}

   /**
	* Apaga uma determinada postagem no arquivo de texto
	* @param Carro $carro objeto POJO de um carro
	* @return void
	*/
	/*
	public function apagar($carro) {
		$resultado = "";
		while (!feof($this->conexao)) {
			$linha = fgets($this->conexao);
			$partes = explode("$#$", $linha);
			
			if($partes[0] != $carro->getId()) {
				$resultado .= $linha;
			}
		}
		fwrite($this->conexao, $resultado);		
	}
	*/
   /**
	* Busca uma Carro específica com o id informado
	* @param Carro $Carro objeto POJO de uma Carro
	* @return Carro
	*/
	public function buscar($carro) {
		$c;
		while (!feof($this->conexao)) {
			$linha = fgets($this->conexao);
			$partes = explode("$#$", $linha);
			if($partes[0] == $carro->getId()) {
				$c = new Carro();
				$c->setId($partes[0]);
				$c->setMarca($partes[1]);
				$c->setModelo($partes[2]);
				$c->setAnoFabricacao($partes[3]);
				$c->setAnoModelo($partes[4]);
				$c->setImagem($partes[5]);
			}
		}
		return $c;		
	}

   /**
	* Busca todos os carros do arquivo de texto
	* @return Carro
	*/
	
	//corrigir essa funcao
	public function buscarTodos() {
		$array = [];
		$i = 0;
		if ((filesize("../model/carros.txt") != 0)) {
			while (!feof($this->conexao)) {
				$linha = fgets($this->conexao);
				//print $linha;
				$partes = explode("$#$", $linha);
				$c = new Carro();
				$c->setId($partes[0]);
				$c->setMarca($partes[1]);
				$c->setModelo($partes[2]);
			
				$array[$i] = $c;
				$i++;
			}
		}
		return $array;
	}

   /**
	* Desconecta do arquivo de texto
	*/
	public function __destruct() {
		self::$fileDB->desconectar();
	}
}
?>