<?php
require '../require/comun.php';
$id = Leer::get("id");
$login = Leer::get("login");
$baseDatos = new BaseDatos();
$modelo = new ModeloUsuario($baseDatos);
$usuario = $modelo->get($login);
if($usuario->getEmail()!=""){
    $id2 = md5($usuario->getEmail().Configuracion::PEZARANA.$usuario->getLogin());
    if($id!=$id2){
        header("Location: viewolvido.php?r=-1");
    }
}else{
    header("Location: viewolvido.php?r=-1");
}
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
    </head>
    <body>
        <div  style="margin:0 auto;width: 400px;" >
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa"></i> Cambiar clave</h3>
                        </div>
                        <div class="panel-body">
                            <form action="phpcambiarclave.php" method="post">
                                <table>
                                    <tr>
                                        <input value="<?php echo $id; ?>" type="hidden" name="id" />
                                        <input value="<?php echo $login; ?>" type="hidden" name="login" />
                                        <td>Nueva clave: </td>
                                        <td><input class="form-control" type="password" name="clave1"/></td>
                                    </tr>
                                    <tr>
                                        <td>Repite la nueva clave: </td>
                                        <td><input class="form-control" type="password" name="clave2"/></td>
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