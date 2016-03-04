<?php
include('configuracionBD.php'); 

/*Devuelve una query con los trayectos*/
function getidTrayectos($idLinea)
{
    $resultado = 0;
    $connection = get_db_conn();
    
    $consulta = "SELECT * FROM `TRAYECTOS` WHERE idLinea='".$idLinea."' ORDER BY idTrayecto";
    $resultado = mysql_query($consulta, $connection);//CONSULTA
    
    return $resultado;
    
}



?>
