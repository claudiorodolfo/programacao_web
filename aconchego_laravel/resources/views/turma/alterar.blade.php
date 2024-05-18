<!doctype html>
<html lang="pt-br">

<head>
    @include('partials.head', ['entidade' => 'Turma'])
</head>

<body>
    <div class="container">
        <br> @include('partials.body-logo')
        <br>
        <form enctype="multipart/form-data" action="{{route('turma.update', $turma->id)}}" method="post">
            @csrf @method('put')
            <a class="btn btn-outline-secondary bi bi-arrow-left w-25" href="{{route('turma.index')}}"></a>
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
                                <input type="hidden" class="form-control" id="id" name="id" value="{{$turma->id}}" />

                            </div>
                            <div class="form-group">
                                <label for="nome" class="text-danger">*Nome:</label>
                                <input type="text" class="form-control" id="nome" name="nome" value="{{$turma->nome}}" Required />
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