<!doctype html>
<html lang="pt-br">

<head>
    @include('partials.head', ['entidade' => 'Pessoa'])
</head>

<body>
    <div class="container">
        <br> @include('partials.body-logo')
        <br>
        <form enctype="multipart/form-data" action="{{route('pessoa.update', $pessoa->id)}}" method="post">
            @csrf @method('put')
            <a class="btn btn-outline-secondary bi bi-arrow-left w-25" href="{{route('pessoa.index')}}"></a>
            <button type="submit" class="btn btn-outline-success bi bi-save"></button>
            <br>
            <br>
            <table class='table'>
                <thead class="thead-dark">
                    <tr>
                        <th>Alteração de {{$entidade}}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="form-group">
                                <!--<label for="id" class="text-danger">*Id:</label>-->
                                <input type="hidden" class="form-control" id="id" name="id" value="{{$pessoa->id}}" />
                            </div>
                            <div class="form-group">
                                <label for="nome" class="text-danger">*Nome:</label>
                                <input type="text" class="form-control" id="nome" name="nome" value="{{$pessoa->usuario->name}}" Disabled />
                            </div>
                            <div class="form-group">
                              <label for="email" class="text-danger">*E-mail:</label>
                              <input type="text" class="form-control" id="email" name="email" value="{{$pessoa->usuario->email}}" Disabled />
                          </div>                            
                            <div class="form-group">
                                <label for="telefone">Telefone:</label>
                                <input type="text" class="form-control" id="telefone" name="telefone" value="{{$pessoa->telefone}}" />
                            </div>
                            <div class="form-group">
                                <label for="endereco">Endereço:</label>
                                <textarea class="form-control" id="endereco" rows="3" name="endereco">{{$pessoa->endereco}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="turma_id_condutor">Turma Condutor(a):</label>
                                <select class="form-control" id="turma_id_condutor" name="turma_id_condutor">
                                    <option value=""></option>
                                    @foreach($turmas as $turma)
                                    <option value="{{$turma->id}}" {{($pessoa->turma_id_condutor == $turma->id) ? 'selected':''}}>{{$turma->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="turma_id_conduzida">Turma Conduzida(o):</label>
                                <select class="form-control" id="turma_id_conduzida" name="turma_id_conduzida">
                                    <option value=""></option>
                                    @foreach($turmas as $turma)
                                    <option value="{{$turma->id}}" {{($pessoa->turma_id_conduzida == $turma->id) ? 'selected':''}}>{{$turma->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tipo_id" class="text-danger">*Tipo:</label>
                                <select class="form-control" id="tipo_id" name="tipo_id" Required>
                                    @foreach( $tipos as $tipo)
                                    <option value="{{$tipo->id}}" {{($pessoa->tipo_id == $tipo->id) ? 'selected':''}}>{{$tipo->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="esta_ativo" class="text-danger">*Ativo:</label>
                                <select class="form-control" id="esta_ativo" name="esta_ativo" Required>
                                    <option value="0" {{($pessoa->esta_ativo == 0) ? 'selected': ''}}>Não</option>
                                    <option value="1" {{($pessoa->esta_ativo == 1) ? 'selected': ''}}>Sim</option>
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