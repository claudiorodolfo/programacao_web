<?php

namespace App\Http\Controllers;

use App\Models\Avaliacao;
use App\Models\Usuario;
use App\Models\Turma;
use App\Models\Exame;
use App\Models\Parametro;
use App\Models\Nota;
use App\Models\Tipo;
use Illuminate\Http\Request;

class AvaliacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entidade = 'Avaliação';
        $dados = Avaliacao::all();
        return view('avaliacao/mostrartodos', compact('entidade', 'dados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $entidade = 'Avaliação';
        $exames = Exame::all();
        $turmas = Turma::all(); 
        $idProfessor = Tipo::where('nome','Professor')->get('id');
        $idMonitor   = Tipo::where('nome','Monitor')->get('id');
        $idAluno     = Tipo::where('nome','Aluno')->get('id');  
        $idProfessor = $idProfessor[0]->id;  
        $idMonitor   = $idMonitor[0]->id;   
        $idAluno     = $idAluno[0]->id;                        
        $professores = Usuario::where('tipo_id',$idProfessor)->orWhere('tipo_id',$idMonitor)->get();//professor e monitor  
        $alunos =  Usuario::where('tipo_id',$idAluno)->get();                                         
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
        $avaliacao->observacao = $request->observacao;        
        $avaliacao->status = $request->status;
        $avaliacao->rascunho = $request->rascunho;                        
        $avaliacao->save();
        //criar várias notas relacionadas
        //a essa avaliação criada
        $parametros = Parametro::where('turma_id', $avaliacao->turma_id)
                ->orderBy('velocidade')
                ->get();

        foreach ($parametros as $parametro) {
            Nota::create([
                'avaliacao_id' => $avaliacao->id,
                'parametro_id' => $parametro->id,
                'valor' => 0,
            ]);
        }            
        return redirect()->route('avaliacao.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Avaliacao $avaliacao)
    {
        $entidade = 'Avaliação';
        return view('avaliacao/mostrar', compact('entidade', 'avaliacao'));        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Avaliacao $avaliacao)
    {
        $entidade = 'Avaliação';
        $exames = Exame::all();
        $turmas = Turma::all();  
        $idProfessor = Tipo::where('nome','Professor')->get('id');
        $idMonitor   = Tipo::where('nome','Monitor')->get('id');
        $idAluno     = Tipo::where('nome','Aluno')->get('id');           
        $idProfessor = $idProfessor[0]->id;  
        $idMonitor   = $idMonitor[0]->id;   
        $idAluno     = $idAluno[0]->id;          
        $professores = Usuario::where('tipo_id',$idProfessor)->orWhere('tipo_id',$idMonitor)->get();//professor e monitor  
        $alunos =  Usuario::where('tipo_id',$idAluno)->get();                                         
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
        $avaliacao->observacao = $request->observacao;        
        $avaliacao->status = $request->status;
        $avaliacao->rascunho = $request->rascunho;                        
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
