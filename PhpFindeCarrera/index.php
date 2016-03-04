<?php
//#############################################REDIRIGIR A MOVIL
include('esMovil.php');
$valor = esMovil();

if( $valor == "movil")
{

   
	header( 'location:/PhpFindeCarrera/movil/' );
	exit();
}
else
{
	header( 'location:/PhpFindeCarrera/web/' );
	exit();

}

//############################################# REDIRIGIR A MOVIL
?>

