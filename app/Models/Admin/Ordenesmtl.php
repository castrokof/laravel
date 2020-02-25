<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Ordenesmtl extends Model
{
    protected $table = 'ordenesmtl';
    protected $fillable = ['ordenesmtl_id', 'zona', 'poliza', 'direccion', 'recorrido', 'medidor', 'nombre', 'year', 'mes',
    'lote', 'periodo', 'consecutivo', 'consecutivo_int', 'ruta', 'tope', 'usuario', 'fecha_de_ejecucion', 'new_medidor', 'lectura',
     'oposicion', 'sin_caja', 'sin_tapa', 'fuga_antes', 'fuga_despues', 'talco_roto', 'posible_fraude', 'mtl', 'coordenada',
      'latitud', 'longitud', 'estado', 'estado_id', 'foto1', 'foto2', 'foto3', 'foto4', 'foto5', 'foto6', 'foto7', 'foto8',
       'futuro', 'futuro1', 'futuro2'
        ];
}
