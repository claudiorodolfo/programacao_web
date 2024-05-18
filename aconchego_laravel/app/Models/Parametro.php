<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Turma;
use App\Models\Nota;

class Parametro extends Model
{
    use HasFactory;
    protected $table = 'parametro';
    
    public function turma()
    {
        return $this->belongsTo(Turma::class, 'turma_id');
    }

    public function notasParametro()
    {
        return $this->hasMany(Nota::class, 'parametro_id', 'id');
    }         
}
