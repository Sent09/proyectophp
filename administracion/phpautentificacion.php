<?php
require '../require/comun.php';
include '../clases/usuario/ModeloUsuario.php';
include '../clases/usuario/Usuario.php';
$login = Leer::post("login");
$clave = Leer::post("clave");
$bd = new BaseDatos();
$modeloUsuario = new ModeloUsuario($bd);
$resultado = $modeloUsuario->usuarioExiste($login, $clave);
if($resultado == "administrador"){   
    $sesion = new SesionSingleton();
    $sesion->set("usuario","administrador");
    $usuario = $modeloUsuario->get($login);
    $token = md5($usuario->getEmail().Configuracion::PEZARANA.$usuario->getLogin());
    $sesion->set("token",$token);
    header("Location: admin.php");
}else{
    header("Location: index.php");;
}
