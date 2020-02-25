<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Orden_ejecutada extends Model
{
    protected $table = 'orden_ejecutada';
    protected $fillable = ['id', 'ordenejecutada_id', 'poliza', 'usuario', 'fecha_de_ejecucion', 'new_medidor', 'lectura',
     'oposicion', 'sin_caja', 'sin_tapa', 'fuga_antes', 'fuga_despues', 'talco_roto', 'posible_fraude', 'mtl', 'coordenada',
      'latitud', 'longitud', 'estado', 'estado_id', 'foto1', 'foto2', 'foto3', 'foto4', 'foto5', 'foto6', 'foto7', 'foto8', 
      'futuro', 'futuro1', 'futuro2'
        ];
}
