<!doctype html>
<html lang="pt-br">

<head>
    @include('partials.head')
    <title>Controle de Entidades</title>
</head>

<body>
    <div class="container">
        <div class="item">
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
            <br> 
            @include('partials.body-logo')
            <br>
            <h2 class="text-title text-center">Entidades</h2>
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="{{route('pessoa.index')}}">Pessoa</a>
                </li>
                <li class="list-group-item">
                    <a href="{{route('exame.index')}}">Exame</a>
                </li>
                <li class="list-group-item">
                    <a href="{{route('avaliacao.index')}}">Avaliação</a>
                </li>
                <li class="list-group-item">
                  <a href="{{route('parametro.index')}}">Parâmetro</a>
                </li>
                <li class="list-group-item">
                    <a href="{{route('turma.index')}}">Turma</a>
                </li>
                <li class="list-group-item">
                    <a href="{{route('tipo.index')}}">Tipo</a>
                </li>
            </ul>
            <br> 
            @include('partials.body-rodape')
        </div>
    </div>
    <br>
    <br>
</body>

</html>