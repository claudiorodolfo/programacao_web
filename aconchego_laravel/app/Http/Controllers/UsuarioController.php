<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Turma;
use App\Models\Tipo;
use App\Models\Avaliacao;
use App\Models\Nota;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Show the user feedback.
     */
    public function feedback(Usuario $usuario)
    {
        $entidade = 'Usuario';
        $avaliacao = Avaliacao::where('aluno_id', $usuario->id)->get();
        $idAvaliacao = $avaliacao[1]->id;

        $cabecalhoFeedback = Avaliacao::select('avaliacao.papel',
                'avaliacao.status', 
                'avaliacao.observacao', 
                'aluno.nome as aluno', 
                'professor.nome as professor', 
                'turma.nome as turma', 
                'exame.data as exame')
            ->join('usuario as aluno', 'avaliacao.aluno_id', '=', 'aluno.id')
            ->join('usuario as professor', 'avaliacao.professor_id', '=', 'professor.id')
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
                   
        return view('usuario/feedback', compact('entidade', 'cabecalhoFeedback', 'corpoFeedback'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entidade = 'Usuario';
        $dados = Usuario::all();
        return view('usuario/mostrartodos', compact('entidade', 'dados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $entidade = 'Usuario';
        $turmas = Turma::all();
        $tipos = Tipo::all();                  
        return view('usuario/criar', compact('entidade', 'turmas', 'tipos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $usuario = new Usuario;
        $usuario->nome = $request->nome;
        $usuario->email = $request->email; 
        $usuario->telefone = $request->telefone;
        $usuario->endereco = $request->endereco;
        $usuario->esta_ativo = $request->esta_ativo;
        $usuario->senha = $request->senha;        
        $usuario->turma_id_condutor = $request->turma_id_condutor;
        $usuario->turma_id_conduzido = $request->turma_id_conduzido;                        
        $usuario->tipo_id = $request->tipo_id;
        $usuario->save();
        return redirect()->route('usuario.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        $entidade = 'Usuario';
        return view('usuario/mostrar', compact('entidade', 'usuario'));        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        $entidade = 'Usuario';
        $turmas = Turma::all();
        $tipos = Tipo::all();               
        return view('usuario/alterar', compact('entidade','usuario','turmas','tipos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        $usuario = Usuario::find($request->id);
        $usuario->nome = $request->nome;
        $usuario->email = $request->email; 
        $usuario->telefone = $request->telefone;
        $usuario->endereco = $request->endereco;
        $usuario->esta_ativo = $request->esta_ativo;
        $usuario->senha = $request->senha;        
        $usuario->turma_id_condutor = $request->turma_id_condutor;
        $usuario->turma_id_conduzido = $request->turma_id_conduzido;                        
        $usuario->tipo_id = $request->tipo_id;                                
        $usuario->update();
        return redirect()->route('usuario.index');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuario.index');
    }
}
