<?php
    require '../require/comun.php';
    $sesion->administrador("../usuario/login.php");

    $fila = $sesion->getUsuario();
    $login = $fila->getLogin();
    $clave = $fila->getClave();
    $nombre = $fila->getNombre();
    $apellidos = $fila->getApellidos();
    $email = $fila->getEmail();
    $isactivo = $fila->getIsactivo();
    $isroot = $fila->getIsroot();
    $rol = $fila->getRol();
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Panel de administracion</title>

    <!-- Bootstrap Core CSS -->
    <link href="../administracion/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../administracion/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../administracion/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../administracion/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../administracion/css/css.css" rel="stylesheet">
    <script src="../administracion/js/main.js"></script>
    <script src="../js/jquery.js"></script>
    <script src="../js/jquery.toaster.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script>
        window.addEventListener("load", function(){
        <?php 
            $resultado = Leer::get("r");
            if($resultado == 1){
        ?>
            $.toaster({ priority : 'success', title : 'Bien', message : 'La acción se ha realizado con exito.'});
        <?php
            }
            if($resultado == -1){
        ?>
            $.toaster({ priority : 'danger', title : 'Error', message : 'Se ha producido algun error.'});
        <?php
            }
        ?> 
        });
    </script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Panel de administración</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Administrador <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="../administracion/phpcerrarsesion.php"><i class="fa fa-fw fa-power-off"></i> Cerrar Sesión</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- MENU -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="../administracion/admin.php"><i class="fa fa-fw fa-dashboard"></i> Inicio</a>
                    </li>
                    <li>
                        <a href="../administracion/anuncios.php"><i class="fa fa-fw fa-bar-chart-o"></i> Anuncios</a>
                    </li>
                    <li class="active">
                        <a href="index.php"><i class="fa fa-fw fa-user"></i> Usuarios</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Usuarios <small>Panel de administración</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa "></i>  <a href="../administracion/admin.php">Inicio</a>
                            </li>
                            <li class="active">
                                <i class="fa "></i> Usuarios
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- --------------------------------------------CONTENIDO AQUI-------------------------------------------- -->
                <div class="panel-heading">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Modificar mi perfil</h3>
                        </div>
                        <div class="panel-body">
                            <form action="phpupdateadmin.php" method="POST">
                                <label>Login: </label><input type="text" value="<?php echo $login;?>" class="form-control" placeholder="Login" name="login" value="" required/><br>
                                <label>Clave Vieja: </label><input type="password" class="form-control" placeholder="Clave vieja" name="clavevieja" value=""/><br>
                                <label>Clave nueva: </label><input type="password" class="form-control" placeholder="Clave nueva" name="clavenueva1" value=""/><br>
                                <label>Repetir clave: </label><input type="password" class="form-control" placeholder="Repetir clave" name="clavenueva2" value=""/><br>
                                <label>Nombre: </label><input type="text" value="<?php echo $nombre;?>" class="form-control" placeholder="Nombre" name="nombre" value="" required/><br>
                                <label>Apellidos: </label><input type="text" value="<?php echo $apellidos;?>" class="form-control" placeholder="Apellidos" name="apellidos" value="" required/><br>
                                <label>E-Mail: </label><input type="text" value="<?php echo $email;?>" class="form-control" placeholder="E-mail" name="email" value="" required/><br>
                                <label>Está activo: </label>
                                    <select class="form-control" name="isactivo">
                                        <option value="1">Si</option>
                                        <option value="0" <?php if($isactivo == "0"){ echo "selected"; }?>>No</option>
                                    </select>
                                    <br>
                                    <label>Es root: </label>
                                    <select class="form-control" name="isroot">
                                        <option value="1">Si</option>
                                        <option value="0" <?php if($isroot == "0"){ echo "selected"; }?>>No</option>
                                    </select><br>
                                    <label>Rol: </label>
                                    <select class="form-control" name="rol">
                                        <option value="usuario">Usuario</option>                                        
                                        <option value="administrador" <?php if($rol == "administrador"){ echo "selected"; }?>>Administrador</option>
                                    </select>
                                    <br>
                                <input type="submit" class="btn btn-warning" value="Actualizar"/>
                            </form>                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>


    <!-- Morris Charts JavaScript -->
    <script src="../administracion/js/plugins/morris/raphael.min.js"></script>
    <script src="../administracion/js/plugins/morris/morris.min.js"></script>
    <script src="../administracion/js/plugins/morris/morris-data.js"></script>

</body>

</html>
