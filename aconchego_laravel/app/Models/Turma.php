<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pessoa;
use App\Models\Parametro;
use App\Models\Avaliacao;

class Turma extends Model
{
    use HasFactory;
    protected $table = 'turma';

    public function pessoasConduzidasTurma()
    {
        return $this->hasMany(Pessoa::class, 'turma_id_conduzida', 'id');
    }

    public function pessoasCondutoresTurma()
    {
        return $this->hasMany(Pessoa::class, 'turma_id_condutor', 'id');
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
