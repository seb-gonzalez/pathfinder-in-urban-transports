<?php session_start();?>
<!DOCTYPE html>

<html>
    <head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
<link href="../../css/tablaStyle.css" type="text/css" rel="stylesheet">
<link href="../../css/paginacion.css" type="text/css" rel="stylesheet">


<script type="text/javascript" src="../../jquery/js/jquery-1.6.2.js"></script>
<script type="text/javascript" src="../../jquery/js/jquery.tablesorter.js"></script>


<script type="text/javascript" src="http://dev.jquery.com/view/trunk/plugins/autocomplete/lib/jquery.dimensions.js"></script>

<script type="text/javascript" src="../../jquery/js/jquery-ui-1.8.14.custom.min.js"></script> 
<link rel="stylesheet" href="../../css/jquery.autocomplete.css" type="text/css" /> 
<script type="text/javascript" src="../../jquery/js/jquery.bgiframe.min.js"></script>  
<script type="text/javascript" src="../../jquery/js/jquery.autocomplete.pack.js"></script>

        <?php include('../../configuracionBD.php');
              include('../../paginar.php');
        ?>
<script type="text/javascript">

function probando(evt) 
{
	var charCode = (evt.which) ? evt.which : event.keyCode
	if(charCode == "13"){
	document.filtro_busqueda.submit();}
	return true;
} 
 

	$(document).ready(function() 
	{ 
		$("#miTabla")
		.tablesorter({   widgets: ['zebra'], headers: {0:{sorter: false}, 1:{sorter: false },2:{sorter: false }}     } );  


	} 
	); 


function capturar(a, b, c)
{	 //alert("captura: "+a.toString()+" "+b+" "+c);        
        location.href="../../Geoposicionar.php?Latitud="+a+"&Longitud="+b+"&informacion="+c+"&info2=Usted esta viendo la posición de su autobús."
                +"&back=Consultas/Estaticas/showAutobus.php";
}


                $(document).ready(function(){
    
$("#busqueda_autobus").autocomplete("../buscar_autocompletar_autobuses.php", {
      width: 150,
      matchContains: true,
      selectFirst: false
    });


  });
  
	 function regresar()
	 {
		 location.href="../../index.php";
	 }  
	 
	function ordenar_modelo()
	{
		
		location.href="showAutobus.php?ordenarModelo";
	}		 

