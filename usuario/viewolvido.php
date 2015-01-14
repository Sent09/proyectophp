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
        <script>
            window.addEventListener("load", function(){
            <?php 
                require '../require/comun.php';
                $resultado = Leer::get("r");
                $operacion = Leer::get("op");
                if(($resultado > 0 && $operacion=="login") || ($resultado > 0 && $operacion=="mail")){
            ?>
                $.toaster({ priority : 'success', title : 'Bien', message : 'Te hemos enviado un e-mail'});
            <?php
                }
                if($resultado == -1){
            ?>
                $.toaster({ priority : 'danger', title : 'Error', message : 'Ha ocurrido algun error'});
            <?php
                }
            ?> 
                
            });
        </script>
    </head>
    <body>
        <div style="margin:0 auto;width: 400px;" >
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa"></i> Recordar clave</h3>
                </div>
                <div class="panel-body">
                    <form action="phpolvido.php" method="post">
                        <table>
                            <tr>
                                <td>Login: </td>
                                <td><input class="form-control" type="text" name="login"/></td>
                            </tr>
                            <tr>
                                <td><input type="submit" class="btn btn-success" value="Enviar"/></td>
                            </tr>
                        </table>  
                   </form>
                </div>
            </div>
        </div>
        </div>
        <div  style="margin:0 auto;width: 400px;" >
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa"></i> Recordar login</h3>
                        </div>
                        <div class="panel-body">
                            <form action="phpolvido.php" method="post">
                                <table>
                                    <tr>
                                        <td>Email: </td>
                                        <td><input class="form-control" type="email" name="email"/></td>
                                    </tr>
                                    <tr>
                                        <td><input type="submit" class="btn btn-success" value="Enviar"/></td>
                                    </tr>
                                </table>  
                           </form>
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>