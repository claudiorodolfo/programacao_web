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
    <a class="btn btn-outline-primary" href="{{route('avaliacao.index')}}">Voltar</a>  
    <br><br>
    <table class='table table-striped table-bordered'>
      <tr>
        <th>Id</th>
      </tr>
      <tr>
        <td>{{$avaliacao->id}}</td>
      </tr> 
      <tr>
        <th>Exame</th>
      </tr>
      <tr>
        <td>{{$avaliacao->exame->data}}</td>
      </tr>
      <tr>
        <th>Turma</th>
      </tr>
      <tr>
        <td>{{$avaliacao->turma->nome}}</td>
      </tr> 
      <tr>
        <th>Aluno</th>
      </tr>
      <tr>
        <td>{{$avaliacao->usuarioAluno->nome}}</td>
      </tr> 
      <tr>
        <th>Professor</th>
      </tr>
      <tr>
        <td>{{$avaliacao->usuarioProfessor->nome}}</td>
      </tr> 
      <tr>
        <th>Papel</th>
      </tr>
      <tr>
        <td>{{$avaliacao->papel}}</td>
      </tr> 
      <tr>
        <th>Observação</th>
      </tr>
      <tr>
        <td>{{$avaliacao->observacao}}</td>
      </tr> 
      <tr>
        <th>Status</th>
      </tr>
      <tr>
        <td>{{$avaliacao->status}}</td>
      </tr> 
      <tr>
        <th>Rascunho</th>
      </tr>
      <tr>
        <td>{{($avaliacao->rascunho == 0) ? "Não" : "Sim"}}</td>
      </tr>                                           
    </table>
    </div>       
  </body>
</html>