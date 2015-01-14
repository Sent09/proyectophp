<?php 
    require '../require/comun.php';
    $resultado = Leer::get("r");
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Panel de administración</title>
        <!-- Bootstrap Core CSS -->
        <link href="../administracion/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../administracion/css/sb-admin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="../administracion/css/plugins/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../administracion/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        
        
        <script src="../js/jquery.js"></script>
        <script src="../js/jquery.toaster.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </head>
    <body>
        <div style="margin:0 auto;width: 400px;" >
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa"></i> Recordar clave</h3>
                </div>
                <div class="panel-body">
                    <?php 
                        if($resultado==-1){
                            echo "<span>El usuario no se ha podido crear</span>";
                        }
                    ?>
                    <table>
                        <form action="phpalta.php" method="POST">
                            <tr>
                                <td><label>Login: </label></td>
                                <td><input type="text" class="form-control" id="login" name="login" value="" required/><span id="dato"></span></td>
                            </tr>
                            <tr>
                                <td><label>Clave: </label></td>
                                <td><input type="password" class="form-control" name="clave" value="" required/></td>
                            </tr>
                            <tr>
                                <td><label>Confirmar clave: </label></td>
                                <td><input type="password" class="form-control" name="clave2" value="" required/></td>
                            </tr>
                            <tr>
                                <td><label>Nombre: </label></td>
                                <td><input type="text" class="form-control" name="nombre" value="" required/></td>
                            </tr>
                            <tr>
                                <td><label>Apellidos: </label></td>
                                <td><input type="text" class="form-control" name="apellidos" value="" required/></td>
                            </tr>
                            <tr>
                                <td><label>E-Mail: </label></td>
                                <td><input type="email" class="form-control" name="email" value="" required/></td>
                            </tr>
                            <tr>
                                <td><input type="submit" class="btn btn-success" name="boton" value="Enviar" required/></td>
                            </tr>
                        </form>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </body>
</html>