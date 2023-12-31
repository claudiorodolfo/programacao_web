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
      action="{{route('exame.update', $exame->id)}}"
      method="post">
      @csrf @method('put')
		<h1>Edição de {{$entidade}}</h1>
		<br>
        <div class="form-group">
    <!--          
            <label for="id" class="text-danger">*Id:</label>
    -->
            <input 
              type="hidden" 
              class="form-control" 
              id="id" 
              name="id" 
              value="{{$exame->id}}"
               />
          </div>  
          <div class="form-group">
            <label for="data" class="text-danger">*Data:</label>
            <input type="date" 
              class="form-control" 
              id="data" 
              name="data" 
              value="{{$exame->data}}"
              Required />
          </div>                
        <div class="form-group">
          <label for="nome" class="text-danger">*Nome:</label>
          <input type="text" 
            class="form-control" 
            id="nome" 
            name="nome" 
            value="{{$exame->nome}}"
            Required />
        </div>
        <br />
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a class="btn btn-danger" href="{{route('exame.index')}}">Cancelar</a>
      </form>
    </div>
  </body>
</html>