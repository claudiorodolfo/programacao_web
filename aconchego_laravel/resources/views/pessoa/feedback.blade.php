<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">        
    <!-- JQuery JS -->  
    <script src="https://code.jquery.com/jquery-3.7.0.slim.min.js" integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script>    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>      
    <!--Programador-->
    <title>Feedback de {{$entidade}}</title>   
  </head> 
  <body>        
    <div class="container">
    <br><br>
    <div style="text-align: center" class="{{($cabecalhoFeedback->status == 'Aprovado(a)') ? 'alert alert-success':'alert alert-warning'}}" role="alert">
      {{$cabecalhoFeedback->status}}
    </div>
    <br>    
    <table class="table table-bordered align-middle">
      <tr>
          <td style="text-align: center" colspan="8">FEEDBACK</td>
      </tr>
      <tr>
          <td style="text-align: center" colspan="5" rowspan="2">{{$cabecalhoFeedback->turma}}</td>
          <td style="text-align: center" colspan="3">DATA</td>         
      </tr> 
      <tr>
          <td style="text-align: center" colspan="3">{{date('d/m/Y', strtotime($cabecalhoFeedback->exame))}}</td>
      </tr>
      <tr>
          <td colspan="8"></td>
      </tr>
      <tr>
          <td colspan="2">Nome</td>
          <td colspan="6">{{$cabecalhoFeedback->aluno}}</td>
      </tr>
      <tr>
          <td colspan="2">Examinador</td>
          <td colspan="6">{{$cabecalhoFeedback->professor}}</td>
      </tr>       
      <tr>
          <td colspan="8"></td>
      </tr>
      <tr>
      <td style="text-align: center" colspan="4" class="{{($cabecalhoFeedback->papel == 'Condutor(a)') ? 'table-primary': '' }}">CONDUTOR(A)</td>
          <td style="text-align: center" colspan="4" class="{{($cabecalhoFeedback->papel == 'Conduzida(o)') ? 'table-primary': '' }}">CONDUZIDA(O)</td>           
      </tr>
      @php
        $velocidade = "";
      @endphp        
      @foreach($corpoFeedback as $nota)
        @if($velocidade != $nota->velocidade)
          @php
            $velocidade = $nota->velocidade
          @endphp
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
        {{$cabecalhoFeedback->observacao}}
      </p>    
    </div>
  </div>  
  <br><br>
  </div>         
  </body>
</html>