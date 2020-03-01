<div class="form-group row">
    <div class="col-md-6">
        <label for="usuario" class="col-xs-2 control-label requerido">Usuario</label>
        <select name="usuario" id="usuario" class="form-control select2bs4" style="width: 100%;">
            <option value="">---seleccione el usuario---</option>
            @foreach ($usuarios as $id =>$usuario)
            <option value="{{$usuario}}">{{$usuario}}</option>
            @endforeach
        </select>
    </div>    
    <div class="col-md-6">    
        <label>&nbsp;</label>
        <div class="form-group">
        <button value ="asignar" id="asignar" name="asignar" type="submit" class="btn btn-success btn-xm col-xs-2">Asignar</button>
        <button value ="desasignar" id= "desasignar" name="desasignar" type="submit" class="btn btn-danger btn-xm col-xs-2">Desasignar</button>
        </div>    
    </div>

    
</div>    
