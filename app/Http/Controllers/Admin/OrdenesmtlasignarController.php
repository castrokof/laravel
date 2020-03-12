<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Ordenesmtl;
use App\Models\Seguridad\Usuario;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class  OrdenesmtlasignarController extends Controller
{
    public function index(Request $request)
    {   

        $fechaAi=now()->toDateString()." 00:00:01";
        $fechaAf=now()->toDateString()." 23:59:59";
    
        if(request()->ajax())
        {    
        
        if(!empty($request->periodo) && !empty($request->zona) && !empty($request->estado) && empty($request->orden) && empty($request->ordenf)){

            //$datas=DB::table('ordenesmtl')
            $datas=Ordenesmtl::orderBy('id')
            ->where([
            ['periodo','=',$request->periodo],
            ['zona','=',$request->zona],
            ['estado','=',$request->estado],
            ])
            //->whereBetween('ordenesmtl_id', [$request->orden, $request->ordenf])    
            // ->select('id','ordenesmtl_id', 'estado', 'usuario', 'poliza','direccion','recorrido',
            //     'periodo','zona')
            ->get();
        }elseif(!empty($request->periodo) && !empty($request->zona) && !empty($request->estado) && !empty($request->orden) && !empty($request->ordenf)){  
            
            // $datas=DB::table('ordenesmtl')
            $datas=Ordenesmtl::orderBy('id')
            ->where([
            ['periodo','=',$request->periodo],
            ['zona','=',$request->zona],
            ['estado','=',$request->estado],
            ])
            ->whereBetween('ordenesmtl_id', [$request->orden, $request->ordenf])    
            // ->select('id','ordenesmtl_id', 'estado', 'usuario', 'poliza','direccion','recorrido',
            //     'periodo','zona')
            ->get();
        }else{      
            //$datas=DB::table('ordenesmtl')
            $datas=Ordenesmtl::orderBy('id')
            ->where([
            ['periodo','=',$request->periodo],
            ['zona','=',$request->zona],
            ['estado','=',$request->estado],
            ])
            ->whereBetween('fecha_de_ejecucion', [$fechaAi,$fechaAf])
            // ->select('ordenesmtl_id', 'estado', 'usuario', 'poliza','direccion','recorrido',
            //     'periodo','zona')
            ->get();   

            }  
            
            return  DataTables::of($datas)
            ->addColumn('checkbox','<input type="checkbox" name="orden_id[]"  value="{{$id}}" class="orden_id" title="Selecciona Orden"
            />')
            ->rawColumns(['checkbox'])
            ->make(true);
        }
      
        $usuarios=Usuario::orderBy('id')->where('tipodeusuario','movil')->pluck('usuario', 'id');   
        
        return view('admin.ordenes.index', compact('usuarios'));   
    }
  
    

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request)
    {   

    if (request()->ajax()) {
        // $asignar = $request->asignar;
        // $desasignar  = $request->desasignar;
        
        
        // if ($asignar == $asignar & $desasignar == null ) {
     
        $id = $request->input('id');
        $usuario = $request->input('usuario');
        
        foreach ($id as $ids ){    
            $estado2 = DB::table('ordenesmtl')
            ->where([['id', $ids],
             ['estado_id', '=', 1 ]])
             ->count(); 
        
        }    

        if($usuario != null & $estado2>0){

        foreach ($id as $fila ) {

            DB::table('ordenesmtl')
            ->where([
                     ['id', '=', $fila],
                     ['estado_id', '=', 1],
                    ])
            ->update(['usuario' => $usuario,
                     'estado_id' => 2,
                     'estado' => 'PENDIENTE'  
                     ]);           
               
         }
         return response()->json(['mensaje' => 'ok']);
        } else{

        return response()->json(['mensaje'=>'debe de seleccionar un usuario']);   
        } 
        
    } else {
        abort(404);
           }
 }
 
    
       
    //     return redirect('admin/asignacion')->with('mensaje', 'Debe seleccionar una orden cargada');

    // } else if ($asignar == null & $desasignar == $desasignar) {
        
    //     $id=$request->id;
    //     $usuario=$request->usuario;
    
    // foreach ($id as $ids ){  
    //    $estado1 = DB::table('ordenesmtl')
    //        ->where([['id', $ids],
    //         ['estado_id', '=', 2]])
    //         ->count(); 
    //     } 
    //         if($estado1>0){

    //         foreach ($id as $fila ) {
           
    //          DB::table('ordenesmtl')
    //         ->where([['id', $fila],
    //                  ['estado_id', '=', 2]])
    //         ->update(['usuario' => '',
    //                  'estado_id' => 1,
    //                  'estado' => 'CARGADO'  
    //                  ]);           
               
    //     }
    //     return redirect('admin/asignacion')->with('mensaje', 'Ordenes desasignadas correctamente');

    //     } 
    //     return redirect('admin/asignacion')->with('mensaje', 'Debe seleccionar una orden pendiente');

    // }else{return redirect('admin/asignacion')->with('mensaje', 'Debe seleccionar una orden');}



//  public function index1(Request $request)
//  {   


//  $fechaAi=now()->toDateString()." 00:00:01";
//  $fechaAf=now()->toDateString()." 23:59:59";

//  if(request()->ajax())
//  {

//      if (!empty($request->periodo1) & !empty($request->zona1)) {
        
//          $data = DB::table('ordenesmtl')
//         ->select('zona','periodo','usuario', 'lote',
//          DB::raw('SUM(CASE WHEN estado_id > 0 THEN 1 ELSE 0 END) AS Asignados'),
//          DB::raw('SUM(CASE WHEN estado_id = 2 THEN 1 ELSE 0 END) AS Pendientes'),
//          DB::raw('SUM(CASE WHEN estado_id = 4 THEN 1 ELSE 0 END) AS Ejecutadas'),
//          DB::raw('SUM(CASE WHEN oposicion = "SI" THEN 1 ELSE 0 END) AS oposicion'),
//          DB::raw('SUM(CASE WHEN mtl = "MTL" THEN 1 ELSE 0 END) AS MTL'),
//          DB::raw('SUM(CASE WHEN mtl = "MTLC" THEN 1 ELSE 0 END) AS MTL_TIPO_C'),
//          'fecha_de_ejecucion as inicio', 'fecha_de_ejecucion as Final')
//          ->where([
//              ['periodo', $request->periodo1],
//              ['zona', $request->zona1],
//              ['estado', '!=', 'CARGADO'],
//              ])
//          ->orderBy('inicio', 'asc')
//          ->orderBy('Final', 'desc')
//          ->groupBy('zona', 'periodo', 'usuario', 'lote', 'fecha_de_ejecucion')
//          ->get();
         
//      }else{

//          $data = DB::table('ordenesmtl')
//          ->select('zona','periodo','usuario', 'lote',
//          DB::raw('SUM(CASE WHEN estado_id > 0 THEN 1 ELSE 0 END) AS Asignados'),
//          DB::raw('SUM(CASE WHEN estado_id = 2 THEN 1 ELSE 0 END) AS Pendientes'),
//          DB::raw('SUM(CASE WHEN estado_id = 4 THEN 1 ELSE 0 END) AS Ejecutadas'),
//          DB::raw('SUM(CASE WHEN oposicion = "SI" THEN 1 ELSE 0 END) AS oposicion'),
//          DB::raw('SUM(CASE WHEN mtl = "MTL" THEN 1 ELSE 0 END) AS MTL'),
//          DB::raw('SUM(CASE WHEN mtl = "MTLC" THEN 1 ELSE 0 END) AS MTL_TIPO_C'),
//          'fecha_de_ejecucion as inicio', 'fecha_de_ejecucion as Final')
//          ->whereBetween('fecha_de_ejecucion', [$fechaAi,$fechaAf])
//          ->orderBy('inicio', 'asc')
//          ->orderBy('Final', 'desc')
//          ->groupBy('zona', 'periodo', 'usuario', 'lote', 'fecha_de_ejecucion')
//          ->get();

//      }

//     return  DataTables()->of($data)
//     ->addColumn('detalle','<input type="button" name="id[]" class=btn-accion-tabla tooltipsC" title="Consulta el detalle"
//     value="{{$id}}" />')
//     ->rowcolumn()
//     ->make(true);

//  }
 
 
//  return view('admin.detalleorden.index'); 





// }

public function medidorall(Request $request)
    {   
     
       $Usuario=$request->usuario;
       $Estado=$request->estado_id;
        
        $medidorapi = DB::table('ordenesmtl')
        ->where([
            ['estado_id','=',$Estado],
            ['usuario','=',$Usuario],
            ])
      ->select('id', 'zona', 'poliza', 'direccion', 'recorrido','medidor', 'nombre', 'lote', 'consecutivo', 'ruta', 'tope', 'usuario', 'estado_id')
      ->get();

        return response()->json($medidorapi);
        
    }    

    // Controlador de seguimiento de orden




}


