<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    protected $table = 'entrada';
    protected $fillable = ['zona', 'poliza', 'direccion', 'recorrido', 'medidor', 'nombre', 'year', 'mes', 'lote', 'periodo',
     'consecutivo', 'consecutivo_int', 'ruta', 'tope'
        ];
}
