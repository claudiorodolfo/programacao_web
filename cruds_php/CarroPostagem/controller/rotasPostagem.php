<?php
/**
 * @package controller
 */
	require_once '../entities/Postagem.php';
	require_once 'PostagemController.php';

/**
 * Arquivo de rotas
 * 
 * @author Cláudio Rodolfo S. de Oliveira
 * @version Versão Inicial
 */

/** @var String $_POST['acao'] define a ação que o usuário deseja executar no CRUD */
if (isset($_POST['acao'])) {
    /** @var PostagemController $controller permite chamar os métodos do controlador */
    $controller = new PostagemController();

    switch ($_POST['acao']) {
        case 'salvar':
            $controller->salvar($_POST);
            header("Location: ../view/postagem/index.php");
            break;
        case 'apagar':
            $controller->apagar($_POST['id']);
            header("Location: ../view/postagem/index.php");
            break;
        case 'buscar_detalhe':
            $p = $controller->buscar($_POST['id']);
            session_start();
            $_SESSION['postagem'] = serialize($p);
            header("Location: ../view/postagem/mostrar_view.php");
            break;
        case 'buscar_edicao':
            $p = $controller->buscar($_POST['id']);
            session_start();
            $_SESSION['operacao'] = "atualizacao_postagem";
            $_SESSION['postagem'] = serialize($p);
            header("Location: ../view/postagem/edit_view.php");
            break;
        case 'buscar_todos':
            $array = $controller->buscarTodos();
            session_start();
            $_SESSION['array_postagem'] = serialize($array);
            header("Location: ../view/postagem/mostrartodos_view.php");
            break;
        default:
    }
}
?>