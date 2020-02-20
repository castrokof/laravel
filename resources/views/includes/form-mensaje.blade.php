@if (session("mensaje"))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-check"></i> Mensaje Sistema de Menu</h5>
       <li>{{ session("mensaje")}}</li>
</div>
@endif