<?php
require 'require/comun2.php';
$idanuncio = Leer::post("idanuncio");
$titulo = Leer::post("titulo");
$nombre = Leer::post("nombre");
$email = Leer::post("email");
$texto = Leer::post("texto");
$asunto = "Interesado en: ".$titulo;
$mensaje = "Id: ".$idanuncio." Titulo: ".$titulo." Nombre: ".$nombre." Email: ".$email." Mensaje: ".$texto;
$r = Correo::enviarGmail(Configuracion::ORIGENGMAIL, Configuracion::ORIGENGMAIL, Configuracion::CLAVEGMAIL, $asunto, $mensaje);
if($r == 1){
    header("Location: veranuncio.php?r=1&idanuncio=$idanuncio");
}else{
    header("Location: veranuncio.php?r=2&idanuncio=$idanuncio");
}