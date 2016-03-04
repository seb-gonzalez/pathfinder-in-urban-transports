
<!DOCTYPE html>
<?php session_start(); ?>
<html>
    <head>

  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />      

        <link href="../../css/paginacion.css" type="text/css" rel="stylesheet">
        <link href="../../css/tablaStyle.css" type="text/css" rel="stylesheet">

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
       
        <title></title>
        
   <script type="text/javascript">


       
        

		
	$(document).ready(function(){
		
		$("#busqueda_lineas").autocomplete("../buscar_autocompletar_lineas.php", {

			width: 285,
			matchContains: true,
			selectFirst: false
			});
	});
				
	$(document).ready(function() 
	{ 
		$("#miTabla")
		.tablesorter({   widgets: ['zebra'], headers: {0:{sorter: false },1:{sorter: false },2:{sorter: false }}     } );  


	} 
	); 



        
         

 


function capturar(idLinea)
{
   
    location.href="showParadas.php?infoLinea="+idLinea;
}

 function regresar()
 {
     location.href="../../index.php";
 }
 
 
function ordenar_linea()
{
    
    location.href="showLineas.php?ordenarLinea";
}


function ordenar_descripcion()
{
    location.href="showLineas.php?ordenarDescripcion";
}


function probando(evt) 
{
		
	 var charCode = (evt.which) ? evt.which : event.keyCode
	if(charCode == "13"){
	document.filtro_busqueda.submit();}
	return true;
}
</script>        

        <style type="text/css">
		
		
@media screen and (min-device-width: 480px)
{

    div.posicionTabla
	{
			position:absolute;
			left:275px;
			top:5px;
			width:1000px;
			height:600px;
			z-index:1;
	}
	
	
		div.paginado{
		position:absolute;
		left:200px;
		top:650px;
		width:582px;
		height:135px;
		z-index:1;
	}

	div.texto {
		position:absolute;
		left:210px;
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
		left:275px;
		top:35px;
		width:550px;
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
	width: 560px;
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
			top:10px;
			width:1000px;
			height:600px;
			z-index:1;
	}
		div.paginado{
		position:absolute;
		left:120px;
		top:580px;
		width:582px;
		height:135px;
		z-index:1;
	}

	div.texto {
		position:absolute;
		left:120px;
		top:610px;
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
		width:300px;
		height:74px;
		z-index:3;
	}

}		



td.puntero 
{
    cursor: pointer;
}
        </style>





    </head>
    <body>

        

 <?php

    $connection = get_db_conn();	
    //session_start();
	
    $ordenarLinea = "";    
    $ordenarDescripcion = "";
    $mensajeOrdenacion = " ORDER BY idLinea";	//Defecto
	$getBusquedaLineas ="";
	$busquedaFallida = 'NO';
	$externa = "";
	
    $numero_registros = 0;
    $query = null;       
    $cadena = "";
	$ancla= "";
	$getTipo = "";
	$getLinea = "";


