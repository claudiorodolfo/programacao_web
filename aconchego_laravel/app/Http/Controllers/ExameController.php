<?php

namespace App\Http\Controllers;

use App\Models\Exame;
use Illuminate\Http\Request;

class ExameController extends Controller
{
    private $entidade = 'Exame';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entidade = $this->entidade;
        $dados = Exame::all();
        return view('exame/mostrartodos', compact('entidade', 'dados'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $entidade = $this->entidade;
        return view('exame/criar', compact('entidade'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $exame = new Exame;
        $exame->data = $request->data;        
        $exame->nome = $request->nome;
        $exame->save();
        return redirect()->route('exame.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Exame $exame)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exame $exame)
    {
        $entidade = $this->entidade;
        return view('exame/alterar', compact('entidade','exame'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Exame $exame)
    {
        $exame = Exame::find($request->id);
        $exame->data = $request->data;         
        $exame->nome = $request->nome;        
        $exame->update();
        return redirect()->route('exame.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exame $exame)
    {
        $exame->delete();
        return redirect()->route('exame.index');
    }
}
