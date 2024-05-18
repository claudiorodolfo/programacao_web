<!doctype html>
<html lang="pt-br">

<head>
    @include('partials.head', ['entidade' => 'Parâmetro'])
</head>

<body>
    <div class="container">
        <br> @include('partials.body-logo')
        <br>

        <form enctype="multipart/form-data" action="{{route('parametro.store')}}" method="post">
            @csrf
            <a class="btn btn-outline-secondary bi bi-arrow-left w-25" href="{{route('parametro.index')}}"></a>
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
                                <label for="turma_id" class="text-danger">*Turma:</label>
                                <select class="form-control" id="turma_id" name="turma_id">
                                  <option value=""></option>  
                                  @foreach($turmas as $turma)
                                    <option value="{{$turma->id}}">{{$turma->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="velocidade" class="text-danger">*Velocidade:</label>
                                <input type="text" class="form-control" id="velocidade" name="velocidade" value="" Required />
                            </div>
                            <div class="form-group">
                                <label for="quesito" class="text-danger">*Quesito:</label>
                                <input type="text" class="form-control" id="quesito" name="quesito" value="" Required />
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