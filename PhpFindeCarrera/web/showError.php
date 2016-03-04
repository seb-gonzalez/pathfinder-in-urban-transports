
<!DOCTYPE html>
<?php session_start(); ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link href="css/paginacion.css" type="text/css" rel="stylesheet">
        <link href="css/tablaStyle.css" type="text/css" rel="stylesheet"> 
        
        <script type="text/javascript" src="jquery/js/jquery-1.6.2.js"></script>
       <script type="text/javascript" src="jquery/js/jquery.tablesorter.js"></script>
        <?php include('configuracionBD.php');
              include('paginar.php');
        ?>
        <script language="JavaScript" type="text/javascript">
		
		
		
            $(document).ready(function() 
            { 
                $("#miTabla")
                .tablesorter({   widgets: ['zebra'], headers: {0:{sorter: false },1:{sorter: false },2:{sorter: false },3:{sorter: false },4:{sorter: false }}     } );  


            } 
        ); 


 function regresar()
 {
               
		 location.href="index.php"
 }  
 
 
 function ordenar_id()
{
    
    location.href="showError.php?ordenarId";
}
function ordenar_fecha()
{
    
    location.href="showError.php?ordenarFecha";
}
function ordenar_hora()
{
    
    location.href="showError.php?ordenarHora";
}
function ordenar_tipo()
{
    
    location.href="showError.php?ordenarTipo";
}
function ordenar_descripcion()
{
    
    location.href="showError.php?ordenarDescripcion";
}
	
        </script>



        <style type="text/css">

     

		
	@media screen and (min-device-width: 480px)
	{

		div.posicionTabla
		{
			//	position:absolute;
				left:0px;
				top:5px;
				width:100%;
				height:600px;
				z-index:1;
		}
		
		
			div.paginado{
				position:absolute;
                left:520px;
                top:1030px;
                width:582px;
                height:135px;
                z-index:1;
		}

		div.texto {
                position:absolute;
                left:500px;
                top:1060px;
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
		position:absolute;
		left:0px;  
		top:1px;
		width: 1250px;
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
		
		position:absolute;
		left:0px;  
		top:1px;
		width: 990px;
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
				top:40px;
				width:1000px;
				height:600px;
				z-index:1;
		}
			div.paginado{
			position:absolute;
			left:220px;
			top:1330px;
			width:582px;
			height:135px;
			z-index:1;
		}

		div.texto {
			position:absolute;
			left:210px;
			top:1360px;
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



		

        </style>




        
        
        <title>Excepciones del servidor</title>
    </head>
    <body>
       
	   
	   

   <?php

    
    $connection = get_db_conn();	  
 
	 //Variables de ordenacion
	$ordenarId = "";    
    $ordenarFecha = "";
	$ordenarHora = "";
	$ordenarTipo = "";
	$ordenarDescripcion = "";
    $mensajeOrdenacion = " ORDER BY Fecha DESC, Hora DESC";	//Defecto	
	//Variables de ordenacio 
    
	if($_SERVER['REQUEST_METHOD']=='GET')	
	{
		if(isset($_GET['page']))
		{  

			  //Almaceno la pagina actual del paginador!   
			  $_SESSION['paginaActual'] = $_GET['page'];
			
		}	
		//################# ORDENACION
		else if(isset($_GET['ordenarId'])) //ORDENACION!!!!!!!!!!!!!!!!
		{
			
			
			if(isset($_SESSION['ordenarId'])) $ordenarId = $_SESSION['ordenarId'];
						
			if($ordenarId=="" || $ordenarId=="down")
			{
				
				$ordenarId="up";
				$mensajeOrdenacion = " ORDER BY idExcepcion ASC";
				$_SESSION['ordenarId'] = "up";
			}
			else if($ordenarId == "up") 
			{
				
				$ordenarId = "down";
				$mensajeOrdenacion = " ORDER BY idExcepcion DESC";
				$_SESSION['ordenarId'] = "down";
			}
			
		}
		else if(isset($_GET['ordenarFecha'])) //ORDENACION!!!!!!!!!!!!!!!!
		{
			
			
			if(isset($_SESSION['ordenarFecha'])) $ordenarFecha = $_SESSION['ordenarFecha'];
						
			if($ordenarFecha=="" || $ordenarFecha=="down")
			{
				
				$ordenarFecha="up";
				$mensajeOrdenacion = " ORDER BY Fecha ASC";
				$_SESSION['ordenarFecha'] = "up";
			}
			else if($ordenarFecha == "up") 
			{
				
				$ordenarFecha = "down";
				$mensajeOrdenacion = " ORDER BY Fecha DESC";
				$_SESSION['ordenarFecha'] = "down";
			}
			
		}		
		else if(isset($_GET['ordenarHora'])) //ORDENACION!!!!!!!!!!!!!!!!
		{
			
			
			if(isset($_SESSION['ordenarHora'])) $ordenarHora = $_SESSION['ordenarHora'];
						
			if($ordenarHora=="" || $ordenarHora=="down")
			{
				
				$ordenarHora="up";
				$mensajeOrdenacion = " ORDER BY Hora ASC";
				$_SESSION['ordenarHora'] = "up";
			}
			else if($ordenarHora == "up") 
			{
				
				$ordenarHora = "down";
				$mensajeOrdenacion = " ORDER BY Hora DESC";
				$_SESSION['ordenarHora'] = "down";
			}
			
		}		
		else if(isset($_GET['ordenarTipo'])) //ORDENACION!!!!!!!!!!!!!!!!
		{
			
			
			if(isset($_SESSION['ordenarTipo'])) $ordenarTipo = $_SESSION['ordenarTipo'];
						
			if($ordenarTipo=="" || $ordenarTipo=="down")
			{
				
				$ordenarTipo="up";
				$mensajeOrdenacion = " ORDER BY Tipo ASC";
				$_SESSION['ordenarTipo'] = "up";
			}
			else if($ordenarTipo == "up") 
			{
				
				$ordenarTipo = "down";
				$mensajeOrdenacion = " ORDER BY Tipo DESC";
				$_SESSION['ordenarTipo'] = "down";
			}
			
		}		
		else if(isset($_GET['ordenarDescripcion'])) //ORDENACION!!!!!!!!!!!!!!!!
		{
			
			
			if(isset($_SESSION['ordenarDescripcion'])) $ordenarDescripcion = $_SESSION['ordenarDescripcion'];
						
			if($ordenarDescripcion=="" || $ordenarDescripcion=="down")
			{
				
				$ordenarDescripcion="up";
				$mensajeOrdenacion = " ORDER BY Descripcion ASC";
				$_SESSION['ordenarDescripcion'] = "up";
			}
			else if($ordenarDescripcion == "up") 
			{
				
				$ordenarDescripcion = "down";
				$mensajeOrdenacion = " ORDER BY Descripcion DESC";
				$_SESSION['ordenarDescripcion'] = "down";
			}
			
		}		
		//################# ORDENACION
		else //ACABARÉ DE ENTRAR EN LA PÁGINA.... LUEGO RESETEO..
		{
			$_SESSION = array(); //Elimina las variables de sesion
		} 
	}
	
	
    $consulta = "SELECT * FROM `EXCEPCIONES` $mensajeOrdenacion";
    
    
    
     
    
    $objetoPaginar = new paginar($connection, $consulta);

    //$query = paginar($connection, $consulta);
    $query = $objetoPaginar->getQuery();
    $cadena = $objetoPaginar->getCadena();
    $numero_registros = $objetoPaginar->getNRegistros();
	
	
	

	
?>       
        
<div class="cabecera"><img src="css/imagenes/flecha_izquierda.png" title="Regrese" onclick="regresar()"  style="position:relative; cursor:pointer" /> </div>


    <div class="posicionTabla">      
        
<table id="miTabla" class="customers" summary ="Esta tabla contiene las excepciones provocadas por el servidor remoto">
<caption><br/><br />
</caption>
<thead>
	<tr>		
		<th scope="col" width="130" style="cursor:pointer" onclick="ordenar_id()" title="click para ordenar id!">idExcepción</th>
		<th scope="col" width="80" style="cursor:pointer" onclick="ordenar_fecha()" title="click para ordenar fecha!">Fecha</th>		
                <th scope="col" width="80" style="cursor:pointer" onclick="ordenar_hora()" title="click para ordenar hora!">Hora</th>
                <th scope="col" width="420" style="cursor:pointer" onclick="ordenar_tipo()" title="click para ordenar tipo!">Tipo</th>
                <th scope="col" width="500" style="cursor:pointer" onclick="ordenar_descripcion()" title="click para ordenar Excepcion!">Excepción</th>
	</tr>
</thead>

<tbody><?php while($fila = mysql_fetch_assoc($query)){ ?>
	<tr > 
         <td><?php
	     
         //Parada fuera ...........
		 $primera = $fila['idExcepcion'];
		 $segunda = $fila['Fecha'];
		 $tercera = $fila['Hora'];
                 $cuarta = $fila['Tipo'];
                 $quinta = $fila['Descripcion'];
                 
		 
		  echo $primera; ?></td>
    <td><?=$segunda?></td>
    <td><?=$tercera?></td>
    <td><?=$cuarta?></td>
    <td><?=$quinta?></td>

	</tr><?php  } ?>
	
</tbody>

</table>    
    </div>
        
 <div class="paginado">
        <?php echo $cadena;?>
</div>            
<div class="texto" ><?php echo "Numero de Excepciones: ".$numero_registros;?></div>
<?php mysql_close();?>
  
</div>      
        
        
        
    </body>
</html>
