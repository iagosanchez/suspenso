<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<html>
    <head>
        <title>Asignaturas</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
        <div><b>Datos nuevo Equipo<b></div>
                    <form action="agregar_asignaturas.php" method="GET">
            <div>Asignaturas: <br><input type="text" name="asignatura"/></div>
            <div>Profesor: <br> <input type="text" name="profesor"/></div>
            <div>Nota: <br><input type="text" name="nota"/></div>
                     
            <p><input type="submit" value="Agregar"/></p>
        </form>
    </body>
</html>