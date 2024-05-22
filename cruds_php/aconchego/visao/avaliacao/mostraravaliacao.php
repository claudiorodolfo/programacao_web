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
    <!--Programador-->
    <title>Feedback</title>          
  </head> 
  <body>
  <?php        
      session_start();
      require_once '../../entidades/Usuario.php' ; 
      require_once '../../entidades/Nota.php' ; 
      require_once '../../entidades/Avaliacao.php' ; 

      //$user = unserialize($_SESSION['login']);
      $avaliacao = unserialize($_SESSION['avaliacao']);
      $arrayNota = unserialize($_SESSION['array_nota']);
    ?>   
  <br>
  <a class="btn btn-outline-primary" href="mostrartodosaluno.php">Voltar</a>
  <a class="btn btn-outline-primary" href="../../index.php">Sair</a>
  <br><br>
      <div style="text-align: center" <?= ($avaliacao->getStatus() == 'Aprovado')? 'class="alert alert-success"':'class="alert alert-warning"'; ?> role="alert">
        <?= $avaliacao->getStatus(); ?>
      </div>
      <br>
    <table class="table table-bordered align-middle">
        <tr>
            <td style="text-align: center" colspan="8">FEEDBACK</td>
        </tr>
        <tr>
            <td style="text-align: center" colspan="5" rowspan="2"><?= $avaliacao->getNivel(); ?></td>
            <td style="text-align: center" colspan="3">DATA</td>         
        </tr> 
        <tr>
            <td style="text-align: center" colspan="3"><?= $avaliacao->getExame(); ?></td>
        </tr>
        <tr>
            <td colspan="8"></td>
        </tr>
        <tr>
            <td colspan="2">Nome</td>
            <td colspan="6"><?= $avaliacao->getAluno(); ?></td>
        </tr>
        <tr>
            <td colspan="2">Examinador</td>
            <td colspan="6"><?= $avaliacao->getProfessor(); ?></td>
        </tr>       
        <tr>
            <td colspan="8"></td>
        </tr>
        <tr>
        <td style="text-align: center" colspan="4" <?= ($avaliacao->getPapel() == 'Condutor')? 'class="table-primary"': ''; ?>>CONDUTOR(A)</td>
            <td style="text-align: center" colspan="4" <?= ($avaliacao->getPapel() == 'Conduzido')? 'class="table-primary"': ''; ?>>CONDUZIDA(O)</td>           
        </tr> 
        <?php
            $velocidade = "";
            foreach($arrayNota as $nota) {
              if ($velocidade != $nota->getVelocidade()) {
                $velocidade = $nota->getVelocidade();
        ?>
        <tr>
            <td style="text-align: center" colspan="8"><?= $nota->getVelocidade(); ?></td>
        </tr> 
          <?php
              }
          ?>
        <tr>
            <td colspan="3"><?= $nota->getQuesito(); ?></td>
            <td style="text-align: center" <?= ($nota->getNota() == '1')? 'class="table-primary"': ''; ?>>1</td>
            <td style="text-align: center" <?= ($nota->getNota() == '2')? 'class="table-primary"': ''; ?>>2</td>
            <td style="text-align: center" <?= ($nota->getNota() == '3')? 'class="table-primary"': ''; ?>>3</td>
            <td style="text-align: center" <?= ($nota->getNota() == '4')? 'class="table-primary"': ''; ?>>4</td>
            <td style="text-align: center" <?= ($nota->getNota() == '5')? 'class="table-primary"': ''; ?>>5</td>
        </tr> 
        <?php
            }
        ?>     
    </table>
    <div class="card">
      <div class="card-body">    
        <p class="card-text">
        <?= $avaliacao->getObservacao(); ?>
        </p>    
      </div>
    </div>
  </body>
</html>