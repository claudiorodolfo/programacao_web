<?php
/**
 * @package controller
 */
	require_once '../entities/Carro.php';
	require_once 'CarroController.php';

/**
 * Arquivo de rotas
 * 
 * @author Cláudio Rodolfo S. de Oliveira
 * @version Versão Inicial
 */

function salvaArquivo($data, $nomeArquivo) {
	//só aceita arquivo ".jpg" menor que "20 KB".
	if ((($data["imagem"]["type"] == "image/jpeg") || ($data["imagem"]["type"] == "image/pjpeg")) && 
			($data["imagem"]["size"] < 20000)) {
		move_uploaded_file($data["imagem"]["tmp_name"], "../model/imagens_carros/" . $nomeArquivo);	
	} else {
		print "alert('Verifique a extensão ou o tamanho do arquivo e tente novamente');";
		header("Location: ../view/carro/edit_view.php");
	}
}

/** @var String $_POST['acao'] define a ação que o usuário deseja executar no CRUD */
if (isset($_POST['acao'])) {
    /** @var CarroController $controller permite chamar os métodos do controlador */
    $controller = new CarroController();

    switch ($_POST['acao']) {
        case 'salvar':
			salvaArquivo($_FILES, ($_POST['id'].".jpg"));
            $controller->salvar($_POST, $_FILES);
            header("Location: ../view/carro/index.php");
            break;
			/*
        case 'apagar':
            $controller->apagar($_POST['id']);
            header("Location: ../view/carro/index.php");
            break;
			*/
        case 'buscar_detalhe':
            $p = $controller->buscar($_POST['id']);
            session_start();
            $_SESSION['carro'] = serialize($p);
            header("Location: ../view/carro/mostrar_view.php");
            break;
			/*
        case 'buscar_edicao':
            $p = $controller->buscar($_POST['id']);
            session_start();
            $_SESSION['operacao'] = "atualizacao_carro";
            $_SESSION['carro'] = serialize($p);
            header("Location: ../view/carro/edit_view.php");
            break;
			*/
        case 'buscar_todos':
            $array = $controller->buscarTodos();
            session_start();
            $_SESSION['array_carro'] = serialize($array);
            header("Location: ../view/carro/mostrartodos_view.php");
            break;
        default:
    }
}
?>