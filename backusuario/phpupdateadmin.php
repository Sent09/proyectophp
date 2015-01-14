<?php
    require '../require/comun.php';
    $sesion->administrador("../usuario/login.php");
    $bd = new BaseDatos();
    $modelo = new ModeloUsuario($bd);
    $usuarioSesion = $sesion->get("__usuario");
    $usuario = $modelo->get($usuarioSesion->getLogin());    
    $login = Leer::post("login");
    $clavevieja = Leer::post("clavevieja");
    $clavenueva1 = Leer::post("clavenueva1");
    $clavenueva2 = Leer::post("clavenueva2");
    $nombre = Leer::post("nombre");
    $apellidos = Leer::post("apellidos");
    $email = Leer::post("email");
    $isactivo = Leer::post("isactivo");
    $isroot = Leer::post("isroot");
    $rol = Leer::post("rol");
    
    if($login == ""){
        header("Location: modadmin.php?r=-1");
        $bd->closeConexion();
        exit();
    }    
    $usuario->setLogin($login);
    $usuario->setNombre($nombre);
    $usuario->setApellidos($apellidos);
    $usuario->setEmail($email);
    $usuario->setIsactivo($isactivo);
    $usuario->setIsroot($isroot);
    $usuario->setRol($rol);
    if($clavevieja != "" && $clavenueva1 != "" && $clavenueva2 != ""){
        if(sha1($clavevieja)==$usuario->getClave()){
            if($clavenueva1 == $clavenueva2){
                $claveCodificada = sha1($clavenueva1);
                $usuario->setClave($claveCodificada);
            }
        }
    }
    $resultado = $modelo->edit($usuario, $usuarioSesion->getLogin());
    header("Location: modadmin.php?r=$resultado");
    if($resultado > 0){
        $sesion->setUsuario($usuario, $bd);
    }
    $bd->closeConexion();
