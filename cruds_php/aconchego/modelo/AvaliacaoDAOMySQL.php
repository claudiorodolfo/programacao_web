<?php
/**
 * @package model
 */
require_once '../entidades/Usuario.php';
require_once '../entidades/Avaliacao.php';
require_once 'interfaces/IAvaliacaoDAO.php';
require_once 'conexoes/ConexaoMySQL.php';
require_once 'util/Auxiliar.php';

/**
 * Classe com a implementação das operações que podem ser realizadas no BD
 * 
 * @author Cláudio Rodolfo S. de Oliveira
 * @version Versão Inicial May 25, 2023
 */
class AvaliacaoDAOMySQL implements IAvaliacaoDAO {

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
	* Busca uma Avaliacao especifica no banco de dados MySQL
	* @param Avaliacao $avaliacao objeto POJO de uma Avaliacao
	* @return Avaliacao
	*/	
	public function buscarAvaliacaoAluno($avaliacao) {
		/** @var string $sql contém a instrução SQL a ser executada no BD */
		$sql = "SELECT aluno.nome as aluno, professor.nome as professor, Avaliacao.nivel, Avaliacao.status, Avaliacao.observacao " .
				"FROM Avaliacao, Usuario aluno, Usuario professor " .
				"WHERE Avaliacao.aluno = aluno.id and Avaliacao.professor = professor.id and ". 
				"Avaliacao.id = {$avaliacao->getId()}";	
		//print $sql;
		$dados = mysqli_query($this->conexao, $sql);
		if (mysqli_num_rows($dados) > 0) {
			$linha = mysqli_fetch_array($dados);
			
		 	$avaliacao->setAluno($linha['aluno']);
		 	$avaliacao->setProfessor($linha['professor']); 
		 	$avaliacao->setNivel($linha['nivel']);
		 	$avaliacao->setObservacao($linha['observacao']);
		 	$avaliacao->setStatus($linha['status']);
		 }	
		return $avaliacao;
	}
	
    /**
	* Busca as Avaliações feitas por uma aluno especifico no banco de dados MySQL
	* @param Aluno $aluno objeto POJO de Aluno
	* @return Avaliacao[]
	*/	
	public function buscarPorAluno($aluno) {
		/** @var string $sql contém a instrução SQL a ser executada no BD */	
        $sql = "SELECT exame, papel, Avaliacao.id " .
                "FROM Usuario, Avaliacao " .
                "WHERE Usuario.id = Avaliacao.aluno and Avaliacao.rascunho = 0 and " .
				"Usuario.id = {$aluno->getId()} " .
                "ORDER BY exame desc";
		//print $sql;
		$dados = mysqli_query($this->conexao, $sql);
		/** @var array é um vetor de Exames */
		$array = [];
		/** @var quantidade é o número de registros retornados do BD */
		$quantidade = mysqli_num_rows($dados);
		for($i = 0; $i < $quantidade; $i++) {
			$linha = mysqli_fetch_array($dados);
			$avaliacao = new Avaliacao();
			
			$avaliacao->setId($linha['id']);	
			$avaliacao->setExame($linha['exame']);
			$avaliacao->setPapel($linha['papel']); 
			
			$avaliacao->setExame($this->auxiliar->dataColocaMascara($avaliacao->getExame()));
			
			$array[$i] = $avaliacao;
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