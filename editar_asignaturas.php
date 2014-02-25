<?php
session_start();
require_once 'funciones_bd.php';
require_once 'funciones.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$_SESSION['datos'] = (isset ($_SESSION['datos']))?
        $_SESSION['datos']:Array ("", "","");
$_SESSION['errores'] = (isset ($_SESSION['errores']))?
        $_SESSION['errores']:Array (FALSE, FALSE, FALSE);
$_SESSION['hayErrores'] = (isset ($_SESSION['hayErrores']))?
        $_SESSION['hayErrores']:FALSE;

/*
 * Cargar de la base de datos
 */
$_SESSION['asignatura'] = (isset ($_REQUEST['asignatura']))?
        $_REQUEST['asignatura']:$_SESSION['asignatura'];

$bd = conectaBd();
$consulta = "SELECT * FROM software WHERE asignatura=".$_SESSION['asignatura'];
$resultado = $bd ->query($consulta);
if (!$resultado){
    $url = "error.php?msg_error=error_Consulta_Editar";
    header('Location:', $url);
} else {
       $registro = $resultado->fetch();
       if(!$registro) {
           $url = "error.php?msg_error=Error_Registro_Software_inexistente";
           header('Location:'.$url);
       } else {
           $_SESSION['datos'][0] = $registro['asignatura'];
           $_SESSION['datos'][1] = $registro['profesor'];
           $_SESSION['datos'][2] = $registro['nota']
       }
}
?>

<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
        <div>TODO write content</div>
        <form action="grabar_editar_asginaturas.php" method="GET">
            <div>Titulo: <input type="text" name="asignatura" value="<?php echo $_SESSION['datos'][0]; ?>" /></div>
            <?php
                if ($_SESSION['errores'][0]) {
                    echo "<div class 'error'>".MSG_ERR_ASIGNATURA."</div>";
                }
            ?>
            
            
            <div>Url <input type="text" name="profesor" value="<?php echo $_SESSION['datos'][1]; ?>" /></div>
            <?php
                if ($_SESSION['errores'][1]) {
                    echo "<div class 'error'>".MSG_ERR_PROFESOR."</div>";
                }
            ?>
              <div>Url <input type="text" name="nota" value="<?php echo $_SESSION['datos'][2]; ?>" /></div>
            <?php
                if ($_SESSION['errores'][2]) {
                    echo "<div class 'error'>".MSG_ERR_NOTA."</div>";
                }
            ?>
            
            
            <p><input type="submit" value="Enviar" /></p>
        </form>
    </body>
</html>

