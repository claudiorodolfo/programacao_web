<?php

namespace App\Http\Controllers;

use App\Models\Turma;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $entidade = 'Turma';
        $dados = Turma::all();
        return view('turma/mostrartodos', compact('entidade', 'dados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $entidade = 'Turma';
        return view('turma/criar', compact('entidade'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $turma = new Turma;
        $turma->nome = $request->nome;
        $turma->save();
        return redirect()->route('turma.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Turma $turma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Turma $turma)
    {
        $entidade = 'Turma';
        return view('turma/alterar', compact('entidade','turma'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Turma $turma)
    {
        $turma = Turma::find($request->id);
        $turma->nome = $request->nome;        
        $turma->update();
        return redirect()->route('turma.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Turma $turma)
    {
        $turma->delete();
        return redirect()->route('turma.index');
    }
}