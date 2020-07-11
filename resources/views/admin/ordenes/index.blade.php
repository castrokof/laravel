@extends("theme.$theme.layout")

@section('titulo')
   Asignación
@endsection

@section("styles")
<link href="{{asset("assets/$theme/plugins/datatables-bs4/css/dataTables.bootstrap4.css")}}" rel="stylesheet" type="text/css"/>       

<style>
.loader { visibility: hidden; background-color: rgba(255,255,255,0.7); 
position: absolute; 
z-index: +100 !important; 
width: 70%; 
height:70%; } 
.loader img { position: relative; top:10%; left:30%;
  width: 200px; height: 200px; } 
</style>

@endsection



@section('scripts')
<script src="{{asset("assets/pages/scripts/admin/asignacion/index.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/admin/rol/crear.js")}}" type="text/javascript"></script>    
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @include('includes.form-error')
        @include('includes.form-mensaje')
        <div class="card card-info">
        <div class="card-header with-border">
          <h3 class="card-title">Asignación</h3>
        </div>  
           
            <div class="card-body">
              
                @include('admin.ordenes.form')
                @include('admin.ordenes.form-actualizar')
              
            </tr>
            </td> 
            </div>
          

               </div>              
              </div>
        
                        
<div class="card-body table-responsive p-0" style="height: 600px;">
    <div class="loader"> <img src="{{asset("assets/$theme/dist/img/loader6.gif")}}" class="" /> </div> 
      <table id="asignacion"  class="table text-nowrap table-head-fixed table-hover table-bordered">
        <thead>
        <tr> 
              <th class="width40"><input name="selectall" id="selectall" type="checkbox" class="select-all" /> Select / Deselect All</th>
              <th>Consecutivo</th>
              <th>Estado</th>
              <th>Usuario</th>
              <th>Funcionario</th>
              <th>Orden</th>
              <th>Poliza</th>
              <th>Direccion</th>
              <th>Recorrido</th>
              <th>Periodo</th>
              <th>Zona</th>
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
 jQuery(document).ready(function() {

fill_datatable();
 
 function fill_datatable(periodo = '', zona = '', estado = '', orden = '', ordenf = '')
{
 var datatable = $('#asignacion').DataTable({
     language: idioma_espanol,
     lengthMenu: [ [500, 10, 25, 50, 100,-1 ], [500, 10, 25, 50, 100, "Mostrar Todo"] ],
     processing: true,
     serverSide: true,
     ajax:{
       url:"{{ route('asignacion')}}",
       data:{periodo:periodo, zona:zona, estado:estado, orden:orden, ordenf:ordenf}
     },
     columns: [
       {
           data:'checkbox', orderable: false, searchable: false
           
       },
     
       {
           data:'consecutivo_int'
           
       },
       {
           data:'estado'
           
       },
       {
           data:'usuario'
       },
       {
           data:'nombreu'
       },
       {
       data:'ordenesmtl_id'
       },
       {
           data:'poliza'
       },
       {
           data:'direccion'
       },
       {
           data:'recorrido'
       },
       {
           data:'periodo'
       },
       {
           data:'zona'
       }

     ],
     

 
 
     
     
    });
}    

 


$('#buscar').click(function(){

var periodo = $('#periodo').val();
var zona = $('#zona').val();
var estado = $('#estado').val();
var orden = $('#orden').val();
var ordenf = $('#ordenf').val();

if((periodo != '' && zona != '' && estado != '') || (orden != '' && ordenf != '')){

   $('#asignacion').DataTable().destroy();
   fill_datatable(periodo, zona, estado, orden, ordenf);

}else{

  swal({
            title: 'Debes digitar el periodo, zona y estado',
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
$('#orden').val('');
$('#ordenf').val('');
$('#asignacion').DataTable().destroy();
fill_datatable();
});



$(document).on('click', '#asignar', function(){
  
     var usuario = $('#usuario').val();
     var id = [];
     if(usuario == ''){

            swal({
            title: 'Debe seleccionar un usuario',
            icon: 'warning',
            buttons:{
                cancel: "Cerrar"
                
                    }
              }) 
      
   
     }else{
     
     if(confirm("Quieres asignar estas ordenes??"))
      {
        
        $('input:checkbox:checked').each(function() {
        id.push($(this).val());
        
           });
        
       if(id.length > 0)
        { 
             
          $.ajax({
            beforeSend: function(){ 
            $('.loader').css("visibility", "visible"); }, 
                url:"{{ route('actualizar_asignacion')}}",
                method:'post',
                data:{id:id, usuario:usuario,
                
                  "_token": $("meta[name='csrf-token']").attr("content")
                
                },
                success:function(respuesta)
                {  
                  if(respuesta.mensaje = 'ok') {
                  $('#asignacion').DataTable().ajax.reload();
                  Manteliviano.notificaciones('Ordenes asignadas correctamente', 'Sistema Manteliviano', 'success');
                  }else if(respuesta.mensaje = 'ng'){
                    $('#asignacion').DataTable().ajax.reload();
                    Manteliviano.notificaciones('Las ordenes seleccionadas ya estan asignadas', 'Sistema Manteliviano', 'error');
                }
                },
                complete: function(){ 
                  $('.loader').css("visibility", "hidden");
                 }
                 });

          }
          else
          {

      swal({
            title: 'Por favor seleccione una orden del checkbox',
            icon: 'warning',
            buttons:{
                cancel: "Cerrar"
                
                    }
              })
            }
         }
       }     
    });
    
    $(document).on('click', '#desasignar', function(){
     
     var id = [];
          
     if(confirm("Quieres desasignar estas ordenes??"))
      {
       $('input:checkbox:checked').each(function() {
        id.push($(this).val());
        
           });
        
       if(id.length > 0)
        {    
          $.ajax({
            beforeSend: function(){ 
            $('.loader').css("visibility", "visible"); }, 
                url:"{{ route('desasignar_asignacion')}}",
                method:'post',
                data:{id:id,
                
                  "_token": $("meta[name='csrf-token']").attr("content")
                
                },
                success:function(respuesta)
                {  
                  if(respuesta.mensaje = 'ok') {
                  $('#asignacion').DataTable().ajax.reload();
                  Manteliviano.notificaciones('Ordenes deasignadas correctamente', 'Sistema Manteliviano', 'warning');
                  }else if(respuesta.mensaje = 'ng'){
                    $('#asignacion').DataTable().ajax.reload();
                    Manteliviano.notificaciones('Las ordenes seleccionadas ya estan asignadas', 'Sistema Manteliviano', 'error');
                }
                },
                 complete: function(){ 
                  $('.loader').css("visibility", "hidden");
                 } 
                 });

          }
          else
          {

      swal({
            title: 'Por favor seleccione una orden del checkbox',
            icon: 'warning',
            buttons:{
                cancel: "Cerrar"
                
                    }
              })
            }
         }
            
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
