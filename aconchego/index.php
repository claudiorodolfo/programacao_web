<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
<<<<<<< HEAD
    <meta name="viewport" content="width=device-width, initial-scale=1">
=======
    <meta name="viewport" content="width=device-width, initial-scale=1">  
>>>>>>> 161879d21d169326f66d0835960c49b5e23693d6
    <!-- JQuery JS -->  
    <script src="https://code.jquery.com/jquery-3.7.0.slim.min.js" integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Programador -->
    <title>Autenticação</title>  
    <script src="visao/usuario/js/script.js"></script>          
  </head>
  <body class="p-3 m-0 border-1 bd-example">
    <?php 
    // Apaga todas as variáveis da sessão
    session_start();
    $_SESSION = array();
    session_destroy(); 
    ?>
      <!--Ler cookie e preencher campos automaticamente
      se usuario selecionar check, gravar dados no cookie.
      -->
        <div class="dropdown-menu">
        <form 
          class="px-4 py-3"
          id="form" 
          method="post" 
          action="controlador/rotasUsuario.php">
            <input type="hidden" name="acao" id="acao">

              <div class="mb-3">
                <label for="email" class="form-label">E-mail:</label>
                <input 
                  type="email" 
                  class="form-control" 
                  id="email" 
                  name="email"
                  placeholder="email@exemplo.com"
                  autocomplete="username"
                  required>
              </div>
              <div class="mb-3">
                <label for="senha" class="form-label">Senha:</label>
                <input 
                  type="password" 
                  class="form-control"
                  id="senha" 
                  name="senha"
                  placeholder="Senha"
                  autocomplete="current-password"
                  required>
              </div>
              <div class="mb-3">
                <div class="form-check">
                  <input type="checkbox" 
                  class="form-check-input" 
                  id="dropdownCheck">
                  <label class="form-check-label" for="dropdownCheck">
                    Lembrar-me
                  </label>
                </div>
              </div>
                <button 
                  type="submit" 
                  class="btn btn-primary"
                  onclick="autenticar()">
                    Entrar
                </button>
            </form>
            <!--<div class="dropdown-divider"></div>-->
            <!--<a class="dropdown-item" href="../../controlador/recupera_senha.php">Esqueceu a senha?</a>-->
          </div>
    </body>
</html>                