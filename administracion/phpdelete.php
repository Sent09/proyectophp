<?php
    require '../require/comun.php';
    include '../clases/fotos/Fotos.php';
    include '../clases/fotos/ModeloFotos.php';
    include '../clases/anuncio/Anuncio.php';
    include '../clases/anuncio/ModeloAnuncio.php';
    
    $baseDatos = new BaseDatos(); 
    $id = Leer::get("id");    
    $modeloFotos = new ModeloFotos($baseDatos);
    $parametros['idanuncio']=$id;
    $resultadoFotos = $modeloFotos->deleteForIdAnuncio($id);    
    $modelo = new ModeloAnuncio($baseDatos);
    $resultado = $modelo->deleteForId($id);


  
    if($resultado === false){
        header("Location: anuncios.php?delete=-1");
    }else{
        header("Location: anuncios.php?delete=1");
    }
    $baseDatos->closeConexion();