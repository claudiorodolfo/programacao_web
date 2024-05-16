<?php

namespace App\Http\Controllers;

use App\Models\Parametro;
use App\Models\Turma;
use Illuminate\Http\Request;

class ParametroController extends Controller
{
    private $entidade = 'Parametro';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entidade = $this->entidade;
        $dados = Parametro::all();
        return view('parametro/mostrartodos', compact('entidade', 'dados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $entidade = $this->entidade;
        $turmas = Turma::all();          
        return view('parametro/criar', compact('entidade', 'turmas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $parametro = new Parametro;
        $parametro->turma_id = $request->turma_id;
        $parametro->velocidade = $request->velocidade;
        $parametro->quesito = $request->quesito;                
        $parametro->save();
        return redirect()->route('parametro.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Parametro $parametro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Parametro $parametro)
    {
        $entidade = $this->entidade;
        $turmas = Turma::all();        
        return view('parametro/alterar', compact('entidade','parametro','turmas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Parametro $parametro)
    {
        $parametro = Parametro::find($request->id);
        $parametro->turma_id = $request->turma_id;
        $parametro->velocidade = $request->velocidade; 
        $parametro->quesito = $request->quesito;                         
        $parametro->update();
        return redirect()->route('parametro.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Parametro $parametro)
    {
        $parametro->delete();
        return redirect()->route('parametro.index');
    }
}
