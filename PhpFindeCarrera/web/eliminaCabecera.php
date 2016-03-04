<?php

/*Funcion que trata de eliminar la cabecera de una
 * cadena de texto - Descripcion.
 * L-28. MOLINON - CONTRUECES - ROCES
 * L-28. seria ELIMINADO!
 */


function getEliminar($cadena)
{
    $resultado = '';
    
    /*Hay 1 o más puntos*/
    if(substr_count($cadena,'.')>0)
    {
        list(,$resultado) = explode('.',$cadena,2);
    }
    else $resultado = $cadena;
     
    
    return $resultado;
}



?>
