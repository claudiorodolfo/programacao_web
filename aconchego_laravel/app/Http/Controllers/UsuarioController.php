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
        //$usuarios = Usuario::with('turmaCondutor', 'turmaConduzido')->get();
        //return dd($usuarios);
           $entidade = 'Usuário';        
        $dados = Usuario::all();
        return dd($dados);
    //    return view('usuario/mostrartodos', compact('entidade','dados'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
        //    ‘product_line_id’ => request(‘product_line_id’),
        //    ‘description’ => request(‘description’),
         //   ‘expiration_time’ => request(‘expiration_time’),
           // ‘price’ => request(‘price’)
            ];
            Usuario::create($data);
            return redirect('usuario/mostrartodos');
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        $entidade = 'Usuário';
        $usuario = Usuario::with('turmaCondutor', 'turmaConduzido', 'tipo')->get()->first();
        $turmas = Turma::all();
        $tipos = Tipo::all();
        return view('usuario/editar', compact('entidade','usuario', 'turmas', 'tipos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
     //   $product->product_line_id = $request->product_line_id;
     //   $product->description = $request->description;
     //   $product->expiration_time = $request->expiration_time;
     //   $product->price = $request->price;
        $usuario->save();
        
     //   return redirect(‘product’);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return redirect('usuario/mostrartodos');
    }
}
