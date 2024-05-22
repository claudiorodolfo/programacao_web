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
    <title>Controle de Usuários</title>    
    <script src="js/script.js"></script>        
  </head> 
  <body>
    <?php        
      session_start();
      require_once '../../entidades/Usuario.php' ;
      $login = unserialize($_SESSION['login']);
      if($login) {   
        if ($login->getTipo() === "Admin")  { //posso mostrar a página
          $item = unserialize($_SESSION['usuario']);
          //session_destroy();
    ?>
    <div class="container">
      <br>      
      <a class="btn btn-outline-primary" href="mostrartodos.php">Voltar</a>
      <br><br>
      <table class='table table-striped table-bordered'>
        <tr>
          <th>Id</th>
        </tr>
        <tr>             
          <td><?= $item->getId(); ?></td>
        </tr>          
        <tr>
          <th>Nome</th>
        </tr>
        <tr>             
          <td><?= $item->getNome(); ?></td>
        </tr>          
        <tr>
          <th>Email</th>
        </tr>
        <tr>             
          <td><?= $item->getEmail(); ?></td>
        </tr>          
        <tr>
          <th>CPF</th>
        </tr>
        <tr>             
          <td><?= $item->getCpf(); ?></td>
        </tr>          
        <tr>
          <th>Data de Nascimento</th>
        </tr>
        <tr>             
          <td><?= $item->getDataNascimento(); ?></td>
        </tr>          
        <tr>
          <th>Telefone</th>
        </tr>
        <tr>             
          <td><?= $item->getTelefone(); ?></td>
        </tr>          
        <tr>
          <th>Endereço</th>
        </tr>
        <tr>             
          <td><?= $item->getEndereco(); ?></td>
        </tr>          
        <tr>
          <th>Nível Condutor(a)</th>
        </tr>
        <tr>             
          <td><?= $item->getNivelCondutor(); ?></td>
        </tr>          
        <tr>
          <th>Nível Conduzido(a)</th>
        </tr>
        <tr>             
          <td><?= $item->getNivelConduzido(); ?></td>
        </tr>          
        <tr>
          <th>Tipo</th>
        </tr>
        <tr>             
          <td><?= $item->getTipo(); ?></td>
        </tr>          
        <tr>
          <th>Foto</th>
        </tr>
        <tr>             
          <td><?= $item->getFoto(); ?></td>
        </tr>          
        <tr>
          <th>Ativo</th>
        </tr>
        <tr>             
          <td><?= ($item->getEstaAtivo() == '0') ? 'Não': 'Sim'; ?></td>
        </tr>          
      </table>      
    </div>
    <?php    
        } else { //usuario não autorizado
          header("Location: ../proibido.php");
        }
      
      } else { //redireciona pra tela de login
        header("Location: ../index.php");
      }
    ?>
  </body>
</html>