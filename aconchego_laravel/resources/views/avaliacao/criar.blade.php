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
    <title>Edição de {{$entidade}}</title>    
  </head> 
  <body>
    <div class="container">
      <form
      enctype="multipart/form-data"
      action="{{route('avaliacao_armazenar')}}"
      method="post">
      @csrf
		<h1>Edição de {{$entidade}}</h1>
		<br>
    <!--
    <div class="form-group">
      <label for="id" class="text-danger">*Id:</label>
      <input type="hidden" 
        class="form-control" 
        id="id" 
        name="id" 
        value=""
         />
    </div> 
    --> 
    <div class="form-group">
      <label for="exame_id" class="text-danger">*Exame:</label>
      <select 
        class="form-control" 
        id="exame_id" 
        name="exame_id">              
          @foreach($exames as $exame)
            <option value="{{$exame->id}}">{{$exame->data}}</option>
          @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="turma_id" class="text-danger">*Turma:</label>
      <select 
        class="form-control" 
        id="turma_id" 
        name="turma_id">              
          @foreach($turmas as $turma)
            <option value="{{$turma->id}}">{{$turma->nome}}</option>
          @endforeach
      </select>
    </div>         
    <div class="form-group">
        <label for="papel" class="text-danger">*Papel:</label>
        <select 
          class="form-control" 
          id="papel" 
          name="papel" 
          Required >
          <option value="Condutor(a)">Condutor(a)</option>
          <option value="Conduzida(o)">Conduzida(o)</option>
        </select>
      </div>
      <div class="form-group">
        <label for="professor_id" class="text-danger">*Professor:</label>
        <select 
          class="form-control" 
          id="professor_id" 
          name="professor_id">              
            @foreach($professores as $professor)
              <option value="{{$professor->id}}">{{$professor->nome}}</option>
            @endforeach
        </select>
      </div>       
      <div class="form-group">
        <label for="aluno_id" class="text-danger">*Aluno:</label>
        <select 
          class="form-control" 
          id="aluno_id" 
          name="aluno_id">              
            @foreach($alunos as $aluno)
              <option value="{{$aluno->id}}">{{$aluno->nome}}</option>
            @endforeach
        </select>
      </div>               
      <div class="form-group">
        <label for="observacao">Observação:</label>
        <input type="text" 
          class="form-control" 
          id="observacao" 
          name="observacao" 
          value=""
        />
      </div>
      <div class="form-group">
        <label for="status">Status:</label>
        <select 
          class="form-control" 
          id="status" 
          name="status" 
          Required >
          <option value=""></option>          
          <option value="Reprovado(a)">Reprovado(a)</option>
          <option value="Aprovado(a)">Aprovado(a)</option>
        </select>
      </div> 
      <div class="form-group">
        <label for="rascunho" class="text-danger">*Rascunho:</label>
        <select 
          class="form-control" 
          id="rascunho" 
          name="rascunho" 
          Required >
          <option value="0">Não</option>
          <option value="1" selected>Sim</option>
        </select>
      </div>  
        <br />
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a class="btn btn-danger" href="{{route('avaliacao')}}">Cancelar</a>
      </form>
    </div>
  </body>
</html>