@extends("theme.$theme.layout")
@section('titulo')
  Menus 
@endsection

@section('contenido')
<div class="row">
<div class="col-lg-12">    
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Menus</h3>
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
                    
            </tbody>
      </table>
    </div>
    
  </div>
</div>
</div>
@endsection