<!doctype html>
<html lang="pt-br">

<head>
    @include('partials.head')
    <script type="text/javascript" src="/aconchego_laravel/resources/js/script.js"></script>    
    <title>Controle de {{$entidade}}</title>
</head>

<body>
    <div class="container">
        <br> 
        @include('partials.body-logo')
        <br>
        <div class="controles">
            <a class="btn btn-outline-secondary bi bi-arrow-left w-25" href="{{route('admin')}}"></a>
            <a class="btn btn-outline-success  bi bi-plus-circle" href="{{route('avaliacao.create')}}"></a>
        </div>
        <br>
        <br>
        @foreach ($dados as $item)
        <div class="item">
            <h5>{{$item->pessoaAluno->usuario->name}}</h5>            
            <p><strong>Turma: </strong>{{$item->turma->nome}}</p>
            <p><strong>Papel: </strong>{{$item->papel}}</p>
            <div class="d-flex">
                <button class="btn btn-outline-info bi bi-eye" onclick="mostrar('mostrar','{{route('avaliacao.show', $item->id)}}')">
                </button>
                <button class="btn btn-outline-primary bi bi-pencil" onclick="atualizar('atualizar','{{route('avaliacao.edit', $item->id)}}')">
                </button>
                <button class="btn btn-outline-danger bi bi-trash" onclick="apagar('apagar','{{route('avaliacao.destroy', $item->id)}}')">
                </button>
            </div>
        </div>
        @endforeach
        @include('partials.body-form') 
        <br>
        @include('partials.body-rodape')
    </div>
    <br>
    <br>
</body>

</html>