if($_SERVER['REQUEST_METHOD']=='POST')
{
	
	if(isset($_POST['tipo']))
	{
	    $getTipo = $_POST['tipo'];
		
            if($getTipo == "TODOS")
            {
                $getTipo = "";
                $ancla="TODOS";
            }
            else
            {
                $_SESSION['tipo'] = $getTipo;
                $getTipo = " AND Tipo='".$getTipo."'";

                $ancla=$_POST['tipo'];
            }	

            unset($_SESSION['paginaActual']); //Destruye la variable de sesion 
		
	}
	else if(isset($_POST['ver_todo']))
	{
	       $getBusquedaLineas = "";
              unset($_SESSION['tipo']);
            
	}	
	else if(isset($_POST['search']))
	{
		 //echo "HE RECIBIDO VALOR? : ".$_POST['search'];
		$getBusquedaLineas = $_POST['search'];
		
        
			
		//Antes hemos de ver si realmente existe la linea descripcion....
		$consult = "SELECT * FROM `LINEAS` WHERE Descripcion= '".$getBusquedaLineas."'";		
		$queryVer = mysql_query($consult,$connection);
        $num_rows = mysql_num_rows($queryVer);
	
        if($num_rows == 0) //Estaremos ante una consulta erronea con ningún resultado...
        {
            $busquedaFallida = 'SI';
			$getBusquedaLineas = "";
        }
		else
		{
			$getBusquedaLineas = " AND Descripcion = '".$getBusquedaLineas."'";
			$_SESSION['busquedaLineas'] = $getBusquedaLineas;
		}
		//***************************************************
	}
        else if(isset($_POST['lineas']))
        {
             $getLinea = " AND idLinea=".$_POST['lineas'];
        }

	
	
	if(isset($_SESSION['tipo'])) 
	{
		
		$ancla = $_SESSION['tipo'];
		$getTipo = " AND Tipo='".$ancla."'";
	}
	
	
}
else if($_SERVER['REQUEST_METHOD']=='GET')	
{
    
    
    if(isset($_GET['page']))
    {  

          //Almaceno la pagina actual del paginador!   
          $_SESSION['paginaActual'] = $_GET['page'];
	    
    }
    else if(isset($_GET['localizacion-lineas']))
    {
            $getLinea = $_GET['localizacion-lineas'];
    }
    else if(isset($_GET['trayectos-lineas']))
    {
        $getLinea = $_GET['trayectos-lineas'];
    }
    else if(isset($_GET['tramos-lineas']))
    {
        $getLinea = $_GET['tramos-lineas'];
    }
    else if(isset($_GET['carrera-linea']))
    {
        $getLinea = $_GET['carrera-linea'];
    }
    else if(isset($_GET['ordenarLinea'])) //ORDENACION!!!!!!!!!!!!!!!!
    {
        
        
        if(isset($_SESSION['ordenarLinea'])) $ordenarLinea=$_SESSION['ordenarLinea'];
        
        if(isset($_SESSION['tipo'])) $getTipo = $_SESSION['tipo'];
        
        if($ordenarLinea=="" || $ordenarLinea=="down")
        {
            
            $ordenarLinea="up";
            $mensajeOrdenacion = " ORDER BY idLinea ASC";
            $_SESSION['ordenarLinea'] = "up";
        }
        else if($ordenarLinea == "up") 
        {
            
            $ordenarLinea = "down";
            $mensajeOrdenacion = " ORDER BY idLinea DESC";
            $_SESSION['ordenarLinea'] = "down";
        }
        
    }    
    else if( isset($_GET['ordenarDescripcion']))
    {
        if(isset($_SESSION['ordenarDescripcion'])) $ordenarDescripcion=$_SESSION['ordenarDescripcion'];
        
        if(isset($_SESSION['tipo'])) $getTipo = $_SESSION['tipo'];
        
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
    else
    {  $_SESSION = array(); //Elimina las variables de sesion
    } 

	
	if(isset($_SESSION['tipo'])) 
	{
		
		$ancla = $_SESSION['tipo'];
		$getTipo = " AND Tipo='".$ancla."'";
	}
	
	if($getLinea != "")
	{
	    $getLinea = " AND idLinea=".$getLinea;	
		$externa = "ok";
	}
	
}
	

	//########################################
	$consulta = "SELECT * FROM `LINEAS` INNER JOIN `tipoLINEAS` USING(idtipolinea) WHERE 1 ".$getTipo." ".$getLinea." ".$getBusquedaLineas." ".$mensajeOrdenacion;
	//echo "<br> $consulta";
	//echo "<br>busqueda fallida? ".$busquedaFallida;
	//########################################
	
	

	
	
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
 <form name="filtro" action="<?php echo "showLineas.php"; ?>" method="POST" >
    <b>Tipo de lineas: </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <select name="tipo" >
     <option value="TODOS" >Todos</option>
     <option value="NORMAL" <?php if ($ancla =='NORMAL') echo 'SELECTED'?>>Normal</option>
     <option value="ESPECIAL" <?php if ($ancla =='ESPECIAL') echo 'SELECTED'?>> Especial</option>
     <input type="submit" name="enviar" value="Filtrar">
   </select>
    
 </form>
 
<form  name="filtro_busqueda" action="<?php echo "showLineas.php"; ?>" method="POST" >
	<b>Descripción a buscar: </b><input style="width:285px; border:#000000 solid 1px;" type="text" onkeypress="probando(event)" name="search" value="" id="busqueda_lineas" placeholder="Búsqueda" autofocus />
	<input type="submit" name="ver_todo"  value="Ver todo" <?php if($getBusquedaLineas != "" || $busquedaFallida=="SI" || $externa=="ok") echo 'enabled=\"enabled\"'; else echo 'disabled=\"disabled\"'?> > 	
</form>
                	
			
			
 </div>      
        
    
 
 
			


<div class="posicionTabla"> 
  <table id="miTabla" class="customers" summary ="Esta tabla contiene las lineas de la red de autobuses de Gijón">
<caption>
<br>
<br>
<br>
<br />
</caption>
<thead>
	<tr>
		<th  style="cursor:pointer" onclick="ordenar_linea()" title="click para ordenar linea!" scope="col" width="75" >Linea</th>
		<th  scope="col" width="75">Tipo</th>
		<th  style="cursor:pointer" onclick="ordenar_descripcion()" title="click para ordenar Descripción!" scope="col" width="400">Descripción</th>				
	</tr>
</thead>
<?php  if($busquedaFallida=='NO'){ ?>
<tbody><?php while($fila = mysql_fetch_assoc($query)){ ?>
	<tr> 
         <td><?php
	     
		 $primera = $fila['idLinea'];
		 $segunda = $fila['Tipo'];
		 $tercera = $fila['Descripcion'];
		 
		 
		 echo $primera.'<br>'; ?></td>
		 <td><?php echo $segunda.'<br>'; ?></td>
    <td class="puntero" onclick="capturar( <?php echo $primera;?> )" title="Pulse para ver paradas por las que pasa esta línea!"  ><?php echo $tercera.'<br>'; ?></td> 
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
 
<div class="paginado">
        <?php echo $cadena;?>
</div>            
<div class="texto" ><?php echo "Numero de lineas: ".$numero_registros;?></div>
<?php mysql_close();?>
  
</div>
        
        
        
        
    </body>
</html>
