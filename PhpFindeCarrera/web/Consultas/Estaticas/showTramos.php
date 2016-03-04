
<!DOCTYPE html>
<?php    session_start(); ?>
<html>
    <head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
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
    
$("#busqueda_paradas").autocomplete("../buscar_autocompletar.php", {
      width: 285,
      matchContains: true,
      selectFirst: false
    });


  });    
    
    
    
$(document).ready(function() 
    { 
        $("#miTabla")
        .tablesorter({widgets: ['zebra'], headers: {0:{sorter: false}, 1:{sorter: false },2:{sorter: false },3:{sorter: false }}});  
         

    } 
); 


function capturar(idParada)
{
  
    location.href="../Estaticas/showParadas.php?tramos-paradas="+idParada;
}

function capturar_linea(idLinea)
{
  
    location.href="../Estaticas/showLineas.php?tramos-lineas="+idLinea;
}
function capturar_trayecto(idTrayecto)
{
  
    location.href="../Estaticas/showTrayectos.php?tramos-trayectos="+idTrayecto;
}



function probando(evt) {
        
        var charCode = (evt.which) ? evt.which : event.keyCode
if(charCode == "13"){
document.filtro_busqueda.submit();}
return true;
} 

	 function regresar()
	 {
		 location.href="../../index.php";
	 }
	 
	function ordenar_linea()
	{
		
		location.href="showTramos.php?ordenarLinea";
	} 
	function ordenar_trayecto()
	{
		
		location.href="showTramos.php?ordenarTrayecto";
	} 

	function ordenar_orden()
	{
		
		location.href="showTramos.php?ordenarOrden";
	} 

	function ordenar_parada()
	{
		
		location.href="showTramos.php?ordenarParada";
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
			left:380px;
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
			width:370px;
			height:74px;
			z-index:3;;
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
		width: 700px;
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
			left:120px;
			top:630px;
			width:582px;
			height:135px;
			z-index:1;
		}

		div.texto {
			position:absolute;
			left:180px;
			top:660px;
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




        
        
        <title>Tramos de la red de autobÃºses</title>
    </head>
    <body>
       
   <?php


   
   $getBusquedaParadas = "";
   $busquedaFallida = 'NO';
   $cadena = "";
   $numero_registros = 0;
   
   
    //Variables de ordenacion
	$ordenarLinea="";
	$ordenarTrayecto="";
	$ordenarOrden="";
	$ordenarParada="";	
	$mensajeOrdenacion = "ORDER BY Descripcion"; //Por defecto
	//Variables de ordenacion
   
   
    
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        if(isset($_POST['search']))
        {
             //echo "HE RECIBIDO VALOR? : ".$_POST['search'];
            $getBusquedaParadas = $_POST['search'];
			$_SESSION['busquedaParadas'] = $getBusquedaParadas;

                 if(isset($_POST['ver_todo']))
        {
            
            $getBusquedaParadas="";
            unset($_SESSION['paginaActual']); //Destruye la variable de sesion 

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
        else if(isset($_GET['page']) && isset($_SESSION['busquedaParadas']))
        {
            $getBusquedaParadas = $_SESSION['busquedaParadas'];
            
        }
		//###### ORDENACIÓN ###################################
		else if(isset($_GET['ordenarLinea']))
		{
			if(isset($_SESSION['ordenarLinea_tramos'])) $ordenarLinea=$_SESSION['ordenarLinea_tramos'];
        
			
			
			if($ordenarLinea=="" || $ordenarLinea=="down")
			{
				
				$ordenarLinea="up";
				$mensajeOrdenacion = " ORDER BY idLinea ASC";
				$_SESSION['ordenarLinea_tramos'] = "up";
			}
			else if($ordenarLinea == "up") 
			{
				
				$ordenarLinea = "down";
				$mensajeOrdenacion = " ORDER BY idLinea DESC";
				$_SESSION['ordenarLinea_tramos'] = "down";
			}
		}
		else if(isset($_GET['ordenarTrayecto']))
		{
			if(isset($_SESSION['ordenarTrayecto_tramos'])) $ordenarTrayecto=$_SESSION['ordenarTrayecto_tramos'];
        
			
			
			if($ordenarTrayecto=="" || $ordenarTrayecto=="down")
			{
				
				$ordenarTrayecto="up";
				$mensajeOrdenacion = " ORDER BY idTrayecto ASC";
				$_SESSION['ordenarTrayecto_tramos'] = "up";
			}
			else if($ordenarTrayecto == "up") 
			{
				
				$ordenarTrayecto = "down";
				$mensajeOrdenacion = " ORDER BY idTrayecto DESC";
				$_SESSION['ordenarTrayecto_tramos'] = "down";
			}		
		}
		else if(isset($_GET['ordenarOrden']))
		{
			if(isset($_SESSION['ordenarOrden_tramos'])) $ordenarOrden=$_SESSION['ordenarOrden_tramos'];
        
			
			
			if($ordenarOrden =="" || $ordenarOrden=="down")
			{
				
				$ordenarOrden="up";
				$mensajeOrdenacion = " ORDER BY Orden ASC";
				$_SESSION['ordenarOrden_tramos'] = "up";
			}
			else if($ordenarOrden == "up") 
			{
				
				$ordenarOrden = "down";
				$mensajeOrdenacion = " ORDER BY Orden DESC";
				$_SESSION['ordenarOrden_tramos'] = "down";
			}				
		}
		else if(isset($_GET['ordenarParada']))
		{
			if(isset($_SESSION['ordenarParada_tramos'])) $ordenarParada = $_SESSION['ordenarParada_tramos'];
        
			
			
			if($ordenarParada == "" || $ordenarParada =="down")
			{
				
				$ordenarParada="up";
				$mensajeOrdenacion = " ORDER BY idParada ASC";
				$_SESSION['ordenarParada_tramos'] = "up";
			}
			else if($ordenarParada == "up") 
			{
				
				$ordenarParada = "down";
				$mensajeOrdenacion = " ORDER BY idParada DESC";
				$_SESSION['ordenarParada_tramos'] = "down";
			}				
		}
		//###### ORDENACIÓN ###################################
		else //ACABARÉ DE ENTRAR EN LA PÁGINA.... LUEGO RESETEO..
        {
		 unset($_SESSION['paginaActual']); //Destruye la variable de sesion || ENTRO EN LA PAGINA!
	    }
    }
   
    $connection = get_db_conn();
    $consulta = "";
    
    if($getBusquedaParadas == "")
    {
        $consulta = "SELECT * FROM `TRAMOS` $mensajeOrdenacion";
    }
    else
    {
        $consulta = "SELECT * FROM `TRAMOS` WHERE Descripcion = \"$getBusquedaParadas\"";
        
        $query = mysql_query($consulta,$connection);
        $num_rows = mysql_num_rows($query);
	
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
 
     <form id="filtro_busqueda" name="filtro_busqueda" action="<?php echo "showTramos.php"?>" method="POST">
            <b>Inserte la parada a buscar: </b><input style="width:285px; border:#000000 solid 1px;" type="text" onkeypress="probando(event)" name="search" value="" id="busqueda_paradas" placeholder="Búsqueda" autofocus />
            <input type="submit" name="ver_todo" id="resaltar" value="Ver todo" <?php if($getBusquedaParadas != "") echo 'enabled=\"enabled\"'; else echo 'disabled=\"disabled\"'?> > 
     </form>
 </div>        
        

    <div class="posicionTabla">      
        
<table id="miTabla" class="customers" summary ="Esta tabla contiene los tramos de la red de autobuses de GijÃ³n">
<caption><br /><br />
<br />
</caption>
<thead>
	<tr>      
      <th scope="col" width="75" style="cursor:pointer" onclick="ordenar_linea()" title="Click para ordenar línea!">Línea</th>
      <th scope="col" width="90" style="cursor:pointer" onclick="ordenar_trayecto()" title="Click para ordenar trayecto!">Trayecto</th>
      <th scope="col" width="90" style="cursor:pointer" onclick="ordenar_orden()" title="Click para ordenar orden!">Orden</th>
      <th scope="col" width="400" style="cursor:pointer" onclick="ordenar_parada()" title="Click para ordenar parada!">Parada</th>	<!-- Aunque descripciÃ³n sea redundante -->
	</tr>
</thead>

<?php  if($busquedaFallida=='NO'){ ?>
<tbody><?php while($fila = mysql_fetch_assoc($query)){ ?>
	<tr > 
            <?php $primera = $fila['idParada'];
		 $segunda = $fila['idLinea'];
		 $tercera = $fila['idTrayecto'];
		 $cuarta = $fila['Descripcion'];
                 $quinta = $fila['Orden'];?>
            
         <td class="puntero" onclick="capturar_linea( <?=$segunda?> )" title="Pulse para ver más información sobre la linea!">
             <?php echo $segunda ?></td>
         <td class="puntero" onclick="capturar_trayecto( <?=$tercera?> )" title="Pulse para ver más información sobre el trayecto!">
             <?php echo $tercera ?></td> 
      <td><?php echo $quinta ?></td>       
      <td class="puntero" onclick="capturar( <?=$primera?> )" title="Pulse para ver más información sobre la parada!"  ><?php echo $cuarta ?></td> 
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
<div class="texto" ><?php echo "Numero de tramos: ".$numero_registros;?></div>
<?php mysql_close();?>
  
</div>      
        
        
        
    </body>
</html>
