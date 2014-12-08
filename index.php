<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>1 Col Portfolio - Start Bootstrap Template</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">
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

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="todo">
        <div class="bgprincipal">
            <div id="principal" class="panel-heading">
                <div id="principal2" class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa"></i> Crear anuncio</h3>
                    </div>
                    <div class="panel-body"><br>
                        <label>Busca la vivienda que desees a continuación</label>
                        <form method="GET" action="anuncios.php">
                            <input class="form-control" type="text" placeholder="Casa, piso, Granada..." name="palabras"/><br>
                            <select style="width: 210px;float:left;margin-right: 20px;margin-left: 20px;" class="form-control" name="tipo">
                                <option>Alquiler</option>
                                <option>Venta</option>
                            </select>
                            <input class="form-control" type="number" placeholder="Habitaciones" name="habitaciones"/>
                            <input class="form-control" type="number" placeholder="Baños" name="banos"/><br>
                            <input type="submit" class="btn btn-primary" value="Buscar"/>                                            
                        </form>
                    </div>
                </div>
            </div>
        </div>   
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
