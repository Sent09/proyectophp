<?php
    require '../require/comun.php';
    
    $sesion->administrador("../usuario/login.php");
    $usuario = $sesion->getUsuario();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="style/estilo.css">
    </head>
    <body>
        <h1>Modificar mi perfil</h1>
        <form action="phpinsert.php" method="POST">
            <label>Login: </label><input type="text" class="input" placeholder="Login" name="login" value="<?php echo $usuario->getLogin(); ?>"/><br>
            <label>Nombre: </label><input type="text" class="input" placeholder="Nombre" name="nombre" value="<?php echo $usuario->getNombre(); ?>"/><br>
            <label>Apellidos: </label><input type="text" class="input" placeholder="Apellidos" name="apellidos" value="<?php echo $usuario->getApellidos(); ?>"/><br>
            <label>Clave Vieja: </label><input type="text" class="input" placeholder="Clave" name="clavevieja" value=""/><br>
            <label>Clave nueva: </label><input type="text" class="input" placeholder="Clave" name="clavenueva1" value=""/><br>
            <label>Repetir clave: </label><input type="text" class="input" placeholder="Clave" name="clavenueva2" value=""/><br>
            <label>E-Mail: </label><input type="text" class="input" placeholder="E-mail" name="email" value="<?php echo $usuario->getEmail(); ?>"/><br>
            <input class="submit" type="submit" value="Modificar"/>
        </form>
    </body>
</html>
