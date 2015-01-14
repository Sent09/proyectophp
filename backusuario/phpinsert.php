<?php
    require '../require/comun.php';    
    $sesion->administrador("../usuario/login.php");
    $baseDatos = new BaseDatos(); 
    $login = Leer::post("login");
    $clave = Leer::post("clave");
    $nombre = Leer::post("nombre");
    $apellidos = Leer::post("apellidos");
    $email = Leer::post("email");
    $isactivo = Leer::post("isactivo");
    $isroot = Leer::post("isroot");
    $rol = Leer::post("rol");
    $fechaalta = null;
    $usuario = new Usuario($login, $clave, $nombre, $apellidos, $email, $fechaalta, $isactivo, $isroot, $rol);
    $modelo = new ModeloUsuario($baseDatos);
    $resultado = $modelo->add($usuario);  
    if($resultado === false){
        header("Location: index.php?resultado=-1");
    }else{
        header("Location: index.php?resultado=$resultado");
    }
    $baseDatos->closeConexion();
    
