<!DOCTYPE html>
<?php
    require 'require/comun2.php';
    if(!$sesion->get("__usuario") instanceof Usuario){
        header("Location: index.php");
        exit();
    }
    $fila = $sesion->get("__usuario");
    $login = $fila->getLogin();
    $clave = $fila->getClave();
    $nombre = $fila->getNombre();
    $apellidos = $fila->getApellidos();
    $email = $fila->getEmail();
    $isactivo = $fila->getIsactivo();
    $isroot = $fila->getIsroot();
    $rol = $fila->getRol();
?>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TuVivienda</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/1-col-portfolio.css" rel="stylesheet">
    <link href="css/css.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/jquery.toaster.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script>
        window.addEventListener("load", function(){
        <?php
            $resultado = Leer::get("r");
            if($resultado > 0){
        ?>
            $.toaster({ priority : 'success', title : 'Bien', message : 'Los cambios se han realizado con exito'});
        <?php
            }
            if($resultado == -1){
        ?>
            $.toaster({ priority : 'danger', title : 'Error', message : 'No se han guardado los cambios'});
        <?php
            }
        ?> 

        });
    </script>
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

    <body style="background-color: white;">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">TuVivienda</a>
            </div>
                <?php 
                    include 'usuario/login.php';
                ?>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Inicio</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Cuenta</h1>
            </div>
            
        </div>
        <div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa"></i> Cambiar configuración de la cuenta.</h3>
                </div>
                <div class="panel-body">
                    <form action="usuario/phpusuariodatos.php" method="POST">
                            <input type="hidden" name="login" value="<?php echo $login; ?>"/>
                            <label>Nombre: </label><input type="text" value="<?php echo $nombre;?>" class="form-control" placeholder="Nombre" name="nombre" value="" required/><br>
                            <label>Apellidos: </label><input type="text" value="<?php echo $apellidos;?>" class="form-control" placeholder="Apellidos" name="apellidos" value="" required/><br>
                            <label>E-Mail: </label><input type="text" value="<?php echo $email;?>" class="form-control" placeholder="E-mail" name="email" value="" required/><br>
                            <input type="submit" class="btn btn-info" value="Actualizar"/>
                    </form>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa"></i> Cambiar clave.</h3>
                </div>
                <div class="panel-body">
                    <form action="usuario/phpusuarioclave.php" method="POST">
                            <input type="hidden" name="login" value="<?php echo $login; ?>"/>
                            <label>Clave vieja: </label><input type="password"  class="form-control" name="clavevieja" value="" required/><br>
                            <label>Clave nueva: </label><input type="password"  class="form-control" name="clave1" value="" required/><br>
                            <label>Repite la clave nueva: </label><input type="password"  class="form-control"  name="clave2" value="" required/><br>
                            <input type="submit" class="btn btn-info" value="Cambiar"/>
                    </form>
                </div>
            </div>
        </div>
        <hr>
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; TuVivienda 2014</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>

</body>

</html>
