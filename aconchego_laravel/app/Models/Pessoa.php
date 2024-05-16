<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Turma;
use App\Models\Tipo;

class Pessoa extends Model
{
    use HasFactory;
    protected $table = 'pessoa';

    public function tipo()
    {
        return $this->belongsTo(Tipo::class, 'tipo_id');
    } 

    public function turmaCondutor()
    {
        return $this->belongsTo(Turma::class, 'turma_id_condutor');
    }  

    public function turmaConduzido()
    {
        return $this->belongsTo(Turma::class, 'turma_id_conduzido');
    }
    
    public function avaliacoesProfessorPessoa()
    {
        return $this->hasMany(Avaliacao::class, 'professor_id', 'id');
    }

    public function avaliacoesAlunoPessoa()
    {
        return $this->hasMany(Avaliacao::class, 'aluno_id', 'id');
    }    
}
