<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Cadastrar Carro</title>
    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
        <?php
		/*
            require_once '../../entities/Carro.php' ;

            $carro = new Carro();
            session_start();
            if (isset($_SESSION["operacao"]) && $_SESSION["operacao"] == "atualizacao_carro") {
              $carro = unserialize($_SESSION['carro']);
              session_destroy();
            }
			*/
        ?>
              <form method="post" action="../../controller/rotasCarro.php" enctype="multipart/form-data">
                  <input type="hidden" name="acao" value="salvar">
					<h1>Cadastro de Carros</h1>
					<br>
                  <div class="form-group">
                    <label for="titulo" style="color:red">Renavam*</label>
                    <input type="number" class="form-control" id="id" name="id" required>
                  </div>
                  <div class="form-group">
                    <label for="titulo">Marca</label>
                    <input type="text" class="form-control" id="marca" name="marca">
                  </div>
                  <div class="form-group">
                    <label for="titulo">Modelo</label>
                    <input type="text" class="form-control" id="modelo" name="modelo">
                  </div>
                  <div class="form-group">
                    <label for="titulo">Ano de Fabricação</label>
                    <input type="number" class="form-control" id="ano_fabricacao" name="ano_fabricacao" min="1990" max="2025">
                  </div>
                  <div class="form-group">
                    <label for="titulo">Ano do Modelo</label>
                    <input type="number" class="form-control" id="ano_modelo" name="ano_modelo" min="1990" max="2025">
                  </div>
                  <div class="form-group">
                    <label for="titulo">Imagem</label>
                    <input type="file" class="form-control" id="imagem" name="imagem">
                  </div>
                  <button type="submit" class="btn btn-primary">Salvar</button>
                  <a class="btn btn-danger" href="index.php">Cancelar</a>
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