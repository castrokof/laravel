@extends("theme.$theme.layout")

@section('titulo')
   Seguimiento de ordenes
@endsection

@section("styles")
<link href="{{asset("assets/$theme/plugins/datatables-bs4/css/dataTables.bootstrap4.css")}}" rel="stylesheet" type="text/css"/>       

@endsection



@section('scripts')
<script src="{{asset("assets/pages/scripts/admin/rol/index.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/admin/rol/crear.js")}}" type="text/javascript"></script>    
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @include('includes.form-error')
        @include('includes.form-mensaje')
        <div class="card card-info">
        <div class="card-header with-border">
          <h3 class="card-title">Seguimiento de ordenes</h3>
        </div>  
          {{-- <form action="{{route('asignacion')}}" id="form-general" class="form-horizontal" method="GET"> --}}
            @csrf
            <div class="card-body">
              
              @include('admin.ordenes.form-seguimiento')
              
            </tr>
            </td> 
            </div>
          {{-- </form> --}}

          {{-- <form action="{{route('actualizar_asignacion')}}" id="form-general" class="form-horizontal" method="POST"> --}}
            @csrf
            <div class="card-body">
              <div class="form-group row">
                <div class="col-md-6">
                             
                </div>              
              </div>
            </div>
                          <!-- /.card-body -->
                          <div class="card-footer">
                            
                              <div class="col-lg-3"></div>
                              <div class="col-lg-6">
                             
                          </div>
                           </div>
                          <!-- /.card-footer -->
          
        </div>

          
        </div>
  

        <!-- /.card-header -->
<div class="card-body table-responsive p-0" style="height: 500px;">
      <table id="seguimiento"  class="table text-nowrap table-hover table-bordered">
        <thead>
        <tr> 
              <th>Detalle</th>
              <th>Fecha de ejecucion</th>
              <th>Periodo</th>
              <th>Zona</th>
              <th>Lote</th>
              <th>Recorrido</th>
              <th>Direccion</th>
              <th>Nombre</th>
              <th>Usuario</th>
              <th>Medidor</th>
              <th>Lectura</th>
              <th>Nuevo medidor</th>
              <th>Marca</th>
              <th>MTL</th>
              <th>Foto</th>
              <th>Oposicion</th>
              <th>Sin caja</th>
              <th>Sin tapa</th>
              <th>Fuga antes</th>
              <th>Fuga despues</th>
              <th>Talco Roto</th>
              <th>Posible Fraude</th>
              <th>Quien se opone</th>
              <th>Observacion General</th>
              <th>Latitud</th>
              <th>Longitud</th>
              <th>Estado</th>

        </tr>
        </thead>
        {{-- <tbody>
            @foreach ($datas as $data)
            <tr>
                <td><div class="checkbox">
                    <label class="form-check-label">
                        <input type="checkbox" name="id[]" value="{{$data->id}}" class="btn-accion-tabla tooltipsC" title="Seleccione una orden" id="optb">
                    </label>     
                </td>
                <td>{{$data->ordenesmtl_id}}</td>
                <td>{{$data->estado}}</td>
                <td>{{$data->usuario}}</td>
                <td>{{$data->poliza}}</td>
                <td>{{$data->direccion}}</td>
                <td>{{$data->recorrido}}</td>
                <td>{{$data->periodo}}</td>
                <td>{{$data->zona}}</td>
               
            </tr>
        @endforeach          
        </tbody> --}}
      </table>
         
    </div>
  {{-- </form>   --}}
    <!-- /.card-body -->
</div>
</div>
@endsection

@section("scriptsPlugins")
<script src="{{asset("assets/$theme/plugins/datatables/jquery.dataTables.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/$theme/plugins/datatables-bs4/js/dataTables.bootstrap4.js")}}" type="text/javascript"></script>

<script>
 $(document).ready(function() {

fill_datatable();

 function fill_datatable(periodo = '', zona = '', estado = '', fechaini = '', fechafin = '', poliza = '', medidor = '', usuario = '')
{
 var datatable = $('#seguimiento').DataTable({
     processing: true,
     serverSide: true,
     ajax:{
       url:"{{ route('seguimiento')}}",
       data:{periodo:periodo, zona:zona, estado:estado, fechaini:fechaini, fechafin:fechafin, poliza:poliza, medidor:medidor, usuario:usuario}
     },
     columns: [
       {
           data:'detalle', name:'detalle', orderable: false, searchable: false
           
       },
       {
           data:'fecha_de_ejecucion',
           name:'fecha_de_ejecucion'
       },
       {
           data:'periodo',
           name:'periodo'
       },
       {
           data:'zona',
           name:'zona'
       },
       {
           data:'lote',
           name:'lote'
       },
       {
           data:'recorrido',
           name:'recorrido'
       },
       {
           data:'direccion',
           name:'direccion'
       },
       {
           data:'nombre',
           name:'nombre'
       },
       {
           data:'usuario',
           name:'usuario'
       },
       {
           data:'medidor',
           name:'medidor'            
       },
       {
           data:'lectura',
           name:'lectura'
       },
       {
           data:'new_medidor',
           name:'new_medidor'
       },
       {
           data:'futuro2',
           name:'futuro2'
       },
       {
           data:'mtl',
           name:'mtl'
       },
       {
           data:'foto',name:'foto', orderable: false, searchable: false
       },
       {
           data:'oposicion',
           name:'oposicion'
       },
       {
           data:'sin_caja',
           name:'sin_caja'
       },
       {
           data:'sin_tapa',
           name:'sin_tapa'
       },
       {
           data:'fuga_antes',
           name:'fuga_antes'
       },
       {
           data:'fuga_despues',
           name:'fuga_despues'
       },
       {
           data:'talco_roto',
           name:'talco_roto'
       },
       {
           data:'posible_fraude',
           name:'posible_fraude'
       },
       {
           data:'futuro',
           name:'futuro'
       },
       {
           data:'futuro1',
           name:'futuro1'
       },
       {
           data:'latitud',
           name:'latitud'
       },
       {
           data:'longitud',
           name:'longitud'
       },
       {
           data:'estado',
           name:'estado'
       }
       
     ]
   });
}    

$('#buscar').click(function(){

var periodo = $('#periodo').val();
var zona = $('#zona').val();
var estado = $('#estado').val();
var fechaini = $('#fechaini').val();
var fechafin = $('#fechafin').val();
var poliza = $('#poliza').val();
var medidor = $('#medidor').val();
var usuario = $('#usuario').val();

if(poliza != '' || medidor != '' || periodo != '' || zona != ''  || usuario != '' || estado != '' || fechaini != '' || fechafin != ''){

   $('#seguimiento').DataTable().destroy();
   fill_datatable(periodo, zona, estado, fechaini, fechafin, poliza, medidor, usuario);

}else{

  swal({
            title: 'Debes digitar algun campo Ej: periodo y zona',
            icon: 'warning',
            buttons:{
                cancel: "Cerrar"
                
                    }
              })
}
});        

$('#reset').click(function(){
$('#zona').val('');
$('#periodo').val('');
$('#estado').val('');
$('#fechaini').val('');
$('#fechafin').val('');
$('#poliza').val('');
$('#medidor').val('');
$('#usuario').val('');
$('#seguimiento').DataTable().destroy();
fill_datatable();
});
});

   



</script>
  


@endsection
