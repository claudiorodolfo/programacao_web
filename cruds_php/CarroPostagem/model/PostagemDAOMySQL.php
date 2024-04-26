<?php
/**
 * @package model
 */
require_once '../entities/Postagem.php';
require_once 'interfaces/IPostagemDAO.php';
require_once 'connections/ConexaoMySQL.php';

/**
 * Classe com a implementação das operações que podem ser realizadas no BD
 * 
 * @author Cláudio Rodolfo S. de Oliveira
 * @version Versão Inicial
 */
class PostagemDAOMySQL implements IPostagemDAO {

	/** @var Resource $conexao é um ponteiro para um conexão com o BD MySQL */
	private $conexao;
	/** @var ConexaoMySQL $mysqlDB é uma instância da classe de manipulação da conexão com o BD */
	private static $mysqlDB;

   /**
	* Cria uma instância do banco e realiza a conexão.
	*/
	public function __construct() {
		self::$mysqlDB = ConexaoMySQL::getInstance();
		$this->conexao = self::$mysqlDB->getConexao();
	}

   /**
	* Insere uma nova postagem no banco de dados MySQL
	* @param Postagem $postagem objeto POJO de uma postagem
	* @return void
	*/
	public function criar($postagem) {
		/** @var string $sql contém a instrução SQL a ser executada no BD */
		$sql = "INSERT INTO postagem (titulo, descricao, categoria, conteudo) values (" .
				"\"{$postagem->getTitulo()}\"," .
				"\"{$postagem->getDescricao()}\"," .
				"\"{$postagem->getCategoria()}\"," .
				"\"{$postagem->getConteudo()}\"" .
			")";
		//print $sql;
		mysqli_query($this->conexao, $sql);
	}

   /**
	* Apaga uma determinada postagem no banco de dados MySQL
	* @param Postagem $postagem objeto POJO de uma postagem
	* @return void
	*/
	public function apagar($postagem) {
		/** @var string $sql contém a instrução SQL a ser executada no BD */
		$sql = "DELETE FROM postagem where id = {$postagem->getId()}";
		//print $sql;
		mysqli_query($this->conexao, $sql);
	}

   /**
	* Modifica os atributos de uma postagem no banco de dados MySQL
	* @param Postagem $postagem objeto POJO de uma postagem
	* @return void
	*/	
	public function atualizar($postagem) {
		/** @var string $sql contém a instrução SQL a ser executada no BD */
		$sql = "UPDATE postagem SET ".
		"titulo    =\"{$postagem->getTitulo()}\"," . 
		"descricao =\"{$postagem->getDescricao()}\"," .
		"categoria =\"{$postagem->getCategoria()}\"," .
		"conteudo  = \"{$postagem->getConteudo()}\" " .
		" where id = {$postagem->getId()}";
		//print $sql;
		mysqli_query($this->conexao, $sql);
	}

   /**
	* Busca uma postagem especifica no banco de dados MySQL
	* @param Postagem $postagem objeto POJO de uma postagem
	* @return Postagem
	*/	
	public function buscar($postagem) {
		/** @var string $sql contém a instrução SQL a ser executada no BD */
		$sql = "SELECT * FROM postagem WHERE id = {$postagem->getId()}";
		//print $sql;
		$p;
		$dados = mysqli_query($this->conexao, $sql);
		if (mysqli_num_rows($dados) > 0) {
			$linha = mysqli_fetch_array($dados);
			$p = new Postagem();
			$p->setId($linha['id']);
			$p->setTitulo($linha['titulo'] ?? "");
			$p->setDescricao($linha['descricao'] ?? "");
			$p->setCategoria($linha['categoria'] ?? "");
			$p->setConteudo($linha['conteudo'] ?? "");
		}	
		return $p;
	}	

   /**
	* Busca todas as postagem no banco de dados MySQL
	* @return Postagem[]
	*/
	public function buscarTodos() {
		/** @var string $sql contém a instrução SQL a ser executada no BD */	
		$sql = "SELECT id, titulo, descricao, categoria FROM postagem";
		//print $sql;
		$dados = mysqli_query($this->conexao, $sql);
		/** @var array é um vetor de Postagem */
		$array = [];
		/** @var quantidade é o número de registros retornados do BD */
		$quantidade = mysqli_num_rows($dados);

		for($i = 0; $i < $quantidade; $i++) {
			$linha = mysqli_fetch_array($dados);
			$p = new Postagem();
			$p->setId($linha['id']);
			$p->setTitulo($linha['titulo'] ?? "");
			$p->setDescricao($linha['descricao'] ?? "");
			$p->setCategoria($linha['categoria'] ?? "");

			$array[$i] = $p;			
		}
		return $array;
	}

   /**
	* Desconecta do BD
	*/
	public function __destruct() {
		self::$mysqlDB->desconectar();
	}
}
?>