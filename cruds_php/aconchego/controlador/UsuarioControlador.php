<?php
/**
 * @package controlador
 */
    require_once '../entidades/Usuario.php';
	require_once '../modelo/UsuarioDAOMySQL.php';

/**
 * Classe que faz interface entre camada Visão e Modelo
 * 
 * @author Cláudio Rodolfo S. de Oliveira
 * @version Versão Inicial May 18, 2023
 */
class UsuarioControlador {

	/** @var UsuarioDAOMySQL $dao realiza operações no BD MySQL */
    private $dao;

   /**
	* Instancia @var UsuarioDAOMySQL $dao como UsuarioDAOMySQL
	*/
    public function __construct() {
        $this->dao = new UsuarioDAOMySQL();
    }

    /**
	* Autentica o Usuario no BD
	* @return Usuario
	*/
    public function autenticar($data) {
        $item = new Usuario();
        $item->setEmail($data['email']);
        $item->setSenha(md5($data['senha'])); 
        return $this->dao->autenticar($item);
    }

   /**
	* Salva uma Usuario no BD
	* @param $data é um array $_POST[] com informações da camada de Visão
	* @return void
	*/
    public function salvar($data) {
        $item = new Usuario();
        $item->setNome($data['nome']);
        $item->setEmail($data['email']);
        $item->setCpf($data['cpf'] ?? "");
        $item->setDataNascimento($data['data_nascimento'] ?? "");
        $item->setTelefone($data['telefone'] ?? "");
        $item->setEndereco($data['endereco'] ?? "");
        $item->setNivelCondutor($data['condutor'] ?? "");
        $item->setNivelConduzido($data['conduzido'] ?? "");
        $item->setTipo($data['tipo']);
        $item->setEstaAtivo($data['esta_ativo']);
        $item->setSenha($data['senha']);  

        if (isset($data['id']) && $data['id']) {
            $item->setId($data['id']);
            $this->dao->atualizar($item);
        } else {
            $this->dao->criar($item);
        }
    }

   /**
	* Apaga um Usuario do BD
	* @param Int $id é o identificador do registro que será apagado
	* @return void
	*/
    public function apagar($id) {
        $item = new Usuario();
        $item->setId($id);
        $this->dao->apagar($item);
    }

   /**
	* Busca um registro do BD
	* @param Int $id é o identificador do registro que será buscado
	* @return Usuario
	*/
    public function buscar($id) {
        $item = new Usuario();
        $item->setId($id);
        return $this->dao->buscar($item);
    }

   /**
	* Busca todos os Usuarios do BD
	* @return Usuario[]
	*/
    public function buscarTodos() {
        return $this->dao->buscarTodos();
    }
}