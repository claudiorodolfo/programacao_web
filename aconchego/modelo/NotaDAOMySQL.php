<?php
/**
 * @package model
 */
require_once '../entidades/Avaliacao.php';
 require_once '../entidades/Nota.php';
require_once 'interfaces/INotaDAO.php';
require_once 'conexoes/ConexaoMySQL.php';

/**
 * Classe com a implementação das operações que podem ser realizadas no BD
 * 
 * @author Cláudio Rodolfo S. de Oliveira
 * @version Versão Inicial May 18, 2023
 */
class NotaDAOMySQL implements INotaDAO {

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
	* Busca as Notas de uma Avaliacao especifica no banco de dados MySQL
	* @param Avaliacao $avaliacao objeto POJO de uma Avaliacao
	* @return Nota[]
	*/	
	public function buscarNotasAvaliacao($avaliacao) {
		/** @var string $sql contém a instrução SQL a ser executada no BD */
		$sql = "SELECT avaliacao, velocidade, quesito, nota " .
		"FROM Nota, Parametro " . 
		"WHERE Nota.parametro = Parametro.id and " .
		"avaliacao = {$avaliacao->getId()} " .
		"ORDER BY velocidade";
		//print $sql;
		$array = [];
		$dados = mysqli_query($this->conexao, $sql);
		$quantidade = mysqli_num_rows($dados);
		for($i = 0; $i < $quantidade; $i++) {
			$linha = mysqli_fetch_array($dados);
			$nota = new Nota();
			$nota->setIdAvaliacao($avaliacao->getId());
			$nota->setVelocidade($linha['velocidade']);
			$nota->setQuesito($linha['quesito']);
			$nota->setNota($linha['nota']);       
			$array[$i] = $nota;		
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