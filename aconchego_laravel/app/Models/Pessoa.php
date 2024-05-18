<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Turma;
use App\Models\Tipo;
use App\Models\User;
use App\Models\Avaliacao;

class Pessoa extends Model
{
    use HasFactory;
    protected $table = 'pessoa';

    public function getTelefoneFormatadoAttribute()
    {
        $telefone = $this->attributes['telefone'];

        if (strlen($telefone) == 11) {
            return sprintf("(%s) %s-%s", substr($telefone, 0, 2), substr($telefone, 2, 5), substr($telefone, 7, 4));
        } elseif (strlen($telefone) == 10) {
            return sprintf("(%s) %s-%s", substr($telefone, 0, 2), substr($telefone, 2, 4), substr($telefone, 6, 4));
        } else {
            return $telefone;
        }
    }

    public function getEstaAtivoFormatadoAttribute()
    {
        $estaAtivo = $this->attributes['esta_ativo'];
        if ($estaAtivo)
            return "Sim";
        else
            return "Não";
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function tipo()
    {
        return $this->belongsTo(Tipo::class, 'tipo_id');
    } 

    public function turmaCondutor()
    {
        return $this->belongsTo(Turma::class, 'turma_id_condutor');
    }  

    public function turmaConduzida()
    {
        return $this->belongsTo(Turma::class, 'turma_id_conduzida');
    }
    
    public function avaliacoesPessoaProfessor()
    {
        return $this->hasMany(Avaliacao::class, 'professor_id', 'id');
    }

    public function avaliacoesPessoaAluno()
    {
        return $this->hasMany(Avaliacao::class, 'aluno_id', 'id');
    }    
}
