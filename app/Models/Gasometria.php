<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ParametrosAtingidos;

class Gasometria extends Model
{
    use HasFactory;
    protected $table = 'gasometrias';


    public function parametros()
    {
        return $this->belongsTo('App\Models\ParametrosAtingidos');
    }
    
}
