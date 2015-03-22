<h2>{{almacenTitle}}</h2>
<a href="index.php?page=almacenes">Listado de Almacenes</a>
<form action="index.php?page=almacen&acc={{almacenMode}}" method="post">
  <div>
    <label class="col4" for="almacenId">Código</label>
    <input class="col8" type="text" disabled="disabled" value=""/>
    <input type="hidden" id="almacenId" name="almacenId" value=""/>
  </div>
  <div>
    <label class="col4" for="nombrealmacen">Nombre del Almacen</label>
    <input class="col8" type="text" id="nombrealmacen" name="nombrealmacen" value="" {{disabled}}/>
  </div>
  <div>
    <label class="col4" for="almartn">RTN</label>
    <input class="col8" type="text" id="almartn" name="almartn" value="" {{disabled}}/>
  </div>
  <div>
    <label class="col4" for="almacendir">Dirección</label>
    <input class="col8" type="text" id="almacendir" name="almacendir" value="" {{disabled}}/>
  </div>
  <div>
    <label class="col4" for="almatel">Teléfono</label>
    <input class="col8" type="text" id="almatel" name="almatel" value="" {{disabled}}/>
  </div>
  <div>
    <label class="col4" for="almatel2">Otro Teléfono</label>
    <input class="col8" type="text" id="almatel2" name="almatel2" value="" {{disabled}}/>
  </div>
  <div>
    <label class="col4" for="almaest">Estado</label>
    <select class="col8" id="almaest" name="almaest" {{disabled}}>
      <option value="ACT" {{actSelected}}>Activo</option>
      <option value="INA" {{inaSelected}}>Inactivo</option>
    </select>
  </div>
  <div>
    <label class="col4" for="tipalma">Tipo de Almacen</label>
    <select class="col8" id="tipalma" name="tipalma" {{disabled}}>
      <option value="0" {{srvSelected}}>Super Almacen</option>
      <option value="1" {{rtlSelected}}>Sub Almacen</option>
    </select>
  </div>
  <div class="right col12">
    <input type="hidden" id="btnacc" name="btnacc" value="{{almacenMode}}"/>
    <input type="button" name="btnGuardar" value="Confirmar" onclick="document.forms[0].submit();"/>
  </div>
</form>
