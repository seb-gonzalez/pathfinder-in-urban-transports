<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<?php session_start(); ?>
<html>
    <head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
<link href="../../css/tablaStyle.css" type="text/css" rel="stylesheet">
<link href="../../css/paginacion.css" type="text/css" rel="stylesheet">


<script type="text/javascript" src="../../jquery/js/jquery-1.6.2.js"></script>
<script type="text/javascript" src="../../jquery/js/jquery.tablesorter.js"></script>




<script type="text/javascript" src="../../jquery/js/jquery-ui-1.8.14.custom.min.js"></script> 
<link rel="stylesheet" href="../../css/jquery.autocomplete.css" type="text/css" /> 
<script type="text/javascript" src="../../jquery/js/jquery.bgiframe.min.js"></script>  
<script type="text/javascript" src="../../jquery/js/jquery.autocomplete.pack.js"></script>

        <?php include('../../configuracionBD.php');
              include('../../paginar.php');
        ?>
        <script type="text/javascript">
		
	$(document).ready(function(){

		$("#busqueda_paradas").autocomplete("../buscar_autocompletar_localizacion.php", {
		width: 150,
		matchContains: true,
		selectFirst: false
		});


	});		
		
		
$(document).ready(function() 
            { 
                $("#miTabla")
                .tablesorter({   widgets: ['zebra'], headers: {0:{sorter: false },1:{sorter: false },2:{sorter: false },3:{sorter: false },4:{sorter: false },5:{sorter: false }}     } );  


            } 
        ); 

function capturar(a, b, c)
{	       
        location.href="../../Geoposicionar.php?Latitud="+a+"&Longitud="+b+"&informacion="+c+"&info2=Usted esta viendo la posición viva de su Autobús."
              +"&back=Consultas/Dinamicas/showLocalizacion.php";
}


function capturar_linea(idLinea)
{
    location.href="../Estaticas/showParadas.php?localizacion-paradas="+idLinea;
}

function capturar_linea2(idLinea)
{
    location.href="../Estaticas/showLineas.php?localizacion-lineas="+idLinea;
}

	 function regresar()
	 {
		 location.href="../../index.php";
	 }  
	 
	function probando(evt) {

		var charCode = (evt.which) ? evt.which : event.keyCode
		if(charCode == "13"){
		document.filtro_busqueda.submit();}
		return true;
	} 
	
	
	function ordenar_autobus()
	{
		
		location.href="showLocalizacion.php?ordenarAutobus";
	} 
	
	function ordenar_linea()
	{
		
		location.href="showLocalizacion.php?ordenarLinea";
	} 	

	function ordenar_siguiente()
	{
		
		location.href="showLocalizacion.php?ordenarSiguiente";
	} 

	function ordenar_fecha()
	{
		
		location.href="showLocalizacion.php?ordenarFecha";
	} 

	function ordenar_hora()
	{
		
		location.href="showLocalizacion.php?ordenarHora";
	} 	

 

