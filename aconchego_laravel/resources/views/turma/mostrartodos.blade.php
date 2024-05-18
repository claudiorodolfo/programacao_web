<!doctype html>
<html lang="pt-br">

<head>
    @include('partials.head', ['entidade' => 'Turma']) @include('partials.head-script')
</head>

<body>
    <div class="container">
        <br> @include('partials.body-logo')
        <br>
        <a class="btn btn-outline-secondary bi bi-arrow-left w-25" href="{{route('principal')}}"></a>
        <a class="btn btn-outline-success bi bi-plus-circle" href="{{route('turma.create')}}"></a>
        <br>
        <br>
        <table class='table'>
            <thead class="thead-dark">
                <tr>
                    <th>Ações</th>
                    <th>Nome</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dados as $item)
                <tr>
                    <td>
                        <button class="btn btn-outline-primary bi bi-pencil" onclick="atualizar('atualizar','{{route('turma.edit', $item->id)}}')">
                        </button>
                        <button class="btn btn-outline-danger bi bi-trash" onclick="apagar('apagar','{{route('turma.destroy', $item->id)}}')">
                        </button>
                    </td>
                    <td>{{$item->nome}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @include('partials.body-form') 
        @include('partials.body-rodape')
    </div>
    <br>
    <br>
</body>

</html>