<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Exame extends Model
{
    use HasFactory;
    protected $table = 'exame'; 
    
    public function getDataFormatadaAttribute()
    {
        return Carbon::parse($this->attributes['data'])->format('d/m/Y');
    }

    public function avaliacoesExame()
    {
        return $this->hasMany(Avaliacao::class, 'exame_id', 'id');
    }  
}
