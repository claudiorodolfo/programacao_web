<!doctype html>
<html lang="pt-br">

<head>
    @include('partials.head')
    <title>Feedback de {{$entidade}}</title>
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
            <h2 class="text-title text-center">Avaliações</h2>
            <ul class="list-group">
                <li class="list-group-item">
                    <strong>EXAME - TURMA - PAPEL</strong>
                </li>
                @foreach ($avaliacoes as $avaliacao)
                <li class="list-group-item"><a href="{{route('aluno.feedback', $avaliacao->id)}}">
              {{$avaliacao->exame->data_formatada}} - {{$avaliacao->turma->nome}}  - {{$avaliacao->papel}} 
          </a></li>

                @endforeach
            </ul>
            <br> @include('partials.body-rodape')
        </div>
    </div>
    <br>
    <br>
</body>

</html>