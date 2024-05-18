<!doctype html>
<html lang="pt-br">

<head>
    @include('partials.head', ['entidade' => 'Exame'])
</head>

<body>
    <div class="container">
        <br> @include('partials.body-logo')
        <br>
        <form enctype="multipart/form-data" action="{{route('exame.store')}}" method="post">
            @csrf
            <a class="btn btn-outline-secondary bi bi-arrow-left w-25" href="{{route('exame.index')}}"></a>
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
                                <label for="data" class="text-danger">*Data:</label>
                                <input type="date" class="form-control" id="data" name="data" value="" Required />
                            </div>
                            <div class="form-group">
                                <label for="nome" class="text-danger">*Nome:</label>
                                <input type="text" class="form-control" id="nome" name="nome" value="" Required />
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