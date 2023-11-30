<?php
/**
 * @package controlador
 */
    require_once '../entidades/Avaliacao.php';
	require_once '../modelo/NotaDAOMySQL.php';

/**
 * Classe que faz interface entre camada Visão e Modelo
 * 
 * @author Cláudio Rodolfo S. de Oliveira
 * @version Versão Inicial June 05, 2023
 */
class NotaControlador {

	/** @var NotaDAOMySQL $dao realiza operações no BD MySQL */
    private $dao;

   /**
	* Instancia @var NotaDAOMySQL $dao como UsuarioDAOMySQL
	*/
    public function __construct() {
        $this->dao = new NotaDAOMySQL();
    }

    /**
	* Busca um registro do BD
	* @param Avaliacao $avaliacao é o identificador do registro que será buscado
	* @return Nota[]
	*/
    public function buscarNotasAvaliacao($avaliacao) {
        return $this->dao->buscarNotasAvaliacao($avaliacao);
    }
}