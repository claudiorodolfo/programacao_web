<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Avaliacao;
use App\Models\Parametro;

class Nota extends Model
{
    use HasFactory;
    protected $table = 'nota';     
    protected $fillable = ['avaliacao_id','parametro_id','valor'];
    
    public function avaliacao()
    {
        return $this->belongsTo(Avaliacao::class, 'avaliacao_id');
    }  

    public function parametro()
    {
        return $this->belongsTo(Parametro::class, 'parametro_id');
    }      
}
