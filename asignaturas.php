<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//CONECTARSE A BD
define('BD_USUARIO', 'root');
define('BD_PASSWORD', 'abc123.');
define('BD_NOME', 'asignaturas');
define('BD_CONEX_PDO', 'mysql:host=localhost;dbname='.BD_NOME);

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

//CONSULTAR ASIGNATURAS DE BD

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
            echo "</tr>";
        foreach ($resultado as $registro){
            echo "<tr>";
            echo "<td>";
            echo $registro['modulo'];
            echo "</td>";
            echo "<td>";
            echo $registro['profesor'];
            echo "</td>";
            echo "<td>";
            echo $registro['nota'];
            echo "</td>";
            echo "</tr>";
                }
                    echo "</table>";
        }
              
        $bd = null;
