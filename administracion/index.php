<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Panel de administración</title>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/sb-admin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="css/plugins/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div  style="margin:0 auto;width: 400px;" >
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa"></i> Entrar al panel de administración</h3>
                        </div>
                        <div class="panel-body">
                            <form action="phpautentificacion.php" method="post">
                                <table>
                                    <tr>
                                        <td>Nombre de usuario: </td>
                                        <td><input class="form-control" type="text" name="login"/></td>
                                    </tr>
                                    <tr>
                                        <td>Clave: </td>
                                        <td><input class="form-control" type="password" name="clave"/></td>
                                    </tr>
                                    <tr>
                                        <td><input type="submit" class="btn btn-success" value="Ingresar"/></td>
                                    </tr>
                                </table>  
                           </form>                           
                        </div>
                    </div>
                </div>
            </div>

    </body>
</html>
