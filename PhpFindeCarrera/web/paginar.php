<?php


class paginar
{
	private $query_resultado;
	private $cadena_resultado;
        private $numero_registros;
	public $conn;
	public $consulta;
	
	function paginar($conexion, $consul)
	{
		$this->conn = $conexion;
		$this->consulta = $consul;
		$this->procesar();
	}
        
        function getNRegistros()
        {
            return $this->numero_registros;
        }
	
	function procesar()
	{
	  //######################################################################
	  			    $conn = $this->conn;
					$consulta = $this->consulta;
					$cadena = '';
					$query = null;
					
					
						//Al principio compruebo si hicieron click en alguna pgina
					if(isset($_GET['page']))
					{

						$page = $_GET['page'];
						
					}
                                   else if( isset($_SESSION['paginaActual']) )
                                   {  
                                           $page = $_SESSION['paginaActual'];
                                   }
					else //Si no digo que es la primera pgina
					{
						$page = 1; 
						
					}
					
					
					//Ahora realizo la consulta		
					$datos = mysql_query($consulta, $conn);

					//Miro cuantos registros fueron devueltos
					$num_rows = mysql_num_rows($datos);

					$this->numero_registros = $num_rows;
					//Aqui decido cuantos datos mostrar por pagina
					$rows_per_page = 20;
					
					
					//Calculo la ltima pagina
					$lastpage = ceil($num_rows / $rows_per_page);

					//Compruebo que el valor de la pgina sea correcto y si es la ltima pgina
					$page = (int)$page;

					if($page > $lastpage)
					{
						$page = $lastpage;
					}
					else if($page < 1)
					{
						$page = 1;
					}
					
					//##############################################################################

					
					//Creo la sentencia limit para aadir a la consulta definitiva
					$limit = 'LIMIT '.($page - 1)* $rows_per_page.','.$rows_per_page;

					//Realizo la consulta que va a mostrar los datos (Es la anterior + el $limit)

                               //La siguiente sentencia sirve para comprobar si FUERA de paginar.php
                               //se ha limitado alguna consulta para no saturar la base de datos    
                                   $cadena_nueva = substr($consulta,0,strpos($consulta,"LIMIT"));//PRUEBA!
                                   if(strlen($cadena_nueva)!=0) $consulta = $cadena_nueva;
                              //Si algo relacionado con la paginación fuese mal... recurrir a esta seccion!!! 
                              //--------------------------------------------------------------------------

					$consulta .= ' '.$limit;
					
					$query = mysql_query($consulta);
					
					if(!$query)
					{
						//Si falla la conexion
						die('Invalid query: ').mysql_error();
					}
					else
					{
						$contador = 0;
						$clase = "alt";
						//Si es correcta muestro los datos
						
						
						  

				//Una vez que muestro los datos tengo que mostrar el bloque de paginacion
				//siempre y cuando haya ms de una pgina
				if($num_rows != 0)
				{
					$nextpage = $page + 1;
					$prevpage = $page - 1;
					// $cadena .="<ul id=\"pagination-flickr\">"; 
						 $cadena .="<ul id=\"pagination-digg\">"; 
							
					//Si es la primera pgina deshabilito el boton de previos, muestro el 1 como activo
					// y muestro el resto de pginas
					if($page == 1){
						
							
						$cadena .="<li class=\"previous-off\">&laquo; Previous</li>";	
						$cadena .="<li class=\"active\">l</li>";
							
							
						/*for($i= $page + 1 ; $i<=$lastpage; $i++){*/
						
						
						if( ($lastpage - $page) <= 9 )
						{
							$inicio1 = $page+1;
							$final1 = $lastpage;
							$primero = false;
							
						}
						else
						{
							$inicio1= $page+1;
							$final1 = $page+6;
							$primero = true;
						}
						
						
						for($i= $inicio1; $i<= $final1; $i++)
						{
							$cadena .="<li><a href=".$_SERVER['PHP_SELF']."?page=".$i."> ".$i. " </a></li>";
						}
							
						
						   if($primero == true)
						   {
						   
							$cadena .="<li> ... </li>";
							$cadena .="<li><a href=".$_SERVER['PHP_SELF']."?page=".($lastpage-1)."> ".($lastpage-1). " </a></li>";
							$cadena .="<li><a href=".$_SERVER['PHP_SELF']."?page=".$lastpage.">".$lastpage. "</a></li>";					   
								
						   }		    


							
			 
			//Y SI LA ULTIMA PGINA ES MAYOR QUE LA ACTUAL MUESTRO EL BOTON NEXT O LO DESHABILITO
				if($lastpage >$page ){ 
				
				$cadena .="<li class=\"next\"><a href=".$_SERVER['PHP_SELF']."?page=".$nextpage.">Next &raquo;</a></li>";
							
							
				}else{
						$cadena .="<li class=\"next-off\">Next &raquo;</li>";	
								}
			 } else {
			//EN CAMBIO SI NO ESTAMOS EN LA PGINA UNO HABILITO EL BOTON DE PREVIUS Y MUESTRO LAS DEMS
				
						$cadena .="<li class=\"previous\"><a href=".$_SERVER['PHP_SELF']."?page=".$prevpage.">&laquo; Previous</a></li>";	

				  /*for($i= 1; $i<= $lastpage ; $i++){*/
						if( ($lastpage ) <= 9 )
						{
						
							if($lastpage - $page == 0)
							{$inicio2 = 1;
							$final2 = $lastpage;
							$segundo = false; 
							}
							else{
							$inicio2 = 1;
							$final2 = $lastpage;
							$segundo = false;
							}
						}
						else
						{
						
						
							if($lastpage - $page <=8)
							{
						
							$inicio2= $lastpage-8;
							$final2 = $lastpage;
							$segundo = false;
							}
							else
							{
							$inicio2= $page;
							$final2 = $page+6;
							$segundo = true;
							}
						
							
						}
				
				 
					  for($i=$inicio2; $i<=$final2; $i++){
						//COMPRUEBO SI ES LA PGINA ACTIVA O NO
						if($page == $i){ 
					
							$cadena .="<li class=\"active\">".$i."</li>";
							
						}else{
					
							$cadena .="<li><a href=".$_SERVER['PHP_SELF']."?page=".$i.">".$i."</a></li>";
							
						}
				  }
				  
						   if($segundo == true)
						   {
						    //GUION Y DOBLES
							$cadena .="<li> ... </li>";
							$cadena .="<li><a href=".$_SERVER['PHP_SELF']."?page=".($lastpage-1)."> ".($lastpage-1). " </a></li>";
							$cadena .="<li><a href=".$_SERVER['PHP_SELF']."?page=".$lastpage.">".$lastpage. "</a></li>";
								
						   }

				  
					 //Y SI NO ES LA LTIMA PGINA ACTIVO EL BOTON NEXT		
					 //echo "<a href=".$_SERVER['PHP_SELF']."?pag=".$nextpage
					 //if( ($page+6)<$lastpage)
				  if($lastpage >$page ){	
			            $cadena .="<li class=\"next\"><a href=".$_SERVER['PHP_SELF']."?page=".$nextpage.">Next &raquo;</a></li>";				
							
				  }else{ 
			
							$cadena .="<li class=\"next-off\">Next &raquo;</li>";
							
				  }
			 }	  
						  $cadena .="</ul>";
					
					
					
					
					
					
					
					//##############################################################################
				}
		}
        $this->cadena_resultado = $cadena;
        $this->query_resultado = $query;
	  //######################################################################
	}


	
	function getQuery()
	{
		return $this->query_resultado;
	}
	
	function getCadena()
	{
		return $this->cadena_resultado;
	}
	
	
	
}






?>