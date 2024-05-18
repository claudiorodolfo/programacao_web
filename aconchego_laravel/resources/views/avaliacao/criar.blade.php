<!doctype html>
<html lang="pt-br">

<head>
    @include('partials.head', ['entidade' => 'Avaliação'])
</head>

<body>
    <div class="container">
        <br> @include('partials.body-logo')
        <br>
        <form enctype="multipart/form-data" action="{{route('avaliacao.store')}}" method="post">
            @csrf
            <a class="btn btn-outline-secondary bi bi-arrow-left w-25" href="{{route('avaliacao.index')}}"></a>
            <button type="submit" class="btn btn-outline-success bi bi-save"></button>
            <br>
            <br>
            <table class='table'>
                <thead class="thead-dark">
                    <tr>
                        <th>Criação de {{$entidade}}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="exame_id" class="text-danger">*Exame:</label>
                                <select class="form-control" id="exame_id" name="exame_id">
                                    @foreach($exames as $exame)
                                      <option value="{{$exame->id}}">{{$exame->data_formatada}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="turma_id" class="text-danger">*Turma:</label>
                                <select class="form-control" id="turma_id" name="turma_id">
                                    <option value=""></option>
                                    @foreach($turmas as $turma)
                                      <option value="{{$turma->id}}">{{$turma->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="papel" class="text-danger">*Papel:</label>
                                <select class="form-control" id="papel" name="papel" Required>
                                    <option value=""></option>
                                    <option value="Condutor(a)">Condutor(a)</option>
                                    <option value="Conduzida(o)">Conduzida(o)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="professor_id" class="text-danger">*Professor:</label>
                                <select class="form-control" id="professor_id" name="professor_id">
                                    <option value=""></option>
                                    @foreach($professores as $professor)
                                      <option value="{{$professor->id}}">{{$professor->usuario->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="aluno_id" class="text-danger">*Aluno:</label>
                                <select class="form-control" id="aluno_id" name="aluno_id">
                                    <option value=""></option>
                                    @foreach($alunos as $aluno)
                                      <option value="{{$aluno->id}}">{{$aluno->usuario->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="hidden" id="observacao" name="observacao" value="" />
                            </div>
                            <div class="form-group">
                                <input type="hidden" id="status" name="status" value="" />
                            </div>
                            <div class="form-group">
                                <input type="hidden" id="rascunho" name="rascunho" value="1" />
                            </div>
                        </td>
                    </tr>
            </table>
        </form>
        @include('partials.body-rodape')
    </div>
    <br>
    <br>
</body>

</html>