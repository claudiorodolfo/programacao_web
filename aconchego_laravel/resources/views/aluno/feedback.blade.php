<!doctype html>
<html lang="pt-br">

<head>
    @include('partials.head')
    <title>Feedback</title>
</head>

<body>
    <div class="container">
        <div class="item">
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
            <br> 
            @include('partials.body-logo')
            <br>
            <div class="controles">
              <a class="btn btn-outline-secondary bi bi-arrow-left w-25" href="{{route('aluno.avaliacoes', 12)}}"></a>
              <a class="btn btn-outline-info bi bi-printer" onclick="window.print(); return false;" href=""></a>
          </div>
          <br>
          <br>
            <div style="text-align: center" class="{{($cabecalhoFeedback->status == 'Aprovado(a)') ? 'alert alert-success':'alert alert-warning'}}" role="alert">
                {{$cabecalhoFeedback->status}}
            </div>
            <br>
            <table class="table table-bordered align-middle">
                <tr>
                    <td style="text-align: center" colspan="8">FEEDBACK</td>
                </tr>
                <tr>
                    <td style="text-align: center" colspan="5" rowspan="2">{{$cabecalhoFeedback->turma->nome}}</td>
                    <td style="text-align: center" colspan="3">DATA</td>
                </tr>
                <tr>
                    <td style="text-align: center" colspan="3">{{$cabecalhoFeedback->exame->data_formatada}}</td>
                </tr>
                <tr>
                    <td colspan="8"></td>
                </tr>
                <tr>
                    <td colspan="2">Nome</td>
                    <td colspan="6">{{$cabecalhoFeedback->pessoaAluno->usuario->name}}</td>
                </tr>
                <tr>
                    <td colspan="2">Examinador</td>
                    <td colspan="6">{{$cabecalhoFeedback->pessoaProfessor->usuario->name}}</td>
                </tr>
                <tr>
                    <td colspan="8"></td>
                </tr>
                <tr>
                    <td style="text-align: center" colspan="4" class="{{($cabecalhoFeedback->papel == 'Condutor(a)') ? 'table-primary': '' }}">CONDUTOR(A)</td>
                    <td style="text-align: center" colspan="4" class="{{($cabecalhoFeedback->papel == 'Conduzida(o)') ? 'table-primary': '' }}">CONDUZIDA(O)</td>
                </tr>
                @php $velocidade = ""; @endphp @foreach($corpoFeedback as $nota) @if($velocidade != $nota->velocidade) @php $velocidade = $nota->velocidade @endphp
                <tr>
                    <td style="text-align: center" colspan="8">{{$nota->velocidade}}</td>
                </tr>
                @endif
                <tr>
                    <td colspan="3">{{$nota->quesito}}</td>
                    <td style="text-align: center" class="{{($nota->valor == '1')? 'table-primary': ''}}">1</td>
                    <td style="text-align: center" class="{{($nota->valor == '2')? 'table-primary': ''}}">2</td>
                    <td style="text-align: center" class="{{($nota->valor == '3')? 'table-primary': ''}}">3</td>
                    <td style="text-align: center" class="{{($nota->valor == '4')? 'table-primary': ''}}">4</td>
                    <td style="text-align: center" class="{{($nota->valor == '5')? 'table-primary': ''}}">5</td>
                </tr>
                @endforeach
            </table>
            <div class="card">
                <div class="card-body">
                    <p class="card-text">
                        @php echo nl2br($cabecalhoFeedback->observacao) @endphp
                    </p>
                </div>
            </div>
            <br> 
            @include('partials.body-rodape')
        </div>
    </div>
    <br>
    <br>
</body>

</html>