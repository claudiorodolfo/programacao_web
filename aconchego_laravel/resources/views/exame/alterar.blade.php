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
            <form action="{{route('exame.update', $exame->id)}}" method="post">
                @csrf @method('put')
                <a class="btn btn-outline-secondary bi bi-arrow-left w-25" href="{{route('exame.index')}}"></a>
                <button type="submit" class="btn btn-outline-success bi bi-save"></button>
                <br>
                <br>
                <h2 class="text-title text-center">Editar {{$entidade}}</h2>
                <div class="form-group">
                    <!--<label for="id" class="text-danger">*Id:</label>-->
                    <input type="hidden" class="form-control" id="id" name="id" value="{{$exame->id}}" />
                </div>
                <div class="form-group">
                    <label for="data" class="text-danger">*Data:</label>
                    <input type="date" class="form-control" id="data" name="data" value="{{$exame->data}}" Required />
                </div>
                <div class="form-group">
                    <label for="nome" class="text-danger">*Nome:</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="{{$exame->nome}}" Required />
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