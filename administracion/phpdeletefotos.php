<?php
    require '../require/comun.php';
    $bd = new BaseDatos();
    $modeloUsuario =  new ModeloUsuario($bd);
    $sesion->administrador("index.php");
    include '../clases/anuncio/Anuncio.php';
    include '../clases/anuncio/ModeloAnuncio.php';
    include '../clases/fotos/Fotos.php';
    include '../clases/fotos/ModeloFotos.php';
    /*
     * Elimina fotos por el id de la foto
     */
    $modeloFotos = new ModeloFotos($bd);
    $imagenes = Leer::post("imagenes");
    $idanuncio = Leer::post("idanuncio");
    foreach ($imagenes as $key => $value) {
        echo $value;
        $resultado = $modeloFotos->deleteForId($value);
    }
    if($resultado>0){
        header("Location: modfotos.php?r=1&id=$idanuncio");
    }else{
        header("Location: modfotos.php?r=2&id=$idanuncio");
    }
    