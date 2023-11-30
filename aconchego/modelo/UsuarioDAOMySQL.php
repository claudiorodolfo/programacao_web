<?php
/**
 * @package model
 */
require_once '../entidades/Usuario.php';
require_once 'interfaces/IUsuarioDAO.php';
require_once 'conexoes/ConexaoMySQL.php';
require_once 'util/Auxiliar.php';

/**
 * Classe com a implementação das operações que podem ser realizadas no BD
 * 
 * @author Cláudio Rodolfo S. de Oliveira
 * @version Versão Inicial May 18, 2023
 */
class UsuarioDAOMySQL implements IUsuarioDAO {

	/** @var Resource $conexao é um ponteiro para um conexão com o BD MySQL */
	private $conexao;
	/** @var ConexaoMySQL $mysqlDB é uma instância da classe de manipulação da conexão com o BD */
	private static $mysqlDB;
	/** @var Auxiliar $auxiliar objeto da Classe de Métodos auxiliares */
	private $auxiliar;

   /**
	* Cria uma instância do banco e realiza a conexão.
	*/
	public function __construct() {
		self::$mysqlDB = ConexaoMySQL::getInstance();
		$this->conexao = self::$mysqlDB->getConexao();

		$this->auxiliar = new Auxiliar();
	}

	/**
	* Autentica um Usuario  no banco de dados MySQL
	* @param Usuario $usuario objeto POJO de uma Usuario
	* @return Usuario
	*/	
	public function autenticar($item) {
		/** @var string $sql contém a instrução SQL a ser executada no BD */
		$sql = "SELECT * " .
				"FROM Usuario " .
				"WHERE email = \"{$item->getEmail()}\" and senha = \"{$item->getSenha()}\"";
		//print $sql;
		$usuario;
		$dados = mysqli_query($this->conexao, $sql);
		if (mysqli_num_rows($dados) > 0) {
			$linha = mysqli_fetch_array($dados);
			$usuario = new Usuario();
			$usuario->setId($linha['id']);
			$usuario->setNome($linha['nome']);
			$usuario->setEmail($linha['email']);       
			$usuario->setCpf($linha['cpf'] ?? "");
			$usuario->setDataNascimento($linha['dataNascimento'] ?? "");
			$usuario->setTelefone($linha['telefone'] ?? "");
			$usuario->setEndereco($linha['endereco'] ?? "");     
			$usuario->setNivelCondutor($linha['nivelCondutor'] ?? "");
			$usuario->setNivelConduzido($linha['nivelConduzido'] ?? "");
			$usuario->setTipo($linha['tipo']);
			$usuario->setEstaAtivo($linha['estaAtivo']);
			$usuario->setFoto($linha['id'] . ".jpg");

			$usuario->setCpf($this->auxiliar->cpfColocaMascara($usuario->getCpf()));
			$usuario->setTelefone($this->auxiliar->telefoneColocaMascara($usuario->getTelefone()));
			$usuario->setDataNascimento($this->auxiliar->dataColocaMascara($usuario->getDataNascimento()));
		}	
		return $usuario;
	}

   /**
	* Insere um novo Usuario no banco de dados MySQL
	* @param Usuario $usuario objeto POJO de um Usuario
	* @return void
	*/
	public function criar($item) {
		$item->setCpf($this->auxiliar->cpfRemoveMascara($item->getCpf()));
		$item->setTelefone($this->auxiliar->telefoneRemoveMascara($item->getTelefone()));
		$item->setDataNascimento($this->auxiliar->dataRemoveMascara($item->getDataNascimento()));
		$item->setSenha(md5($item->getSenha()));

		/** @var string $sql contém a instrução SQL a ser executada no BD */
		$sql = "INSERT INTO Usuario (nome, email, cpf, dataNascimento, telefone, endereco, nivelCondutor, nivelConduzido, tipo, estaAtivo, senha) values (" .
				"\"{$item->getNome()}\"," .
				"\"{$item->getEmail()}\"," .
				"\"{$item->getCpf()}\"," .
				"\"{$item->getDataNascimento()}\"," .
				"\"{$item->getTelefone()}\"," .
				"\"{$item->getEndereco()}\"," .
				"\"{$item->getNivelCondutor()}\"," .
				"\"{$item->getNivelConduzido()}\"," .
				"\"{$item->getTipo()}\"," .
				"{$item->getEstaAtivo()}," .
				"\"{$item->getSenha()}\"" .
			")";
		//print $sql;
		mysqli_query($this->conexao, $sql);
	}

