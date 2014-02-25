<?php
session_start();
require_once 'funciones_asignaturas.php';


function validarDatosRegistro() {
    // Recuperar datos Enviados desde formulario_nuevo_equipo.php
    $datos = Array();
    $datos[0] = (isset($_REQUEST['asignatura']))?
            $_REQUEST['asignatura']:"";
    $datos[1] = (isset($_REQUEST['profesor']))?
            $_REQUEST['profesor']:"";
    $datos[2] = (isset($_REQUEST['nota']))?
            $_REQUEST['nota']:"";
    
    //-----validar ---- //
    $errores = Array();
    $errores[0] = !validarAsignatura($datos[0]);
    $errores[1] = !validarProfesor($datos[1]);
    $errores[2] = !validarNota($datos[2]);
    
    // ----- Asignar a variables de Sesión ----//
    $_SESSION['datos'] = $datos;
    $_SESSION['errores'] = $errores;  
    $_SESSION['hayErrores'] = 
            ($errores[0] || $errores[1] || $errores[2]);
    
}


// PRINCIPAL //
validarDatosRegistro();
if ($_SESSION['hayErrores']) {
    $url = "editar_asignaturas.php";
    header('Location:'.$url);
} else {
    
    $db = conectaBd();
    $asignatura = $_SESSION['datos'][0];
    $profesor = $_SESSION['datos'][1];
    $nota = $_SESSION['datos'][2];
    
    
    $consulta = "UPDATE asignaturas SET
        asignatura = :asignatura,
        profesor = :profesor,
        nota = :nota
        WHERE asignatura= :asignatura";
    
    $resultado = $db->prepare($consulta);
    if ($resultado->execute(array(":asignatura" => $asignatura, 
        ":profesor" => $profesor,
        ":nota" => $nota))) {
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

}
?>