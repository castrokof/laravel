@extends("theme.$theme.layout")

@section('titulo')
   Asignación
@endsection

@section("styles")
<link href="{{asset("assets/$theme/plugins/datatables-bs4/css/dataTables.bootstrap4.css")}}" rel="stylesheet" type="text/css"/>       

@endsection



@section('scripts')
<script src="{{asset("assets/pages/scripts/admin/ordenes/index.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/admin/ordenes/crear.js")}}" type="text/javascript"></script>    
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
          <form action="{{route('asignacion')}}" id="form-general" class="form-horizontal" method="GET">
            @csrf
            <div class="card-body">
              
              @include('admin.ordenes.form')
              
            </tr>
            </td> 
            </div>
          </form>

          <form action="{{route('actualizar_asignacion')}}" id="form-general" class="form-horizontal" method="POST">
            @csrf
            <div class="card-body">
              <div class="form-group row">
                <div class="col-md-6">
                              @include('admin.ordenes.form-actualizar')
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
      <table id="asignacion"  class="table table-head-fixed text-nowrap table-hover table-bordered">
        <thead>
        <tr> 
              <th class="width40"><input type="checkbox" class="select-all" /> Select / Deselect All</th>              
              <th>Orden</th>
              <th>Estado</th>
              <th>Usuario</th>
              <th>Poliza</th>
              <th>Direccion</th>
              <th>Recorrido</th>
              <th>Periodo</th>
              <th>Zona</th>
        </tr>
        </thead>
        <tbody>
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
        </tbody>
      </table>
         
    </div>
  </form>  
    <!-- /.card-body -->
</div>
</div>
@endsection

@section("scriptsPlugins")
<script src="{{asset("assets/$theme/plugins/datatables/jquery.dataTables.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/$theme/plugins/datatables-bs4/js/dataTables.bootstrap4.js")}}" type="text/javascript"></script>

<script>
  jQuery(function($) {
          //initiate dataTables plugin
  
          var myTable = 
          $('#asignacio')
          //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
          .DataTable(
  
            
  
          );
  
         });
  </script>
  


@endsection
