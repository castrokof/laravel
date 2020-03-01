@extends("theme.$theme.layout")

@section('titulo')
    Usuarios
@endsection
@section("styles")
<link href="{{asset("assets/$theme/plugins/datatables-bs4/css/dataTables.bootstrap4.css")}}" rel="stylesheet" type="text/css"/>       
@endsection


@section('scripts')
<script src="{{asset("assets/pages/scripts/admin/usuario/index.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/admin/usuario/crear.js")}}" type="text/javascript"></script>    
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @include('includes.form-error')
        @include('includes.form-mensaje')
    <div class="card card-info">
        <div class="card-header with-border">
          <h3 class="card-title">Usuarios</h3>
          <div class="card-tools pull-right">
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-xl"><i class="fa fa-fw fa-plus-circle"></i> Nuevo Usuario</button>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
      <table id="usuarios" class="table table-hover table-bordered text-nowrap">
        <thead>
        <tr>
              <th>Id</th>
              <th>Usuario</th>
              <th>Nombre</th>
              <th>Tipo de Usuario</th>
              <th>Email</th>
              <th>Empresa</th>
              <th>Password</th>
              <th>Estado</th>
              <th class="width80">Acciones</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($datas as $data1)
            <tr>
                <td>{{$data1->id}}</td>
                <td>{{$data1->usuario}}</td>
                <td>{{$data1->nombre}}</td>
                <td>{{$data1->tipodeusuario}}</td>
                <td>{{$data1->email}}</td>
                <td>{{$data1->empresa}}</td>
                <td>{{$data1->password}}</td>
                <td>{{$data1->estado}}</td>
                <td>
                <a href="{{url("admin/usuario/$data1->id/editar")}}" class="btn-accion-tabla tooltipsC" title="Editar este registro">
                  <i class="fa fa-fw fa-pencil-alt"></i>
                </a>
                </td>
            </tr>
        @endforeach          
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
</div>
</div>
</div>

    <div class="modal fade" tabindex="-1" id ="modal-xl" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">   
        <div class="row">
            <div class="col-lg-12">    
               <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title">Crear Usuarios</h3>
                  <div class="card-tools pull-right">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
              <form action="{{route('guardar_usuario')}}" id="form-general" class="form-horizontal" method="POST">
                @csrf
                <div class="card-body">
                                  @include('admin.usuario.form')
                              </div>
                              <!-- /.card-body -->
                              <div class="card-footer">
                                
                                  <div class="col-lg-3"></div>
                                  <div class="col-lg-6">
                                  @include('includes.boton-form-crear')
                              </div>
                               </div>
                              <!-- /.card-footer -->
              </form>
                         
            
               
          </div>
        </div>
      </div>
    </div>
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
        $('#usuarios')
        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
        .DataTable(

          

        );

       });
  </script>
   

@endsection
