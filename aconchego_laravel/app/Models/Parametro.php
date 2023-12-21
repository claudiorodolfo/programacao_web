<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Turma;

class Parametro extends Model
{
    use HasFactory;
    protected $table = 'parametro';
    
    public function turma()
    {
        return $this->belongsTo(Turma::class, 'turma_id');
    }     
}
