<html>
    <head>
        <title>Confirmar borrado</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
        <div>¿Confirmar borrado?</div>
        
    </body>
</html>



<?php
session_start();
require_once 'funciones_asignaturas.php';


$_SESSION['asignatura'] = (isset ($_REQUEST['asignatura']))?
        $_REQUEST['asignatura']:$_SESSION['asignatura'];

$bd = conectaBd();
$consulta = "SELECT * FROM asignaturas WHERE asignatura='".$_SESSION['asignatura']."'";
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
           $_SESSION['datos'][2] = $registro['nota'];
           echo "<table border=1>";
           echo "<tr>";
           echo "<th>Asignatura</th>";
           echo "<th>Profesor</th>";
           echo "<th>Nota</th>";
           echo "<tr>";
           echo "<td>";
           echo $registro['asignatura'];
           echo "</td>";
           echo "<td>";
           echo $registro['profesor'];
           echo "</td>";
           echo "<td>";
           echo $registro['nota'];
           echo "</td>";
           echo "</table>";
       }
  }
?>
<html>
    <head>
        <title>Confirmar borrado</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
        <div><a href="asignaturas.php">Cancelar</a>
        <a href="borrar_asignaturas.php">Continuar</a></div>
    </body>
</html>