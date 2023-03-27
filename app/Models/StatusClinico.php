<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusClinico extends Model
{
    protected $table = 'status_clinicos';

    use HasFactory;
    use SoftDeletes;
    

    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente');
    }

    public function higiene()
    {
        return $this->hasMany('App\Models\HigieneParenquima');
    }

    public function gasometria()
    {
        return $this->hasMany('App\Models\Gasometria');
    }

}
