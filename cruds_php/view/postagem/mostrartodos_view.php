<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Controle de Postagens</title>
        <script src="js/script.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <br><br>
            <a class="btn btn-outline-primary" href="edit_view.php">Nova Postagem</a>
            <br><br>
            <table class='table table-striped table-bordered'>
                <tr>
                    <th>Título</th>
                    <th>Categoria</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
                <?php
                    require_once '../../entities/Postagem.php' ;
                    session_start();
                    $array = unserialize($_SESSION['array_postagem']);
                  //  session_destroy();
                    foreach($array as $postagem) {
                ?>
                        <tr>
                            <td><?php echo $postagem->getTitulo() ?></td>
                            <td><?php echo $postagem->getCategoria() ?></td>
                            <td><?php echo $postagem->getDescricao() ?></td>
                            <td>
                                <button class="btn btn-info" onclick="buscar(<?php echo $postagem->getId() ?>)">Detalhe</button>
                                <button class="btn btn-primary" onclick="editar(<?php echo $postagem->getId() ?>)">Editar</button>
                                <button class="btn btn-danger" onclick="apagar(<?php echo $postagem->getId() ?>)">Apagar</button>

                            </td>
                        </tr>
                <?php
                    }
                ?>
            </table>
            <form id="form" method="post" action="../../controller/rotasPostagem.php">                                
                <input type="hidden" name="acao" id="acao">
                <input type="hidden" name="id" id="id">
            </form>
        </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>  
    </body>
</html>