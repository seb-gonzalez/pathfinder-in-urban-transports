
<!DOCTYPE html>
<?php session_start(); ?>
<html>
    <head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
<link type="text/css" href="../../css/smoothness/jquery-ui-1.8.14.custom.css" rel="Stylesheet" />
<link href="../../css/tablaStyle.css" type="text/css" rel="stylesheet">
<link href="../../css/paginacion.css" type="text/css" rel="stylesheet">

<script type="text/javascript" src="../../jquery/js/jquery-1.6.2.js"></script>
<script type="text/javascript" src="../../jquery/js/jquery-ui-1.8.14.custom.min.js"></script> 
<script type="text/javascript" src="../../jquery/js/jquery.tablesorter.js"></script>


        <?php include('../../configuracionBD.php');
              include('../../paginar.php');
        ?>
		
	<script>
	jQuery(function($){
   $.datepicker.regional['es'] = {
      closeText: 'Cerrar',
      prevText: '<Ant',
      nextText: 'Sig>',
      currentText: 'Hoy',
      monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
      monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
      dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
      dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
      dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
      weekHeader: 'Sm',
      dateFormat: 'yy-mm-dd',
      firstDay: 1,
      isRTL: false,
      showMonthAfterYear: false,
      yearSuffix: ''};
   $.datepicker.setDefaults($.datepicker.regional['es']);
});             
            
	$(function() {
		$( "#datepicker" ).datepicker({
			showOn: "button",
			buttonImage: "../../css/imagenes/calendar.png",
			buttonImageOnly: true
		});
	});
	</script>
	
        <script type="text/javascript">
		

		
$(document).ready(function() 
    { 
        $("#miTabla")
        .tablesorter({widgets: ['zebra'],headers: {0:{sorter: false },1:{sorter: false },2:{sorter: false },
		3:{sorter: false },4:{sorter: false },5:{sorter: false },6:{sorter: false },7:{sorter: false }}});  
		
		
         

    } 
    
); 

	 function regresar()
	 {
		 location.href="../../index.php";
	 }  
	 
	function ordenar_autobus()
	{
		
		location.href="showCarrera.php?ordenarAutobus";
	}
	
	function ordenar_parada()
	{
		
		location.href="showCarrera.php?ordenarParada";
	}
	
	function ordenar_linea()
	{
		
		location.href="showCarrera.php?ordenarLinea";
	}

	function ordenar_trayecto()
	{
		
		location.href="showCarrera.php?ordenarTrayecto";
	}
	
	function ordenar_fecha()
	{
		
		location.href="showCarrera.php?ordenarFecha";
	}

	function ordenar_hora()
	{
		
		location.href="showCarrera.php?ordenarHora";
	}

	function ordenar_minutos()
	{
		
		location.href="showCarrera.php?ordenarMinutos";
	}

	function ordenar_distancia()
	{
		
		location.href="showCarrera.php?ordenarDistancia";
	}	
	
	
	
	function capturarAutobus(idAutobus)
	{

		location.href="../Estaticas/showAutobus.php?carrera-autobus="+idAutobus;
		
	}
	
	function capturarParada(idParada)
	{

		location.href="../Estaticas/showParadas.php?carrera-parada="+idParada;
	}	
	
	function capturarLinea(idLinea)
	{

		location.href="../Estaticas/showLineas.php?carrera-linea="+idLinea;
	}	
	
	function capturarTrayecto(idTrayecto)
	{

		location.href="../Estaticas/showTrayectos.php?carrera-trayecto="+idTrayecto;
	}	
