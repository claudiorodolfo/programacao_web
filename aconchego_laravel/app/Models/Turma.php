<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;

class Turma extends Model
{
    use HasFactory;
    protected $table = 'turma';

    public function usuariosTurmaConduzidos()
    {
        return $this->hasMany(Usuario::class, 'turma_id_conduzido');
    }

    public function usuariosTurmaCondutores()
    {
        return $this->hasMany(Usuario::class, 'turma_id_condutor');
    }     
}
