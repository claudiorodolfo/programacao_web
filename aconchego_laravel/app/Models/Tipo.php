<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pessoa;

class Tipo extends Model
{
    use HasFactory;
    protected $table = 'tipo';  

    public function pessoasTipo()
    {
        return $this->hasMany(Pessoa::class, 'tipo_id', 'id');
    }    
}