</script> 
        <style type="text/css">                

		
		
	@media screen and (min-device-width: 480px)
	{

		div.posicionTabla
		{
				position:absolute;
				left:200px;
				top:25px;
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
                left:480px;
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
			top:35px;
			width:500px;
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
				top:30px;
				width:1000px;
				height:600px;
				z-index:1;
		}
			div.paginado{
			position:absolute;
			left:220px;
			top:620px;
			width:582px;
			height:135px;
			z-index:1;
		}

		div.texto {
			position:absolute;
			left:240px;
			top:650px;
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




        
        
        <title>Carreras de los autobúses</title>
    </head>
    <body>
       
<?php

    $connection = get_db_conn();	  

    $getLinea = "";
	$getFecha = "";
	$lineaAncla = "";
	
	$busquedaFallida = 'NO';
    $consulta = "";
    $cadena = "";
    $numero_registros = 0;
    $query = null;
	
    //Variables de ordenacion
	$ordenarAutobus="";
	$ordenarParada = "";
	$ordenarLinea = "";
	$ordenarTrayecto="";
	$ordenarFecha="";
	$ordenarHora="";	
	$ordenarMinutos="";
	$ordenarDistancia="";	
	$mensajeOrdenacion = "ORDER BY FechaActualizacion DESC, HoraActualizacion DESC"; //Por defecto
	//Variables de ordenacion
	
    
if($_SERVER['REQUEST_METHOD']=='POST')
{ 

    if(isset( $_POST['lineaCarrera']  ))
    {  
	    $getLinea = $_POST['lineaCarrera'];
		
		if($getLinea == "TODAS")
		{
				$getLinea = "";
				unset($_SESSION['lineaCarrera']);
		}
		else
		{
		    $lineaAncla = $getLinea;
			$_SESSION['lineaCarrera'] = $getLinea;
			$getLinea = " AND idLinea = ".$getLinea;			
		}
		
        
		unset($_SESSION['paginaActual']); //Destruye la variable de sesion 
		unset($_SESSION['fecha']);
    }
	else if(isset($_POST['fecha']))
	{
	    
	    $getFecha = "'".$_POST['fecha']."'";
		
		//Antes hemos de ver si realmente existe la fecha....
		$consult = "SELECT * FROM `CARRERA` WHERE FechaActualizacion = ".$getFecha;		
		$queryVer = mysql_query($consult,$connection);
        $num_rows = mysql_num_rows($queryVer);
	
        if($num_rows == 0) //Estaremos ante una consulta erronea con ningÃºn resultado...
        {
            $busquedaFallida = 'SI';
			$getFecha = "";
        }
		else
		{
			$getFecha = " AND FechaActualizacion = ".$getFecha;
			$_SESSION['fecha'] = $getFecha; //Almaceno la fecha
		}
		//***************************************************
		
		
		
		
		if(isset($_SESSION['lineaCarrera']))
		{
			$getLinea = " AND idLinea=".$_SESSION['lineaCarrera'];
			$lineaAncla = $_SESSION['lineaCarrera'];
		}
		
		
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
		if(isset($_SESSION['ordenarAutobus_carrera'])) $ordenarAutobus=$_SESSION['ordenarAutobus_carrera'];
	
		
		
		if($ordenarAutobus=="" || $ordenarAutobus=="down")
		{
			
			$ordenarAutobus="up";
			$mensajeOrdenacion = " ORDER BY idAutobus ASC";
			$_SESSION['ordenarAutobus_carrera'] = "up";
		}
		else if($ordenarAutobus == "up") 
		{
			
			$ordenarAutobus = "down";
			$mensajeOrdenacion = " ORDER BY idAutobus DESC";
			$_SESSION['ordenarAutobus_carrera'] = "down";
		}
	}
	else if(isset($_GET['ordenarParada']))
	{
		if(isset($_SESSION['ordenarParada_carrera'])) $ordenarParada=$_SESSION['ordenarParada_carrera'];
	
		
		
		if($ordenarParada=="" || $ordenarParada=="down")
		{
			
			$ordenarParada="up";
			$mensajeOrdenacion = " ORDER BY idParada ASC";
			$_SESSION['ordenarParada_carrera'] = "up";
		}
		else if($ordenarParada == "up") 
		{
			
			$ordenarParada = "down";
			$mensajeOrdenacion = " ORDER BY idParada DESC";
			$_SESSION['ordenarParada_carrera'] = "down";
		}
	}		
	else if(isset($_GET['ordenarLinea']))
	{
		if(isset($_SESSION['ordenarLinea_carrera'])) $ordenarLinea=$_SESSION['ordenarLinea_carrera'];
	
		
		
		if($ordenarLinea=="" || $ordenarLinea=="down")
		{
			
			$ordenarLinea="up";
			$mensajeOrdenacion = " ORDER BY idLinea ASC";
			$_SESSION['ordenarLinea_carrera'] = "up";
		}
		else if($ordenarLinea == "up") 
		{
			
			$ordenarLinea = "down";
			$mensajeOrdenacion = " ORDER BY idLinea DESC";
			$_SESSION['ordenarLinea_carrera'] = "down";
		}		
	}
	else if(isset($_GET['ordenarTrayecto']))
	{
		if(isset($_SESSION['ordenarTrayecto_carrera'])) $ordenarTrayecto=$_SESSION['ordenarTrayecto_carrera'];
	
		
		
		if($ordenarTrayecto=="" || $ordenarTrayecto=="down")
		{
			
			$ordenarTrayecto="up";
			$mensajeOrdenacion = " ORDER BY idTrayecto ASC";
			$_SESSION['ordenarTrayecto_carrera'] = "up";
		}
		else if($ordenarTrayecto == "up") 
		{
			
			$ordenarTrayecto = "down";
			$mensajeOrdenacion = " ORDER BY idTrayecto DESC";
			$_SESSION['ordenarTrayecto_carrera'] = "down";
		}				
	}
	else if(isset($_GET['ordenarFecha']))
	{
		if(isset($_SESSION['ordenarFecha_carrera'])) $ordenarFecha=$_SESSION['ordenarFecha_carrera'];
	
		
		
		if($ordenarFecha=="" || $ordenarFecha=="down")
		{
			
			$ordenarFecha="up";
			$mensajeOrdenacion = " ORDER BY FechaActualizacion ASC";
			$_SESSION['ordenarFecha_carrera'] = "up";
		}
		else if($ordenarFecha == "up") 
		{
			
			$ordenarFecha = "down";
			$mensajeOrdenacion = " ORDER BY FechaActualizacion DESC";
			$_SESSION['ordenarFecha_carrera'] = "down";
		}				
	}		
	else if(isset($_GET['ordenarHora']))
	{
		if(isset($_SESSION['ordenarHora_carrera'])) $ordenarHora=$_SESSION['ordenarHora_carrera'];
	
		
		
		if($ordenarHora=="" || $ordenarHora=="down")
		{
			
			$ordenarHora="up";
			$mensajeOrdenacion = " ORDER BY HoraActualizacion ASC";
			$_SESSION['ordenarHora_carrera'] = "up";
		}
		else if($ordenarHora == "up") 
		{
			
			$ordenarHora = "down";
			$mensajeOrdenacion = " ORDER BY HoraActualizacion DESC";
			$_SESSION['ordenarHora_carrera'] = "down";
		}				
	}
	else if(isset($_GET['ordenarMinutos']))
	{
		if(isset($_SESSION['ordenarMinutos_carrera'])) $ordenarMinutos=$_SESSION['ordenarMinutos_carrera'];
	
		
		
		if($ordenarMinutos=="" || $ordenarMinutos=="down")
		{
			
			$ordenarMinutos="up";
			$mensajeOrdenacion = " ORDER BY Minutos ASC";
			$_SESSION['ordenarMinutos_carrera'] = "up";
		}
		else if($ordenarMinutos == "up") 
		{
			
			$ordenarMinutos = "down";
			$mensajeOrdenacion = " ORDER BY Minutos DESC";
			$_SESSION['ordenarMinutos_carrera'] = "down";
		}				
	}		
	else if(isset($_GET['ordenarDistancia']))
	{
		if(isset($_SESSION['ordenarDistancia_carrera'])) $ordenarDistancia=$_SESSION['ordenarDistancia_carrera'];
	
		
		
		if($ordenarDistancia=="" || $ordenarDistancia=="down")
		{
			
			$ordenarDistancia="up";
			$mensajeOrdenacion = " ORDER BY Distancia ASC";
			$_SESSION['ordenarDistancia_carrera'] = "up";
		}
		else if($ordenarDistancia == "up") 
		{
			
			$ordenarDistancia = "down";
			$mensajeOrdenacion = " ORDER BY Distancia DESC";
			$_SESSION['ordenarDistancia_carrera'] = "down";
		}				
	}		
	//############### ORDENACIÓN #####################	
	else //ACABARÉ DE ENTRAR EN LA PÁGINA.... LUEGO RESETEO..
	{
		unset($_SESSION['paginaActual']); //Destruye la variable de sesion || ENTRO EN LA PAGINA!
		unset($_SESSION['lineaCarrera']);
		unset($_SESSION['fecha']);

	}
	
	
	
	
	 if(isset($_SESSION['lineaCarrera']))
	   {
		   $getLinea = " AND idLinea=".$_SESSION['lineaCarrera'];
		   $lineaAncla = $_SESSION['lineaCarrera'];
	   }
	   
	   if(isset($_SESSION['fecha'])) $getFecha = $_SESSION['fecha'];
	
	
}
    
	//################################# prueba
	$consulta = "SELECT * FROM `CARRERA` WHERE 1 ".$getLinea." ".$getFecha." ".$mensajeOrdenacion." "."LIMIT 0 , 100";
	
	//################################# prueba

    




     
         
	 
    if($busquedaFallida == 'NO')	 
	{
		$objetoPaginar = new paginar($connection, $consulta);

		//$query = paginar($connection, $consulta);
		$query = $objetoPaginar->getQuery();
		$cadena = $objetoPaginar->getCadena();
		$numero_registros = $objetoPaginar->getNRegistros();
	}
    
	
	
	
  ;
	
?>       
      

<div class="cabecera"><img src="../../css/imagenes/flecha_izquierda.png" title="Regrese" onclick="regresar()" style="position:relative; cursor: pointer" /> </div>
	  
<div class="formulario">	 
<form name="filtro" action="<?php echo "showCarrera.php"; ?>" method="POST" >
<b>Líneas a filtrar: </b>&nbsp;&nbsp;
&nbsp;
&nbsp;
&nbsp;

<select name="lineaCarrera" >
<option value="TODAS">Todas</option> 
<?php 


    $consult = "select Distinct idLinea from CARRERA ORDER BY idLinea";
    $datos = mysql_query($consult,$connection);
    
    while($l = mysql_fetch_assoc($datos))
    { 
        ?><option value="<?php echo $l['idLinea']?>" <?php if($lineaAncla == $l['idLinea']) echo 'SELECTED'?>><?php echo $l['idLinea'] ?></option> <?php
        
    }
?>        

<input type="submit" name="enviar" value="Filtrar">
</select>




</form>  

<form name="filtro" action="<?php echo "showCarrera.php"; ?>" method="POST" >
	<b>Búsqueda por fecha:</b> <input type="text" id="datepicker" name="fecha">
	<input type="submit" name="enviar" value="Filtrar">
</form>
      
</div>
 
   <div class="posicionTabla">        
 <table id="miTabla" class="customers" summary ="Esta tabla contiene las lineas de las carreras de la red de autobuses de Gijón">
<caption><br /><br />
<br />
</caption>
<thead>
	<tr>
      
      <th scope="col" width="80" style="cursor:pointer" onclick="ordenar_autobus()" title="Click para ordenar autobus!">Autobus</th>
      
      <th scope="col"width="75" style="cursor:pointer" onclick="ordenar_parada()" title="Click para ordenar Parada!">Parada</th>
      <th scope="col" width="65" style="cursor:pointer" onclick="ordenar_linea()" title="Click para ordenar línea!">Línea</th>
      <th scope="col" width="90" style="cursor:pointer" onclick="ordenar_trayecto()" title="Click para ordenar Trayecto!">Trayecto</th>
      
      <th scope="col" width="90" style="cursor:pointer" onclick="ordenar_fecha()" title="Click para ordenar Fecha!">Fecha</th>
      <th scope="col" width="70" style="cursor:pointer" onclick="ordenar_hora()" title="Click para ordenar Hora!">Hora</th>
      
      <th scope="col" width="80" style="cursor:pointer" onclick="ordenar_minutos()" title="Click para ordenar Minutos!">Minutos</th>
      <th scope="col" width="95" style="cursor:pointer" onclick="ordenar_distancia()" title="Click para ordenar Distancia!">Distancia</th>		
	</tr>
</thead>
<?php  if($busquedaFallida=='NO'){ ?>
<tbody><?php while($fila = mysql_fetch_assoc($query)){ ?>
	<tr > <?php
	
			 $a = $fila['idLoc'];
			 $b = $fila['idAutobus'];					 
	         $e = $fila['idParada'];
			 $f = $fila['idLinea'];
			 $g = $fila['idTrayecto'];					 
			 $c = $fila['FechaActualizacion'];
			 $d = $fila['HoraActualizacion'];			
			 $h = $fila['Minutos'];
			 $i = $fila['Distancia'];
	      ?>
      
	  
	  <td class="puntero" onclick="capturarAutobus(<?=$b?>)" title="Pulse para ver el bus!"><?php echo $b ?></td>
      <td class="puntero" onclick="capturarParada(<?=$e?>)" title="Pulse para ver la parada!"><?php echo $e ?></td> 
      <td class="puntero" onclick="capturarLinea(<?=$f?>)" title="Pulse para ver la línea!"><?php echo $f ?></td> 
      <td class="puntero" onclick="capturarTrayecto(<?=$g?>)" title="Pulse para ver el trayecto!"><?php echo $g ?></td> 
      <td><?php echo $c ?></td> 
      <td><?php echo $d ?></td> 
      <td><?php echo $h ?></td> 
      <td><?php echo $i ?></td> 
	</tr><?php  } ?>
	
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
<div class="texto"><?php echo "Numero de carreras: ".$numero_registros;?></div>
<?php mysql_close();?>
  
</div>      
        
  
        
    </body>
</html>
