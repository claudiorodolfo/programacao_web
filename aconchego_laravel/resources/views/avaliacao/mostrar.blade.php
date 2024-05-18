<!doctype html>
<html lang="pt-br">

<head>
    @include('partials.head', ['entidade' => 'Avaliação'])
</head>

<body>
    <div class="container">
        <br> @include('partials.body-logo')
        <br>
        <a class="btn btn-outline-secondary bi bi-arrow-left w-25" href="{{route('avaliacao.index')}}"></a>
        <br>
        <br>
        <table class='table'>
            <thead class="thead-dark">
                <tr>
                    <th>Detalhes de {{$entidade}}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="form-group">
                            <label for="exame" class="text-danger">*Exame:</label>
                            <input type="text" class="form-control" id="exame" name="exame_id" value="{{$avaliacao->exame->data_formatada}}" Disabled />
                        </div>
                        <div class="form-group">
                            <label for="turma" class="text-danger">*Turma:</label>
                            <input type="text" class="form-control" id="turma" name="turma" value="{{$avaliacao->turma->nome}}" Disabled />
                        </div>
                        <div class="form-group">
                            <label for="aluno" class="text-danger">*Aluno:</label>
                            <input type="text" class="form-control" id="aluno" name="aluno" value="{{$avaliacao->pessoaAluno->usuario->name}}" Disabled />
                        </div>
                        <div class="form-group">
                            <label for="professor" class="text-danger">*Professor:</label>
                            <input type="text" class="form-control" id="professor" name="professor" value="{{$avaliacao->pessoaProfessor->usuario->name}}" Disabled />
                        </div>
                        <div class="form-group">
                            <label for="papel" class="text-danger">*Função:</label>
                            <input type="text" class="form-control" id="papel" name="papel" value="{{$avaliacao->papel}}" Disabled />
                        </div>
                    </td>
                </tr>
        </table>
        @include('partials.body-rodape')
    </div>
    <br>
    <br>
</body>

</html>