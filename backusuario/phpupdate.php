<?php
    require '../require/comun.php';
    $sesion->administrador("../usuario/login.php");
    $baseDatos = new BaseDatos();
    $loginpk = Leer::post("loginpk");
    $login = Leer::post("login");
    $clavevieja = Leer::post("clavevieja");
    $clavenueva = Leer::post("clave");
    $nombre = Leer::post("nombre");
    $apellidos = Leer::post("apellidos");
    $email = Leer::post("email");
    $isactivo = Leer::post("isactivo");
    $isroot = Leer::post("isroot");
    $rol = Leer::post("rol");
    $fechaalta = null;
    if($clavenueva == ""){
        $clave = $clavevieja;
    }else{
        $clave = sha1($clavenueva);
    }
    $usuario = new Usuario($login, $clave, $nombre, $apellidos, $email, $fechaalta, $isactivo, $isroot, $rol);
    $modelo = new ModeloUsuario($baseDatos);
    $resultado = $modelo->edit($usuario, $loginpk);
    if($resultado === false){
        header("Location: index.php?resultado=-1");
    }else{
        header("Location: index.php?resultado=$resultado");
    }
    $baseDatos->closeConexion();
