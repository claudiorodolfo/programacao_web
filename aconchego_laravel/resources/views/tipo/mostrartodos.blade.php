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
    <title>Controle de {{$entidade}}</title>   
  </head> 
  <body>
    <div class="container">
    <br>
    <a class="btn btn-outline-primary" href="editar.php">Novo(a) {{$entidade}}</a>
    <br><br>
    <table class='table table-striped table-bordered'>
      <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Ações</th>
      </tr>
      @foreach ($dados as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->nome}}</td>
            <td>
              <button class="btn btn-primary" onclick="atualizar({{$item->id}})">Alterar</button>
              <button class="btn btn-danger" onclick="apagar({{$item->id}})">Apagar</button>
            </td>
        </tr>
      @endforeach
    </table>
    </div>       
  </body>
</html>