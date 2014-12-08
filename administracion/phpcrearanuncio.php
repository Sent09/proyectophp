<?php
require '../require/comun.php';
include '../clases/anuncio/Anuncio.php';
include '../clases/anuncio/ModeloAnuncio.php';
include '../clases/fotos/Fotos.php';
include '../clases/fotos/ModeloFotos.php';

$titulo = Leer::post("titulo");
$precio = Leer::post("precio");
$tipoHtml = Leer::post("tipo");
if($tipoHtml == "Alquiler"){
    $tipo = "alquiler";
}else{
    $tipo = "venta";
}
$extras = Leer::post("extras");
$descripcion = Leer::post("descripcion");
$ciudad = Leer::post("ciudad");
$localizacion = Leer::post("localizacion");
$habitaciones = Leer::post("habitaciones");
$servicios = Leer::post("servicios");
$metros = Leer::post("metros");
$bd = new BaseDatos();
$anuncio = new Anuncio(null, $titulo, $precio, $tipo, $extras, $descripcion, null, $ciudad, $localizacion, $habitaciones, $servicios, $metros);
$modeloAnuncio = new ModeloAnuncio($bd);
$rAnuncio = $modeloAnuncio->add($anuncio);
if($rAnuncio){
    $id = $bd->getAutonumerico();
    $subir = new Subir("archivo");
    $nombres = $subir->subir();
    foreach ($nombres as $key => $urlfoto) {
        $modeloFoto = new ModeloFotos($bd);
        $foto = new Fotos(null, $id, $urlfoto);
        $modeloFoto->add($foto);
    }
    header("Location: crearanuncio.php?r=1");
}else{
    header("Location: crearanuncio.php?r=2");
}
$bd->closeConexion();

