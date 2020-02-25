<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Asignar extends Model
{
    protected $table = 'asignar';
    protected $fillable = ['zona', 'poliza', 'direccion', 'recorrido', 'year', 'mes', 'lote', 'periodo', 'consecutivo',
     'consecutivo_int', 'usuario', 'estado', 'estado_id'
        ];
}
