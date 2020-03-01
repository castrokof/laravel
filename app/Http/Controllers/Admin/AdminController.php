<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use Yajra\DataTables\DataTables;



class AdminController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   

        $fechaAi=now()->toDateString()." 00:00:01";
        $fechaAf=now()->toDateString()." 23:59:59";

        if(request()->ajax())
        {

            if (!empty($request->periodo1) & !empty($request->zona1)) {
               
                $data = DB::table('ordenesmtl')
               ->select('zona','periodo','usuario', 'lote',
                DB::raw('SUM(CASE WHEN estado_id > 0 THEN 1 ELSE 0 END) AS Asignados'),
                DB::raw('SUM(CASE WHEN estado_id = 2 THEN 1 ELSE 0 END) AS Pendientes'),
                DB::raw('SUM(CASE WHEN estado_id = 4 THEN 1 ELSE 0 END) AS Ejecutadas'),
                DB::raw('SUM(CASE WHEN oposicion = "SI" THEN 1 ELSE 0 END) AS oposicion'),
                DB::raw('SUM(CASE WHEN mtl = "MTL" THEN 1 ELSE 0 END) AS MTL'),
                DB::raw('SUM(CASE WHEN mtl = "MTLC" THEN 1 ELSE 0 END) AS MTL_TIPO_C'),
                'fecha_de_ejecucion as inicio', 'fecha_de_ejecucion as Final')
                ->where([
                    ['periodo', $request->periodo1],
                    ['zona', $request->zona1],
                    ['estado', '!=', 'CARGADO'],
                    ])
                ->orderBy('inicio', 'asc')
                ->orderBy('Final', 'desc')
                ->groupBy('zona', 'periodo', 'usuario', 'lote', 'fecha_de_ejecucion')
                ->get();
                
            }else{

                $data = DB::table('ordenesmtl')
                ->select('zona','periodo','usuario', 'lote',
                DB::raw('SUM(CASE WHEN estado_id > 0 THEN 1 ELSE 0 END) AS Asignados'),
                DB::raw('SUM(CASE WHEN estado_id = 2 THEN 1 ELSE 0 END) AS Pendientes'),
                DB::raw('SUM(CASE WHEN estado_id = 4 THEN 1 ELSE 0 END) AS Ejecutadas'),
                DB::raw('SUM(CASE WHEN oposicion = "SI" THEN 1 ELSE 0 END) AS oposicion'),
                DB::raw('SUM(CASE WHEN mtl = "MTL" THEN 1 ELSE 0 END) AS MTL'),
                DB::raw('SUM(CASE WHEN mtl = "MTLC" THEN 1 ELSE 0 END) AS MTL_TIPO_C'),
                'fecha_de_ejecucion as inicio', 'fecha_de_ejecucion as Final')
                ->whereBetween('fecha_de_ejecucion', [$fechaAi,$fechaAf])
                ->orderBy('inicio', 'asc')
                ->orderBy('Final', 'desc')
                ->groupBy('zona', 'periodo', 'usuario', 'lote', 'fecha_de_ejecucion')
                ->get();

            }

           return  DataTables()->of($data)->make(true);

        }
        
        
        return view('admin.admin.index'); 


        // $Periodo=$request->periodo;
        // $Zona=$request->zona;
        
               
        // if(($Periodo != null & $Zona != null )){

        //     $datas=DB::table('ordenesmtl')
        //     ->where([
        //     ['periodo','=',$Periodo],
        //     ['zona','=',$Zona],
        //     ])
        //     ->select('zona','periodo','usuario', 'lote',
        //     DB::raw('SUM(CASE WHEN estado_id > 0 THEN 1 ELSE 0 END) AS Asignados'),
        //     DB::raw('SUM(CASE WHEN estado_id = 2 THEN 1 ELSE 0 END) AS Pendientes'),
        //     DB::raw('SUM(CASE WHEN estado_id = 4 THEN 1 ELSE 0 END) AS Ejecutadas'),
        //     DB::raw('SUM(CASE WHEN oposicion = "SI" THEN 1 ELSE 0 END) AS oposicion'),
        //     DB::raw('SUM(CASE WHEN mtl = "MTL" THEN 1 ELSE 0 END) AS MTL'),
        //     DB::raw('SUM(CASE WHEN mtl = "MTLC" THEN 1 ELSE 0 END) AS MTL_TIPO_C'),
        //     'fecha_de_ejecucion as inicio', 'fecha_de_ejecucion as Final')
        //     ->orderBy('inicio', 'asc')
        //     ->orderBy('Final', 'desc')
        //     ->groupBy('zona', 'periodo', 'usuario', 'lote', 'fecha_de_ejecucion')
        //     ->get();
            
            
            
              
    //         return view('admin.admin.index', compact("datas"))->withInput($request->input());
    
    //    }else{


    //     DB::table('ordenesmtl')
    //         ->where([
    //         ['periodo','=',$Periodo],
    //         ['zona','=',$Zona],
    //         ])
    //         ->select('zona','periodo','usuario', 'lote',
    //         DB::raw('SUM(CASE WHEN estado_id > 0 THEN 1 ELSE 0 END) AS Asignados'),
    //         DB::raw('SUM(CASE WHEN estado_id = 2 THEN 1 ELSE 0 END) AS Pendientes'),
    //         DB::raw('SUM(CASE WHEN estado_id = 4 THEN 1 ELSE 0 END) AS Ejecutadas'),
    //         DB::raw('SUM(CASE WHEN oposicion = "SI" THEN 1 ELSE 0 END) AS oposicion'),
    //         DB::raw('SUM(CASE WHEN mtl = "MTL" THEN 1 ELSE 0 END) AS MTL'),
    //         DB::raw('SUM(CASE WHEN mtl = "MTLC" THEN 1 ELSE 0 END) AS MTL_TIPO_C'),
    //         'fecha_de_ejecucion as inicio', 'fecha_de_ejecucion as Final')
    //         ->orderBy('inicio', 'asc')
    //         ->orderBy('Final', 'desc')
    //         ->groupBy('zona', 'periodo', 'usuario', 'lote', 'fecha_de_ejecucion')
    //         ->get();

    //     return view('admin.admin.index')->withInput($request->input());   

    //     } 
      
      
    
   
    }
   
}