</script>  
        <style type="text/css">    


		
		
	@media screen and (min-device-width: 480px)
	{

		div.posicionTabla
		{
				position:absolute;
				left:200px;
				top:5px;
				width:1000px;
				height:600px;
				z-index:1;
		}
		
		
			div.paginado{
                position:absolute;
                left:450px;
                top:650px;
                width:582px;
                height:135px;
                z-index:1;
		}

		div.texto {
                position:absolute;
                left:468px;
                top:680px;
                width:221px;
                height:28px;
                z-index:2;
                color: #888888;
                font-weight: bold;
                font-size: 14px;
                font-family: "Times New Roman", Times, serif;
		}


		div.formulario {
			position:absolute;
			left:200px;
			top:21px;
			width:250px;
			height:74px;
			z-index:3;
	
		}

	div.cabecera 
	{	
	visibility : hidden;
		position:absolute;
		left:0px;  
		top:1px;
		width: 560px;
		height: 15px;   
		
		background-color : #EEE;
			
			border-width : 6px;
		border-color : #EEE;
		border-style : solid;      
	}
	}

	@media screen and (max-device-width: 480px)
	{

	div.cabecera 
	{	
		visibility:visible;
		position:absolute;
		left:0px;  
		top:1px;
		width: 750px;
		height: 15px;   
		
		background-color : #EEE;
			
			border-width : 6px;
		border-color : #EEE;
		border-style : solid;      
	}

		div.posicionTabla
		{
				position:absolute;
				left:0px;
				top:20px;
				width:1000px;
				height:600px;
				z-index:1;
		}
			div.paginado{
			position:absolute;
			left:120px;
			top:610px;
			width:582px;
			height:135px;
			z-index:1;
		}

		div.texto {
			position:absolute;
			left:120px;
			top:640px;
			width:221px;
			height:28px;
			z-index:2;
			color: #888888;
			font-weight: bold;
			font-size: 14px;
			font-family: "Times New Roman", Times, serif;
		}


		div.formulario {
			position:absolute;
			left:10px;
			top:35px;
			width:480px;
			height:74px;
			z-index:3;
		}

	}		



	td.puntero 
	{
		cursor: pointer;
	}				

        </style>




        
        
        <title>Localizaciones de los autobúses</title>
    </head>
    <body>
       
   <?php

    $connection = get_db_conn();	
	
	$getBusquedaParadas = "";
    $busquedaFallida = 'NO';
    $consulta = "";
    $cadena = "";
    $numero_registros = 0;
    $query = null;
	
    //Variables de ordenacion
	$ordenarAutobus="";
	$ordenarLinea = "";
	$ordenarSiguiente="";
	$ordenarFecha="";
	$ordenarHora="";	
	$mensajeOrdenacion = "ORDER BY FechaActualizacion DESC, HoraActualizacion DESC"; //Por defecto
	//Variables de ordenacion
	

    if($_SERVER['REQUEST_METHOD']=='POST')
    {
	
		if(isset($_GET['page']))
        {
           //Almaceno la pagina actual del paginador!   
            $_SESSION['paginaActual'] = $_GET['page'];
        }	
        else if(isset($_POST['search']))
        {
             //echo "HE RECIBIDO VALOR? : ".$_POST['search'];
            $getBusquedaParadas = $_POST['search'];
            if(isset($_POST['ver_todo']))
            {            
				$getBusquedaParadas="";
				unset($_SESSION['paginaActual']); //Destruye la variable de sesion 
           } 			
        }
		else //ACABARÉ DE ENTRAR EN LA PÁGINA.... LUEGO RESETEO..
		{
		 unset($_SESSION['paginaActual']); //Destruye la variable de sesion || ENTRO EN LA PAGINA!

		}
		
        
    }
	else if($_SERVER['REQUEST_METHOD']=='GET')
	{
	
		if(isset($_GET['page']))
        {
           //Almaceno la pagina actual del paginador!   
            $_SESSION['paginaActual'] = $_GET['page'];
        }	
        //############### ORDENACIÓN #####################
		else if(isset($_GET['ordenarAutobus']))
		{
			if(isset($_SESSION['ordenarAutobus_localizacion'])) $ordenarAutobus=$_SESSION['ordenarAutobus_localizacion'];
        
			
			
			if($ordenarAutobus=="" || $ordenarAutobus=="down")
			{
				
				$ordenarAutobus="up";
				$mensajeOrdenacion = " ORDER BY b.Modelo ASC";
				$_SESSION['ordenarAutobus_localizacion'] = "up";
			}
			else if($ordenarAutobus == "up") 
			{
				
				$ordenarAutobus = "down";
				$mensajeOrdenacion = " ORDER BY b.Modelo DESC";
				$_SESSION['ordenarAutobus_localizacion'] = "down";
			}
		}
		else if(isset($_GET['ordenarLinea']))
		{
			if(isset($_SESSION['ordenarLinea_localizacion'])) $ordenarLinea=$_SESSION['ordenarLinea_localizacion'];
        
			
			
			if($ordenarLinea=="" || $ordenarLinea=="down")
			{
				
				$ordenarLinea="up";
				$mensajeOrdenacion = " ORDER BY idLinea ASC";
				$_SESSION['ordenarLinea_localizacion'] = "up";
			}
			else if($ordenarLinea == "up") 
			{
				
				$ordenarLinea = "down";
				$mensajeOrdenacion = " ORDER BY idLinea DESC";
				$_SESSION['ordenarLinea_localizacion'] = "down";
			}
		}		
		else if(isset($_GET['ordenarSiguiente']))
		{
			if(isset($_SESSION['ordenarSiguiente_localizacion'])) $ordenarSiguiente=$_SESSION['ordenarSiguiente_localizacion'];
        
			
			
			if($ordenarSiguiente=="" || $ordenarSiguiente=="down")
			{
				
				$ordenarSiguiente="up";
				$mensajeOrdenacion = " ORDER BY idSiguienteParada ASC";
				$_SESSION['ordenarSiguiente_localizacion'] = "up";
			}
			else if($ordenarSiguiente == "up") 
			{
				
				$ordenarSiguiente = "down";
				$mensajeOrdenacion = " ORDER BY idSiguienteParada DESC";
				$_SESSION['ordenarSiguiente_localizacion'] = "down";
			}		
		}
		else if(isset($_GET['ordenarFecha']))
		{
			if(isset($_SESSION['ordenarFecha_localizacion'])) $ordenarFecha=$_SESSION['ordenarFecha_localizacion'];
        
			
			
			if($ordenarFecha=="" || $ordenarFecha=="down")
			{
				
				$ordenarFecha="up";
				$mensajeOrdenacion = " ORDER BY FechaActualizacion ASC";
				$_SESSION['ordenarFecha_localizacion'] = "up";
			}
			else if($ordenarFecha == "up") 
			{
				
				$ordenarFecha = "down";
				$mensajeOrdenacion = " ORDER BY FechaActualizacion DESC";
				$_SESSION['ordenarFecha_localizacion'] = "down";
			}				
		}
		else if(isset($_GET['ordenarHora']))
		{
			if(isset($_SESSION['ordenarHora_localizacion'])) $ordenarHora=$_SESSION['ordenarHora_localizacion'];
        
			
			
			if($ordenarHora=="" || $ordenarHora=="down")
			{
				
				$ordenarHora="up";
				$mensajeOrdenacion = " ORDER BY HoraActualizacion ASC";
				$_SESSION['ordenarHora_localizacion'] = "up";
			}
			else if($ordenarHora == "up") 
			{
				
				$ordenarHora = "down";
				$mensajeOrdenacion = " ORDER BY HoraActualizacion DESC";
				$_SESSION['ordenarHora_localizacion'] = "down";
			}				
		}		
		//############### ORDENACIÓN #####################
		else //ACABARÉ DE ENTRAR EN LA PÁGINA.... LUEGO RESETEO..
		{
		 unset($_SESSION['paginaActual']); //Destruye la variable de sesion || ENTRO EN LA PAGINA!

		}	
	
	}
	
	
	if($getBusquedaParadas == "")
	{
		$consulta = "SELECT * FROM `POSICIONVIVA` a INNER JOIN `AUTOBUS` b ON (a.idAutobus = b.idAutobus)  $mensajeOrdenacion";
	}
	else
	{
        $consulta = "SELECT * FROM `POSICIONVIVA` a INNER JOIN `AUTOBUS` b ON (a.idAutobus = b.idAutobus) WHERE b.Modelo = \"$getBusquedaParadas\" $mensajeOrdenacion";

        $queryVer = mysql_query($consulta,$connection);
        $num_rows = mysql_num_rows($queryVer);
	
        if($num_rows == 0) //Estaremos ante una consulta erronea con ningÃºn resultado...
        {
            $busquedaFallida = 'SI';
        }	
	}
	
	
	if($busquedaFallida == 'NO')
	{
		$objetoPaginar = new paginar($connection, $consulta);

		//$query = paginar($connection, $consulta);
		$query = $objetoPaginar->getQuery();
		$cadena = $objetoPaginar->getCadena();
		$numero_registros = $objetoPaginar->getNRegistros();	
	}
	
    
	
	
	
    
	
