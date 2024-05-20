<!doctype html>
<html lang="pt-br">

<head>
    @include('partials.head')
    <title>Controle de {{$entidade}}</title>
</head>

<body>
    <div class="container">
        <div class="item">
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
            <br> @include('partials.body-logo')
            <br>
            <form action="{{route('avaliacao.update', $avaliacao->id)}}" method="post">
                @csrf @method('put')
                <a class="btn btn-outline-secondary bi bi-arrow-left w-25" href="{{route('avaliacao.index')}}"></a>
                <button type="submit" class="btn btn-outline-success bi bi-save"></button>
                <br>
                <br>
                <h2 class="text-title text-center">Editar {{$entidade}}</h2>
                <div class="form-group">
                    <!--<label for="id" class="text-danger">*Id:</label>-->
                    <input type="hidden" class="form-control" id="id" name="id" value="{{$avaliacao->id}}" />
                </div>
                <div class="form-group">
                    <label for="exame_id" class="text-danger">*Exame:</label>
                    <select class="form-control" id="exame_id" name="exame_id" Required>
                        @foreach($exames as $exame)
                        <option value="{{$exame->id}}" {{($avaliacao->exame_id == $exame->id) ? 'selected':''}}>{{$exame->data_formatada}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="turma_id" class="text-danger">*Turma:</label>
                    <select class="form-control" id="turma_id" name="turma_id" Required>
                        @foreach($turmas as $turma)
                        <option value="{{$turma->id}}" {{($avaliacao->turma_id == $turma->id) ? 'selected':''}}>{{$turma->nome}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="aluno_id" class="text-danger">*Aluno:</label>
                    <select class="form-control" id="aluno_id" name="aluno_id" Required>
                        @foreach($alunos as $aluno)
                        <option value="{{$aluno->id}}" {{($avaliacao->aluno_id == $aluno->id) ? 'selected':''}}>{{$aluno->usuario->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="professor_id" class="text-danger">*Professor:</label>
                    <select class="form-control" id="professor_id" name="professor_id" Required>
                        @foreach($professores as $professor)
                        <option value="{{$professor->id}}" {{($avaliacao->professor_id == $professor->id) ? 'selected':''}}>{{$professor->usuario->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="papel" class="text-danger">*Papel:</label>
                    <select class="form-control" id="papel" name="papel" Required>
                        <option value="Condutor(a)" {{($avaliacao->papel == "Condutor(a)") ? 'selected':''}}>Condutor(a)</option>
                        <option value="Conduzida(o)" {{($avaliacao->papel == "Conduzida(o)") ? 'selected':''}}>Conduzida(o)</option>
                    </select>
                </div>
            </form>
            <br>
            @include('partials.body-rodape')
        </div>
    </div>
    <br>
    <br>
</body>

</html>