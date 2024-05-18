<!doctype html>
<html lang="pt-br">

<head>
    @include('partials.head', ['entidade' => 'Pessoa'])
</head>

<body>
    <div class="container">
        <br> @include('partials.body-logo')
        <br>
        <a class="btn btn-outline-secondary bi bi-arrow-left w-25" href="{{route('pessoa.index')}}"></a>
        <br>
        <br>
        <table class='table'>
            <thead class="thead-dark">
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
                    <input type="text" class="form-control" id="telefone" name="telefone" value="{{$pessoa->telefone_formatado}}" Disabled />
                </div>
                <div class="form-group">
                    <label for="endereco">Endereço:</label>
                    <textarea class="form-control" id="endereco" rows="3" name="endereco" Disabled>{{$pessoa->endereco}}</textarea>
                </div>
                <div class="form-group">
                    <label for="turma_condutor">Turma Condutor(a):</label>
                    <input type="text" class="form-control" id="turma_condutor" name="turma_condutor" value="{{$pessoa->turmaCondutor->nome ?? " " }}" Disabled />
                </div>
                <div class="form-group">
                    <label for="turma_conduzida">Turma Conduzida(o):</label>
                    <input type="text" class="form-control" id="turma_conduzida" name="turma_conduzida" value="{{$pessoa->turmaConduzida->nome ?? " " }}" Disabled /> </div>
                <div class="form-group">
                    <label for="tipo" class="text-danger">*Tipo:</label>
                    <input type="text" class="form-control" id="tipo" name="tipo" value="{{$pessoa->tipo->nome}}" Disabled />
                </div>
                <div class="form-group">
                    <label for="esta_ativo" class="text-danger">*Ativo:</label>
                    <input type="text" class="form-control" id="esta_ativo" name="esta_ativo" value="{{$pessoa->esta_ativo_formatado}}" Disabled />
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