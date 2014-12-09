<?php
require '../require/comun.php';
/*
 * Cierra sesion
 */
$sesion = new SesionSingleton();
$sesion->cerrar();
header("Location: index.php");