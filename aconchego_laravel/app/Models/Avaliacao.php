<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pessoa;
use App\Models\Turma;
use App\Models\Exame;
use App\Models\Nota;

class Avaliacao extends Model
{
    use HasFactory;
    protected $table = 'avaliacao';

    public function pessoaAluno()
    {
        return $this->belongsTo(Pessoa::class, 'aluno_id');
    } 

    public function pessoaProfessor()
    {
        return $this->belongsTo(Pessoa::class, 'professor_id');
    } 

    public function turma()
    {
        return $this->belongsTo(Turma::class, 'turma_id');
    } 
    
    public function exame()
    {
        return $this->belongsTo(Exame::class, 'exame_id');
    }

    public function notasAvaliacao()
    {
        return $this->hasMany(Nota::class, 'avaliacao_id', 'id');
    }         
}
