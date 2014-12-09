<!DOCTYPE html>
<?php
    require 'require/comun2.php';
    include 'clases/anuncio/Anuncio.php';
    include 'clases/anuncio/ModeloAnuncio.php';
    include 'clases/fotos/Fotos.php';
    include 'clases/fotos/ModeloFotos.php';
    $idanuncio = Leer::get("idanuncio");
    $bd = new BaseDatos();
    /*
     * Muestra todos los datos de un anuncio segun el id del anuncio. 
     * También muestra sus fotos.
     */
    $modeloAnuncio = new ModeloAnuncio($bd);
    $anuncio=$modeloAnuncio->get($idanuncio);
    $modeloFotos = new ModeloFotos($bd);
    $fotos = $modeloFotos->getList($anuncio->getIdanuncio());
    $array['idanuncio']=$anuncio->getIdanuncio();
    $cantidad = $modeloFotos->count("idanuncio = :idanuncio", $array );
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
    <link href="css/1-col-portfolio.css" rel="stylesheet">
    <link href="css/css.css" rel="stylesheet">
    <link href="css/slider.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/slider.js"></script>

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
    <body>

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
        <?php 
            $r = Leer::get("r");
            if($r==1){
            ?>
                <div class="alert alert-success">
                    <strong>¡Enviado!</strong> El correo se ha enviado con exito.
                </div>
            <?php
                }elseif($r==2){
            ?>
                <div class="alert alert-danger">
                    <strong>¡Error!</strong> El correo no se ha podido enviar, intentelo mas tarde.
                </div>
            <?php  
                }
        ?>
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $anuncio->getTitulo(); ?>
                <small><?php echo $anuncio->getTipo(); ?></small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Project One -->
        <div id="slider-wrapper">
            <div id="slider">
                <?php 
                if($cantidad>0){
                    foreach ($fotos as $key => $value) {
                ?>
                <a href="#"><img src="img/<?php echo $value->getUrlfoto() ?>" /></a>
                <?php
                    }
                }else{
                ?>
                <a href="#"><img src="img/no-image.png" /></a>
                <?php } ?>
            </div>
            <a href="javascript:void();" class="mas">&rsaquo;</a>
            <a href="javascript:void();" class="menos">&lsaquo;</a>
        </div>
        <div class="veranuncio">
            <hr>
            <h4>Información general</h4>
            <p>
                <strong>Precio: </strong><?php echo $anuncio->getPrecio(); ?>€
                <strong>Fecha del anuncio: </strong><?php echo $anuncio->getFechaalta(); ?>
                <strong>Habitaciones: </strong><?php echo $anuncio->getHabitaciones(); ?>
                <strong>Servicios: </strong><?php echo $anuncio->getServicios(); ?>
                <strong>Metros: </strong><?php echo $anuncio->getMetros(); ?>
            </p>
            <hr>
            <h4>Extras</h4>
            <p>
                <?php echo $anuncio->getExtras(); ?>
            </p>
            <hr>
            <h4>Ciudad/Localización</h4>
            <p>
                <?php echo $anuncio->getCiudad(); ?> - <?php echo $anuncio->getLocalizacion(); ?>
            </p>
            <hr>
            <h4>Descripción</h4>
            <p>
                <?php echo $anuncio->getDescripcion(); ?>
            </p>
            <hr>
            <h4>¿Te interesa esta vivienda? Contactanos</h4>
            <form method="post" action="phpcorreo.php">
                <input type="hidden" value="<?php echo $anuncio->getIdanuncio(); ?>" name="idanuncio"/>
                <input type="hidden" value="<?php echo $anuncio->getTitulo(); ?>" name="titulo"/>
                <input class="form-control" type="text" placeholder="Nombre" name="nombre"/><br>
                <input class="form-control" type="email" placeholder="Email" name="email"/><br>
                <textarea class="form-control" placeholder="Tu consulta" name="texto"></textarea>
                <input type="submit" class="btn btn-info"/>
            </form>
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
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
