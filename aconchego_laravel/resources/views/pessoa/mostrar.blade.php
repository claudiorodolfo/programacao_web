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
    <a
      style="border-radius:50px"
      class="btn btn-outline-primary" 
      href="{{route('pessoa.index')}}">
      Voltar
    </a> 
    <br><br>
    <table class='table table-striped table-bordered'>
      <!--<tr>
        <th>Id</th>
      </tr>
      <tr>
        <td>{{$pessoa->id}}</td>
      </tr> 
      <tr>-->
        <th>Nome</th>
      </tr>
      <tr>
        <td>{{$pessoa->nome}}</td>
      </tr>
      <tr>
        <th>E-mail</th>
      </tr>
      <tr>
        <td>{{$pessoa->email}}</td>
      </tr> 
      <tr>
        <th>Telefone</th>
      </tr>
      <tr>
        <td id="telefone">{{$pessoa->telefone}}</td>
      </tr> 
      <tr>
        <th>Endereço</th>
      </tr>
      <tr>
        <td>{{$pessoa->endereco}}</td>
      </tr> 
      <tr>
        <th>Turma Condutor(a)</th>
      </tr>
      <tr>
        <td>{{$pessoa->turmaCondutor->nome ?? "" }}</td>
      </tr> 
      <tr>
        <th>Turma Conduzido(a)</th>
      </tr>
      <tr>
        <td>{{$pessoa->turmaConduzido->nome ?? "" }}</td>
      </tr> 
      <tr>
        <th>Tipo</th>
      </tr>
      <tr>
        <td>{{$pessoa->tipo->nome}}</td>
      </tr> 
      <tr>
        <th>Ativo</th>
      </tr>
      <tr>
        <td>{{($pessoa->esta_ativo == 0) ? "Não" : "Sim"}}</td>
      </tr>                                           
    </table>
    </div>          
  </body>
</html>