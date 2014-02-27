<?php
session_start();
require_once 'funciones_asignaturas.php';


$db = conectaBd();
   $asignatura = $_SESSION['asignatura'];
    
    
    $consulta = "DELETE FROM asignaturas 
        WHERE asignatura= :asignatura";
    
    $resultado = $db->prepare($consulta);
    if ($resultado->execute(array(":asignatura" => $asignatura))) {
        //vaciamos las variables de sesión si todo va bien.
        unset ($_SESSION['datos']);
        unset ($_SESSION['errores']);
        unset ($_SESSION['hayErrores']);
       // redirigimos a la página del listado 
        $destino = "asignaturas.php";
        header('Location:'.$destino);
    } else {
        print "<p>Error al crear el registro.</p>\n";
    }

    $db = null;
