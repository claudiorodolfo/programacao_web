<?php

namespace App\Http\Controllers;

use App\Models\Avaliacao;
use App\Models\Usuario;
use App\Models\Turma;
use App\Models\Exame;
use Illuminate\Http\Request;

class AvaliacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entidade = 'Avaliacao';
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
        $professores = Usuario::where('tipo_id',8)->orWhere('tipo_id',9)->get();//professor e monitor  
        $alunos =  Usuario::where('tipo_id',10)->get();                     
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
        return redirect('avaliacao');
    }

    /**
     * Display the specified resource.
     */
    public function show(Avaliacao $avaliacao)
    {
        $entidade = 'Avaliacao';
        return view('avaliacao/mostrar', compact('entidade', 'avaliacao'));        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Avaliacao $avaliacao)
    {
        $entidade = 'Avaliacao';
        $exames = Exame::all();
        $turmas = Turma::all();   
        $professores = Usuario::where('tipo_id',8)->orWhere('tipo_id',9)->get();//professor e monitor  
        $alunos =  Usuario::where('tipo_id',10)->get();                                         
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
        $avaliacao->observacao = $observacao->senha;        
        $avaliacao->status = $request->status;
        $avaliacao->rascunho = $request->rascunho;                        
        $avaliacao->update();
        return redirect('avaliacao');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Avaliacao $avaliacao)
    {
        $avaliacao->delete();
        return redirect('avaliacao');
    }
}
