<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Ordenesmtl;
use App\Models\Seguridad\Usuario;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Intervention\Image\ImageManagerStatic as Image;

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
            ->whereBetween('consecutivo_int', [$request->orden, $request->ordenf])    
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
            
            return  DataTables()->of($datas)
            ->addColumn('checkbox','<input type="checkbox" name="case[]"  value="{{$id}}" class="case" title="Selecciona Orden"
            />')
            ->rawColumns(['checkbox'])
            ->make(true);
        }
      
        $usuarios=Usuario::orderBy('id')->where('tipodeusuario','movil')->pluck('usuario', 'id');   
        
        return view('admin.ordenes.index', compact('usuarios'));   
    }
   

    public function actualizar(Request $request)
    {   

    if (request()->ajax()) {
        
        $id = $request->input('id');
        $usuario = $request->input('usuario');
        $nombreu = Usuario::where('usuario',$usuario)->first();
        
        
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
                     'estado' => 'PENDIENTE',
                     'nombreu' => $nombreu->nombre
                     ]);           
               
         }
            
        
         return response()->json(['mensaje' => 'ok']);
        } else{

        return response()->json(['mensaje'=>'ng']);   
        } 
        
    } else {
        abort(404);
           }
 }
 
 public function desasignar(Request $request)
    {   

    if (request()->ajax()) {
       
        $id = $request->input('id');
                
        foreach ($id as $ids ){    
            $estado2 = DB::table('ordenesmtl')
            ->where([['id', $ids],
             ['estado_id', '=', 2 ]])
             ->count(); 
        
        }    

        if($estado2>0){

        foreach ($id as $fila ) {

            DB::table('ordenesmtl')
            ->where([
                     ['id', '=', $fila],
                     ['estado_id', '=', 2],
                    ])
            ->update(['usuario' => '',
                     'estado_id' => 1,
                     'estado' => 'CARGADO',
                     'nombreu' => ''
                     ]);           
               
         }
         return response()->json(['mensaje' => 'ok']);
        } else{

        return response()->json(['mensaje'=>'ng']);   
        } 
        
    } else {
        abort(404);
           }
 }   
    

 public function medidorall(Request $request)
    {   
     
       $Usuario=$request->usuario;
       $Estado=$request->estado_id;
        
        $medidorapi = DB::table('ordenesmtl')
        ->where([
            ['estado_id','=',$Estado],
            ['usuario','=',$Usuario],
            ])
      ->select('id', 'zona', 'poliza', 'direccion', 'recorrido','medidor', 'nombre', 'lote','consecutivo', 'ruta', 'tope', 'usuario', 'estado_id')
      ->get();

        return response()->json($medidorapi);
        
    }    

 // Controlador de seguimiento de orden
  public function seguimiento(Request $request)
    {   

        $fechaAi=now()->toDateString()." 00:00:01";
        $fechaAf=now()->toDateString()." 23:59:59";
        
    

        if(request()->ajax())
        {    
        
        $usuario = $request->usuario;
        
        
           
        if(!empty($request->periodo) && !empty($request->zona) && !empty($usuario) && empty($request->estado)){
            $datas=Ordenesmtl::orderBy('id')
            ->where
            ([
            ['periodo','=',$request->periodo],
            ['zona','=',$request->zona],
            ['usuario','=',$usuario]
            ])
           ->get();
                    
        }else  if(!empty($request->periodo) && !empty($request->zona) && !empty($usuario) && !empty($request->estado)){
            $datas=Ordenesmtl::orderBy('id')
            ->where
            ([
            ['periodo','=',$request->periodo],
            ['zona','=',$request->zona],
            ['usuario','=',$usuario],
            ['estado','=',$request->estado]
            ])
           ->get(); 
        
        
        
        
        
        }else  if(!empty($request->periodo) && !empty($request->zona) && !empty($request->estado)){
            $datas=Ordenesmtl::orderBy('id')
            ->where
            ([
            ['periodo','=',$request->periodo],
            ['zona','=',$request->zona],
            ['estado','=',$request->estado]
            ])
           ->get(); 
        
        
        
        
        
        }else if(!empty($request->periodo) && !empty($request->zona)){
            $datas=Ordenesmtl::orderBy('id')
            ->where
            ([
            ['periodo','=',$request->periodo],
            ['zona','=',$request->zona]
            ])
            ->get();
        
       
            }elseif(!empty($request->medidor) || (!empty($request->medidor) && !empty($request->estado)) || (!empty($request->medidor) && !empty($request->fechaini) && !empty($request->fechafin))){
            
            $datas=Ordenesmtl::orderBy('id')
            ->where([
            ['medidor','=',$request->medidor],
            ])
            ->orwhere([
                ['medidor','=',$request->medidor],
                ['estado','=',$request->estado],
              ])
            ->orwhere([
                ['medidor','=',$request->medidor],
              ])
            ->whereBetween('fecha_de_ejecucion', [$request->fechaini." 00:00:01",$request->fechafin." 23:59:59"])
            ->get();
        }elseif(!empty($request->poliza) || (!empty($request->poliza) && !empty($request->estado)) || (!empty($request->poliza) && !empty($request->fechaini) && !empty($request->fechafin))){      
            $datas=Ordenesmtl::orderBy('id')
            ->where([
              ['poliza','=',$request->poliza],
              ])
            ->orwhere([
                ['poliza','=',$request->poliza],
                ['estado','=',$request->estado],
              ])
            ->orwhere([
                ['poliza','=',$request->poliza],
              ])
            ->whereBetween('fecha_de_ejecucion', [$request->fechaini." 00:00:01",$request->fechafin." 23:59:59"])
            ->get();   

        }elseif(!empty($request->fechaini) && !empty($request->fechafin)){      
            $datas=Ordenesmtl::orderBy('id')
            ->whereBetween('fecha_de_ejecucion', [$request->fechaini." 00:00:01",$request->fechafin." 23:59:59"])
            ->get();   
            }else{

            $datas=Ordenesmtl::orderBy('id')
            ->whereBetween('fecha_de_ejecucion', [$fechaAi,$fechaAf])
            ->get();   
        }  
            
            return  DataTables()->of($datas)
            ->addColumn('foto','<a target="_blank" href="{{url("admin/seguimiento/$id")}}" class="tooltipsC" title="Foto"><i class="fa fa-camera"></i>
            </a>')
            ->addColumn('foto_Url','{{url("admin/seguimiento/$id")}}')
            ->addColumn('detalle','<a target="_blank" href="{{url("admin/seguimientodetalle/$id")}}" class="btn btn-xs btn-warning tooltipsC" title="detalle"
            >Orden detalle</a>')
            ->addColumn('detalle_Url','{{url("admin/seguimientodetalle/$id")}}')
            ->rawColumns(['detalle','foto','foto_Url','detalle_Url' ])
            ->make(true);
        }
      
        $usuarios=Usuario::orderBy('id')->where('tipodeusuario','movil')->pluck('usuario', 'id');   
        
        return view('admin.ordenes.seguimiento', compact('usuarios'));   
    }

    
     public function fotos($id)
    {
         $datas=Ordenesmtl::orderBy('id')
            ->where
            ([
            ['id','=',$id]
             ])
            ->get();
        
         foreach ($datas as $data ){    
            $poliza = $data->poliza;
            $foto1 = $data->foto1;
            $foto2 = $data->foto2;
            $foto3 = $data->foto3;
            $foto4 = $data->foto4;
            $foto5 = $data->foto5;
            $foto6 = $data->foto6;
            $foto7 = $data->foto7;
            $foto8 = $data->foto8;
            }    
       
       if($foto1 != null){
       $img1 = Image::make(public_path($foto1));
        $textimage = $poliza;
        $img1->text($textimage, 10, 450,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img1->save(public_path('/tmp/'.$foto1));
        $img1->destroy();
       }
      
      if($foto2 != null){  
        $img2 = Image::make(public_path($foto2));
        $textimage = $poliza;
        $img2->text($textimage, 10, 450,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
       $img2->save(public_path('/tmp/'.$foto2));
       $img2->destroy();
      }
      
      if($foto3 != null){  
        $img3 = Image::make(public_path($foto3));
        $textimage = $poliza;
        $img3->text($textimage, 10, 450,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
       $img3->save(public_path('/tmp/'.$foto3));
       $img3->destroy();
      }
      
        
      if($foto4 != null){
        
        $img4 = Image::make(public_path($foto4));
        $textimage = $poliza;
        $img4->text($textimage, 10, 450,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); });
        $img4->save(public_path('/tmp/'.$foto4));
        $img4->destroy();
      }  
           
        if($foto5 != null){
        
        $img5 = Image::make(public_path($foto5));
        $textimage = $poliza;
        $img5->text($textimage, 10, 450,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); });
        $img5->save(public_path('/tmp/'.$foto5));
        $img5->destroy();   
        }  
           
        if($foto6 != null){
        
        $img6 = Image::make(public_path($foto6));
        $textimage = $poliza;
        $img6->text($textimage, 10, 450,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); });
        $img6->save(public_path('/tmp/'.$foto6));
        $img6->destroy();
        }    
           
        if($foto7 != null){
        
        $img7 = Image::make(public_path($foto7));
        $textimage = $poliza;
        $img7->text($textimage, 10, 450,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); });
        $img7->save(public_path('/tmp/'.$foto7));
        $img7->destroy();
        }   
           
        if($foto8 != null){
        
        $img8 = Image::make(public_path($foto8));
        $textimage = $poliza;
        $img8->text($textimage, 10, 450,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); });
        $img8->save(public_path('/tmp/'.$foto8));
        $img8->destroy();   
          
      }
       
        return view('admin.ordenes.fotos', compact('datas'));    
            
    }
    
    
    public function detalle($id)
    {
         $datas=Ordenesmtl::orderBy('id')
            ->where
            ([
            ['id','=',$id]
             ])
            ->get();
            
      foreach ($datas as $data ){    
            $poliza = $data->poliza;
            $foto1 = $data->foto1;
            $foto2 = $data->foto2;
            $foto3 = $data->foto3;
            $foto4 = $data->foto4;
            $foto5 = $data->foto5;
            $foto6 = $data->foto6;
            $foto7 = $data->foto7;
            $foto8 = $data->foto8;
            }    
       
       if($foto1 != null){
       $img1 = Image::make(public_path($foto1));
        $textimage = $poliza;
        $img1->text($textimage, 10, 450,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img1->save(public_path('/tmp/'.$foto1));
        $img1->destroy();
       }
      
      if($foto2 != null){  
        $img2 = Image::make(public_path($foto2));
        $textimage = $poliza;
        $img2->text($textimage, 10, 450,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
       $img2->save(public_path('/tmp/'.$foto2));
       $img2->destroy();
      }
      
      if($foto3 != null){  
        $img3 = Image::make(public_path($foto3));
        $textimage = $poliza;
        $img3->text($textimage, 10, 450,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
       $img3->save(public_path('/tmp/'.$foto3));
       $img3->destroy();
      }
      
        
      if($foto4 != null){
        
        $img4 = Image::make(public_path($foto4));
        $textimage = $poliza;
        $img4->text($textimage, 10, 450,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); });
        $img4->save(public_path('/tmp/'.$foto4));
        $img4->destroy();
      }  
           
        if($foto5 != null){
        
        $img5 = Image::make(public_path($foto5));
        $textimage = $poliza;
        $img5->text($textimage, 10, 450,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); });
        $img5->save(public_path('/tmp/'.$foto5));
        $img5->destroy();   
        }  
           
        if($foto6 != null){
        
        $img6 = Image::make(public_path($foto6));
        $textimage = $poliza;
        $img6->text($textimage, 10, 450,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); });
        $img6->save(public_path('/tmp/'.$foto6));
        $img6->destroy();
        }    
           
        if($foto7 != null){
        
        $img7 = Image::make(public_path($foto7));
        $textimage = $poliza;
        $img7->text($textimage, 10, 450,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); });
        $img7->save(public_path('/tmp/'.$foto7));
        $img7->destroy();
        }   
           
        if($foto8 != null){
        
        $img8 = Image::make(public_path($foto8));
        $textimage = $poliza;
        $img8->text($textimage, 10, 450,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); });
        $img8->save(public_path('/tmp/'.$foto8));
        $img8->destroy();   
          
      }       
            
            
        return view('admin.ordenes.detalle', compact('datas'));    
            
    }        
        
 public function exportarExcel(Request $request)
    {   

        $fechaAi=now()->toDateString()." 00:00:01";
        $fechaAf=now()->toDateString()." 23:59:59";
        
    
        if(!empty($request->periodo) && !empty($request->zona) && (!empty($request->usuario) || !empty($request->estado))){
            $datas=Ordenesmtl::orderBy('id')
            ->where
            ([
            ['periodo','=',$request->periodo],
            ['zona','=',$request->zona],
            ['usuario','=',$request->usuario]
            ])
            ->orwhere
            ([
            ['periodo','=',$request->periodo],
            ['zona','=',$request->zona],
            ['estado','=',$request->estado]
            ])
            
            ->get();
                    
        }else if(!empty($request->periodo) && !empty($request->zona)){
            $datas=Ordenesmtl::orderBy('id')
            ->where
            ([
            ['periodo','=',$request->periodo],
            ['zona','=',$request->zona]
            ])
            ->get();
        
        Excel::create('Ordenes_mtl', function ($excel) use ($datas) {
        
        $excel->sheet('Hoja Uno', function ($sheet) use ($datas) {    
            
                $sheet->with($datas, null, 'A1', false, false);
                });
            
        })->download('xlsx');
        
        
            }elseif(!empty($request->medidor) || (!empty($request->medidor) && !empty($request->estado)) || (!empty($request->medidor) && !empty($request->fechaini) && !empty($request->fechafin))){
            
            $datas=Ordenesmtl::orderBy('id')
            ->where([
            ['medidor','=',$request->medidor],
            ])
            ->orwhere([
                ['medidor','=',$request->medidor],
                ['estado','=',$request->estado],
              ])
            ->orwhere([
                ['medidor','=',$request->medidor],
              ])
            ->whereBetween('fecha_de_ejecucion', [$request->fechaini." 00:00:01",$request->fechafin." 23:59:59"])
            ->get();
        }elseif(!empty($request->poliza) || (!empty($request->poliza) && !empty($request->estado)) || (!empty($request->poliza) && !empty($request->fechaini) && !empty($request->fechafin))){      
            $datas=Ordenesmtl::orderBy('id')
            ->where([
              ['poliza','=',$request->poliza],
              ])
            ->orwhere([
                ['poliza','=',$request->poliza],
                ['estado','=',$request->estado],
              ])
            ->orwhere([
                ['poliza','=',$request->poliza],
              ])
            ->whereBetween('fecha_de_ejecucion', [$request->fechaini." 00:00:01",$request->fechafin." 23:59:59"])
            ->get();   

        }elseif(!empty($request->fechaini) && !empty($request->fechafin)){      
            $datas=Ordenesmtl::orderBy('id')
            ->whereBetween('fecha_de_ejecucion', [$request->fechaini." 00:00:01",$request->fechafin." 23:59:59"])
            ->get();   
            }else{

            $datas=Ordenesmtl::orderBy('id')
            ->whereBetween('fecha_de_ejecucion', [$fechaAi,$fechaAf])
            ->get();   
        }  
           
           
      
    }

}


