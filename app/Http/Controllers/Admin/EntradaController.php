<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Admin\Archivo;
use App\Models\Admin\Entrada;
use Illuminate\Support\Facades\DB;

class EntradaController extends Controller
{
      
  
    public function guardar(Request $request)
    {
        $file = $request->file('file'); 
        if($file == null){

            return back()->with('message-danger', 'No se ha cargado ningun archivo');

        }else{

            $this->importaExcel($request);

            return back()->with('message', 'Archivo cargado');

        }
    }
    public function importaExcel(request $request)

    {

// Guardo la colección en $file

 $file = $request->file('file');             


$name=time().$file->getClientOriginalName();  
                  

$destinationPath = public_path('xlsxin/');

$file->move($destinationPath, $name);

$path=$destinationPath.$name;


//dd($rows);

$archivo = new Archivo;

             $archivo->nombre=$name;
             $archivo->fecha=now();
             $archivo->registros=0;
             $archivo->periodo=0;
             $archivo->estado='Cargado';
             $archivo->zona='zona';
             $archivo->usuario=auth()->user()->usuario;
             $archivo->cantidad=0;

             $archivo->save();
             
  

Excel::load($path, function($reader) {

                 
$count=0; 
$consecutivo=1;

    foreach ($reader->get() as $fila=>$filaentrada1) 
    {  
                

                 $filaentrada = new Entrada;
               
                    $filaentrada->zona=$filaentrada1[0];
                    $filaentrada->poliza=$filaentrada1[1]; 
                    $filaentrada->direccion=$filaentrada1[2];
                    $filaentrada->recorrido=$filaentrada1[3]; 
                    $filaentrada->medidor=$filaentrada1[4];
                    $filaentrada->nombre=$filaentrada1[5]; 
                    $filaentrada->year=$filaentrada1[6];
                    $filaentrada->mes=$filaentrada1[7];
                    $filaentrada->lote=$filaentrada1[8];
                    $filaentrada->periodo=$filaentrada1[6].$filaentrada1[7];
                    $filaentrada->consecutivo=$filaentrada1[9];
                    $filaentrada->consecutivo_int=$consecutivo; 
                    $filaentrada->ruta=$filaentrada1[8]; 
                    $filaentrada->tope=$filaentrada1[10]; 
                  

                    $filaentrada->save();

                    

                           

       // Incrementamos contado para ver cuantos usuarios se importan.             
       $count++; 
       $consecutivo++;

       //DB::select("Call CrearR");

       //DB::select("Call InsertarAsoAM");   
    }

    $name= DB::table('archivo')
    ->select('nombre')
    ->orderByDesc('id')
    ->limit(1);



    DB::table('archivo')
    ->where('nombre',$name)
    ->update(['registros' => $count,
              'periodo'=>$filaentrada1[6].$filaentrada1[7],
              'estado'=>'Procesado',
              'zona'=>$filaentrada1[0],
              'registros' => $count,

        ]);   

       




});

     
             
             
            
    

}             


}
  

