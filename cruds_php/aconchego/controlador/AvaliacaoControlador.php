<?php
/**
 * @package controlador
 */
    require_once '../entidades/Usuario.php';
    require_once '../entidades/Avaliacao.php';
	require_once '../modelo/AvaliacaoDAOMySQL.php';

/**
 * Classe que faz interface entre camada Visão e Modelo
 * 
 * @author Cláudio Rodolfo S. de Oliveira
 * @version Versão Inicial May 25, 2023
 */
class AvaliacaoControlador {

	/** @var AvaliacaoDAOMySQL $dao realiza operações no BD MySQL */
    private $dao;

   /**
	* Instancia @var AvaliacaoDAOMySQL $dao como UsuarioDAOMySQL
	*/
    public function __construct() {
        $this->dao = new AvaliacaoDAOMySQL();
    }

   /**
	* Busca um registro do BD
	* @param Usuario $aluno é o identificador do registro que será buscado
	* @return Avaliacao[]
	*/
    public function buscarPorAluno($aluno) {
        return $this->dao->buscarPorAluno($aluno);
    }

    /**
	* Busca um registro do BD
	* @param Avaliacao $avaliacao é o identificador do registro que será buscado
	* @return Avaliacao
	*/
    public function buscarAvaliacaoAluno($avaliacao) {
        return $this->dao->buscarAvaliacaoAluno($avaliacao);
    }

   /**
	* Busca todos os Usuarios do BD
	* @return Avaliacao[]
	*/
    public function buscarTodos() {
      //  return $this->dao->buscarTodos();
    }
}