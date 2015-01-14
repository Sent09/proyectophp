<?php
    require '../require/comun.php';    
    $sesion->administrador("../usuario/login.php");
    $baseDatos = new BaseDatos(); 
    $login = Leer::get("login");
    $modelo = new ModeloUsuario($baseDatos);
    $resultado = $modelo->deleteForLogin($login);
    header("Location: index.php?resultado=$resultado");
    $baseDatos->closeConexion();