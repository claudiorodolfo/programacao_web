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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">    
    <!--Programador-->
    <title>Controle de {{$entidade}}</title>   
  </head> 
  <body>
    <script type="text/javascript">
      function mostrar(id, rota) {
          var form = document.getElementById(id);
          form.action = rota;
          form.submit();
      }

      function atualizar(id, rota) {
          var form = document.getElementById(id);
          form.action = rota;
          form.submit();
      }
    
      function apagar(id, rota) {
        if (window.confirm('Deseja realmente apagar o registro?')) {
          var form = document.getElementById(id);
          form.action = rota;
          form.submit();
        }
      }
    </script>    
    <div class="container">
    <br>
    <a class="btn btn-outline-primary" href="{{route('usuario.create')}}">Novo(a) {{$entidade}}</a>   
    <br><br>
    <table class='table table-striped table-bordered'>
      <tr>
        <!--<th>Id</th>-->
        <th onclick="ordenar('nome')">Nome</th>
        <th onclick="ordenar('id_tipo')">Tipo</th>        
        <th>Ações</th>
      </tr>
      @foreach ($dados as $item)
        <tr>
          <!--<td>{{$item->id}}</td>-->
            <td>{{$item->nome}}</td>
            <td>{{$item->tipo->nome}}</td>            
            <td>
              <button 
                style="border-radius:50px"              
                class="btn btn-info" 
                onclick="mostrar('mostrar','{{route('usuario.show', $item->id)}}')">
                Detalhar
              </button>             
              <button
                style="border-radius:50px"
                class="btn btn-primary" 
                onclick="atualizar('atualizar','{{route('usuario.edit', $item->id)}}')">
                Alterar
              </button>
              <button 
                style="border-radius:50px"              
                class="btn btn-danger" 
                onclick="apagar('apagar','{{route('usuario.destroy', $item->id)}}')">
                Apagar
              </button>
            </td>
        </tr>
      @endforeach
    </table>
    </div>

    <form id="mostrar" action="" method="get">
      @csrf
    </form>     
    <form id="atualizar" action="" method="get">
      @csrf
    </form>
    <form id="apagar" action="" method="post">
      @csrf @method('DELETE')
    </form>            
  </body>
</html>