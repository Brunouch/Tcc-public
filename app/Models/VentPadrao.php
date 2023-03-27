<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VentPadrao extends Model
{
    protected $table = 'ventPadrao';

    use HasFactory;
    use SoftDeletes;

    
    public function vent()
    {
        return $this->hasMany('App\Model\VentiladorMec');
    }
}