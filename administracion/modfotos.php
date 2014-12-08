<!DOCTYPE html>
<?php
    require '../require/comun.php';
    $sesion = new SesionSingleton();
    $v = $sesion->get('usuario');
    if($v != "administrador"){
        header("Location: index.php");
        exit();
    }
    include '../clases/anuncio/Anuncio.php';
    include '../clases/anuncio/ModeloAnuncio.php';
    include '../clases/fotos/Fotos.php';
    include '../clases/fotos/ModeloFotos.php';
    $bd = new BaseDatos();
    $modeloAnuncio = new ModeloAnuncio($bd);
    $id = Leer::get("id");
    $anuncio=$modeloAnuncio->get($id);
    $modeloFotos = new ModeloFotos($bd);
    $fotos = $modeloFotos->getList($anuncio->getIdanuncio());
    
?>

<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Panel de administracion</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/slider.css" rel="stylesheet">
    <script src="js/main.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="js/jquery.js"></script>
    <script src="js/slider.js"></script>

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
                            <a href="#"><i class="fa fa-fw fa-user"></i> Perfil</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="phpcerrarsesion.php"><i class="fa fa-fw fa-power-off"></i> Cerrar Sesión</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- MENU -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="admin.php"><i class="fa fa-fw fa-dashboard"></i> Inicio</a>
                    </li>
                    <li class="active">
                        <a href="anuncios.php"><i class="fa fa-fw fa-bar-chart-o"></i> Anuncios</a>
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
                            Inicio <small>Panel de administración</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa "></i>  <a href="admin.php">Inicio</a>
                            </li>
                            <li class="active">
                                <i class="fa "></i> Anuncios
                            </li>
                        </ol>
                    </div>
                </div>
                
                <!-- --------------------------------------------CONTENIDO AQUI-------------------------------------------- -->
                <?php 
                    $delete = Leer::get("r");
                    if($delete==1){
                ?>
                    <div class="alert alert-success">
                        <strong>¡Borrado!</strong> La/s foto/s han sido borrada/s.
                    </div>
                <?php
                    }elseif($delete==2){
                ?>
                    <div class="alert alert-danger">
                        <strong>¡Error!</strong> No se ha podido borrar.
                    </div>
                <?php  
                    }
                ?>
                <div class="panel-heading">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa"></i><?php echo $anuncio->getTitulo(); ?></h3>
                        </div>
                        <div class="panel-body">
                            <form action="phpdeletefotos.php" method="POST">
                                <input type="hidden" name="idanuncio" value="<?php echo $anuncio->getIdanuncio() ?>">
                                <?php 
                                foreach ($fotos as $key => $value) {
                                ?>
                                <img width="300" src="../img/<?php echo $value->getUrlfoto() ?>" />
                                <input  name="imagenes[]" value="<?php echo $value->getId() ?>" type="checkbox">
                                <?php
                                    }
                                ?><br>
                                <input type="submit" class="btn btn-danger" value="Eliminar fotos seleccionadas"/>
                            </form>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    

    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
