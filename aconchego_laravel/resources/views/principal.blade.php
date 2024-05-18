<!doctype html>
<html lang="pt-br">
  <head>
    @include('partials.head')
  </head>
  <body> 
    <div class="container">
      <br>
        @include('partials.body-logo')
    <br><br>
    <table class='table'>
      <thead class="thead-dark">
        <tr>
        <th>Entidades</th>          
      </tr>
    </thead>
        <tbody>
            <tr>
                <td><a href="{{route('pessoa.index')}}">Pessoa</a></td>
            </tr>
            <tr>
                <td><a href="{{route('exame.index')}}">Exame</a></td>
            </tr>
            <tr>
                <td><a href="{{route('avaliacao.index')}}">Avaliação</a></td>
            </tr>
            <tr>
                <td><a href="{{route('parametro.index')}}">Parâmetro</a></td>
            </tr>
            <tr>
                <td><a href="{{route('turma.index')}}">Turma</a></td>
            </tr>
            <tr>
                <td><a href="{{route('tipo.index')}}">Tipo</a></td>
            </tr>
        </tbody>
    </table>
    </div>           
  </body>
</html>