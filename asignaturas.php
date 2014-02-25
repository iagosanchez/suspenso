<?php
require_once 'funciones_asignaturas.php';
?>

<html>
    <head>
        <title>Favoritos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
        <div>Listado de asignaturas</div>
        <div><a href="formulario_asignaturas.php">Agregar asignaturas</a></div>
<?php

/**
 * CONSULTAR ASIGNATURAS DE BD
 */
$bd = conectaBd();
        $consulta = 'SELECT * FROM asignaturas';
        $resultado = $bd ->query($consulta);
        if (!$resultado){
            echo 'Error en la consulta';
        } else {
            echo "<table border='1'>";
            echo "<tr>";
            echo "<th>Modulo</th>";
            echo "<th>Profesor</th>";
            echo "<th>Nota</th>";
            echo "<th></th><th></th>";
            echo "</tr>";
        foreach ($resultado as $registro){
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
            $irEditar = "editar_asignaturas.php?asignatura=".$registro['asignatura'];
            echo "<td><a href=".$irEditar.">Editar</a></td>";
            $irBorrar = "confirmar_eliminar_asignaturas.php?asignatura=".$registro['asignatura'];
            echo "<td><a href=".$irBorrar.">Eliminar</a></td>";
            echo "</tr>";
                }
                    echo "</table>";
        }
              
        $bd = null;
?>
    </body>
</html>