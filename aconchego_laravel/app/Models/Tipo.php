<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;

class Tipo extends Model
{
    use HasFactory;
    protected $table = 'tipo';  

    public function usuariosTipo()
    {
        return $this->hasMany(Usuario::class, 'tipo_id');
    }    
}
