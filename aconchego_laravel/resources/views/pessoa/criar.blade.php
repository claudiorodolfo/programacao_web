<!doctype html>
<html lang="pt-br">

<head>
    @include('partials.head', ['entidade' => 'Pessoa'])
</head>

<body>
    <div class="container">
        <br> @include('partials.body-logo')
        <br>
        <form enctype="multipart/form-data" action="{{route('pessoa.store')}}" method="post">
            @csrf
            <a class="btn btn-outline-secondary bi bi-arrow-left w-25" href="{{route('pessoa.index')}}"></a>
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
                                <label for="id">Usuário:</label>
                                <select class="form-control" id="id" name="id">
                                    @foreach($usuarios as $usuario)
                                    <option value="{{$usuario->id}}">{{$usuario->name}} | {{$usuario->email}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="telefone">Telefone:</label>
                                <input type="text" class="form-control" id="telefone" name="telefone" value="" />
                            </div>
                            <div class="form-group">
                                <label for="endereco">Endereço:</label>
                                <textarea class="form-control" id="endereco" rows="3" name="endereco"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="turma_id_condutor">Turma Condutor(a):</label>
                                <select class="form-control" id="turma_id_condutor" name="turma_id_condutor">
                                    <option value=""></option>
                                    @foreach($turmas as $turma)
                                    <option value="{{$turma->id}}">{{$turma->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="turma_id_conduzida">Turma Conduzida(o):</label>
                                <select class="form-control" id="turma_id_conduzida" name="turma_id_conduzida">
                                    <option value=""></option>
                                    @foreach($turmas as $turma)
                                    <option value="{{$turma->id}}">{{$turma->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tipo_id" class="text-danger">*Tipo:</label>
                                <select class="form-control" id="tipo_id" name="tipo_id" Required>
                                    @foreach( $tipos as $tipo)
                                    <option value="{{$tipo->id}}" {{($tipo->nome == 'Aluno') ? 'selected' : ''}}>{{$tipo->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="esta_ativo" class="text-danger">*Ativo:</label>
                                <select class="form-control" id="esta_ativo" name="esta_ativo" Required>
                                    <option value="0">Não</option>
                                    <option value="1" Selected>Sim</option>
                                </select>
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