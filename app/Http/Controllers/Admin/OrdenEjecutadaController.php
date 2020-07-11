<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class OrdenEjecutadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function medidorejecutado(Request $request)
    {   
       
    $id_orden=$request->ordenejecutada_id;
    $Estado=$request->estado_id;
    $urlfoto1=$request->foto1;
    $urlfoto2=$request->foto2;
    $urlfoto3=$request->foto3;
    $urlfoto4=$request->foto4;
    $urlfoto5=$request->foto5;
    $urlfoto6=$request->foto6;
    $urlfoto7=$request->foto7;
    $urlfoto8=$request->foto8;
    $oposicion=$request->oposicion;
    
   /*$actualizar4 = DB::table('orden_ejecutada')
         ->where('id','=',$id_orden)            
         ->count();  */  
    
    
    
   if($id_orden > 0 && $Estado == 4 ){
       
       
          if($urlfoto1 != null && $urlfoto2 != null && $urlfoto3 != null && $oposicion == "Si" && $urlfoto4 != null && $urlfoto5 != null){  
        
    // Subimos la foto 1
        $imagen1 = base64_decode($urlfoto1);
        $imagen_name1 = $id_orden.'_1.jpg';
        $path1 = public_path('/imageneslectura/'.$imagen_name1);
        file_put_contents($path1, $imagen1);
        $img1 = Image::make(public_path('imageneslectura/'.$imagen_name1)); 
        $textimage = $request->fecha_de_ejecucion;
        $img1->resize(640, 480);
        $img1->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img1->save(public_path('imageneslectura/'.$imagen_name1)); 
        
        $url1='imageneslectura/'.$imagen_name1;

   // Subimos la foto 2
        $imagen2 = base64_decode($urlfoto2);
        $imagen_name2 = $id_orden.'_2.jpg';
        $path2 = public_path('/imageneslectura/'.$imagen_name2);
        file_put_contents($path2, $imagen2);
        $img2 = Image::make(public_path('imageneslectura/'.$imagen_name2));
        $img2->resize(640, 480);
        $textimage = $request->fecha_de_ejecucion;
        $img2->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img2->save(public_path('imageneslectura/'.$imagen_name2)); 
        $url2='imageneslectura/'.$imagen_name2;   
        
    // Subimos la foto 3
        $imagen3 = base64_decode($urlfoto3);
        $imagen_name3 = $id_orden.'_3.jpg';
        $path3 = public_path('/imageneslectura/'.$imagen_name3);
        file_put_contents($path3, $imagen3);
        $img3 = Image::make(public_path('imageneslectura/'.$imagen_name3));
        $img3->resize(640, 480);
        $textimage = $request->fecha_de_ejecucion;
        $img3->text($textimage, 10, 35, 
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img3->save(public_path('imageneslectura/'.$imagen_name3)); 
        $url3='imageneslectura/'.$imagen_name3;
        
        
     // Subimos la foto 4
        $imagen4 = base64_decode($urlfoto4);
        $imagen_name4 = $id_orden.'_4.jpg';
        $path4 = public_path('/imageneslectura/'.$imagen_name4);
        file_put_contents($path4, $imagen4);
        $img4 = Image::make(public_path('imageneslectura/'.$imagen_name4)); 
        $textimage = $request->fecha_de_ejecucion;
        $img4->resize(640, 480);
        $img4->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img4->save(public_path('imageneslectura/'.$imagen_name4));
        $url4='imageneslectura/'.$imagen_name4;
    
        
    // Subimos la foto 5
        $imagen5 = base64_decode($urlfoto5);
        $imagen_name5 = $id_orden.'_5.jpg';
        $path5 = public_path('/imageneslectura/'.$imagen_name5);
        file_put_contents($path5, $imagen5);
        $img5 = Image::make(public_path('imageneslectura/'.$imagen_name5)); 
        $textimage = $request->fecha_de_ejecucion;
        $img5->resize(640, 480);
        $img5->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img5->save(public_path('imageneslectura/'.$imagen_name5));
        $url5='imageneslectura/'.$imagen_name5;         
        
        
         $medidoresapi = DB::table('orden_ejecutada')
        ->insert([
            'id'=>$request->id,
            'ordenejecutada_id'=>$request->ordenejecutada_id,
            'poliza'=>$request->poliza,
            'usuario'=>$request->usuario,
            'fecha_de_ejecucion'=>$request->fecha_de_ejecucion,
            'new_medidor'=>$request->new_medidor,
            'lectura'=>$request->lectura,
            'oposicion'=>$request->oposicion,
            'sin_caja'=>$request->sin_caja,
            'sin_tapa'=>$request->sin_tapa,
            'fuga_antes'=>$request->fuga_antes,
            'fuga_despues'=>$request->fuga_despues,
            'talco_roto'=>$request->talco_roto,
            'posible_fraude'=>$request->posible_fraude,
            'mtl'=>$request->mtl,
            'coordenada'=>$request->coordenada,
            'latitud'=>$request->latitud,
            'longitud'=>$request->longitud,
            'estado'=>$request->estado,
            'estado_id'=>$request->estado_id,
            'foto1'=>$url1,
            'foto2'=>$url2,
            'foto3'=>$url3,
            'foto4'=>$url4,
            'foto5'=>$url5,
            'foto6'=>$url6,
            'foto7'=>$url7,
            'foto8'=>$url8,
            'futuro'=>$request->futuro,
            'futuro1'=>$request->futuro1,
            'futuro2'=>$request->futuro2
            
            ]);

         DB::table('ordenesmtl')
                ->where('id','=',$id_orden)
                ->update([
                'fecha_de_ejecucion'=>$request->fecha_de_ejecucion,
                'new_medidor'=>$request->new_medidor,
                'lectura'=>$request->lectura,
                'oposicion'=>$request->oposicion,
                'sin_caja'=>$request->sin_caja,
                'sin_tapa'=>$request->sin_tapa,
                'fuga_antes'=>$request->fuga_antes,
                'fuga_despues'=>$request->fuga_despues,
                'talco_roto'=>$request->talco_roto,
                'posible_fraude'=>$request->posible_fraude,
                'mtl'=>$request->mtl,
                'coordenada'=>$request->coordenada,
                'latitud'=>$request->latitud,
                'longitud'=>$request->longitud,
                'estado'=>$request->estado,
                'estado_id'=>$request->estado_id,
                'foto1'=>$url1,
                'foto2'=>$url2,
                'foto3'=>$url3,
                'foto4'=>$url4,
                'foto5'=>$url5,
                'foto6'=>$url6,
                'foto7'=>$url7,
                'foto8'=>$url8,
                'futuro'=>$request->futuro,
                'futuro1'=>$request->futuro1,
                'futuro2'=>$request->futuro2,
                'updated_at'=>now()
                 
                ]); 
               

        return response()->json("success");
    
 
    }else if($urlfoto1 != null && $urlfoto2 != null && $urlfoto3 != null && $oposicion == "Si" && $urlfoto4 != null && $urlfoto5 == null){  
        
     // Subimos la foto 1
        $imagen1 = base64_decode($urlfoto1);
        $imagen_name1 = $id_orden.'_1.jpg';
        $path1 = public_path('/imageneslectura/'.$imagen_name1);
        file_put_contents($path1, $imagen1);
        $img1 = Image::make(public_path('imageneslectura/'.$imagen_name1)); 
        $textimage = $request->fecha_de_ejecucion;
        $img1->resize(640, 480);
        $img1->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img1->save(public_path('imageneslectura/'.$imagen_name1)); 
        
        $url1='imageneslectura/'.$imagen_name1;

   // Subimos la foto 2
        $imagen2 = base64_decode($urlfoto2);
        $imagen_name2 = $id_orden.'_2.jpg';
        $path2 = public_path('/imageneslectura/'.$imagen_name2);
        file_put_contents($path2, $imagen2);
        $img2 = Image::make(public_path('imageneslectura/'.$imagen_name2));
        $img2->resize(640, 480);
        $textimage = $request->fecha_de_ejecucion;
        $img2->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img2->save(public_path('imageneslectura/'.$imagen_name2)); 
        $url2='imageneslectura/'.$imagen_name2;   
        
    // Subimos la foto 3
        $imagen3 = base64_decode($urlfoto3);
        $imagen_name3 = $id_orden.'_3.jpg';
        $path3 = public_path('/imageneslectura/'.$imagen_name3);
        file_put_contents($path3, $imagen3);
        $img3 = Image::make(public_path('imageneslectura/'.$imagen_name3));
        $img3->resize(640, 480);
        $textimage = $request->fecha_de_ejecucion;
        $img3->text($textimage, 10, 35, 
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img3->save(public_path('imageneslectura/'.$imagen_name3)); 
        $url3='imageneslectura/'.$imagen_name3;   
    
    // Subimos la foto 4
        $imagen4 = base64_decode($urlfoto4);
        $imagen_name4 = $id_orden.'_4.jpg';
        $path4 = public_path('/imageneslectura/'.$imagen_name4);
        file_put_contents($path4, $imagen4);
        $img4 = Image::make(public_path('imageneslectura/'.$imagen_name4)); 
        $textimage = $request->fecha_de_ejecucion;
        $img4->resize(640, 480);
        $img4->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img4->save(public_path('imageneslectura/'.$imagen_name4));
        $url4='imageneslectura/'.$imagen_name4;
    
        
   
         $medidoresapi = DB::table('orden_ejecutada')
        ->insert([
            'id'=>$request->id,
            'ordenejecutada_id'=>$request->ordenejecutada_id,
            'poliza'=>$request->poliza,
            'usuario'=>$request->usuario,
            'fecha_de_ejecucion'=>$request->fecha_de_ejecucion,
            'new_medidor'=>$request->new_medidor,
            'lectura'=>$request->lectura,
            'oposicion'=>$request->oposicion,
            'sin_caja'=>$request->sin_caja,
            'sin_tapa'=>$request->sin_tapa,
            'fuga_antes'=>$request->fuga_antes,
            'fuga_despues'=>$request->fuga_despues,
            'talco_roto'=>$request->talco_roto,
            'posible_fraude'=>$request->posible_fraude,
            'mtl'=>$request->mtl,
            'coordenada'=>$request->coordenada,
            'latitud'=>$request->latitud,
            'longitud'=>$request->longitud,
            'estado'=>$request->estado,
            'estado_id'=>$request->estado_id,
            'foto1'=>$url1,
            'foto2'=>$url2,
            'foto3'=>$url3,
            'foto4'=>$url4,
            'foto5'=>$url5,
            'foto6'=>$url6,
            'foto7'=>$url7,
            'foto8'=>$url8,
            'futuro'=>$request->futuro,
            'futuro1'=>$request->futuro1,
            'futuro2'=>$request->futuro2
            
            ]);

         DB::table('ordenesmtl')
                ->where('id','=',$id_orden)
                ->update([
                'fecha_de_ejecucion'=>$request->fecha_de_ejecucion,
                'new_medidor'=>$request->new_medidor,
                'lectura'=>$request->lectura,
                'oposicion'=>$request->oposicion,
                'sin_caja'=>$request->sin_caja,
                'sin_tapa'=>$request->sin_tapa,
                'fuga_antes'=>$request->fuga_antes,
                'fuga_despues'=>$request->fuga_despues,
                'talco_roto'=>$request->talco_roto,
                'posible_fraude'=>$request->posible_fraude,
                'mtl'=>$request->mtl,
                'coordenada'=>$request->coordenada,
                'latitud'=>$request->latitud,
                'longitud'=>$request->longitud,
                'estado'=>$request->estado,
                'estado_id'=>$request->estado_id,
                'foto1'=>$url1,
                'foto2'=>$url2,
                'foto3'=>$url3,
                'foto4'=>$url4,
                'foto5'=>$url5,
                'foto6'=>$url6,
                'foto7'=>$url7,
                'foto8'=>$url8,
                'futuro'=>$request->futuro,
                'futuro1'=>$request->futuro1,
                'futuro2'=>$request->futuro2,
                'updated_at'=>now()
                 
                ]); 
               

        return response()->json("success");
       
    }else if($urlfoto1 != null && $urlfoto2 != null && $urlfoto3 != null && $oposicion == "Si" && $urlfoto4 == null && $urlfoto5 != null){  
        
     // Subimos la foto 1
        $imagen1 = base64_decode($urlfoto1);
        $imagen_name1 = $id_orden.'_1.jpg';
        $path1 = public_path('/imageneslectura/'.$imagen_name1);
        file_put_contents($path1, $imagen1);
        $img1 = Image::make(public_path('imageneslectura/'.$imagen_name1)); 
        $textimage = $request->fecha_de_ejecucion;
        $img1->resize(640, 480);
        $img1->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img1->save(public_path('imageneslectura/'.$imagen_name1)); 
        
        $url1='imageneslectura/'.$imagen_name1;

   // Subimos la foto 2
        $imagen2 = base64_decode($urlfoto2);
        $imagen_name2 = $id_orden.'_2.jpg';
        $path2 = public_path('/imageneslectura/'.$imagen_name2);
        file_put_contents($path2, $imagen2);
        $img2 = Image::make(public_path('imageneslectura/'.$imagen_name2));
        $img2->resize(640, 480);
        $textimage = $request->fecha_de_ejecucion;
        $img2->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img2->save(public_path('imageneslectura/'.$imagen_name2)); 
        $url2='imageneslectura/'.$imagen_name2;   
        
    // Subimos la foto 3
        $imagen3 = base64_decode($urlfoto3);
        $imagen_name3 = $id_orden.'_3.jpg';
        $path3 = public_path('/imageneslectura/'.$imagen_name3);
        file_put_contents($path3, $imagen3);
        $img3 = Image::make(public_path('imageneslectura/'.$imagen_name3));
        $img3->resize(640, 480);
        $textimage = $request->fecha_de_ejecucion;
        $img3->text($textimage, 10, 35, 
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img3->save(public_path('imageneslectura/'.$imagen_name3)); 
        $url3='imageneslectura/'.$imagen_name3;   
    
   
        
    // Subimos la foto 5
        $imagen5 = base64_decode($urlfoto5);
        $imagen_name5 = $id_orden.'_5.jpg';
        $path5 = public_path('/imageneslectura/'.$imagen_name5);
        file_put_contents($path5, $imagen5);
        $img5 = Image::make(public_path('imageneslectura/'.$imagen_name5)); 
        $textimage = $request->fecha_de_ejecucion;
        $img5->resize(640, 480);
        $img5->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img5->save(public_path('imageneslectura/'.$imagen_name5));
        $url5='imageneslectura/'.$imagen_name5;     
        
        


        
         $medidoresapi = DB::table('orden_ejecutada')
        ->insert([
            'id'=>$request->id,
            'ordenejecutada_id'=>$request->ordenejecutada_id,
            'poliza'=>$request->poliza,
            'usuario'=>$request->usuario,
            'fecha_de_ejecucion'=>$request->fecha_de_ejecucion,
            'new_medidor'=>$request->new_medidor,
            'lectura'=>$request->lectura,
            'oposicion'=>$request->oposicion,
            'sin_caja'=>$request->sin_caja,
            'sin_tapa'=>$request->sin_tapa,
            'fuga_antes'=>$request->fuga_antes,
            'fuga_despues'=>$request->fuga_despues,
            'talco_roto'=>$request->talco_roto,
            'posible_fraude'=>$request->posible_fraude,
            'mtl'=>$request->mtl,
            'coordenada'=>$request->coordenada,
            'latitud'=>$request->latitud,
            'longitud'=>$request->longitud,
            'estado'=>$request->estado,
            'estado_id'=>$request->estado_id,
            'foto1'=>$url1,
            'foto2'=>$url2,
            'foto3'=>$url3,
            'foto4'=>$url4,
            'foto5'=>$url5,
            'foto6'=>$url6,
            'foto7'=>$url7,
            'foto8'=>$url8,
            'futuro'=>$request->futuro,
            'futuro1'=>$request->futuro1,
            'futuro2'=>$request->futuro2
            
            ]);

         DB::table('ordenesmtl')
                ->where('id','=',$id_orden)
                ->update([
                'fecha_de_ejecucion'=>$request->fecha_de_ejecucion,
                'new_medidor'=>$request->new_medidor,
                'lectura'=>$request->lectura,
                'oposicion'=>$request->oposicion,
                'sin_caja'=>$request->sin_caja,
                'sin_tapa'=>$request->sin_tapa,
                'fuga_antes'=>$request->fuga_antes,
                'fuga_despues'=>$request->fuga_despues,
                'talco_roto'=>$request->talco_roto,
                'posible_fraude'=>$request->posible_fraude,
                'mtl'=>$request->mtl,
                'coordenada'=>$request->coordenada,
                'latitud'=>$request->latitud,
                'longitud'=>$request->longitud,
                'estado'=>$request->estado,
                'estado_id'=>$request->estado_id,
                'foto1'=>$url1,
                'foto2'=>$url2,
                'foto3'=>$url3,
                'foto4'=>$url4,
                'foto5'=>$url5,
                'foto6'=>$url6,
                'foto7'=>$url7,
                'foto8'=>$url8,
                'futuro'=>$request->futuro,
                'futuro1'=>$request->futuro1,
                'futuro2'=>$request->futuro2,
                'updated_at'=>now()
                 
                ]); 
               

        return response()->json("success");
       
    }else if($urlfoto1 != null && $urlfoto2 != null && $urlfoto3 != null && $urlfoto4 == null && $urlfoto5 == null && $oposicion == "Si"){  
        
     // Subimos la foto 1
        $imagen1 = base64_decode($urlfoto1);
        $imagen_name1 = $id_orden.'_1.jpg';
        $path1 = public_path('/imageneslectura/'.$imagen_name1);
        file_put_contents($path1, $imagen1);
        $img1 = Image::make(public_path('imageneslectura/'.$imagen_name1)); 
        $textimage = $request->fecha_de_ejecucion;
        $img1->resize(640, 480);
        $img1->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img1->save(public_path('imageneslectura/'.$imagen_name1)); 
        
        $url1='imageneslectura/'.$imagen_name1;

   // Subimos la foto 2
        $imagen2 = base64_decode($urlfoto2);
        $imagen_name2 = $id_orden.'_2.jpg';
        $path2 = public_path('/imageneslectura/'.$imagen_name2);
        file_put_contents($path2, $imagen2);
        $img2 = Image::make(public_path('imageneslectura/'.$imagen_name2));
        $img2->resize(640, 480);
        $textimage = $request->fecha_de_ejecucion;
        $img2->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img2->save(public_path('imageneslectura/'.$imagen_name2)); 
        $url2='imageneslectura/'.$imagen_name2;   
        
    // Subimos la foto 3
        $imagen3 = base64_decode($urlfoto3);
        $imagen_name3 = $id_orden.'_3.jpg';
        $path3 = public_path('/imageneslectura/'.$imagen_name3);
        file_put_contents($path3, $imagen3);
        $img3 = Image::make(public_path('imageneslectura/'.$imagen_name3));
        $img3->resize(640, 480);
        $textimage = $request->fecha_de_ejecucion;
        $img3->text($textimage, 10, 35, 
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img3->save(public_path('imageneslectura/'.$imagen_name3)); 
        $url3='imageneslectura/'.$imagen_name3;   
    
        
        
         $medidoresapi = DB::table('orden_ejecutada')
        ->insert([
            'id'=>$request->id,
            'ordenejecutada_id'=>$request->ordenejecutada_id,
            'poliza'=>$request->poliza,
            'usuario'=>$request->usuario,
            'fecha_de_ejecucion'=>$request->fecha_de_ejecucion,
            'new_medidor'=>$request->new_medidor,
            'lectura'=>$request->lectura,
            'oposicion'=>$request->oposicion,
            'sin_caja'=>$request->sin_caja,
            'sin_tapa'=>$request->sin_tapa,
            'fuga_antes'=>$request->fuga_antes,
            'fuga_despues'=>$request->fuga_despues,
            'talco_roto'=>$request->talco_roto,
            'posible_fraude'=>$request->posible_fraude,
            'mtl'=>$request->mtl,
            'coordenada'=>$request->coordenada,
            'latitud'=>$request->latitud,
            'longitud'=>$request->longitud,
            'estado'=>$request->estado,
            'estado_id'=>$request->estado_id,
            'foto1'=>$url1,
            'foto2'=>$url2,
            'foto3'=>$url3,
            'foto4'=>$url4,
            'foto5'=>$url5,
            'foto6'=>$url6,
            'foto7'=>$url7,
            'foto8'=>$url8,
            'futuro'=>$request->futuro,
            'futuro1'=>$request->futuro1,
            'futuro2'=>$request->futuro2
            
            ]);

         DB::table('ordenesmtl')
                ->where('id','=',$id_orden)
                ->update([
                'fecha_de_ejecucion'=>$request->fecha_de_ejecucion,
                'new_medidor'=>$request->new_medidor,
                'lectura'=>$request->lectura,
                'oposicion'=>$request->oposicion,
                'sin_caja'=>$request->sin_caja,
                'sin_tapa'=>$request->sin_tapa,
                'fuga_antes'=>$request->fuga_antes,
                'fuga_despues'=>$request->fuga_despues,
                'talco_roto'=>$request->talco_roto,
                'posible_fraude'=>$request->posible_fraude,
                'mtl'=>$request->mtl,
                'coordenada'=>$request->coordenada,
                'latitud'=>$request->latitud,
                'longitud'=>$request->longitud,
                'estado'=>$request->estado,
                'estado_id'=>$request->estado_id,
                'foto1'=>$url1,
                'foto2'=>$url2,
                'foto3'=>$url3,
                'foto4'=>$url4,
                'foto5'=>$url5,
                'foto6'=>$url6,
                'foto7'=>$url7,
                'foto8'=>$url8,
                'futuro'=>$request->futuro,
                'futuro1'=>$request->futuro1,
                'futuro2'=>$request->futuro2,
                'updated_at'=>now()
                 
                ]); 
               

        return response()->json("success");
       
    }else if($urlfoto1 != null && $urlfoto2 != null && $urlfoto3 != null && $urlfoto4 != null && $urlfoto5 != null && $urlfoto6 != null && $urlfoto7 != null && $urlfoto8 != null){  
        
     // Subimos la foto 1
        $imagen1 = base64_decode($urlfoto1);
        $imagen_name1 = $id_orden.'_1.jpg';
        $path1 = public_path('/imageneslectura/'.$imagen_name1);
        file_put_contents($path1, $imagen1);
        $img1 = Image::make(public_path('imageneslectura/'.$imagen_name1)); 
        $textimage = $request->fecha_de_ejecucion;
        $img1->resize(640, 480);
        $img1->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img1->save(public_path('imageneslectura/'.$imagen_name1)); 
        
        $url1='imageneslectura/'.$imagen_name1;

   // Subimos la foto 2
        $imagen2 = base64_decode($urlfoto2);
        $imagen_name2 = $id_orden.'_2.jpg';
        $path2 = public_path('/imageneslectura/'.$imagen_name2);
        file_put_contents($path2, $imagen2);
        $img2 = Image::make(public_path('imageneslectura/'.$imagen_name2));
        $img2->resize(640, 480);
        $textimage = $request->fecha_de_ejecucion;
        $img2->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img2->save(public_path('imageneslectura/'.$imagen_name2)); 
        $url2='imageneslectura/'.$imagen_name2;   
        
    // Subimos la foto 3
        $imagen3 = base64_decode($urlfoto3);
        $imagen_name3 = $id_orden.'_3.jpg';
        $path3 = public_path('/imageneslectura/'.$imagen_name3);
        file_put_contents($path3, $imagen3);
        $img3 = Image::make(public_path('imageneslectura/'.$imagen_name3));
        $img3->resize(640, 480);
        $textimage = $request->fecha_de_ejecucion;
        $img3->text($textimage, 10, 35, 
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img3->save(public_path('imageneslectura/'.$imagen_name3)); 
        $url3='imageneslectura/'.$imagen_name3;   
    
    // Subimos la foto 4
        $imagen4 = base64_decode($urlfoto4);
        $imagen_name4 = $id_orden.'_4.jpg';
        $path4 = public_path('/imageneslectura/'.$imagen_name4);
        file_put_contents($path4, $imagen4);
        $img4 = Image::make(public_path('imageneslectura/'.$imagen_name4)); 
        $textimage = $request->fecha_de_ejecucion;
        $img4->resize(640, 480);
        $img4->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img4->save(public_path('imageneslectura/'.$imagen_name4));
        $url4='imageneslectura/'.$imagen_name4;
    
        
    // Subimos la foto 5
        $imagen5 = base64_decode($urlfoto5);
        $imagen_name5 = $id_orden.'_5.jpg';
        $path5 = public_path('/imageneslectura/'.$imagen_name5);
        file_put_contents($path5, $imagen5);
        $img5 = Image::make(public_path('imageneslectura/'.$imagen_name5)); 
        $textimage = $request->fecha_de_ejecucion;
        $img5->resize(640, 480);
        $img5->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img5->save(public_path('imageneslectura/'.$imagen_name5));
        $url5='imageneslectura/'.$imagen_name5;     
        
        


  // Subimos la foto 6
        $imagen6 = base64_decode($urlfoto6);
        $imagen_name6 = $id_orden.'_6.jpg';
        $path6 = public_path('/imageneslectura/'.$imagen_name6);
        file_put_contents($path6, $imagen6);
        $img6 = Image::make(public_path('imageneslectura/'.$imagen_name6)); 
        $textimage = $request->fecha_de_ejecucion;
        $img6->resize(640, 480);
        $img6->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img6->save(public_path('imageneslectura/'.$imagen_name6));
        $url6='imageneslectura/'.$imagen_name6;    

    // Subimos la foto 7
        $imagen7 = base64_decode($urlfoto7);
        $imagen_name7 = $id_orden.'_7.jpg';
        $path7 = public_path('/imageneslectura/'.$imagen_name7);
        file_put_contents($path7, $imagen7);
        $img7 = Image::make(public_path('imageneslectura/'.$imagen_name7)); 
        $textimage = $request->fecha_de_ejecucion;
        $img7->resize(640, 480);
        $img7->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img7->save(public_path('imageneslectura/'.$imagen_name7));
        $url7='imageneslectura/'.$imagen_name7;   
        
   // Subimos la foto 8
        $imagen8 = base64_decode($urlfoto8);
        $imagen_name8 = $id_orden.'_8.jpg';
        $path8 = public_path('/imageneslectura/'.$imagen_name8);
        file_put_contents($path8, $imagen8);
        $img8 = Image::make(public_path('imageneslectura/'.$imagen_name8)); 
        $textimage = $request->fecha_de_ejecucion;
        $img8->resize(640, 480);
        $img8->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img8->save(public_path('imageneslectura/'.$imagen_name8));
        $url8='imageneslectura/'.$imagen_name8;
                
        
        
         $medidoresapi = DB::table('orden_ejecutada')
        ->insert([
            'id'=>$request->id,
            'ordenejecutada_id'=>$request->ordenejecutada_id,
            'poliza'=>$request->poliza,
            'usuario'=>$request->usuario,
            'fecha_de_ejecucion'=>$request->fecha_de_ejecucion,
            'new_medidor'=>$request->new_medidor,
            'lectura'=>$request->lectura,
            'oposicion'=>$request->oposicion,
            'sin_caja'=>$request->sin_caja,
            'sin_tapa'=>$request->sin_tapa,
            'fuga_antes'=>$request->fuga_antes,
            'fuga_despues'=>$request->fuga_despues,
            'talco_roto'=>$request->talco_roto,
            'posible_fraude'=>$request->posible_fraude,
            'mtl'=>$request->mtl,
            'coordenada'=>$request->coordenada,
            'latitud'=>$request->latitud,
            'longitud'=>$request->longitud,
            'estado'=>$request->estado,
            'estado_id'=>$request->estado_id,
            'foto1'=>$url1,
            'foto2'=>$url2,
            'foto3'=>$url3,
            'foto4'=>$url4,
            'foto5'=>$url5,
            'foto6'=>$url6,
            'foto7'=>$url7,
            'foto8'=>$url8,
            'futuro'=>$request->futuro,
            'futuro1'=>$request->futuro1,
            'futuro2'=>$request->futuro2
            
            ]);

         DB::table('ordenesmtl')
                ->where('id','=',$id_orden)
                ->update([
                'fecha_de_ejecucion'=>$request->fecha_de_ejecucion,
                'new_medidor'=>$request->new_medidor,
                'lectura'=>$request->lectura,
                'oposicion'=>$request->oposicion,
                'sin_caja'=>$request->sin_caja,
                'sin_tapa'=>$request->sin_tapa,
                'fuga_antes'=>$request->fuga_antes,
                'fuga_despues'=>$request->fuga_despues,
                'talco_roto'=>$request->talco_roto,
                'posible_fraude'=>$request->posible_fraude,
                'mtl'=>$request->mtl,
                'coordenada'=>$request->coordenada,
                'latitud'=>$request->latitud,
                'longitud'=>$request->longitud,
                'estado'=>$request->estado,
                'estado_id'=>$request->estado_id,
                'foto1'=>$url1,
                'foto2'=>$url2,
                'foto3'=>$url3,
                'foto4'=>$url4,
                'foto5'=>$url5,
                'foto6'=>$url6,
                'foto7'=>$url7,
                'foto8'=>$url8,
                'futuro'=>$request->futuro,
                'futuro1'=>$request->futuro1,
                'futuro2'=>$request->futuro2,
                'updated_at'=>now()
                 
                ]); 
               

        return response()->json("success");
       
    }else if($urlfoto1 != null && $urlfoto2 != null && $urlfoto3 != null && $urlfoto4 != null && $urlfoto5 != null && $urlfoto6 != null && $urlfoto7 != null && $urlfoto8 == null){


    // Subimos la foto 1
        $imagen1 = base64_decode($urlfoto1);
        $imagen_name1 = $id_orden.'_1.jpg';
        $path1 = public_path('/imageneslectura/'.$imagen_name1);
        file_put_contents($path1, $imagen1);
        $img1 = Image::make(public_path('imageneslectura/'.$imagen_name1)); 
        $textimage = $request->fecha_de_ejecucion;
        $img1->resize(640, 480);
        $img1->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img1->save(public_path('imageneslectura/'.$imagen_name1)); 
        
        $url1='imageneslectura/'.$imagen_name1;

   // Subimos la foto 2
        $imagen2 = base64_decode($urlfoto2);
        $imagen_name2 = $id_orden.'_2.jpg';
        $path2 = public_path('/imageneslectura/'.$imagen_name2);
        file_put_contents($path2, $imagen2);
        $img2 = Image::make(public_path('imageneslectura/'.$imagen_name2));
        $img2->resize(640, 480);
        $textimage = $request->fecha_de_ejecucion;
        $img2->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img2->save(public_path('imageneslectura/'.$imagen_name2)); 
        $url2='imageneslectura/'.$imagen_name2;   
        
    // Subimos la foto 3
        $imagen3 = base64_decode($urlfoto3);
        $imagen_name3 = $id_orden.'_3.jpg';
        $path3 = public_path('/imageneslectura/'.$imagen_name3);
        file_put_contents($path3, $imagen3);
        $img3 = Image::make(public_path('imageneslectura/'.$imagen_name3));
        $img3->resize(640, 480);
        $textimage = $request->fecha_de_ejecucion;
        $img3->text($textimage, 10, 35, 
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img3->save(public_path('imageneslectura/'.$imagen_name3)); 
        $url3='imageneslectura/'.$imagen_name3;
    
  // Subimos la foto 4
        $imagen4 = base64_decode($urlfoto4);
        $imagen_name4 = $id_orden.'_4.jpg';
        $path4 = public_path('/imageneslectura/'.$imagen_name4);
        file_put_contents($path4, $imagen4);
        $img4 = Image::make(public_path('imageneslectura/'.$imagen_name4)); 
        $textimage = $request->fecha_de_ejecucion;
        $img4->resize(640, 480);
        $img4->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img4->save(public_path('imageneslectura/'.$imagen_name4));
        $url4='imageneslectura/'.$imagen_name4;
    
        
    // Subimos la foto 5
        $imagen5 = base64_decode($urlfoto5);
        $imagen_name5 = $id_orden.'_5.jpg';
        $path5 = public_path('/imageneslectura/'.$imagen_name5);
        file_put_contents($path5, $imagen5);
        $img5 = Image::make(public_path('imageneslectura/'.$imagen_name5)); 
        $textimage = $request->fecha_de_ejecucion;
        $img5->resize(640, 480);
        $img5->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img5->save(public_path('imageneslectura/'.$imagen_name5));
        $url5='imageneslectura/'.$imagen_name5;     
        
        


  // Subimos la foto 6
        $imagen6 = base64_decode($urlfoto6);
        $imagen_name6 = $id_orden.'_6.jpg';
        $path6 = public_path('/imageneslectura/'.$imagen_name6);
        file_put_contents($path6, $imagen6);
        $img6 = Image::make(public_path('imageneslectura/'.$imagen_name6)); 
        $textimage = $request->fecha_de_ejecucion;
        $img6->resize(640, 480);
        $img6->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img6->save(public_path('imageneslectura/'.$imagen_name6));
        $url6='imageneslectura/'.$imagen_name6;    

    // Subimos la foto 7
        $imagen7 = base64_decode($urlfoto7);
        $imagen_name7 = $id_orden.'_7.jpg';
        $path7 = public_path('/imageneslectura/'.$imagen_name7);
        file_put_contents($path7, $imagen7);
        $img7 = Image::make(public_path('imageneslectura/'.$imagen_name7)); 
        $textimage = $request->fecha_de_ejecucion;
        $img7->resize(640, 480);
        $img7->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img7->save(public_path('imageneslectura/'.$imagen_name7));
        $url7='imageneslectura/'.$imagen_name7;   
        
   
        
        
         $medidoresapi = DB::table('orden_ejecutada')
        ->insert([
            'id'=>$request->id,
            'ordenejecutada_id'=>$request->ordenejecutada_id,
            'poliza'=>$request->poliza,
            'usuario'=>$request->usuario,
            'fecha_de_ejecucion'=>$request->fecha_de_ejecucion,
            'new_medidor'=>$request->new_medidor,
            'lectura'=>$request->lectura,
            'oposicion'=>$request->oposicion,
            'sin_caja'=>$request->sin_caja,
            'sin_tapa'=>$request->sin_tapa,
            'fuga_antes'=>$request->fuga_antes,
            'fuga_despues'=>$request->fuga_despues,
            'talco_roto'=>$request->talco_roto,
            'posible_fraude'=>$request->posible_fraude,
            'mtl'=>$request->mtl,
            'coordenada'=>$request->coordenada,
            'latitud'=>$request->latitud,
            'longitud'=>$request->longitud,
            'estado'=>$request->estado,
            'estado_id'=>$request->estado_id,
            'foto1'=>$url1,
            'foto2'=>$url2,
            'foto3'=>$url3,
            'foto4'=>$url4,
            'foto5'=>$url5,
            'foto6'=>$url6,
            'foto7'=>$url7,
            'foto8'=>$url8,
            'futuro'=>$request->futuro,
            'futuro1'=>$request->futuro1,
            'futuro2'=>$request->futuro2
            
            ]);

         DB::table('ordenesmtl')
                ->where('id','=',$id_orden)
                ->update([
                'fecha_de_ejecucion'=>$request->fecha_de_ejecucion,
                'new_medidor'=>$request->new_medidor,
                'lectura'=>$request->lectura,
                'oposicion'=>$request->oposicion,
                'sin_caja'=>$request->sin_caja,
                'sin_tapa'=>$request->sin_tapa,
                'fuga_antes'=>$request->fuga_antes,
                'fuga_despues'=>$request->fuga_despues,
                'talco_roto'=>$request->talco_roto,
                'posible_fraude'=>$request->posible_fraude,
                'mtl'=>$request->mtl,
                'coordenada'=>$request->coordenada,
                'latitud'=>$request->latitud,
                'longitud'=>$request->longitud,
                'estado'=>$request->estado,
                'estado_id'=>$request->estado_id,
                'foto1'=>$url1,
                'foto2'=>$url2,
                'foto3'=>$url3,
                'foto4'=>$url4,
                'foto5'=>$url5,
                'foto6'=>$url6,
                'foto7'=>$url7,
                'foto8'=>$url8,
                'futuro'=>$request->futuro,
                'futuro1'=>$request->futuro1,
                'futuro2'=>$request->futuro2,
                'updated_at'=>now()
                 
                ]); 
               

        return response()->json("success");


    }else if($urlfoto1 != null && $urlfoto2 != null && $urlfoto3 != null && $urlfoto4 != null && $urlfoto5 == null && $urlfoto6 != null && $urlfoto7 != null && $urlfoto8 != null){

     // Subimos la foto 1
        $imagen1 = base64_decode($urlfoto1);
        $imagen_name1 = $id_orden.'_1.jpg';
        $path1 = public_path('/imageneslectura/'.$imagen_name1);
        file_put_contents($path1, $imagen1);
        $img1 = Image::make(public_path('imageneslectura/'.$imagen_name1)); 
        $textimage = $request->fecha_de_ejecucion;
        $img1->resize(640, 480);
        $img1->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img1->save(public_path('imageneslectura/'.$imagen_name1)); 
        
        $url1='imageneslectura/'.$imagen_name1;

   // Subimos la foto 2
        $imagen2 = base64_decode($urlfoto2);
        $imagen_name2 = $id_orden.'_2.jpg';
        $path2 = public_path('/imageneslectura/'.$imagen_name2);
        file_put_contents($path2, $imagen2);
        $img2 = Image::make(public_path('imageneslectura/'.$imagen_name2));
        $img2->resize(640, 480);
        $textimage = $request->fecha_de_ejecucion;
        $img2->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img2->save(public_path('imageneslectura/'.$imagen_name2)); 
        $url2='imageneslectura/'.$imagen_name2;   
        
    // Subimos la foto 3
        $imagen3 = base64_decode($urlfoto3);
        $imagen_name3 = $id_orden.'_3.jpg';
        $path3 = public_path('/imageneslectura/'.$imagen_name3);
        file_put_contents($path3, $imagen3);
        $img3 = Image::make(public_path('imageneslectura/'.$imagen_name3));
        $img3->resize(640, 480);
        $textimage = $request->fecha_de_ejecucion;
        $img3->text($textimage, 10, 35, 
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img3->save(public_path('imageneslectura/'.$imagen_name3)); 
        $url3='imageneslectura/'.$imagen_name3;   
        
        
        
   // Subimos la foto 4
        $imagen4 = base64_decode($urlfoto4);
        $imagen_name4 = $id_orden.'_4.jpg';
        $path4 = public_path('/imageneslectura/'.$imagen_name4);
        file_put_contents($path4, $imagen4);
        $img4 = Image::make(public_path('imageneslectura/'.$imagen_name4)); 
        $textimage = $request->fecha_de_ejecucion;
        $img4->resize(640, 480);
        $img4->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img4->save(public_path('imageneslectura/'.$imagen_name4));
        $url4='imageneslectura/'.$imagen_name4;
    
        
    


  // Subimos la foto 6
        $imagen6 = base64_decode($urlfoto6);
        $imagen_name6 = $id_orden.'_6.jpg';
        $path6 = public_path('/imageneslectura/'.$imagen_name6);
        file_put_contents($path6, $imagen6);
        $img6 = Image::make(public_path('imageneslectura/'.$imagen_name6)); 
        $textimage = $request->fecha_de_ejecucion;
        $img6->resize(640, 480);
        $img6->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img6->save(public_path('imageneslectura/'.$imagen_name6));
        $url6='imageneslectura/'.$imagen_name6;    

    // Subimos la foto 7
        $imagen7 = base64_decode($urlfoto7);
        $imagen_name7 = $id_orden.'_7.jpg';
        $path7 = public_path('/imageneslectura/'.$imagen_name7);
        file_put_contents($path7, $imagen7);
        $img7 = Image::make(public_path('imageneslectura/'.$imagen_name7)); 
        $textimage = $request->fecha_de_ejecucion;
        $img7->resize(640, 480);
        $img7->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img7->save(public_path('imageneslectura/'.$imagen_name7));
        $url7='imageneslectura/'.$imagen_name7;   
        
   // Subimos la foto 8
        $imagen8 = base64_decode($urlfoto8);
        $imagen_name8 = $id_orden.'_8.jpg';
        $path8 = public_path('/imageneslectura/'.$imagen_name8);
        file_put_contents($path8, $imagen8);
        $img8 = Image::make(public_path('imageneslectura/'.$imagen_name8)); 
        $textimage = $request->fecha_de_ejecucion;
        $img8->resize(640, 480);
        $img8->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img8->save(public_path('imageneslectura/'.$imagen_name8));
        $url8='imageneslectura/'.$imagen_name8;
        
    
         $medidoresapi = DB::table('orden_ejecutada')
        ->insert([
            'id'=>$request->id,
            'ordenejecutada_id'=>$request->ordenejecutada_id,
            'poliza'=>$request->poliza,
            'usuario'=>$request->usuario,
            'fecha_de_ejecucion'=>$request->fecha_de_ejecucion,
            'new_medidor'=>$request->new_medidor,
            'lectura'=>$request->lectura,
            'oposicion'=>$request->oposicion,
            'sin_caja'=>$request->sin_caja,
            'sin_tapa'=>$request->sin_tapa,
            'fuga_antes'=>$request->fuga_antes,
            'fuga_despues'=>$request->fuga_despues,
            'talco_roto'=>$request->talco_roto,
            'posible_fraude'=>$request->posible_fraude,
            'mtl'=>$request->mtl,
            'coordenada'=>$request->coordenada,
            'latitud'=>$request->latitud,
            'longitud'=>$request->longitud,
            'estado'=>$request->estado,
            'estado_id'=>$request->estado_id,
            'foto1'=>$url1,
            'foto2'=>$url2,
            'foto3'=>$url3,
            'foto4'=>$url4,
            'foto5'=>$url5,
            'foto6'=>$url6,
            'foto7'=>$url7,
            'foto8'=>$url8,
            'futuro'=>$request->futuro,
            'futuro1'=>$request->futuro1,
            'futuro2'=>$request->futuro2
            
            ]);

         DB::table('ordenesmtl')
                ->where('id','=',$id_orden)
                ->update([
                'fecha_de_ejecucion'=>$request->fecha_de_ejecucion,
                'new_medidor'=>$request->new_medidor,
                'lectura'=>$request->lectura,
                'oposicion'=>$request->oposicion,
                'sin_caja'=>$request->sin_caja,
                'sin_tapa'=>$request->sin_tapa,
                'fuga_antes'=>$request->fuga_antes,
                'fuga_despues'=>$request->fuga_despues,
                'talco_roto'=>$request->talco_roto,
                'posible_fraude'=>$request->posible_fraude,
                'mtl'=>$request->mtl,
                'coordenada'=>$request->coordenada,
                'latitud'=>$request->latitud,
                'longitud'=>$request->longitud,
                'estado'=>$request->estado,
                'estado_id'=>$request->estado_id,
                'foto1'=>$url1,
                'foto2'=>$url2,
                'foto3'=>$url3,
                'foto4'=>$url4,
                'foto5'=>$url5,
                'foto6'=>$url6,
                'foto7'=>$url7,
                'foto8'=>$url8,
                'futuro'=>$request->futuro,
                'futuro1'=>$request->futuro1,
                'futuro2'=>$request->futuro2,
                'updated_at'=>now()
                 
                ]); 
               

        return response()->json("success");
  
    }else if($urlfoto1 != null && $urlfoto2 != null && $urlfoto3 != null && $urlfoto4 == null && $urlfoto5 != null && $urlfoto6 != null && $urlfoto7 != null && $urlfoto8 != null){
    
     // Subimos la foto 1
        $imagen1 = base64_decode($urlfoto1);
        $imagen_name1 = $id_orden.'_1.jpg';
        $path1 = public_path('/imageneslectura/'.$imagen_name1);
        file_put_contents($path1, $imagen1);
        $img1 = Image::make(public_path('imageneslectura/'.$imagen_name1)); 
        $textimage = $request->fecha_de_ejecucion;
        $img1->resize(640, 480);
        $img1->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img1->save(public_path('imageneslectura/'.$imagen_name1)); 
        
        $url1='imageneslectura/'.$imagen_name1;

   // Subimos la foto 2
        $imagen2 = base64_decode($urlfoto2);
        $imagen_name2 = $id_orden.'_2.jpg';
        $path2 = public_path('/imageneslectura/'.$imagen_name2);
        file_put_contents($path2, $imagen2);
        $img2 = Image::make(public_path('imageneslectura/'.$imagen_name2));
        $img2->resize(640, 480);
        $textimage = $request->fecha_de_ejecucion;
        $img2->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img2->save(public_path('imageneslectura/'.$imagen_name2)); 
        $url2='imageneslectura/'.$imagen_name2;   
        
    // Subimos la foto 3
        $imagen3 = base64_decode($urlfoto3);
        $imagen_name3 = $id_orden.'_3.jpg';
        $path3 = public_path('/imageneslectura/'.$imagen_name3);
        file_put_contents($path3, $imagen3);
        $img3 = Image::make(public_path('imageneslectura/'.$imagen_name3));
        $img3->resize(640, 480);
        $textimage = $request->fecha_de_ejecucion;
        $img3->text($textimage, 10, 35, 
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img3->save(public_path('imageneslectura/'.$imagen_name3)); 
        $url3='imageneslectura/'.$imagen_name3;   
    
    
 
    // Subimos la foto 5
        $imagen5 = base64_decode($urlfoto5);
        $imagen_name5 = $id_orden.'_5.jpg';
        $path5 = public_path('/imageneslectura/'.$imagen_name5);
        file_put_contents($path5, $imagen5);
        $img5 = Image::make(public_path('imageneslectura/'.$imagen_name5)); 
        $textimage = $request->fecha_de_ejecucion;
        $img5->resize(640, 480);
        $img5->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img5->save(public_path('imageneslectura/'.$imagen_name5));
        $url5='imageneslectura/'.$imagen_name5;     
        
        


  // Subimos la foto 6
        $imagen6 = base64_decode($urlfoto6);
        $imagen_name6 = $id_orden.'_6.jpg';
        $path6 = public_path('/imageneslectura/'.$imagen_name6);
        file_put_contents($path6, $imagen6);
        $img6 = Image::make(public_path('imageneslectura/'.$imagen_name6)); 
        $textimage = $request->fecha_de_ejecucion;
        $img6->resize(640, 480);
        $img6->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img6->save(public_path('imageneslectura/'.$imagen_name6));
        $url6='imageneslectura/'.$imagen_name6;    

    // Subimos la foto 7
        $imagen7 = base64_decode($urlfoto7);
        $imagen_name7 = $id_orden.'_7.jpg';
        $path7 = public_path('/imageneslectura/'.$imagen_name7);
        file_put_contents($path7, $imagen7);
        $img7 = Image::make(public_path('imageneslectura/'.$imagen_name7)); 
        $textimage = $request->fecha_de_ejecucion;
        $img7->resize(640, 480);
        $img7->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img7->save(public_path('imageneslectura/'.$imagen_name7));
        $url7='imageneslectura/'.$imagen_name7;   
        
   // Subimos la foto 8
        $imagen8 = base64_decode($urlfoto8);
        $imagen_name8 = $id_orden.'_8.jpg';
        $path8 = public_path('/imageneslectura/'.$imagen_name8);
        file_put_contents($path8, $imagen8);
        $img8 = Image::make(public_path('imageneslectura/'.$imagen_name8)); 
        $textimage = $request->fecha_de_ejecucion;
        $img8->resize(640, 480);
        $img8->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img8->save(public_path('imageneslectura/'.$imagen_name8));
        $url8='imageneslectura/'.$imagen_name8; 
  
    $medidoresapi = DB::table('orden_ejecutada')
        ->insert([
            'id'=>$request->id,
            'ordenejecutada_id'=>$request->ordenejecutada_id,
            'poliza'=>$request->poliza,
            'usuario'=>$request->usuario,
            'fecha_de_ejecucion'=>$request->fecha_de_ejecucion,
            'new_medidor'=>$request->new_medidor,
            'lectura'=>$request->lectura,
            'oposicion'=>$request->oposicion,
            'sin_caja'=>$request->sin_caja,
            'sin_tapa'=>$request->sin_tapa,
            'fuga_antes'=>$request->fuga_antes,
            'fuga_despues'=>$request->fuga_despues,
            'talco_roto'=>$request->talco_roto,
            'posible_fraude'=>$request->posible_fraude,
            'mtl'=>$request->mtl,
            'coordenada'=>$request->coordenada,
            'latitud'=>$request->latitud,
            'longitud'=>$request->longitud,
            'estado'=>$request->estado,
            'estado_id'=>$request->estado_id,
            'foto1'=>$url1,
            'foto2'=>$url2,
            'foto3'=>$url3,
            'foto4'=>$url4,
            'foto5'=>$url5,
            'foto6'=>$url6,
            'foto7'=>$url7,
            'foto8'=>$url8,
            'futuro'=>$request->futuro,
            'futuro1'=>$request->futuro1,
            'futuro2'=>$request->futuro2
            
            ]);

         DB::table('ordenesmtl')
                ->where('id','=',$id_orden)
                ->update([
                'fecha_de_ejecucion'=>$request->fecha_de_ejecucion,
                'new_medidor'=>$request->new_medidor,
                'lectura'=>$request->lectura,
                'oposicion'=>$request->oposicion,
                'sin_caja'=>$request->sin_caja,
                'sin_tapa'=>$request->sin_tapa,
                'fuga_antes'=>$request->fuga_antes,
                'fuga_despues'=>$request->fuga_despues,
                'talco_roto'=>$request->talco_roto,
                'posible_fraude'=>$request->posible_fraude,
                'mtl'=>$request->mtl,
                'coordenada'=>$request->coordenada,
                'latitud'=>$request->latitud,
                'longitud'=>$request->longitud,
                'estado'=>$request->estado,
                'estado_id'=>$request->estado_id,
                'foto1'=>$url1,
                'foto2'=>$url2,
                'foto3'=>$url3,
                'foto4'=>$url4,
                'foto5'=>$url5,
                'foto6'=>$url6,
                'foto7'=>$url7,
                'foto8'=>$url8,
                'futuro'=>$request->futuro,
                'futuro1'=>$request->futuro1,
                'futuro2'=>$request->futuro2,
                'updated_at'=>now()
                 
                ]); 
               

        return response()->json("success");
  
    }else if($urlfoto1 != null && $urlfoto2 != null && $urlfoto3 != null && $urlfoto4 == null && $urlfoto5 == null && $urlfoto6 != null && $urlfoto7 != null && $urlfoto8 != null){

       // Subimos la foto 1
        $imagen1 = base64_decode($urlfoto1);
        $imagen_name1 = $id_orden.'_1.jpg';
        $path1 = public_path('/imageneslectura/'.$imagen_name1);
        file_put_contents($path1, $imagen1);
        $img1 = Image::make(public_path('imageneslectura/'.$imagen_name1)); 
        $textimage = $request->fecha_de_ejecucion;
        $img1->resize(640, 480);
        $img1->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img1->save(public_path('imageneslectura/'.$imagen_name1)); 
        
        $url1='imageneslectura/'.$imagen_name1;

   // Subimos la foto 2
        $imagen2 = base64_decode($urlfoto2);
        $imagen_name2 = $id_orden.'_2.jpg';
        $path2 = public_path('/imageneslectura/'.$imagen_name2);
        file_put_contents($path2, $imagen2);
        $img2 = Image::make(public_path('imageneslectura/'.$imagen_name2));
        $img2->resize(640, 480);
        $textimage = $request->fecha_de_ejecucion;
        $img2->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img2->save(public_path('imageneslectura/'.$imagen_name2)); 
        $url2='imageneslectura/'.$imagen_name2;   
        
    // Subimos la foto 3
        $imagen3 = base64_decode($urlfoto3);
        $imagen_name3 = $id_orden.'_3.jpg';
        $path3 = public_path('/imageneslectura/'.$imagen_name3);
        file_put_contents($path3, $imagen3);
        $img3 = Image::make(public_path('imageneslectura/'.$imagen_name3));
        $img3->resize(640, 480);
        $textimage = $request->fecha_de_ejecucion;
        $img3->text($textimage, 10, 35, 
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img3->save(public_path('imageneslectura/'.$imagen_name3)); 
        $url3='imageneslectura/'.$imagen_name3;   
    
    
       


  // Subimos la foto 6
        $imagen6 = base64_decode($urlfoto6);
        $imagen_name6 = $id_orden.'_6.jpg';
        $path6 = public_path('/imageneslectura/'.$imagen_name6);
        file_put_contents($path6, $imagen6);
        $img6 = Image::make(public_path('imageneslectura/'.$imagen_name6)); 
        $textimage = $request->fecha_de_ejecucion;
        $img6->resize(640, 480);
        $img6->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img6->save(public_path('imageneslectura/'.$imagen_name6));
        $url6='imageneslectura/'.$imagen_name6;    

    // Subimos la foto 7
        $imagen7 = base64_decode($urlfoto7);
        $imagen_name7 = $id_orden.'_7.jpg';
        $path7 = public_path('/imageneslectura/'.$imagen_name7);
        file_put_contents($path7, $imagen7);
        $img7 = Image::make(public_path('imageneslectura/'.$imagen_name7)); 
        $textimage = $request->fecha_de_ejecucion;
        $img7->resize(640, 480);
        $img7->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img7->save(public_path('imageneslectura/'.$imagen_name7));
        $url7='imageneslectura/'.$imagen_name7;   
        
   // Subimos la foto 8
        $imagen8 = base64_decode($urlfoto8);
        $imagen_name8 = $id_orden.'_8.jpg';
        $path8 = public_path('/imageneslectura/'.$imagen_name8);
        file_put_contents($path8, $imagen8);
        $img8 = Image::make(public_path('imageneslectura/'.$imagen_name8)); 
        $textimage = $request->fecha_de_ejecucion;
        $img8->resize(640, 480);
        $img8->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img8->save(public_path('imageneslectura/'.$imagen_name8));
        $url8='imageneslectura/'.$imagen_name8;
        
           $medidoresapi = DB::table('orden_ejecutada')
        ->insert([
            'id'=>$request->id,
            'ordenejecutada_id'=>$request->ordenejecutada_id,
            'poliza'=>$request->poliza,
            'usuario'=>$request->usuario,
            'fecha_de_ejecucion'=>$request->fecha_de_ejecucion,
            'new_medidor'=>$request->new_medidor,
            'lectura'=>$request->lectura,
            'oposicion'=>$request->oposicion,
            'sin_caja'=>$request->sin_caja,
            'sin_tapa'=>$request->sin_tapa,
            'fuga_antes'=>$request->fuga_antes,
            'fuga_despues'=>$request->fuga_despues,
            'talco_roto'=>$request->talco_roto,
            'posible_fraude'=>$request->posible_fraude,
            'mtl'=>$request->mtl,
            'coordenada'=>$request->coordenada,
            'latitud'=>$request->latitud,
            'longitud'=>$request->longitud,
            'estado'=>$request->estado,
            'estado_id'=>$request->estado_id,
            'foto1'=>$url1,
            'foto2'=>$url2,
            'foto3'=>$url3,
            'foto4'=>$url4,
            'foto5'=>$url5,
            'foto6'=>$url6,
            'foto7'=>$url7,
            'foto8'=>$url8,
            'futuro'=>$request->futuro,
            'futuro1'=>$request->futuro1,
            'futuro2'=>$request->futuro2
            
            ]);

         DB::table('ordenesmtl')
                ->where('id','=',$id_orden)
                ->update([
                'fecha_de_ejecucion'=>$request->fecha_de_ejecucion,
                'new_medidor'=>$request->new_medidor,
                'lectura'=>$request->lectura,
                'oposicion'=>$request->oposicion,
                'sin_caja'=>$request->sin_caja,
                'sin_tapa'=>$request->sin_tapa,
                'fuga_antes'=>$request->fuga_antes,
                'fuga_despues'=>$request->fuga_despues,
                'talco_roto'=>$request->talco_roto,
                'posible_fraude'=>$request->posible_fraude,
                'mtl'=>$request->mtl,
                'coordenada'=>$request->coordenada,
                'latitud'=>$request->latitud,
                'longitud'=>$request->longitud,
                'estado'=>$request->estado,
                'estado_id'=>$request->estado_id,
                'foto1'=>$url1,
                'foto2'=>$url2,
                'foto3'=>$url3,
                'foto4'=>$url4,
                'foto5'=>$url5,
                'foto6'=>$url6,
                'foto7'=>$url7,
                'foto8'=>$url8,
                'futuro'=>$request->futuro,
                'futuro1'=>$request->futuro1,
                'futuro2'=>$request->futuro2,
                'updated_at'=>now()
                 
                ]); 
               

        return response()->json("success");
        
    }else if($urlfoto1 != null && $urlfoto2 != null && $urlfoto3 != null && $urlfoto4 != null && $urlfoto5 == null && $urlfoto6 != null && $urlfoto7 != null && $urlfoto8 == null){
    
     // Subimos la foto 1
        $imagen1 = base64_decode($urlfoto1);
        $imagen_name1 = $id_orden.'_1.jpg';
        $path1 = public_path('/imageneslectura/'.$imagen_name1);
        file_put_contents($path1, $imagen1);
        $img1 = Image::make(public_path('imageneslectura/'.$imagen_name1)); 
        $textimage = $request->fecha_de_ejecucion;
        $img1->resize(640, 480);
        $img1->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img1->save(public_path('imageneslectura/'.$imagen_name1)); 
        
        $url1='imageneslectura/'.$imagen_name1;

   // Subimos la foto 2
        $imagen2 = base64_decode($urlfoto2);
        $imagen_name2 = $id_orden.'_2.jpg';
        $path2 = public_path('/imageneslectura/'.$imagen_name2);
        file_put_contents($path2, $imagen2);
        $img2 = Image::make(public_path('imageneslectura/'.$imagen_name2));
        $img2->resize(640, 480);
        $textimage = $request->fecha_de_ejecucion;
        $img2->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img2->save(public_path('imageneslectura/'.$imagen_name2)); 
        $url2='imageneslectura/'.$imagen_name2;   
        
    // Subimos la foto 3
        $imagen3 = base64_decode($urlfoto3);
        $imagen_name3 = $id_orden.'_3.jpg';
        $path3 = public_path('/imageneslectura/'.$imagen_name3);
        file_put_contents($path3, $imagen3);
        $img3 = Image::make(public_path('imageneslectura/'.$imagen_name3));
        $img3->resize(640, 480);
        $textimage = $request->fecha_de_ejecucion;
        $img3->text($textimage, 10, 35, 
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img3->save(public_path('imageneslectura/'.$imagen_name3)); 
        $url3='imageneslectura/'.$imagen_name3;   
    
       // Subimos la foto 4
        $imagen4 = base64_decode($urlfoto4);
        $imagen_name4 = $id_orden.'_4.jpg';
        $path4 = public_path('/imageneslectura/'.$imagen_name4);
        file_put_contents($path4, $imagen4);
        $img4 = Image::make(public_path('imageneslectura/'.$imagen_name4)); 
        $textimage = $request->fecha_de_ejecucion;
        $img4->resize(640, 480);
        $img4->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img4->save(public_path('imageneslectura/'.$imagen_name4));
        $url4='imageneslectura/'.$imagen_name4;
    
        
   

  // Subimos la foto 6
        $imagen6 = base64_decode($urlfoto6);
        $imagen_name6 = $id_orden.'_6.jpg';
        $path6 = public_path('/imageneslectura/'.$imagen_name6);
        file_put_contents($path6, $imagen6);
        $img6 = Image::make(public_path('imageneslectura/'.$imagen_name6)); 
        $textimage = $request->fecha_de_ejecucion;
        $img6->resize(640, 480);
        $img6->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img6->save(public_path('imageneslectura/'.$imagen_name6));
        $url6='imageneslectura/'.$imagen_name6;    

    // Subimos la foto 7
        $imagen7 = base64_decode($urlfoto7);
        $imagen_name7 = $id_orden.'_7.jpg';
        $path7 = public_path('/imageneslectura/'.$imagen_name7);
        file_put_contents($path7, $imagen7);
        $img7 = Image::make(public_path('imageneslectura/'.$imagen_name7)); 
        $textimage = $request->fecha_de_ejecucion;
        $img7->resize(640, 480);
        $img7->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img7->save(public_path('imageneslectura/'.$imagen_name7));
        $url7='imageneslectura/'.$imagen_name7;   
        
   
      $medidoresapi = DB::table('orden_ejecutada')
        ->insert([
            'id'=>$request->id,
            'ordenejecutada_id'=>$request->ordenejecutada_id,
            'poliza'=>$request->poliza,
            'usuario'=>$request->usuario,
            'fecha_de_ejecucion'=>$request->fecha_de_ejecucion,
            'new_medidor'=>$request->new_medidor,
            'lectura'=>$request->lectura,
            'oposicion'=>$request->oposicion,
            'sin_caja'=>$request->sin_caja,
            'sin_tapa'=>$request->sin_tapa,
            'fuga_antes'=>$request->fuga_antes,
            'fuga_despues'=>$request->fuga_despues,
            'talco_roto'=>$request->talco_roto,
            'posible_fraude'=>$request->posible_fraude,
            'mtl'=>$request->mtl,
            'coordenada'=>$request->coordenada,
            'latitud'=>$request->latitud,
            'longitud'=>$request->longitud,
            'estado'=>$request->estado,
            'estado_id'=>$request->estado_id,
            'foto1'=>$url1,
            'foto2'=>$url2,
            'foto3'=>$url3,
            'foto4'=>$url4,
            'foto5'=>$url5,
            'foto6'=>$url6,
            'foto7'=>$url7,
            'foto8'=>$url8,
            'futuro'=>$request->futuro,
            'futuro1'=>$request->futuro1,
            'futuro2'=>$request->futuro2
            
            ]);

         DB::table('ordenesmtl')
                ->where('id','=',$id_orden)
                ->update([
                'fecha_de_ejecucion'=>$request->fecha_de_ejecucion,
                'new_medidor'=>$request->new_medidor,
                'lectura'=>$request->lectura,
                'oposicion'=>$request->oposicion,
                'sin_caja'=>$request->sin_caja,
                'sin_tapa'=>$request->sin_tapa,
                'fuga_antes'=>$request->fuga_antes,
                'fuga_despues'=>$request->fuga_despues,
                'talco_roto'=>$request->talco_roto,
                'posible_fraude'=>$request->posible_fraude,
                'mtl'=>$request->mtl,
                'coordenada'=>$request->coordenada,
                'latitud'=>$request->latitud,
                'longitud'=>$request->longitud,
                'estado'=>$request->estado,
                'estado_id'=>$request->estado_id,
                'foto1'=>$url1,
                'foto2'=>$url2,
                'foto3'=>$url3,
                'foto4'=>$url4,
                'foto5'=>$url5,
                'foto6'=>$url6,
                'foto7'=>$url7,
                'foto8'=>$url8,
                'futuro'=>$request->futuro,
                'futuro1'=>$request->futuro1,
                'futuro2'=>$request->futuro2,
                'updated_at'=>now()
                 
                ]); 
               

        return response()->json("success");
  
    
    }else if($urlfoto1 != null && $urlfoto2 != null && $urlfoto3 != null && $urlfoto4 == null && $urlfoto5 != null && $urlfoto6 != null && $urlfoto7 != null && $urlfoto8 == null){

      
     // Subimos la foto 1
        $imagen1 = base64_decode($urlfoto1);
        $imagen_name1 = $id_orden.'_1.jpg';
        $path1 = public_path('/imageneslectura/'.$imagen_name1);
        file_put_contents($path1, $imagen1);
        $img1 = Image::make(public_path('imageneslectura/'.$imagen_name1)); 
        $textimage = $request->fecha_de_ejecucion;
        $img1->resize(640, 480);
        $img1->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img1->save(public_path('imageneslectura/'.$imagen_name1)); 
        
        $url1='imageneslectura/'.$imagen_name1;

   // Subimos la foto 2
        $imagen2 = base64_decode($urlfoto2);
        $imagen_name2 = $id_orden.'_2.jpg';
        $path2 = public_path('/imageneslectura/'.$imagen_name2);
        file_put_contents($path2, $imagen2);
        $img2 = Image::make(public_path('imageneslectura/'.$imagen_name2));
        $img2->resize(640, 480);
        $textimage = $request->fecha_de_ejecucion;
        $img2->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img2->save(public_path('imageneslectura/'.$imagen_name2)); 
        $url2='imageneslectura/'.$imagen_name2;   
        
    // Subimos la foto 3
        $imagen3 = base64_decode($urlfoto3);
        $imagen_name3 = $id_orden.'_3.jpg';
        $path3 = public_path('/imageneslectura/'.$imagen_name3);
        file_put_contents($path3, $imagen3);
        $img3 = Image::make(public_path('imageneslectura/'.$imagen_name3));
        $img3->resize(640, 480);
        $textimage = $request->fecha_de_ejecucion;
        $img3->text($textimage, 10, 35, 
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img3->save(public_path('imageneslectura/'.$imagen_name3)); 
        $url3='imageneslectura/'.$imagen_name3;   
    
    
  
    // Subimos la foto 5
        $imagen5 = base64_decode($urlfoto5);
        $imagen_name5 = $id_orden.'_5.jpg';
        $path5 = public_path('/imageneslectura/'.$imagen_name5);
        file_put_contents($path5, $imagen5);
        $img5 = Image::make(public_path('imageneslectura/'.$imagen_name5)); 
        $textimage = $request->fecha_de_ejecucion;
        $img5->resize(640, 480);
        $img5->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img5->save(public_path('imageneslectura/'.$imagen_name5));
        $url5='imageneslectura/'.$imagen_name5;     
        
        


  // Subimos la foto 6
        $imagen6 = base64_decode($urlfoto6);
        $imagen_name6 = $id_orden.'_6.jpg';
        $path6 = public_path('/imageneslectura/'.$imagen_name6);
        file_put_contents($path6, $imagen6);
        $img6 = Image::make(public_path('imageneslectura/'.$imagen_name6)); 
        $textimage = $request->fecha_de_ejecucion;
        $img6->resize(640, 480);
        $img6->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img6->save(public_path('imageneslectura/'.$imagen_name6));
        $url6='imageneslectura/'.$imagen_name6;    

    // Subimos la foto 7
        $imagen7 = base64_decode($urlfoto7);
        $imagen_name7 = $id_orden.'_7.jpg';
        $path7 = public_path('/imageneslectura/'.$imagen_name7);
        file_put_contents($path7, $imagen7);
        $img7 = Image::make(public_path('imageneslectura/'.$imagen_name7)); 
        $textimage = $request->fecha_de_ejecucion;
        $img7->resize(640, 480);
        $img7->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img7->save(public_path('imageneslectura/'.$imagen_name7));
        $url7='imageneslectura/'.$imagen_name7;   
        
   

      $medidoresapi = DB::table('orden_ejecutada')
        ->insert([
            'id'=>$request->id,
            'ordenejecutada_id'=>$request->ordenejecutada_id,
            'poliza'=>$request->poliza,
            'usuario'=>$request->usuario,
            'fecha_de_ejecucion'=>$request->fecha_de_ejecucion,
            'new_medidor'=>$request->new_medidor,
            'lectura'=>$request->lectura,
            'oposicion'=>$request->oposicion,
            'sin_caja'=>$request->sin_caja,
            'sin_tapa'=>$request->sin_tapa,
            'fuga_antes'=>$request->fuga_antes,
            'fuga_despues'=>$request->fuga_despues,
            'talco_roto'=>$request->talco_roto,
            'posible_fraude'=>$request->posible_fraude,
            'mtl'=>$request->mtl,
            'coordenada'=>$request->coordenada,
            'latitud'=>$request->latitud,
            'longitud'=>$request->longitud,
            'estado'=>$request->estado,
            'estado_id'=>$request->estado_id,
            'foto1'=>$url1,
            'foto2'=>$url2,
            'foto3'=>$url3,
            'foto4'=>$url4,
            'foto5'=>$url5,
            'foto6'=>$url6,
            'foto7'=>$url7,
            'foto8'=>$url8,
            'futuro'=>$request->futuro,
            'futuro1'=>$request->futuro1,
            'futuro2'=>$request->futuro2
            
            ]);

         DB::table('ordenesmtl')
                ->where('id','=',$id_orden)
                ->update([
                'fecha_de_ejecucion'=>$request->fecha_de_ejecucion,
                'new_medidor'=>$request->new_medidor,
                'lectura'=>$request->lectura,
                'oposicion'=>$request->oposicion,
                'sin_caja'=>$request->sin_caja,
                'sin_tapa'=>$request->sin_tapa,
                'fuga_antes'=>$request->fuga_antes,
                'fuga_despues'=>$request->fuga_despues,
                'talco_roto'=>$request->talco_roto,
                'posible_fraude'=>$request->posible_fraude,
                'mtl'=>$request->mtl,
                'coordenada'=>$request->coordenada,
                'latitud'=>$request->latitud,
                'longitud'=>$request->longitud,
                'estado'=>$request->estado,
                'estado_id'=>$request->estado_id,
                'foto1'=>$url1,
                'foto2'=>$url2,
                'foto3'=>$url3,
                'foto4'=>$url4,
                'foto5'=>$url5,
                'foto6'=>$url6,
                'foto7'=>$url7,
                'foto8'=>$url8,
                'futuro'=>$request->futuro,
                'futuro1'=>$request->futuro1,
                'futuro2'=>$request->futuro2,
                'updated_at'=>now()
                 
                ]); 
               

        return response()->json("success");
        
    }else if($urlfoto1 != null && $urlfoto2 != null && $urlfoto3 != null && $urlfoto4 == null && $urlfoto5 == null && $urlfoto6 != null && $urlfoto7 != null && $urlfoto8 == null){

  
     // Subimos la foto 1
        $imagen1 = base64_decode($urlfoto1);
        $imagen_name1 = $id_orden.'_1.jpg';
        $path1 = public_path('/imageneslectura/'.$imagen_name1);
        file_put_contents($path1, $imagen1);
        $img1 = Image::make(public_path('imageneslectura/'.$imagen_name1)); 
        $textimage = $request->fecha_de_ejecucion;
        $img1->resize(640, 480);
        $img1->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img1->save(public_path('imageneslectura/'.$imagen_name1)); 
        
        $url1='imageneslectura/'.$imagen_name1;

   // Subimos la foto 2
        $imagen2 = base64_decode($urlfoto2);
        $imagen_name2 = $id_orden.'_2.jpg';
        $path2 = public_path('/imageneslectura/'.$imagen_name2);
        file_put_contents($path2, $imagen2);
        $img2 = Image::make(public_path('imageneslectura/'.$imagen_name2));
        $img2->resize(640, 480);
        $textimage = $request->fecha_de_ejecucion;
        $img2->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img2->save(public_path('imageneslectura/'.$imagen_name2)); 
        $url2='imageneslectura/'.$imagen_name2;   
        
    // Subimos la foto 3
        $imagen3 = base64_decode($urlfoto3);
        $imagen_name3 = $id_orden.'_3.jpg';
        $path3 = public_path('/imageneslectura/'.$imagen_name3);
        file_put_contents($path3, $imagen3);
        $img3 = Image::make(public_path('imageneslectura/'.$imagen_name3));
        $img3->resize(640, 480);
        $textimage = $request->fecha_de_ejecucion;
        $img3->text($textimage, 10, 35, 
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img3->save(public_path('imageneslectura/'.$imagen_name3)); 
        $url3='imageneslectura/'.$imagen_name3;   
    
  
  


  // Subimos la foto 6
        $imagen6 = base64_decode($urlfoto6);
        $imagen_name6 = $id_orden.'_6.jpg';
        $path6 = public_path('/imageneslectura/'.$imagen_name6);
        file_put_contents($path6, $imagen6);
        $img6 = Image::make(public_path('imageneslectura/'.$imagen_name6)); 
        $textimage = $request->fecha_de_ejecucion;
        $img6->resize(640, 480);
        $img6->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img6->save(public_path('imageneslectura/'.$imagen_name6));
        $url6='imageneslectura/'.$imagen_name6;    

    // Subimos la foto 7
        $imagen7 = base64_decode($urlfoto7);
        $imagen_name7 = $id_orden.'_7.jpg';
        $path7 = public_path('/imageneslectura/'.$imagen_name7);
        file_put_contents($path7, $imagen7);
        $img7 = Image::make(public_path('imageneslectura/'.$imagen_name7)); 
        $textimage = $request->fecha_de_ejecucion;
        $img7->resize(640, 480);
        $img7->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img7->save(public_path('imageneslectura/'.$imagen_name7));
        $url7='imageneslectura/'.$imagen_name7;   
        
   

      $medidoresapi = DB::table('orden_ejecutada')
        ->insert([
            'id'=>$request->id,
            'ordenejecutada_id'=>$request->ordenejecutada_id,
            'poliza'=>$request->poliza,
            'usuario'=>$request->usuario,
            'fecha_de_ejecucion'=>$request->fecha_de_ejecucion,
            'new_medidor'=>$request->new_medidor,
            'lectura'=>$request->lectura,
            'oposicion'=>$request->oposicion,
            'sin_caja'=>$request->sin_caja,
            'sin_tapa'=>$request->sin_tapa,
            'fuga_antes'=>$request->fuga_antes,
            'fuga_despues'=>$request->fuga_despues,
            'talco_roto'=>$request->talco_roto,
            'posible_fraude'=>$request->posible_fraude,
            'mtl'=>$request->mtl,
            'coordenada'=>$request->coordenada,
            'latitud'=>$request->latitud,
            'longitud'=>$request->longitud,
            'estado'=>$request->estado,
            'estado_id'=>$request->estado_id,
            'foto1'=>$url1,
            'foto2'=>$url2,
            'foto3'=>$url3,
            'foto4'=>$url4,
            'foto5'=>$url5,
            'foto6'=>$url6,
            'foto7'=>$url7,
            'foto8'=>$url8,
            'futuro'=>$request->futuro,
            'futuro1'=>$request->futuro1,
            'futuro2'=>$request->futuro2
            
            ]);

         DB::table('ordenesmtl')
                ->where('id','=',$id_orden)
                ->update([
                'fecha_de_ejecucion'=>$request->fecha_de_ejecucion,
                'new_medidor'=>$request->new_medidor,
                'lectura'=>$request->lectura,
                'oposicion'=>$request->oposicion,
                'sin_caja'=>$request->sin_caja,
                'sin_tapa'=>$request->sin_tapa,
                'fuga_antes'=>$request->fuga_antes,
                'fuga_despues'=>$request->fuga_despues,
                'talco_roto'=>$request->talco_roto,
                'posible_fraude'=>$request->posible_fraude,
                'mtl'=>$request->mtl,
                'coordenada'=>$request->coordenada,
                'latitud'=>$request->latitud,
                'longitud'=>$request->longitud,
                'estado'=>$request->estado,
                'estado_id'=>$request->estado_id,
                'foto1'=>$url1,
                'foto2'=>$url2,
                'foto3'=>$url3,
                'foto4'=>$url4,
                'foto5'=>$url5,
                'foto6'=>$url6,
                'foto7'=>$url7,
                'foto8'=>$url8,
                'futuro'=>$request->futuro,
                'futuro1'=>$request->futuro1,
                'futuro2'=>$request->futuro2,
                'updated_at'=>now()
                 
                ]); 
               

        return response()->json("success");


            }
    }else{ /* if($id_orden > 0 && $Estado == 4 && $actualizar4 > 0 ){
        
        
        if($urlfoto1 != null && $urlfoto2 != null && $urlfoto3 != null){  
        
     // Subimos la foto 1
        $imagen1 = base64_decode($urlfoto1);
        $imagen_name1 = $id_orden.'_1.jpg';
        $path1 = public_path('/imageneslectura/'.$imagen_name1);
        file_put_contents($path1, $imagen1);
        $img1 = Image::make(public_path('imageneslectura/'.$imagen_name1)); 
        $textimage = $request->fecha_de_ejecucion;
        $img1->resize(640, 480);
        $img1->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img1->save(public_path('imageneslectura/'.$imagen_name1)); 
        
        $url1='imageneslectura/'.$imagen_name1;

   // Subimos la foto 2
        $imagen2 = base64_decode($urlfoto2);
        $imagen_name2 = $id_orden.'_2.jpg';
        $path2 = public_path('/imageneslectura/'.$imagen_name2);
        file_put_contents($path2, $imagen2);
        $img2 = Image::make(public_path('imageneslectura/'.$imagen_name2));
        $img2->resize(640, 480);
        $textimage = $request->fecha_de_ejecucion;
        $img2->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img2->save(public_path('imageneslectura/'.$imagen_name2)); 
        $url2='imageneslectura/'.$imagen_name2;   
        
    // Subimos la foto 3
        $imagen3 = base64_decode($urlfoto3);
        $imagen_name3 = $id_orden.'_3.jpg';
        $path3 = public_path('/imageneslectura/'.$imagen_name3);
        file_put_contents($path3, $imagen3);
        $img3 = Image::make(public_path('imageneslectura/'.$imagen_name3));
        $img3->resize(640, 480);
        $textimage = $request->fecha_de_ejecucion;
        $img3->text($textimage, 10, 35, 
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img3->save(public_path('imageneslectura/'.$imagen_name3)); 
        $url3='imageneslectura/'.$imagen_name3;   
    
    // Subimos la foto 4
        $imagen4 = base64_decode($urlfoto4);
        $imagen_name4 = $id_orden.'_4.jpg';
        $path4 = public_path('/imageneslectura/'.$imagen_name4);
        file_put_contents($path4, $imagen4);
        $img4 = Image::make(public_path('imageneslectura/'.$imagen_name4)); 
        $textimage = $request->fecha_de_ejecucion;
        $img4->resize(640, 480);
        $img4->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img4->save(public_path('imageneslectura/'.$imagen_name4));
        $url4='imageneslectura/'.$imagen_name4;
    
        
    // Subimos la foto 5
        $imagen5 = base64_decode($urlfoto5);
        $imagen_name5 = $id_orden.'_5.jpg';
        $path5 = public_path('/imageneslectura/'.$imagen_name5);
        file_put_contents($path5, $imagen5);
        $img5 = Image::make(public_path('imageneslectura/'.$imagen_name5)); 
        $textimage = $request->fecha_de_ejecucion;
        $img5->resize(640, 480);
        $img5->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img5->save(public_path('imageneslectura/'.$imagen_name5));
        $url5='imageneslectura/'.$imagen_name5;     
        
        


  // Subimos la foto 6
        $imagen6 = base64_decode($urlfoto6);
        $imagen_name6 = $id_orden.'_6.jpg';
        $path6 = public_path('/imageneslectura/'.$imagen_name6);
        file_put_contents($path6, $imagen6);
        $img6 = Image::make(public_path('imageneslectura/'.$imagen_name6)); 
        $textimage = $request->fecha_de_ejecucion;
        $img6->resize(640, 480);
        $img6->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img6->save(public_path('imageneslectura/'.$imagen_name6));
        $url6='imageneslectura/'.$imagen_name6;    

    // Subimos la foto 7
        $imagen7 = base64_decode($urlfoto7);
        $imagen_name7 = $id_orden.'_7.jpg';
        $path7 = public_path('/imageneslectura/'.$imagen_name7);
        file_put_contents($path7, $imagen7);
        $img7 = Image::make(public_path('imageneslectura/'.$imagen_name7)); 
        $textimage = $request->fecha_de_ejecucion;
        $img7->resize(640, 480);
        $img7->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img7->save(public_path('imageneslectura/'.$imagen_name7));
        $url7='imageneslectura/'.$imagen_name7;   
        
   // Subimos la foto 8
        $imagen8 = base64_decode($urlfoto8);
        $imagen_name8 = $id_orden.'_8.jpg';
        $path8 = public_path('/imageneslectura/'.$imagen_name8);
        file_put_contents($path8, $imagen8);
        $img8 = Image::make(public_path('imageneslectura/'.$imagen_name8)); 
        $textimage = $request->fecha_de_ejecucion;
        $img8->resize(640, 480);
        $img8->text($textimage, 10, 35,
         function($font){ 
           $font->size(24);
           $font->file(public_path('font/OpenSans-Regular.ttf'));
           $font->color('#f1f505'); 
           $font->align('left'); 
           $font->valign('bottom'); 
           $font->angle(0); }); 
        $img8->save(public_path('imageneslectura/'.$imagen_name8));
        $url8='imageneslectura/'.$imagen_name8;
                
        
        
         $medidoresapi = DB::table('orden_ejecutada')
         ->where('id','=',$id_orden)
        ->update([
            'poliza'=>$request->poliza,
            'usuario'=>$request->usuario,
            'fecha_de_ejecucion'=>$request->fecha_de_ejecucion,
            'new_medidor'=>$request->new_medidor,
            'lectura'=>$request->lectura,
            'oposicion'=>$request->oposicion,
            'sin_caja'=>$request->sin_caja,
            'sin_tapa'=>$request->sin_tapa,
            'fuga_antes'=>$request->fuga_antes,
            'fuga_despues'=>$request->fuga_despues,
            'talco_roto'=>$request->talco_roto,
            'posible_fraude'=>$request->posible_fraude,
            'mtl'=>$request->mtl,
            'coordenada'=>$request->coordenada,
            'latitud'=>$request->latitud,
            'longitud'=>$request->longitud,
            'estado'=>$request->estado,
            'estado_id'=>$request->estado_id,
            'foto1'=>$url1,
            'foto2'=>$url2,
            'foto3'=>$url3,
            'foto4'=>$url4,
            'foto5'=>$url5,
            'foto6'=>$url6,
            'foto7'=>$url7,
            'foto8'=>$url8,
            'futuro'=>$request->futuro,
            'futuro1'=>$request->futuro1,
            'futuro2'=>$request->futuro2,
            'updated_at'=>$request->fecha_de_ejecucion
            ]);

         DB::table('ordenesmtl')
                ->where('id','=',$id_orden)
                ->update([
                    
                'fecha_de_ejecucion'=>$request->fecha_de_ejecucion,
                'new_medidor'=>$request->new_medidor,
                'lectura'=>$request->lectura,
                'oposicion'=>$request->oposicion,
                'sin_caja'=>$request->sin_caja,
                'sin_tapa'=>$request->sin_tapa,
                'fuga_antes'=>$request->fuga_antes,
                'fuga_despues'=>$request->fuga_despues,
                'talco_roto'=>$request->talco_roto,
                'posible_fraude'=>$request->posible_fraude,
                'mtl'=>$request->mtl,
                'coordenada'=>$request->coordenada,
                'latitud'=>$request->latitud,
                'longitud'=>$request->longitud,
                'estado'=>$request->estado,
                'estado_id'=>$request->estado_id,
                'foto1'=>$url1,
                'foto2'=>$url2,
                'foto3'=>$url3,
                'foto4'=>$url4,
                'foto5'=>$url5,
                'foto6'=>$url6,
                'foto7'=>$url7,
                'foto8'=>$url8,
                'futuro'=>$request->futuro,
                'futuro1'=>$request->futuro1,
                'futuro2'=>$request->futuro2,
                'updated_at'=>$request->fecha_de_ejecucion
                 
                ]); */
               

      
            return response()->json("error");
        
        }

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
