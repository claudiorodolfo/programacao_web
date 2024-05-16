<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use App\Models\Turma;
use App\Models\Tipo;
use App\Models\Avaliacao;
use App\Models\Nota;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
    private $entidade = 'Pessoa';
    /**
     * Show the user feedback.
     */
    public function feedback(Pessoa $pessoa)
    {
        $entidade = $this->entidade;
        $avaliacao = Avaliacao::where('aluno_id', $pessoa->id)->get();
        $idAvaliacao = $avaliacao[1]->id;

        $cabecalhoFeedback = Avaliacao::select('avaliacao.papel',
                'avaliacao.status', 
                'avaliacao.observacao', 
                'aluno.name as aluno', 
                'professor.name as professor', 
                'turma.nome as turma', 
                'exame.data as exame')
            ->join('users as aluno', 'avaliacao.aluno_id', '=', 'aluno.id')
            ->join('users as professor', 'avaliacao.professor_id', '=', 'professor.id')
            ->join('turma', 'avaliacao.turma_id', '=', 'turma.id')
            ->join('exame', 'avaliacao.exame_id', '=', 'exame.id')
            ->where('Avaliacao.id', $idAvaliacao)
            ->first();      
        
        $corpoFeedback = Nota::select('nota.valor', 
                'parametro.velocidade', 
                'parametro.quesito')
            ->join('parametro', 'nota.parametro_id' , '=', 'parametro.id')
            ->where('nota.avaliacao_id', $idAvaliacao)
            ->get();
                   
        return view('pessoa/feedback', compact('entidade', 'cabecalhoFeedback', 'corpoFeedback'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entidade = $this->entidade;
        $dados = Pessoa::select('*',
                'users.name as nome',
                'users.email')
        ->join('users', 'pessoa.id', '=', 'users.id')
        ->get();

        return view('pessoa/mostrartodos', compact('entidade', 'dados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $entidade = $this->entidade;
        $turmas = Turma::all();
        $tipos = Tipo::all();                  
        return view('pessoa/criar', compact('entidade', 'turmas', 'tipos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pessoa = new Pessoa;
        $pessoa->nome = $request->nome;
        $pessoa->email = $request->email; 
        $pessoa->telefone = $request->telefone;
        $pessoa->endereco = $request->endereco;
        $pessoa->esta_ativo = $request->esta_ativo;
        $pessoa->senha = $request->senha;        
        $pessoa->turma_id_condutor = $request->turma_id_condutor;
        $pessoa->turma_id_conduzido = $request->turma_id_conduzido;                        
        $pessoa->tipo_id = $request->tipo_id;
        $pessoa->save();
        return redirect()->route('pessoa.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pessoa $pessoa)
    {
        $entidade = $this->entidade;
        return view('pessoa/mostrar', compact('entidade', 'pessoa'));        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pessoa $pessoa)
    {
        $entidade = $this->entidade;
        $turmas = Turma::all();
        $tipos = Tipo::all();               
        return view('pessoa/alterar', compact('entidade','pessoa','turmas','tipos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pessoa $pessoa)
    {
        $pessoa = Pessoa::find($request->id);
        $pessoa->nome = $request->nome;
        $pessoa->email = $request->email; 
        $pessoa->telefone = $request->telefone;
        $pessoa->endereco = $request->endereco;
        $pessoa->esta_ativo = $request->esta_ativo;
        $pessoa->senha = $request->senha;        
        $pessoa->turma_id_condutor = $request->turma_id_condutor;
        $pessoa->turma_id_conduzido = $request->turma_id_conduzido;                        
        $pessoa->tipo_id = $request->tipo_id;                                
        $pessoa->update();
        return redirect()->route('pessoa.index');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pessoa $pessoa)
    {
        $pessoa->delete();
        return redirect()->route('pessoa.index');
    }
}
