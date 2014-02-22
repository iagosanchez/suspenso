<?php
session_start();
require_once 'funciones_asignaturas.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$_SESSION['datos'] = (isset ($_SESSION['datos']))?
        $_SESSION['datos']:Array ("", "", "");
$_SESSION['errores'] = (isset ($_SESSION['errores']))?
        $_SESSION['errores']:Array (FALSE, FALSE, FALSE,);
$_SESSION['hayErrores'] = (isset ($_SESSION['hayErrores']))?
        $_SESSION['hayErrores']:FALSE;
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
            <div>Asignaturas: <br><input type="text" name="asignatura"
                                         value="<?php echo $_SESSION['datos'][0]; ?>"/></div>
            
              <?php
                if ($_SESSION['errores'][0]) {
                    echo "<div class 'error'>".MSG_ERR_ASIGNATURA."</div>";
                }
               ?>
                        
            <div>Profesor: <br> <input type="text" name="profesor"
                                       value="<?php echo $_SESSION['datos'][1]; ?>"/></div>
                        
              <?php
                if ($_SESSION['errores'][1]) {
                    echo "<div class 'error'>".MSG_ERR_PROFESOR."</div>";
                }
               ?>
            <div>Nota: <br><input type="text" name="nota"
                                  value="<?php echo $_SESSION['datos'][2]; ?>"/></div>
                        
              <?php
                if ($_SESSION['errores'][2]) {
                    echo "<div class 'error'>".MSG_ERR_NOTA."</div>";
                }
               ?>
                
             <?php
             /**
            ALTERNATIVA A LOS MENSAJES DE ERROR CON UN FOR
             for($i=0; $i<=2;$i++)
                { if($errores[$i]){
                        if($i == 0){
                            echo "<div class 'error'>".MSG_ERR_ASIGNATURA."</div>";
                        }elseif ($i ==1) {
                            echo "<div class 'error'>".MSG_ERR_PROFESOR."</div>";
                        }else {
                            echo "<div class 'error'>".MSG_ERR_NOTA."</div>";
                        }
                    }
                }
             **/
             ?>
             <p><input type="submit" value="Agregar"/></p>
        </form>
    </body>
</html>