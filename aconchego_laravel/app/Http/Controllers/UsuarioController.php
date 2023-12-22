<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Turma;
use App\Models\Tipo;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
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
        return redirect('usuario');        
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
        return redirect('usuario');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return redirect('usuario');
    }
}
