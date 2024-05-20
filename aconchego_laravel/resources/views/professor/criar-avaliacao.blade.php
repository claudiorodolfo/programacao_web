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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css">
    <!--Programador-->
    <title>Edição de {{$entidade}}</title>    
  </head> 
  <body>
    <div class="container">
      <form
      enctype="multipart/form-data"
      action="{{route('avaliacao.update', $avaliacao->id)}}"
      method="post">
      @csrf @method('put')
		<h1>Edição de {{$entidade}}</h1>
		<br>
    <div class="form-group">
    <!--
      <label for="id" class="text-danger">*Id:</label>
    --> 
      <input type="hidden" 
        class="form-control" 
        id="id" 
        name="id" 
        value="{{$avaliacao->id}}"
         />
    </div> 
    <div class="form-group">
      <label for="exame_id" class="text-danger">*Exame:</label>
      <input type="text" 
        class="form-control" 
        id="exame_id" 
        name="exame_id" 
        value="{{$avaliacao->exame->data_formatada}}"
         Disabled/>
    </div>   
    <div class="form-group">
      <label for="turma_id"  class="text-danger">*Turma:</label>
      <input type="text" 
        class="form-control" 
        id="turma_id" 
        name="turma_id" 
        value="{{$avaliacao->turma->nome}}"
         Disabled/>
    </div>    
    <div class="form-group">
      <label for="aluno_id" class="text-danger">*Aluno:</label>
      <input type="text" 
        class="form-control" 
        id="aluno_id" 
        name="aluno_id" 
        value="{{$avaliacao->pessoaAluno->usuario->name}}"
         Disabled/>
    </div>
    <div class="form-group">
      <label for="professor_id" class="text-danger">*Professor:</label>
      <input type="text" 
        class="form-control" 
        id="professor_id" 
        name="professor_id" 
        value="{{$avaliacao->pessoaProfessor->usuario->name}}"
         Disabled/>
    </div>              
    <div class="form-group">
        <label for="papel" class="text-danger">*Papel:</label>
        <input type="text" 
        class="form-control" 
        id="papel" 
        name="papel" 
        value="{{$avaliacao->papel}}"
         Disabled/>
      </div> 
      <div class="form-group">
        <label for="observacao">Observação:</label>
        <textarea 
          class="form-control" 
          id="observacao" 
          rows="3" 
          name="observacao">{{$avaliacao->observacao}}</textarea>
      </div> 
      <div class="form-group">
        <label for="status">Status:</label>
        <select 
          class="form-control" 
          id="status" 
          name="status" 
          Required >
          <option value=""></option>          
          <option value="Reprovado(a)" {{($avaliacao->status == "Reprovado(a)") ? 'selected':''}}>Reprovado(a)</option>
          <option value="Aprovado(a)" {{($avaliacao->status == "Aprovado(a)") ? 'selected':''}}>Aprovado(a)</option>
        </select>
      </div> 
      <div class="form-group">
        <label for="rascunho" class="text-danger">*Rascunho:</label>
        <select 
          class="form-control" 
          id="rascunho" 
          name="rascunho" 
          Required >
          <option value="0" {{($avaliacao->rascunho == 0) ? 'selected':''}}>Não</option>
          <option value="1" {{($avaliacao->rascunho == 1) ? 'selected':''}}>Sim</option>
        </select>
      </div>              

        <br />
        <button type="submit" class="btn btn-outline-success bi bi-save"></button>
        <a class="btn btn-outline-warning bi bi-x-circle" href="{{route('avaliacao.index')}}"></a>
      </form>
    </div>
  </body>
</html>