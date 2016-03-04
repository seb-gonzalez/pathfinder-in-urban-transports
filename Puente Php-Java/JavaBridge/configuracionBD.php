<?php
    
	//datos de conexion que hay que editar con los que corresponda
	$GLOBALS['DB_IP'] = 'localhost';
	$GLOBALS['DB_USER'] = 'sebastian';
	$GLOBALS['DB_PASS'] = 'uhu';
	$GLOBALS['DB_NAME'] = 'sebastian';
	
	
	
	function get_db_conn()
	{
	    $conn = mysql_connect($GLOBALS['DB_IP'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASS']);
		mysql_select_db($GLOBALS['DB_NAME'], $conn);
		
		if (!$conn) 
		{
			echo "No pudo conectarse a la BD: " . mysql_error();
			exit;
		}
		
		return $conn;
	}
	
	
?> 
  
  
