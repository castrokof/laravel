<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Marcas;
use Illuminate\Support\Facades\DB;

class MarcasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Marcas::orderBy('id')->get();
        return view('admin.marcas.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        return view('admin.marcas.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        Marcas::create($request->all());
        return redirect('admin/marca')->with('mensaje', 'Marca creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mostrar($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        $data = Marcas::findOrFail($id);
        return view('admin.marcas.editar', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request, $id)
    {
        Marcas::findOrFail($id)->update($request->all());
        return redirect('admin/marca')->with('mensaje', 'Marca actualizado con exito!!');
    }
    
    public function marcasall(Request $request)
    {   
     
       $Usuario=$request->usuario;
       $Orden_id=$request->estado_id;
       
        $medidor = DB::table('ordenesmtl')
        ->where([
            ['usuario','=',$Usuario],
            ['estado_id','=',$Orden_id]
            ])
        ->count();
        
    if($medidor>0){    
        $marcasapi = DB::table('marcas')
        ->select('marca_id', 'codigo', 'descripcion')
        ->get();

        return response()->json($marcasapi);
        
        }    
    }    
}