?>       
        
 <div class="cabecera"><img src="../../css/imagenes/flecha_izquierda.png" title="Regrese" onclick="regresar()" style="position:relative; cursor: pointer" /> </div>
 <div class="formulario">
 
     <form id="filtro_busqueda" name="filtro_busqueda" action="<?php echo "showLocalizacion.php"?>" method="POST">
            <b>Modelo a buscar: </b><input style="width:150px; border:#000000 solid 1px;" type="text" onkeypress="probando(event)" name="search" value="" id="busqueda_paradas" placeholder="Búsqueda" autofocus />
            <input type="submit" name="ver_todo" id="resaltar" value="Ver todo" <?php if($getBusquedaParadas != "") echo 'enabled=\"enabled\"'; else echo 'disabled=\"disabled\"'?> > 
            
     </form>
 </div> 
 
 
    <div class="posicionTabla">      
        
   <table id="miTabla" class="customers" summary ="Esta tabla contiene las localizaciones de la red de autobuses de Gijón">
<caption><br /><br />
<br />
</caption>
<thead>
	<tr>
      <th scope="col" width="170" style="cursor:pointer" onclick="ordenar_autobus()" title="Click para ordenar Autobus!">Autobus</th>
      <th scope="col" width="50" style="cursor:pointer" onclick="ordenar_linea()" title="Click para ordenar línea!">Línea</th>	  
      <th scope="col" width="160" style="cursor:pointer" onclick="ordenar_siguiente()" title="Click para ordenar Siguiente parada!">Siguiente parada</th>
      <th scope="col" width="90" style="cursor:pointer" onclick="ordenar_fecha()" title="Click para ordenar fecha!">Fecha</th>
      <th scope="col" width="80" style="cursor:pointer" onclick="ordenar_hora()" title="Click para ordenar hora!">Hora</th>
      <th scope="col" width="120">Ver en mapa</th>
      		
	</tr>
