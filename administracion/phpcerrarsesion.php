<?php
require '../require/comun.php';
$sesion = new SesionSingleton();
$sesion->cerrar();
header("Location: index.php");