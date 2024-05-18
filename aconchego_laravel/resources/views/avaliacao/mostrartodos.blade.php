<!doctype html>
<html lang="pt-br">

<head>
    @include('partials.head', ['entidade' => 'Avaliação']) @include('partials.head-script')
</head>

<body>
    <div class="container">
        <br> @include('partials.body-logo')
        <br>
        <a class="btn btn-outline-secondary bi bi-arrow-left w-25" href="{{route('principal')}}"></a>
        <a class="btn btn-outline-success bi bi-plus-circle" href="{{route('avaliacao.create')}}"></a>
        <br>
        <br>
        <table class='table'>
            <thead class="thead-dark">
                <tr>
                    <th>Ações</th>
                    <th>Id</th>
                    <th>Aluno</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dados as $item)
                <tr>
                    <td>
                        <button class="btn btn-outline-info bi bi-eye" onclick="mostrar('mostrar','{{route('avaliacao.show', $item->id)}}')">
                        </button>
                        <button class="btn btn-outline-primary bi-pencil" onclick="atualizar('atualizar','{{route('avaliacao.edit', $item->id)}}')">
                        </button>
                        <button class="btn btn-outline-danger bi bi-trash" onclick="apagar('apagar','{{route('avaliacao.destroy', $item->id)}}')">
                        </button>
                        <td>{{$item->id}}</td>
                        <td>{{$item->pessoaAluno->usuario->name}}</td>
                    </td>
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