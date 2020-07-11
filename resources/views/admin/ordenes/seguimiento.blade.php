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

<script src="https://cdn.datatables.net/plug-ins/1.10.20/api/sum().js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
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
           </div>

          
        </div>
  

        <!-- /.card-header -->
<div class="card-body table-responsive p-0" style="height: 800px;">
      <table id="seguimiento"  class="table table-head-fixed text-nowrap table-hover ">
        <thead>
        <tr> 
              <th>Detalle</th>
              <th>Detalle_Url</th>
              <th>Fecha de ejecucion</th>
              <th>Periodo</th>
              <th>Zona</th>
              <th>Lote</th>
              <th>Recorrido</th>
              <th>Direccion</th>
              <th>Nombre</th>
              <th>Usuario</th>
              <th>Poliza</th>
              <th>Medidor</th>
              <th>Lectura</th>
              <th>Nuevo medidor</th>
              <th>Marca</th>
              <th>MTL</th>
              <th>Foto</th>
              <th>Foto_Url</th>
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
       
      </table>
         
    </div>
 
</div>
</div>
@endsection

@section("scriptsPlugins")
<script src="{{asset("assets/$theme/plugins/datatables/jquery.dataTables.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/$theme/plugins/datatables-bs4/js/dataTables.bootstrap4.js")}}" type="text/javascript"></script>

<script>
 $(document).ready(function() {

fill_datatable();

 function fill_datatable( usuario = '', periodo = '', zona = '', estado = '', fechaini = '', fechafin = '', poliza = '', medidor = '')
{
 var datatable = $('#seguimiento').DataTable({
     order: [[ 2, "desc" ]],
     columnDefs: [
            {
                'targets': [ 1 ],
                'visible': false,
                'searchable': false
            },
            {
                'targets': [ 17 ],
                'visible': false,
                'searchable': false
            }
        ],
     language: idioma_espanol,
     lengthMenu: [ [10, 25, 50, 100, -1], [10, 25, 50, 100,"Mostrar Todo"] ],
     processing: true,
     serverSide: true,
     
     ajax:{
       url:"{{ route('seguimiento')}}",
       type: 'GET',
       data:    {usuario:usuario, periodo:periodo, zona:zona, estado:estado, fechaini:fechaini, fechafin:fechafin, poliza:poliza, medidor:medidor }
     },
     columns: [
       {
           data:'detalle', name:'detalle', order: false, searchable: false
           
       },
       {
          data:'detalle_Url', name:'detalle_Url', order: false, searchable: false
       },
       {
           data:'fecha_de_ejecucion', 
           name:'fecha_de_ejecucion',
          
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
           data:'poliza',
           name:'poliza'
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
           data:'foto_Url',name:'foto_Url',order: false, searchable: false
           
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
       
     ],
     //Botones----------------------------------------------------------------------
     
        "dom":'<"row"<"col-md-9 form-inline"l><"col-xs-3 form-inline"B>>rt<"row"<"col-md-8 form-inline"i> <"col-md-4 form-inline"p>>',
                   
               buttons: [
                  {

               extend:'copyHtml5',
               titleAttr: 'Copy',
               title:"seguimiento",
               className: "btn btn-info"


                  },
                  {

               extend:'excelHtml5',
               titleAttr: 'Excel',
               title:"seguimiento",
               className: "btn btn-success"


                  },
                   {

               extend:'csvHtml5',
               titleAttr: 'csv',
               className: "btn btn-warning"


                  },
                  {

               extend:'pdfHtml5',
               titleAttr: 'pdf',
               className: "btn btn-primary"


                  }
               ],
   
    
   });
   
}    



$('#buscar').click(function(){
    
var usuario = $('#usuario').val();
var periodo = $('#periodo').val();
var zona = $('#zona').val();
var estado = $('#estado').val();
var fechaini = $('#fechaini').val();
var fechafin = $('#fechafin').val();
var poliza = $('#poliza').val();
var medidor = $('#medidor').val();


if(usuario != '' || periodo != '' || zona != '' ||  estado != '' || fechaini != '' || fechafin != '' || poliza != '' || medidor != ''  ){

   $('#seguimiento').DataTable().destroy();
   fill_datatable(usuario, periodo, zona, estado, fechaini, fechafin, poliza );

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
$('#usuario').val('');
$('#periodo').val('');
$('#zona').val('');
$('#estado').val('');
$('#fechaini').val('');
$('#fechafin').val('');
$('#poliza').val('');
$('#medidor').val('');
$('#seguimiento').DataTable().destroy();
fill_datatable();
});
});

 var idioma_espanol =
                 {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad"
                }
                }      



</script>
  


@endsection
