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
            <?php
                require_once '../../entities/Carro.php' ;
                session_start();
                $p = unserialize($_SESSION['carro']);
                //session_destroy();
            ?>
            <table class='table table-striped table-bordered'>
                <tr>
                    <th>Renavam</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Ano Fabricação</th>
                    <th>Ano Modelo</th>
                    <th>Imagem</th>
                </tr>
                <tr>             
                    <td><?php echo $p->getId() ?></td>
                    <td><?php echo $p->getMarca() ?></td>
                    <td><?php echo $p->getModelo() ?></td>
                    <td><?php echo $p->getAnoFabricacao() ?></td>
                    <td><?php echo $p->getAnoModelo() ?></td>
                    <td><figure>
							<img src="../../model/imagens_carros/<?php echo $p->getImagem() ?>" alt="Imagem do Carro">
						</figure>
					</td>
                </tr>
            </table>
            <a class="btn btn-outline-primary" href="index.php">Voltar</a>
        </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>  
    </body>
</html>