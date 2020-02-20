@extends("theme.$theme.layout")
@section('titulo')
 Sietema de Menús
@endsection

@section('contenido')
<div class="row">
<div class="col-lg-12">    
<div class="card card-warning">
    <div class="card-header">
      <h3 class="card-title">Crear Menús</h3>
    </div>
  <form action="{{route('guardar_menu')}}" id="form-general" class="form-horizontal" method="POST">
    @csrf
    <div class="card-body">
                      @include('admin.menu.form')
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
@endsection