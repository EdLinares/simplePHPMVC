<?php

    require_once("libs/dao.php");

    function obtenerAlmacenes(){
        $Almacenes = array();
        $sqlstr = "select * from almacenes;";
        $Almacenes = obtenerRegistros($sqlstr);
        return $Almacenes;
    }


    function obtenerAlmacen($almacenId){
      $almacen = array();
      $sqlstr = "select * from almacenes where almacenId = %d;";
      $sqlstr = sprintf($sqlstr, $almacenId);
      $almacen = obtenerUnRegistro($sqlstr);
      return $almacen;
    }

    function insertarAlmacen($almacen){
      if($almacen && is_array($almacen)){
         if(!isset($almacen["empusring"]))$almacen["empusring"]="Sistemas";
         $sqlInsert = "INSERT INTO `almacenes` (`almadsc`, `almartn`, `almadir`, `almatel`, `almatel2`, `almaest`, `mattip`) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s');";
         $sqlInsert = sprintf($sqlInsert,
                        $Almacen["almadsc"],
                        $Almacen["almarrtn"],
                        $Almacen["almadir"],
                        $Almacen["almatel"],
                        $Almacen["almatel2"],
                        $Almacen["almaest"],
                        $Almacen["mattip"]
                      );
         if(ejecutarNonQuery($sqlInsert)){
           return getLastInserId();
         }
      }
      return false;
    }

    function actualizarAlmacen($Almacen){
      if($Almacen && is_array($Almacen)){
        $sqlUpdate = "update almacenes set almadsc='%s', almartn='%s', almadir='%s', almatel='%s', almatel2='%s', almaest='%s', mattip='%s' where almacenId=%d;";
        $sqlUpdate = sprintf($sqlUpdate,
                              valstr($Almacen["almadsc"]),
                              valstr($Almacen["almartn"]),
                              valstr($Almacen["almadir"]),
                              valstr($Almacen["almatel"]),
                              valstr($Almacen["almatel2"]),
                              valstr($Almacen["almaest"]),
                              valstr($Almacen["mattip"])
                    );
        return ejecutarNonQuery($sqlUpdate);
      }
      return false;
    }


    function borrarAlmacen($almacenId){
      if($almacenId){
        $sqlDelete = "delete from almacenes where almacenId=%d;";
        $sqlDelete = sprintf($sqlDelete,
                      valstr($almacenId)
                    );
        return ejecutarNonQuery($sqlDelete);
      }
      return false;
    }

?>
