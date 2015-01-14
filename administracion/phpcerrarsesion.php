<?php
require '../require/comun.php';
/*
 * Cierra sesion
 */

$sesion->cerrar();
header("Location: ../index.php");