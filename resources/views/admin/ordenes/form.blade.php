<div class="form-group row">
    <div class="col-md-3">
        <label for="periodo" class="col-xs-4 control-label requerido">Periodo</label>
        <input type="text" name="periodo" id="periodo" class="form-control col-md-12" value="" required>
    </div>
    <div class="col-md-3">
    <label for="zona" class="col-xs-4 control-label requerido">Zona</label>
    <input type="text" name="zona" id="zona" class="form-control col-md-12 " value="" required >
    </div>
  <div class="col-md-3">
        <label for="estado" class="col-xs-4 control-label requerido">Estado</label>
        <select name="estado" id="estado" class="form-control select2bs4" style="width: 100%;" required>
            <option value="">---seleccione---</option>
            <option value="CARGADO">CARGADO</option>
            <option value="PENDIENTE">PENDIENTE</option>
        </select>
</div>
<div class="col-md-3">    
    <label>&nbsp;</label>
    <div class="form-group row">
        <button type="button" name="reset" id="reset"  class="btn btn-default btn-xl col-md-5">Limpiar</button>
        <button type="button" name="buscar" id="buscar" class="btn btn-success btn-xl col-md-5">Buscar</button>
    </div>    
</div>
</div> 