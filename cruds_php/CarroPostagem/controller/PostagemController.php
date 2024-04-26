<?php
/**
 * @package controller
 */
    require_once '../entities/Postagem.php';
	require_once '../model/PostagemDAOMySQL.php';

/**
 * Classe que faz interface entre camada View e Model
 * 
 * @author Cláudio Rodolfo S. de Oliveira
 * @version Versão Inicial
 */
class PostagemController {

	/** @var PostagemDAOMySQL $dao realiza operações no BD MySQL */
    private $dao;

   /**
	* Instancia @var PostagemDAOMySQL $dao como PostagemDAOMySQL
	*/
    public function __construct() {
        $this->dao = new PostagemDAOMySQL();
    }

   /**
	* Salva uma postagem no BD
	* @param $data é um array $_POST[] com informações da view
	* @return void
	*/
    public function salvar($data) {
        $p = new Postagem();
        $p->setTitulo($data['titulo'] ?? "");
        $p->setDescricao($data['descricao'] ?? "");
        $p->setCategoria($data['categoria'] ?? "");
        $p->setConteudo($data['conteudo'] ?? "");

        if (isset($data['id']) && $data['id']) {
            $p->setId($data['id']);
            $this->dao->atualizar($p);
        } else {
            $this->dao->criar($p);
        }
    }

   /**
	* Apaga uma nova postagem do BD
	* @param Int $id é o identificador do registro que será apagado
	* @return void
	*/
    public function apagar($id) {
        $p = new Postagem();
        $p->setId($id);
        $this->dao->apagar($p);
    }

   /**
	* Busca um registro do BD
	* @param Int $id é o identificador do registro que será buscado
	* @return Postagem
	*/
    public function buscar($id) {
        $p = new Postagem();
        $p->setId($id);
        return $this->dao->buscar($p);
    }

   /**
	* Busca todos os registro do BD
	* @return Postagem[]
	*/
    public function buscarTodos() {
        return $this->dao->buscarTodos();
    }
}
?>