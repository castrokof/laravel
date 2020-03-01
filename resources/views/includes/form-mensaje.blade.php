@if (session("mensaje"))
<div class="alert alert-warning alert-dismissible" data-auto-dismiss="5000">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-check"></i> Mensaje Sistema de Manteliviano</h5>
       <li>{{ session("mensaje")}}</li>
</div>
@endif