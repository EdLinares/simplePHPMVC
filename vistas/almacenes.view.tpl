<h2>Trabajar con Almacenes</h2>
<div class="col12 right clean">
  <a href="index.php?page=almacen&acc=ins">Nuevo</a>
</div>
<div>
  <div class="rowhd sdhide">
    <div class="col1 hd">Código</div>
    <div class="col2 hd">Nombre del Almacen</div>
    <div class="col2 hd">Teléfono</div>
    <div class="col2 hd">Teléfono 2</div>
    <div class="col1 hd">Tipo</div>
  </div>
  {{foreach almacenes}}
  <div class="row">
    <div class="col1 sdhide">{{almacenId}}</div>
    <div class="col2">{{nombrealmacen}}</a></div>
    <div class="col2">{{almatel}}</div>
    <div class="col2">{{almatel2}}</div>
    <div class="col2">{{tipalma}}</div>
    <div class="col1">{{emptip}}</div>
    <div class="col2 right">
      <a href="index.php?page=almacen&acc=upd&almacenId={{almacenId}}">Update</a> |
      <a href="index.php?page=almacen&acc=dlt&almacenId={{almacenId}}">Delete</a>
    </div>
  </div>
  {{endfor almacen}}
</div>