</script>  
        
        <style type="text/css">       






	@media screen and (min-device-width: 480px)
	{

		div.posicionTabla
		{
				position:absolute;
				left:370px;
				top:5px;
				width:1000px;
				height:600px;
				z-index:1;
		}
		
		
			div.paginado{
                position:absolute;
                left:460px;
                top:725px;
                width:582px;
                height:135px;
                z-index:1;
		}

		div.texto {
                position:absolute;
                left:490px;
                top:745px;
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
			left:370px;
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
		width: 480px;
		height: 15px;   
		
		background-color : #EEE;
			
			border-width : 6px;
		border-color : #EEE;
		border-style : solid;      
	}

		div.posicionTabla
		{
				position:absolute;
				left:50px;
				top:20px;
				width:1000px;
				height:600px;
				z-index:1;
		}
			div.paginado{
			position:absolute;
			left:130px;
			top:690px;
			width:582px;
			height:135px;
			z-index:1;
		}

		div.texto {
			position:absolute;
			left:140px;
			top:720px;
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
			left:55px;
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




        
        
        <title>Autobuses de la red de autobúses</title>
    </head>
    <body>
       
   <?php

    $connection = get_db_conn();	

	$getBus = "";
	
    $getBusquedaParadas = "";
    $busquedaFallida = 'NO';
    $consulta = "";
    $cadena = "";
    $numero_registros = 0;
    $query = null;
	
	$ordenarModelo = "";
	$mensajeOrdenacion = "ORDER BY Modelo"; //Por defecto

    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        if(isset($_POST['search']))
        {
             //echo "HE RECIBIDO VALOR? : ".$_POST['search'];
            $getBusquedaParadas = $_POST['search'];
               if(isset($_POST['ver_todo']))
        {
            
            $getBusquedaParadas="";
            unset($_SESSION['paginaActual']); //Destruye la variable de sesion 

        }
        }
        
    }
	else if($_SERVER['REQUEST_METHOD'] == 'GET')
	{      
 
		if(isset($_GET['page']))
		{
		 //Almaceno la pagina actual del paginador!   
		  $_SESSION['paginaActual'] = $_GET['page'];
		}
		else if(isset($_GET['carrera-autobus']))
		{
			$getBus = $_GET['carrera-autobus'];
			
		}
		else if(isset($_GET['ordenarModelo'])) //ORDENACION!!!
		{
	        if(isset($_SESSION['ordenarModelo'])) $ordenarModelo=$_SESSION['ordenarModelo'];
        
			
			
			if($ordenarModelo=="" || $ordenarModelo=="down")
			{
				
				$ordenarModelo="up";
				$mensajeOrdenacion = " ORDER BY Modelo ASC";
				$_SESSION['ordenarModelo'] = "up";
			}
			else if($ordenarModelo == "up") 
			{
				
				$ordenarModelo = "down";
				$mensajeOrdenacion = " ORDER BY Modelo DESC";
				$_SESSION['ordenarModelo'] = "down";
			}	
		}
		else //ACABARÉ DE ENTRAR EN LA PÁGINA.... LUEGO RESETEO..
		{
		 unset($_SESSION['paginaActual']); //Destruye la variable de sesion || ENTRO EN LA PAGINA!

		}
	}

    
	if($getBus != "")
	{
		$consulta = "SELECT * FROM `AUTOBUS`  WHERE idAutobus =".$getBus;
	}
    else if($getBusquedaParadas == "")
    {
       $consulta = "SELECT * FROM `AUTOBUS` $mensajeOrdenacion";
    }	
    else 
    {
        $consulta = "SELECT * FROM `AUTOBUS` WHERE Modelo = \"$getBusquedaParadas\"";

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
 
     <form id="filtro_busqueda" name="filtro_busqueda" action="<?php echo "showAutobus.php"?>" method="POST">
            <b>Modelo a buscar: </b><input style="width:150px; border:#000000 solid 1px;" type="text" onkeypress="probando(event)" name="search" value="" id="busqueda_autobus" placeholder="Búsqueda" autofocus />
            <input type="submit" name="ver_todo" id="resaltar" value="Ver todo" <?php if($getBusquedaParadas != "") echo 'enabled=\"enabled\"'; else echo 'disabled=\"disabled\"'?> > 
            
     </form>
 </div>   


    <div class="posicionTabla">      
        
<table id="miTabla" class="customers" summary ="Esta tabla contiene los autobuses de la red de autobuses de Gijón">
<caption><br/><br />
<br />
</caption>
<thead>
	<tr>      
      <th  style="cursor:pointer" onclick="ordenar_modelo()" title="Click para ordenar Modelo!" scope="col" width="170">Modelo</th>	
      <th scope="col" width="180">Ultima localización</th>	
	</tr>
</thead>
<?php  if($busquedaFallida=='NO'){ ?>
<tbody><?php while($fila = mysql_fetch_assoc($query)){ ?>
	<tr > 
         <td><?php
	     
		 $primera = $fila['idAutobus'];
		 $segunda = $fila['Matricula'];
		 $tercera = $fila['Modelo']; //Unicamente se mostrarÃ¡ el modelo
                 $consult = "SELECT Lat, Lng FROM POSICIONVIVA WHERE idAutobus=".$primera ;
                 $cuarta = mysql_query($consult, $connection);
		 $cuarta = mysql_fetch_array($cuarta);
		 //echo 'Consulta: '.$primera.' '.$segunda.' '.$tercera.'<br>';
		 echo $tercera ?></td>          
          <td class="puntero" onclick="capturar( <?php echo $cuarta['Lat'];?>,<?php echo $cuarta['Lng'];?>, <?php echo '\''."Autobús - ".$tercera.'\'';?> )" align="center"
        title="Localize su autobús en el mapa!">
        <img src="../../css/imagenes/ver_mapa2.png" width="14%"/></td>
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
<div class="texto" ><?php echo "Numero de autobuses: ".$numero_registros;?></div>
<?php mysql_close();?>
  
</div>      
        
        
        
    </body>
</html>
