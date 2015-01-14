<?php
require '../require/comun.php';
include '../clases/usuario/ModeloUsuario.php';
include '../clases/usuario/Usuario.php';
$login = Leer::post("login");
$clave = Leer::post("clave");
$bd = new BaseDatos();
$modeloUsuario = new ModeloUsuario($bd);
$usuario = $modeloUsuario->login($login, $clave);
if($usuario == false){
    $sesion->cerrar();
    header("Location: index.php?r=-1");
}else{
    $sesion->setUsuario($usuario, $bd);
    header("Location: admin.php ");
}
