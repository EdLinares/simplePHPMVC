<?php
/* Empresa Controller
 * 2015-03-05
 * Created By OJBA
 * Last Modification 2015-03-05 19:25:00
 */
  require_once("libs/template_engine.php");

  require_once("models/almacenes.model.php");

  function run(){
    //htmlDatos, arreglo que contiene todas las substituciones
    // que se darán en la plantilla.

    $htmlDatos = array();
    $htmlDatos["almacenTitle"] = "";
    $htmlDatos["almacenMode"] = "";
    $htmlDatos["almacenId"] = "";
    $htmlDatos["almacenrtn"]="";
    $htmlDatos["nombrealmacen"]="";
    $htmlDatos["mattip"]="";
    $htmlDatos["numsubal"]="";
    $htmlDatos["almacendir"]="";
    $htmlDatos["almacentel"]="";
    $htmlDatos["almacentel2"]="";
    $htmlDatos["EmpresaId"]="";
    $htmlDatos["supalmacod"]="";
    $htmlDatos["actSelected"]="selected";
    $htmlDatos["inaSelected"]="";
    $htmlDatos["srvSelected"]="";
    $htmlDatos["rtlSelected"]="selected";
    $htmlDatos["wrhSelected"]="";
    $htmlDatos["disabled"]="";


    if(isset($_GET["acc"])){
      switch($_GET["acc"]){
        //Manejando si es un insert
        case "ins":
          $htmlDatos["almacenTitle"] = "Ingreso de Nuevo Almacen";
          $htmlDatos["almacenMode"] = "ins";
          //se determina si es una acción del formulario
          if(isset($_POST["btnacc"])){
            $lastID = insertarAlmacen($_POST);
            if($lastID){
              redirectWithMessage("¡Almacen Ingresado!","index.php?page=almacen&acc=upd&almacenId=".$lastID);
            }else{

              mergeArrayTo($_POST, $_htmlDatos);

              $htmlDatos["actSelected"]=($_POST["almest"] =="ACT")?"selected":"";
              $htmlDatos["inaSelected"]=($_POST["almest"] =="INA")?"selected":"";
              $htmlDatos["srvSelected"]=($_POST["mattip"] =="SRV")?"selected":"";
              $htmlDatos["rtlSelected"]=($_POST["mattip"] =="RTL")?"selected":"";
              $htmlDatos["wrhSelected"]=($_POST["mattip"] =="WRH")?"selected":"";
            }
          }
          //si no es una acción del post se muestra los datos
          renderizar("almacen", $htmlDatos);
          break;
        //Manejando si es un Update
        case "upd":
          if(isset($_POST["btnacc"])){
            //implementar logica de guardado
            if(actualizarAlmacen($_POST)){
              //forzando a que se actualice con los datos de la db
              redirectWithMessage("¡Almacen Actualizado!","index.php?page=almacen&acc=upd&almacenId=".$_POST["almacenId"]);
            }
          }
          if(isset($_GET["almacenId"])){
            $almacen = obtenerAlmacen($_GET["almacenId"]);
            if($almacen){
              $htmlDatos["almacenTitle"] = "Actualizar ".$almacen["almadsc"];
              $htmlDatos["almacenMode"] = "upd";

              // Esta funcion mergeArrayTo se encuentra en libs/utilities.php
              // utiliza parametros por referencia se usa para llenar los
              // datos comunes del primer arreglo segun llave en el segundo
              // si existen en el segundo. Asi podemos compiar los datos empresas directamente
              // en el arreglo htmlDatos sin tener que estar escribiendo cada asignación.

              mergeArrayTo($almacen , $htmlDatos);

              $htmlDatos["actSelected"]=($almacen["almaest"] =="ACT")?"selected":"";
              $htmlDatos["inaSelected"]=($almacen["almaest"] =="INA")?"selected":"";
              $htmlDatos["srvSelected"]=($almacen["mattip"] =="SRV")?"selected":"";
              $htmlDatos["rtlSelected"]=($almacen["mattip"] =="RTL")?"selected":"";
              $htmlDatos["wrhSelected"]=($almacen["mattip"] =="WRH")?"selected":"";


              renderizar("almacen", $htmlDatos);
            }else{
              redirectWithMessage("¡Almacen no encontrado!","index.php?page=almacen");
            }
          }else{
            redirectWithMessage("¡Almacen no encontrado!","index.php?page=almacen");
          }
          break;
        //Manejando un delete
        case "dlt":
          if(isset($_POST["btnacc"])){
            //implementar logica de guardado
            if(borrarAlmacen($_POST["almacenId"])){
              //forzando a que se actualice con los datos de la db
              redirectWithMessage("¡Almacen Borrado!","index.php?page=almacenes");
            }
          }
          $almacen = obtenerAlmacen($_GET["almacenId"]);
          if($almacen){
            $htmlDatos["almacenTitle"] = "Actualizar ".$almacen["almadsc"];
            $htmlDatos["almacenMode"] = "upd";

            mergeArrayTo($almacen , $htmlDatos);

            $htmlDatos["actSelected"]=($almacen["almaest"] =="ACT")?"selected":"";
            $htmlDatos["inaSelected"]=($almacen["almaest"] =="INA")?"selected":"";
            $htmlDatos["srvSelected"]=($almacen["mattip"] =="SRV")?"selected":"";
            $htmlDatos["rtlSelected"]=($almacen["mattip"] =="RTL")?"selected":"";
            $htmlDatos["wrhSelected"]=($almacen["mattip"] =="WRH")?"selected":"";
            $htmlDatos["disabled"]="disabled";

            renderizar("almacen", $htmlDatos);
          }else{
              redirectWithMessage("¡Almacen no encontrado!","index.php?page=almacenes");
          }
          break;
        defualt:
          redirectWithMessage("¡Acción no permitida!","index.php?page=almacenes");
          break;
      }
    }


  }

  run();
?>