</thead>
<?php  if($busquedaFallida=='NO'){ ?>
<tbody><?php while($fila = mysql_fetch_assoc($query)){ ?>
	<tr > 
         <td><?php
	     
		 $a = $fila['Modelo'];           
		 $b = $fila['idSiguienteParada'];
		 $c = $fila['FechaActualizacion'];
		 $d = $fila['HoraActualizacion'];
		 $e = $fila['Lat'];
		 $f = $fila['Lng'];
		 $g = $fila['idLinea'];		 

		 
		 //echo 'Consulta: '.$primera.' '.$segunda.' '.$tercera.'<br>';
		 echo $a ?></td>
      <td class="puntero" onclick="capturar_linea2(<?=$g?>)" title="Ver más sobre la línea!" ><?php echo $g ?></td>
      <td class="puntero" onclick="capturar_linea(<?=$b?>)" title="Ver más sobre la parada!"><?php echo $b ?></td>
      <td><?php echo $c ?></td> 
      <td><?php echo $d ?></td> 
      <td class="puntero" onclick="capturar( <?php echo $e?>,<?php echo $f?>, <?php echo '\''."Autobús - ".$a.'\'';?> )" align="center"
        title="Localize su autobús en el mapa!">
        <img src="../../css/imagenes/ver_mapa2.png" width="14%"/></td>
	</tr><?php } ?>
	
</tbody>
<?php }else { ?>
<tfoot>
	    <tr>
	        <td colspan="5"  >
	            No existen coincidencias...
	        </td>
	    </tr>	    
	</tfoot> <?php } ?>
</table> 
    </div>
        
 <div class="paginado">
        <?php echo $cadena;?>
</div>            
<div class="texto" ><?php echo "Numero de localizaciones: ".$numero_registros;?></div>
<?php mysql_close();?>
  
</div>      
        
        
        
    </body>
</html>
