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
      action="../../controlador/rotasUsuario.php"
      method="post">
      @csrf
		<h1>Edição de {{$entidade}}</h1>
		<br>
        <div class="form-group">
          <label for="nome" class="text-danger">*Nome:</label>
          <input type="text" 
            class="form-control" 
            id="nome" 
            name="nome" 
            value="{{$usuario->nome}}"
            Required />
        </div>
        <div class="form-group">
          <label for="email" class="text-danger">*E-mail:</label>
          <input 
            type="email" 
            class="form-control" 
            id="email" 
            name="email" 
            value="{{$usuario->email}}"
            Required />
        </div>     
        <div class="form-group">
          <label for="telefone">Telefone:</label>
          <input type="text" 
            class="form-control" 
            id="telefone" 
            name="telefone" 
            value="{{$usuario->telefone}}" />
        </div>  
        <div class="form-group">
          <label for="endereco">Endereço:</label>
          <textarea 
            class="form-control" 
            id="endereco" 
            rows="3" 
            name="endereco">
            {{$usuario->endereco}}
          </textarea>
        </div>                                   
        <div class="form-group">
          <label for="condutor">Turma Condutor(a):</label>
          <select 
            class="form-control" 
            id="condutor" 
            name="condutor">              
              @foreach($turmas as $turma)
                <option value="{{$turma->nome}}" {{($usuario->turmaCondutor->nome == $turma->nome) ? 'selected':''}}>{{$turma->nome}}</option>
              @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="conduzido">Turma Conduzida(o):</label>
          <select class="form-control" id="conduzido" name="conduzido">             
              @foreach($turmas as $turma)
                <option value="{{$turma->nome}}" {{($usuario->turmaConduzido->nome == $turma->nome) ? 'selected':''}}>{{$turma->nome}}</option>
              @endforeach
          </select>
        </div>  
        <div class="form-group">
          <label for="tipo" class="text-danger">*Tipo:</label>
          <select 
            class="form-control" 
            id="tipo" 
            name="tipo" 
            Required >
              @foreach( $tipos as $t)
                <option value="{{$t->nome}}" {{($usuario->tipo->nome == $t->nome) ? 'selected':''}}>{{$t->nome}}</option>
              @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="esta_ativo" class="text-danger">*Ativo:</label>
          <select 
            class="form-control" 
            id="esta_ativo" 
            name="esta_ativo" 
            Required >
            <option value="0" {{($usuario->esta_ativo == 0) ? 'selected': ''}}>Não</option>
            <option value="1" {{($usuario->esta_ativo == 1) ? 'selected': ''}}>Sim</option>
          </select>
        </div>    
        <div class="form-group">
          <label for="senha" class="text-danger">*Senha:</label>
          <input 
            type="password" 
            class="form-control" 
            id="senha" 
            name="senha" 
            value="{{$usuario->senha}}" 
            Required />
        </div> 
        <div class="form-group">
          <label for="confirma_senha" class="text-danger">*Confirma a senha:</label>
          <input 
            type="password" 
            class="form-control" 
            id="confirma_senha" 
            name="confirma_senha" 
            value="{{$usuario->senha}}"
            Required />
        </div>                
        <br />
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a class="btn btn-danger" href="mostrartodos.php">Cancelar</a>
      </form>
    </div>
  </body>
</html>