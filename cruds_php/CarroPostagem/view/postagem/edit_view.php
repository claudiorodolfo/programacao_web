<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Cadastrar Postagem</title>
    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
        <?php
            require_once '../../entities/Postagem.php' ;

            $postagem = new Postagem();
            session_start();
            if (isset($_SESSION["operacao"]) && $_SESSION["operacao"] == "atualizacao_postagem") {
              $postagem = unserialize($_SESSION['postagem']);
              session_destroy();
            }
        ?>
              <form method="post" action="../../controller/rotasPostagem.php">
                  <input type="hidden" name="acao" value="salvar">
                  <input type="hidden" name="id" id="id" value="<?php echo $postagem->getId() ?>">
					<h1>Cadastro de Postagens</h1>
					<br>
                  <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $postagem->getTitulo() ?>">
                  </div>
                  <div class="form-group">
                    <label for="categoria">Categoria</label>
                    <select class="form-control" id="categoria" name="categoria">
                      <option value="PHP" <?php echo ($postagem->getCategoria() == 'PHP') ? 'selected':''; ?>>PHP</option>
                      <option value="Python" <?php echo ($postagem->getCategoria() == 'Python') ? 'selected':''; ?>>Python</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" id="descricao" name="descricao" value="<?php echo $postagem->getDescricao() ?>">
                  </div>
                  <div class="form-group">
                    <label for="conteudo">Conteúdo</label>
                    <textarea class="form-control" id="conteudo" rows="3" name="conteudo"><?php echo $postagem->getConteudo() ?></textarea>
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