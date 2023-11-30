<?php
/**
 * @package controlador
 */
    require_once '../entidades/Usuario.php';
    require_once '../entidades/Avaliacao.php';
    require_once '../entidades/Nota.php';
	require_once 'NotaControlador.php';
	require_once 'AvaliacaoControlador.php';

/**
 * Arquivo de rotas
 * 
 * @author Cláudio Rodolfo S. de Oliveira
 * @version Versão Inicial May 25, 2023
 */

/** @var String $_POST['acao'] define a ação que o usuário deseja executar no CRUD */
if (isset($_POST['acao'])) {
   
    /** @var NotaControlador $controlador permite chamar os métodos de Notas */
    $nControlador = new NotaControlador();
    /** @var AvaliacaoControlador $controlador permite chamar os métodos de Avaliacao */
    $aControlador = new AvaliacaoControlador();

    session_start();   
    switch ($_POST['acao']) {
        case 'buscar_por_aluno':
             $user = unserialize($_SESSION['login']); 
             $array = $aControlador->buscarporAluno($user);
             $_SESSION['array_avaliacao'] = serialize($array);
             header("Location: ../visao/avaliacao/mostrartodosaluno.php");
            break;
        case 'buscar_avaliacao_aluno':
            $arrayAvaliacao = unserialize($_SESSION['array_avaliacao']);
<<<<<<< HEAD
            $indice = $_POST['indice_array'];
            $avaliacao = $arrayAvaliacao[$indice];
           // $avaliacao = $arrayAvaliacao[1];
=======
            $indiceArray = $_POST['indiceArray'];            
            $avaliacao = $arrayAvaliacao[$indiceArray];
>>>>>>> 161879d21d169326f66d0835960c49b5e23693d6
            $avaliacao = $aControlador->buscarAvaliacaoAluno($avaliacao);
            $_SESSION['avaliacao'] = serialize($avaliacao);
            
            $arrayNota = $nControlador->buscarNotasAvaliacao($avaliacao);
            $_SESSION['array_nota'] = serialize($arrayNota);
            
            header("Location: ../visao/avaliacao/mostraravaliacao.php");
            break;
        case 'buscar_todos':
            //  $array = $controlador->buscarTodos();
            // $_SESSION["array_exame"] = serialize($array);        
            //print "<script>location.href='../visao/usuario/mostrartodos.php';</script>";   
            // header("Location: ../visao/exame/mostrartodos.php");
            break;
        default:
    }
}
?>