<?php 
    require_once 'require/comun2.php';
?>

    <?php
    if(!$sesion->get("__usuario") instanceof Usuario){        
    ?>  
    <ul class="nav navbar-right top-nav" >
        <form action="usuario/phplogin.php" method="POST">
            <label style="width: 50px;float:left;color:white;line-height: 40px;">Login: </label>
            <input class="form-control" style="width: 200px;float:left;margin-top: 7px;" type="text" name="login" value="" />
            <label style="width: 50px;float:left;color:white;line-height: 40px;">Clave: </label>
            <input class="form-control" style="width: 200px;float:left;margin-right: 5px;margin-top: 7px;" type="password" name="clave" value="" /> 
            <input class="btn btn-success" style="margin-top: 7px;" type="submit" value="Entrar" />
            <span style="line-height: 40px;margin-right: 10px;"><a href="usuario/viewalta.php">¡Registrate!</a> Cambiar clave <a href="usuario/viewolvido.php">aquí</a></span>
        </form>
    </ul>                
    <?php 
    }else{
    ?>
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Perfil <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="viewperfil.php"><i class="fa fa-fw fa-user"></i> Perfil</a>
                </li>
                <?php
                    $usuario = $sesion->get("__usuario");
                    if($usuario->getIsroot()){
                ?>
                <li>
                    <a href="administracion/admin.php"><i class="fa fa-fw fa-user"></i> Panel de administración</a>
                </li>
                <?php }?>
                <li class="divider"></li>
                <li>
                    <a href="usuario/phpcerrarsesion.php"><i class="fa fa-fw fa-power-off"></i> Cerrar Sesión</a>
                </li>
            </ul>
        </li>
    </ul>
    <?php 
    }
    ?>