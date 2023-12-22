<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;
use App\Models\Parametro;

class Turma extends Model
{
    use HasFactory;
    protected $table = 'turma';

    public function usuariosConduzidosTurma()
    {
        return $this->hasMany(Usuario::class, 'turma_id_conduzido', 'id');
    }

    public function usuariosCondutoresTurma()
    {
        return $this->hasMany(Usuario::class, 'turma_id_condutor', 'id');
    }

    public function parametrosTurma()
    {
        return $this->hasMany(Parametro::class, 'turma_id', 'id');
    }   
    
    public function avaliacoesTurma()
    {
        return $this->hasMany(Avaliacao::class, 'turma_id', 'id');
    }     
}
