<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use Illuminate\Http\Request;

class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entidade = 'Tipo';
        $dados = Tipo::all();
        return view('tipo/mostrartodos', compact('entidade', 'dados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $entidade = 'Tipo';
        return view('tipo/criar', compact('entidade'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tipo = new Tipo;
        $tipo->nome = $request->nome;
        $tipo->save();
        return redirect('tipo');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tipo $tipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tipo $tipo)
    {
        $entidade = 'Tipo';
        return view('tipo/alterar', compact('entidade','tipo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tipo $tipo)
    {
        $tipo = Tipo::find($request->id);
        $tipo->nome = $request->nome;        
        $tipo->update();
        return redirect('tipo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tipo $tipo)
    {
        $tipo->delete();
        return redirect('tipo');
    }
}
