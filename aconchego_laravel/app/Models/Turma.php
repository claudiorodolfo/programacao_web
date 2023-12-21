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
        return $this->hasMany(Usuario::class, 'turma_id_conduzido');
    }

    public function usuariosCondutoresTurma()
    {
        return $this->hasMany(Usuario::class, 'turma_id_condutor');
    }

    public function parametrosTurma()
    {
        return $this->hasMany(Parametro::class, 'turma_id');
    }      
}
