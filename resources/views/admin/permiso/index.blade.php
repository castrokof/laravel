@extends("theme.$theme.layout")
@section('titulo')
  Permisos  
@endsection

@section('contenido')
<div class="row">
<div class="col-lg-12">    
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Permisos</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
      <table class="table table-bordered table-striped table-hover text-nowrap">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Slug</th>
                    <th></th>

                </tr>
            </thead>
            <tbody>
                    @foreach ($permisos as $permiso)
                        <tr>
                            <td>{{$permiso->id}}</td>
                            <td>{{$permiso->nombre}}</td>
                            <td>{{$permiso->slug}}</td>
                            <td></td>
                        </tr>
                    @endforeach                
            </tbody>
      </table>
    </div>
    
  </div>
</div>
</div>
@endsection