   /**
	* Apaga um Usuario no banco de dados MySQL
	* @param Usuario $usuario objeto POJO de um Usuario
	* @return void
	*/
	public function apagar($item) {
		/** @var string $sql contém a instrução SQL a ser executada no BD */
		$sql = "DELETE FROM Usuario where id = {$item->getId()}";
		//print $sql;
		mysqli_query($this->conexao, $sql);
	}

   /**
	* Modifica os atributos de uma Usuario no banco de dados MySQL
	* @param Usuario $Usuario objeto POJO de uma Usuario
	* @return void
	*/	
	public function atualizar($item) {
		$item->setCpf($this->auxiliar->cpfRemoveMascara($item->getCpf()));
		$item->setTelefone($this->auxiliar->telefoneRemoveMascara($item->getTelefone()));
		$item->setDataNascimento($this->auxiliar->dataRemoveMascara($item->getDataNascimento()));
		//$item->setSenha(md5($item->getSenha()));

		/** @var string $sql contém a instrução SQL a ser executada no BD */
		$sql = "UPDATE Usuario SET " .
				"nome = \"{$item->getNome()}\"," . 
				"email = \"{$item->getEmail()}\"," .
				"cpf = \"{$item->getCpf()}\"," .
				"dataNascimento = \"{$item->getDataNascimento()}\"," .
				"telefone = \"{$item->getTelefone()}\"," .
				"endereco = \"{$item->getEndereco()}\"," .
				"nivelCondutor = \"{$item->getNivelCondutor()}\"," .
				"nivelConduzido = \"{$item->getNivelConduzido()}\", " .
				"tipo = \"{$item->getTipo()}\", " .		
				"estaAtivo = {$item->getEstaAtivo()} " .	
				//"senha = \"{$item->getSenha()). "\" " .		      
				"WHERE id = {$item->getId()}";
		//print $sql;
		mysqli_query($this->conexao, $sql);
	}

   /**
	* Busca uma Usuario especifica no banco de dados MySQL
	* @param Usuario $usuario objeto POJO de uma Usuario
	* @return Usuario
	*/	
	public function buscar($item) {
		/** @var string $sql contém a instrução SQL a ser executada no BD */
		$sql = "SELECT * " .
				"FROM Usuario " .
				"WHERE id = {$item->getId()}";
		//print $sql;
		$usuario;
		$dados = mysqli_query($this->conexao, $sql);
		if (mysqli_num_rows($dados) > 0) {
			$linha = mysqli_fetch_array($dados);
			$usuario = new Usuario();
			$usuario->setId($linha['id']);
			$usuario->setNome($linha['nome']);
			$usuario->setEmail($linha['email']);       
			$usuario->setCpf($linha['cpf'] ?? "");
			$usuario->setDataNascimento($linha['dataNascimento'] ?? "");
			$usuario->setTelefone($linha['telefone'] ?? "");
			$usuario->setEndereco($linha['endereco'] ?? "");     
			$usuario->setNivelCondutor($linha['nivelCondutor'] ?? "");
			$usuario->setNivelConduzido($linha['nivelConduzido'] ?? "");
			$usuario->setTipo($linha['tipo']);
			$usuario->setEstaAtivo($linha['estaAtivo']);
			$usuario->setFoto($linha['id'] . ".jpg");

			$usuario->setCpf($this->auxiliar->cpfColocaMascara($usuario->getCpf()));
			$usuario->setDataNascimento($this->auxiliar->dataColocaMascara($usuario->getDataNascimento()));
			$usuario->setTelefone($this->auxiliar->telefoneColocaMascara($usuario->getTelefone()));
		}	
		return $usuario;
	}	

   /**
	* Busca todas as Usuario no banco de dados MySQL
	* @return Usuario[]
	*/
	public function buscarTodos() {
		/** @var string $sql contém a instrução SQL a ser executada no BD */	
		$sql = "SELECT id, nome, tipo " .
				"FROM Usuario " . 
				"WHERE tipo <> 'Admin' " . 
				"ORDER BY tipo, nome";
		//print $sql;
		$dados = mysqli_query($this->conexao, $sql);
		/** @var array é um vetor de Usuario */
		$array = [];
		/** @var quantidade é o número de registros retornados do BD */
		$quantidade = mysqli_num_rows($dados);
		for($i = 0; $i < $quantidade; $i++) {
			$linha = mysqli_fetch_array($dados);
			$usuario = new Usuario();
			$usuario->setId($linha['id']);
			$usuario->setNome($linha['nome']);           
			$usuario->setTipo($linha['tipo']);
			$array[$i] = $usuario;
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