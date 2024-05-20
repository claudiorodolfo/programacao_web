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
            <br> 
            @include('partials.body-logo')
            <br>
            <form action="{{route('avaliacao.store')}}" method="post">
                @csrf
                <a class="btn btn-outline-secondary bi bi-arrow-left w-25" href="{{route('avaliacao.index')}}"></a>
                <button type="submit" class="btn btn-outline-success bi bi-save"></button>
                <br>
                <br>
                <h2 class="text-title text-center">Criar {{$entidade}}</h2>
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
            </form>
            <br>
            @include('partials.body-rodape')
        </div>
    </div>
    <br>
    <br>
</body>

</html>