<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Ordenmtlasignar extends Model
{
    protected $table = 'ordenmtlasignar';
    protected $fillable = ['ordenmtl_id', 'asignar_id', 'usuario', 'estado', 'estado_id'
        ];
}
