<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// definir constantes
define('BD_USUARIO', 'root');
define('BD_PASSWORD', 'abc123.');
define('BD_NOME', 'asignaturas');
define('BD_CONEX_PDO', 'mysql:host=localhost;dbname='.BD_NOME);

define('MSG_ERR_ASIGNATURA', "Error en la asignatura");
define('MSG_ERR_PROFESOR', "Error en el profesor");
define('MSG_ERR_NOTA', "Error en la nota");

// conectarse a una bd
function conectaBd()
{
    try {
        //$db = new PDO("mysql:host=localhost", "root", "abc123.");
        $bd = new PDO(BD_CONEX_PDO, BD_USUARIO, BD_PASSWORD);
        return($bd);
    } catch (PDOException $e) {
        print "<p>Error: No puede conectarse con la base de datos.</p>\n";
        print "<p>Error: " . $e->getMessage() . "</p>\n";
        exit();
    }
}


function validarAsignatura ($valor){
   if (strlen($valor)>0 && strlen($valor)<=50){
        return TRUE;
    } else {
        return FALSE;
    }
} 
function validarProfesor ($valor){
    if (strlen($valor)>0 && strlen($valor)<=20){
        return TRUE;
    } else {
        return FALSE;
    }
}
function validarNota ($valor){
    if (is_numeric($valor)
            && ($valor>=0 && $valor<=10)) {
    return true;
            }else {
                return FALSE;
            }
}
?>