<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use App\Models\Turma;
use App\Models\Tipo;
use App\Models\Avaliacao;
use App\Models\Nota;
use App\Models\User;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
    private $entidade = 'Pessoa';

    /**
     * Show the user detailed feedback.
     */
    public function avaliacoes(Pessoa $pessoa)
    {
        $entidade = $this->entidade;
        $avaliacoes = Avaliacao::where('aluno_id', $pessoa->id)
            ->get();
                   
        return view('feedback/avaliacoes', compact('entidade', 'avaliacoes'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entidade = $this->entidade;
        $dados = Pessoa::all();

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
        $usuarios = User::doesntHave('usuarioPessoa')->get(); 
        return view('pessoa/criar', compact('entidade', 'turmas', 'tipos','usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pessoa = new Pessoa;
        //$pessoa->nome = $request->nome;
        //$pessoa->email = $request->email; 
        $pessoa->telefone = $request->telefone;
        $pessoa->endereco = $request->endereco;
        $pessoa->esta_ativo = $request->esta_ativo;
        $pessoa->senha = $request->senha;        
        $pessoa->turma_id_condutor = $request->turma_id_condutor;
        $pessoa->turma_id_conduzida = $request->turma_id_conduzida;                        
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
        $pessoa->telefone = $request->telefone;
        $pessoa->endereco = $request->endereco;
        $pessoa->esta_ativo = $request->esta_ativo;       
        $pessoa->turma_id_condutor = $request->turma_id_condutor;
        $pessoa->turma_id_conduzida = $request->turma_id_conduzida;                        
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
