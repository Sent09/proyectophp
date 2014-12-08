<!DOCTYPE html>
<?php
    require 'require/comun2.php';
    include 'clases/anuncio/Anuncio.php';
    include 'clases/anuncio/ModeloAnuncio.php';
    include 'clases/fotos/Fotos.php';
    include 'clases/fotos/ModeloFotos.php';
    $condicion = "";
    $parametros = array();
    $palabras = Leer::get("palabras");
    $tipo = Leer::get("tipo");
    $habitaciones = Leer::get("habitaciones");
    $banos = Leer::get("banos");
    $ordenar = Leer::get("ordenar");
    
    if($palabras != ""){
        $condicion .= " (titulo like :palabras or extras like :palabras or descripcion like :palabras or ciudad like :palabras or localizacion like :palabras) and";
        $parametros["palabras"] = "%$palabras%";
    }
    if($tipo == "Venta"){
        $condicion .= " tipo = :tipo ";
        $parametros["tipo"] = "venta";
    }elseif ($tipo == "Alquiler") {
        $condicion .= " tipo = :tipo ";
        $parametros["tipo"] = "alquiler";
    }
    if($habitaciones != ""){
        $condicion .= "and habitaciones = :habitaciones ";
        $parametros["habitaciones"] = $habitaciones;
    }
    if($banos != ""){
        $condicion .= "and servicios = :servicios ";
        $parametros["servicios"] = $banos;
    }
    if($ordenar == "Ascendente"){
        $orderby = "precio ASC";
    }
    if($ordenar == "Descendente"){
        $orderby = "precio DESC";
    }
    if($ordenar != "Ascendente" && $ordenar!= "Descendente"){
        $orderby = "1";
    }
    $bd = new BaseDatos();
    $modeloAnuncio = new ModeloAnuncio($bd);
    $p = Leer::get("p");
    $anuncios=$modeloAnuncio->getList($p, 10, $condicion, $parametros, $orderby);
    $numeroRegistros = $modeloAnuncio->count();
    $modeloFotos = new ModeloFotos($bd);
    $url = "?palabras=$palabras&tipo=$tipo&habitaciones=$habitaciones&banos=$banos&ordenar=$ordenar";
    $lista = Util::getEnlacesPaginacion($p, 10, $numeroRegistros, $url);
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
        <form method="GET" action="anuncios.php">
            <div class="anuncio">
                <input class="form-control" type="text" placeholder="Casa, piso, Granada..." name="palabras" value="<?php echo $palabras; ?>"/>
                <select class="form-control" name="tipo">
                    <?php 
                        if($tipo == "Venta"){
                    ?>
                    <option>Venta</option>
                    <option>Alquiler</option>
                    <?php
                        }else{
                    ?>
                    <option>Alquiler</option>
                    <option>Venta</option>
                    <?php        
                        }
                    ?>

                </select>
                <input class="form-control" type="number" placeholder="Habitaciones" name="habitaciones" value="<?php echo $habitaciones; ?>"/>
                <input class="form-control" type="number" placeholder="Baños" name="banos" value="<?php echo $banos; ?>"/>
                <select class="form-control" name="ordenar">
                    <option>Ordenar por precio:</option>
                    <option <?php if($ordenar=="Ascendente") echo "selected"; ?>>Ascendente</option>
                    <option <?php if($ordenar=="Descendente") echo "selected"; ?>>Descendente </option>
                </select>
                <input type="submit" class="btn btn-primary" value="Buscar"/>                  
            </div>
        </form>
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Estos son los resultados de la búsqueda</h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Project One -->
        <?php 
            foreach ($anuncios as $key => $value) {
                $array['idanuncio']=$value->getIdanuncio();
                $cantidad = $modeloFotos->count("idanuncio = :idanuncio", $array );
        ?>
        <div class="row">
            <div class="col-md-7">
                <a href="#">
                    <?php 
                    if($cantidad>0){
                        $fotos = $modeloFotos->getList($value->getIdanuncio());
                    ?>
                    <img class="img-responsive" src="img/<?php echo $fotos[0]->getUrlfoto(); ?>" alt="">
                    <?php 
                    }else{
                    ?>
                    <img class="img-responsive" src="img/no-image.png" alt="">
                    <?php
                    }
                    ?>
                </a>
            </div>
            <div class="col-md-5">
                <h3><?php echo $value->getTitulo(); ?></h3>
                <h4><?php echo $value->getPrecio(); ?>€</h4>
                <p><?php echo $value->getDescripcion(); ?></p>
                <a class="btn btn-primary" href="veranuncio.php?idanuncio=<?php echo $value->getIdanuncio() ?>">Ver mas <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        
        <!-- /.row -->

        <hr>
        <?php 
            }
        ?>
        <!-- Pagination -->
        <div class="row text-center">
            <div class="col-lg-12">
                <ul class="pagination">
                    <?php 
                        echo $lista["inicio"];
                        echo $lista["anterior"];
                        echo $lista["primero"];
                        echo $lista["segundo"]; 
                        echo $lista["actual"]; 
                        echo $lista["cuarto"];
                        echo $lista["quinto"]; 
                        echo $lista["siguiente"];
                        echo $lista["ultimo"];
                        $bd->closeConexion();
                    ?>                               
                </ul>
            </div>
        </div>
        <!-- /.row -->

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
