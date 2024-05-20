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
            <form action="{{route('parametro.update', $parametro->id)}}" method="post">
                @csrf @method('put')
                <a class="btn btn-outline-secondary bi bi-arrow-left w-25" href="{{route('parametro.index')}}"></a>
                <button type="submit" class="btn btn-outline-success bi bi-save"></button>
                <br>
                <br>
                <h2 class="text-title text-center">Editar {{$entidade}}</h2>
                <div class="form-group">
                    <!--<label for="id" class="text-danger">*Id:</label>-->
                    <input type="hidden" class="form-control" id="id" name="id" value="{{$parametro->id}}" />
                </div>
                <div class="form-group">
                    <label for="turma_id" class="text-danger">*Turma:</label>
                    <select class="form-control" id="turma_id" name="turma_id">
                        @foreach($turmas as $turma)
                        <option value="{{$turma->id}}" {{($parametro->turma_id == $turma->id) ? 'selected':''}}>{{$turma->nome}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="velocidade" class="text-danger">*Velocidade:</label>
                    <input type="text" class="form-control" id="velocidade" name="velocidade" value="{{$parametro->velocidade}}" Required />
                </div>
                <div class="form-group">
                    <label for="quesito" class="text-danger">*Quesito:</label>
                    <input type="text" class="form-control" id="quesito" name="quesito" value="{{$parametro->quesito}}" Required />
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