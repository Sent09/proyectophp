<?php

    require '../require/comun.php';
    
    $sesion->autentificado("../usuario/login.php");
    $usuario = $sesion->getUsuario();
    $login = Leer::post("login");
    $clavevieja = Leer::post("clavevieja");
    $clavenueva1 = Leer::post("clavenueva1");
    $clavenueva2 = Leer::post("clavenueva2");
    $apellidos = Leer::post("apellidos");
    $nombre = Leer::post("nombre");
    $email = Leer::post("email");
    
    $objeto = new Usuario($login, $clave, $nombre, $apellidos, $email);
    $bd = new BaseDatos();
    $modelo = new ModeloUsuario($bd);
    $cambioDeClave = strlen($clavevieja)>0 && $clavevieja!=$clavenueva1;