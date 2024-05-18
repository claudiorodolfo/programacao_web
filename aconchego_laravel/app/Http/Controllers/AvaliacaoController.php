<?php

namespace App\Http\Controllers;

use App\Models\Avaliacao;
use App\Models\Pessoa;
use App\Models\Turma;
use App\Models\Exame;
use App\Models\Parametro;
use App\Models\Nota;
use App\Models\Tipo;
use Illuminate\Http\Request;

class AvaliacaoController extends Controller
{
    private $entidade = 'Avaliação';

    /**
     * Show the user detailed feedback.
     */
    public function criarRelatorio(Avaliacao $avaliacao)
    {
        $entidade = $this->entidade;
        $avaliacao = Avaliacao::where('id',$avaliacao->id)->first();
        return view('feedback/criar', compact('entidade','avaliacao'));
    }

    /**
     * Show the user detailed feedback.
     */
    public function relatorio(Avaliacao $avaliacao)
    {
        $entidade = $this->entidade;
        $cabecalhoFeedback = Avaliacao::where('id', $avaliacao->id)
            ->first();
        
        $corpoFeedback = Nota::select('nota.valor', 
                'parametro.velocidade', 
                'parametro.quesito')
            ->join('parametro', 'nota.parametro_id' , '=', 'parametro.id')
            ->where('nota.avaliacao_id', $cabecalhoFeedback->id)
			->orderBy('parametro.velocidade')
            ->get();
                   
        return view('feedback/relatorio', compact('entidade', 'cabecalhoFeedback', 'corpoFeedback'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entidade = $this->entidade;
        $dados = Avaliacao::all();
        return view('avaliacao/mostrartodos', compact('entidade', 'dados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $entidade = $this->entidade;
        $exames = Exame::all();
        $turmas = Turma::all(); 
        $idProfessor = Tipo::where('nome','Professor')->first()->id;
        $idMonitor   = Tipo::where('nome','Monitor')->first()->id;
        $idAluno     = Tipo::where('nome','Aluno')->first()->id;
        $professores = Pessoa::where('tipo_id',$idProfessor)->orWhere('tipo_id',$idMonitor)->get();//professor e monitor
        $alunos =  Pessoa::where('tipo_id',$idAluno)->get();
        return view('avaliacao/criar', compact('entidade','exames','turmas','professores', 'alunos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $avaliacao = new Avaliacao;        
        $avaliacao->exame_id = $request->exame_id;
        $avaliacao->turma_id = $request->turma_id; 
        $avaliacao->aluno_id = $request->aluno_id;
        $avaliacao->professor_id = $request->professor_id;
        $avaliacao->papel = $request->papel;
        $avaliacao->save();
          
        return redirect()->route('avaliacao.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Avaliacao $avaliacao)
    {
        $entidade = $this->entidade;
        return view('avaliacao/mostrar', compact('entidade', 'avaliacao'));        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Avaliacao $avaliacao)
    {
        $entidade = $this->entidade;
        $exames = Exame::all();
        $turmas = Turma::all();  
        $idProfessor = Tipo::where('nome','Professor')->first()->id;
        $idMonitor   = Tipo::where('nome','Monitor')->first()->id;
        $idAluno     = Tipo::where('nome','Aluno')->first()->id;       
        $professores = Pessoa::where('tipo_id',$idProfessor)->orWhere('tipo_id',$idMonitor)->get();//professor e monitor  
        $alunos =  Pessoa::where('tipo_id',$idAluno)->get();                                         
        return view('avaliacao/alterar', compact('entidade','avaliacao','exames','turmas','professores', 'alunos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Avaliacao $avaliacao)
    {
        $avaliacao = Avaliacao::find($request->id);
        $avaliacao->exame_id = $request->exame_id;
        $avaliacao->turma_id = $request->turma_id; 
        $avaliacao->aluno_id = $request->aluno_id;
        $avaliacao->professor_id = $request->professor_id;
        $avaliacao->papel = $request->papel;                      
        $avaliacao->update();

        return redirect()->route('avaliacao.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Avaliacao $avaliacao)
    {
        $avaliacao->delete();
        return redirect()->route('avaliacao.index');
    }
}
