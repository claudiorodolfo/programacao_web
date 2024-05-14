<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <!-- JQuery JS -->  
    <script src="https://code.jquery.com/jquery-3.7.0.slim.min.js" integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script>    
    <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Programador -->
    <title>Avaliacões do Aluno</title>    
    <script src="js/script.js"></script>        
  </head> 
  <body>
  <?php        
      session_start();
      require_once '../../entidades/Avaliacao.php' ;     
  ?>  
      <form id="form" method="post" action="../../controlador/rotasAvaliacao.php">
        <input type="hidden" name="acao" id="acao" />
        <input type="hidden" name="indiceArray" id="indiceArray" value=1 />  
      </form>  
  <div class="container">
    <br><br>
    <table class='table table-striped table-bordered'>
      <tr>
        <th style="text-align: center">Avaliação - Função</th>
      </tr>
      <?php   
        $array = unserialize($_SESSION['array_avaliacao']);
         if (!$array) {
          print "<script type='text/javascript'>buscarPorAluno();</script>";
         }

        $i = 0;
        foreach($array as $item) {
      ?>
          <tr>
            <td style="text-align: center"><a href="javascript:buscarAvaliacaoAluno(<?= $i++; ?>);"><?= $item->getExame() . " - " . $item->getPapel(); ?></a></td>
          </tr>
      <?php
        }
      ?>
      </table>
    </div>       
  </body>
</html>