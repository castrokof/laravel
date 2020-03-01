@extends("theme.$theme.layout")
@section('titulo')
  Archivos de entrada  
@endsection

@section('scripts')
<script src="{{asset("assets/pages/scripts/admin/rol/index.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/admin/archivo/crear.js")}}" type="text/javascript"></script>    
@endsection


@section('contenido')
<div class="row">
<div class="col-lg-12">
  @include('includes.form-error')
  @include('includes.form-mensaje')  
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Archivos</h3>
      <div class="card-tools pull-right">
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg"><i class="fa fa-fw fa-plus-circle"></i> Subir Archivo</button>
        </button>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
      <table id="tabla-data" class="table table-hover table-bordered text-nowrap">
            <thead>
                <tr>
                    
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Usuario</th>
                    <th>Periodo</th>
                    <th>Zona</th>
                    <th>Total de registros</th>
            </thead>
            <tbody>
                    @foreach ($datas as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->nombre}}</td>
                            <td>{{$data->fecha}}</td>
                            <td>{{$data->estado}}</td>
                            <td>{{$data->usuario}}</td>
                            <td>{{$data->periodo}}</td>
                            <td>{{$data->zona}}</td>
                            <td>{{$data->cantidad}}</td>
                            
                        </tr>
                    @endforeach                
            </tbody>
      </table>
    </div>
    
  </div>
</div>
</div>
<!--Modal-->

<div class="modal fade" tabindex="-1" id ="modal-lg" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">   
  <div class="row">
      <div class="col-lg-12">    
         <div class="card card-warning">
          <div class="card-header">
            <h3 class="card-title">Subir archivo</h3>
            <div class="card-tools pull-right">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
          </div>
        <form action="{{route('subir_archivo')}}" id="form-general" class="form-horizontal" method="POST" enctype="multipart/form-data" >
          @csrf
         <div class="card-body">
                            @include('admin.archivos.form')
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