<?php
/**
 * @package controller
 */
    require_once '../entities/Carro.php';
	require_once '../model/CarroDAOFile.php';

/**
 * Classe que faz interface entre camada View e Model
 * 
 * @author Cláudio Rodolfo S. de Oliveira
 * @version Versão Inicial
 */
class CarroController {

	/** @var CarroDAOFile $dao realiza operações no BD Arquivo de Texto */
    private $dao;


   /**
	* Instancia @var CarroDAOFile $dao como CarroDAOFile
	*/
    public function __construct() {
        $this->dao = new CarroDAOFile();
    }

   /**
	* Salva um carro no BD
	* @param $data é um array $_POST[] com informações da view
	* @return void
	*/
    public function salvar($data, $file) {
        $c = new Carro();
        $c->setId($data['id']);
        $c->setMarca($data['marca'] ?? "");
        $c->setModelo($data['modelo'] ?? "");
        $c->setAnoFabricacao($data['ano_fabricacao'] ?? "");
        $c->setAnoModelo($data['ano_modelo'] ?? "");
        $c->setImagem(isset($file['imagem']) ? $data['id'] . ".jpg" : "");
        $this->dao->criar($c);
    }

   /**
	* Apaga um novo carro do BD
	* @param Int $id é o identificador do registro que será apagado
	* @return void
	*/
	/*
    public function apagar($id) {
        $c = new Carro();
        $c->setId($id);
        $this->dao->apagar($c);
    }
	*/
   /**
	* Busca um registro do BD
	* @param Int $id é o identificador do registro que será buscado
	* @return Carro
	*/
    public function buscar($id) {
        $c = new Carro();
        $c->setId($id);	
        return $this->dao->buscar($c);
    }

   /**
	* Busca todos os registro do BD
	* @return Carro[]
	*/
    public function buscarTodos() {
        return $this->dao->buscarTodos();
    }
}
?>