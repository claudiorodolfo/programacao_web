<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;
use App\Models\Turma;
use App\Models\Exame;

class Avaliacao extends Model
{
    use HasFactory;
    protected $table = 'avaliacao';

    public function usuarioAluno()
    {
        return $this->belongsTo(Usuario::class, 'aluno_id');
    } 

    public function usuarioProfessor()
    {
        return $this->belongsTo(Usuario::class, 'professor_id');
    } 

    public function turma()
    {
        return $this->belongsTo(Turma::class, 'turma_id');
    } 
    
    public function exame()
    {
        return $this->belongsTo(Exame::class, 'exame_id');
    }     
}
