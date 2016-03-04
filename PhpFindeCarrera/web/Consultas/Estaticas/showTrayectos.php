
<!DOCTYPE html>
<?php session_start(); ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
        <link href="../../css/paginacion.css" type="text/css" rel="stylesheet">
        <link href="../../css/tablaStyle.css" type="text/css" rel="stylesheet"> 
        
        <script type="text/javascript" src="../../jquery/js/jquery-1.6.2.js"></script>
       <script type="text/javascript" src="../../jquery/js/jquery.tablesorter.js"></script>
       
       
 

<script type="text/javascript" src="../../jquery/js/jquery-ui-1.8.14.custom.min.js"></script> 
<link rel="stylesheet" href="../../css/jquery.autocomplete.css" type="text/css" /> 
  <script type="text/javascript" src="../../jquery/js/jquery.bgiframe.min.js"></script>  
  <script type="text/javascript" src="../../jquery/js/jquery.autocomplete.pack.js"></script>       
        <?php include('../../configuracionBD.php');
              include('../../paginar.php');
              
        ?>
        <script language="JavaScript" type="text/javascript">
            
            
                            $(document).ready(function(){
    
$("#busqueda_trayectos").autocomplete("../buscar_autocompletar_trayectos.php", {
      width: 400,
      matchContains: true,
      selectFirst: false
    });


  });   
            
            $(document).ready(function() 
            { 
                $("#miTabla")
                .tablesorter({   widgets: ['zebra'], headers: {0:{sorter: false}, 1:{sorter: false },2:{sorter: false },3:{sorter: false }, 4:{sorter: false}}     } );  


            } 
        ); 
            
        function capturar(idLinea)
        {

            location.href="showLineas.php?trayectos-lineas="+idLinea;
        }
        
        function capturar2(idParada)
        {

            location.href="showParadas.php?trayectos-paradas="+idParada;
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
		
		location.href="showTrayectos.php?ordenarLinea";
	} 

	function ordenar_origen()
	{
		
		location.href="showTrayectos.php?ordenarOrigen";
	} 
	
	function ordenar_destino()
	{
		
		location.href="showTrayectos.php?ordenarDestino";
	} 

	function ordenar_sentido()
	{
		
		location.href="showTrayectos.php?ordenarSentido";
	} 
	
	function ordenar_descripcion()
	{
		
		location.href="showTrayectos.php?ordenarDescripcion";
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
			left:400px;
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
		width: 725px;
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
			top:610px;
			width:582px;
			height:135px;
			z-index:1;
		}

		div.texto {
			position:absolute;
			left:180px;
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




        
        
        <title>Trayectos de la red de autobúses</title>
    </head>
    <body>
       
   <?php
   
   $connection = get_db_conn();
   $getBusquedaTrayectos = "";
   $verTodo = "";
   $busquedaFallida = 'NO';
   $cadena = "";
   $numero_registros = 0;
    
    //Variables de ordenacion
	$ordenarLinea="";
	$ordenarOrigen="";
	$ordenarDestino="";
	$ordenarSentido="";
	$ordenarDescripcion="";
	$mensajeOrdenacion = "ORDER BY idLinea ASC"; //Por defecto
	//Variables de ordenacion
    
    
   
    $getTrayecto=''; 
    
   
    if($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        if(isset($_GET['page']))
        {
           //Almaceno la pagina actual del paginador!   
            $_SESSION['paginaActual'] = $_GET['page'];
        }
        else if(isset($_GET['tramos-trayectos']))
        {
            $getTrayecto = $_GET['tramos-trayectos'];
			$_SESSION['getTrayecto'] = $getTrayecto;
        }
        else if(isset($_GET['carrera-trayecto']))
        {
            $getTrayecto = $_GET['carrera-trayecto'];
			$_SESSION['getTrayecto'] = $getTrayecto;
			
        }		
		//*************** ORDENACION
		else if(isset($_GET['ordenarLinea']))
		{
			if(isset($_SESSION['ordenarLinea_trayectos'])) $ordenarLinea=$_SESSION['ordenarLinea_trayectos'];
        
			
			
			if($ordenarLinea=="" || $ordenarLinea=="down")
			{
				
				$ordenarLinea="up";
				$mensajeOrdenacion = " ORDER BY idLinea ASC";
				$_SESSION['ordenarLinea_trayectos'] = "up";
			}
			else if($ordenarLinea == "up") 
			{
				
				$ordenarLinea = "down";
				$mensajeOrdenacion = " ORDER BY idLinea DESC";
				$_SESSION['ordenarLinea_trayectos'] = "down";
			}
		}
		else if(isset($_GET['ordenarOrigen']))
		{
			if(isset($_SESSION['ordenarOrigen_trayectos'])) $ordenarOrigen=$_SESSION['ordenarOrigen_trayectos'];
        
			
			
			if($ordenarOrigen=="" || $ordenarOrigen=="down")
			{
				
				$ordenarOrigen="up";
				$mensajeOrdenacion = " ORDER BY idOrigenParada ASC";
				$_SESSION['ordenarOrigen_trayectos'] = "up";
			}
			else if($ordenarOrigen == "up") 
			{
				
				$ordenarOrigen = "down";
				$mensajeOrdenacion = " ORDER BY idOrigenParada DESC";
				$_SESSION['ordenarOrigen_trayectos'] = "down";
			}		
		}
		else if(isset($_GET['ordenarDestino']))
		{
			if(isset($_SESSION['ordenarDestino_trayectos'])) $ordenarDestino=$_SESSION['ordenarDestino_trayectos'];
        
			
			
			if($ordenarDestino=="" || $ordenarDestino=="down")
			{
				
				$ordenarDestino="up";
				$mensajeOrdenacion = " ORDER BY idDestinoParada ASC";
				$_SESSION['ordenarDestino_trayectos'] = "up";
			}
			else if($ordenarDestino == "up") 
			{
				
				$ordenarDestino = "down";
				$mensajeOrdenacion = " ORDER BY idDestinoParada DESC";
				$_SESSION['ordenarDestino_trayectos'] = "down";
			}				
		}
		else if(isset($_GET['ordenarSentido']))
		{
			if(isset($_SESSION['ordenarSentido_trayectos'])) $ordenarSentido=$_SESSION['ordenarSentido_trayectos'];
        
			
			
			if($ordenarSentido=="" || $ordenarSentido=="down")
			{
				
				$ordenarSentido="up";
				$mensajeOrdenacion = " ORDER BY Sentido ASC";
				$_SESSION['ordenarSentido_trayectos'] = "up";
			}
			else if($ordenarSentido == "up") 
			{
				
				$ordenarSentido = "down";
				$mensajeOrdenacion = " ORDER BY Sentido DESC";
				$_SESSION['ordenarSentido_trayectos'] = "down";
			}				
		}
		else if(isset($_GET['ordenarDescripcion']))
		{
			if(isset($_SESSION['ordenarDescripcion_trayectos'])) $ordenarDescripcion=$_SESSION['ordenarDescripcion_trayectos'];
        
			
			
			if($ordenarDescripcion=="" || $ordenarDescripcion=="down")
			{
				
				$ordenarDescripcion="up";
				$mensajeOrdenacion = " ORDER BY Descripcion ASC";
				$_SESSION['ordenarDescripcion_trayectos'] = "up";
			}
			else if($ordenarDescripcion == "up") 
			{
				
				$ordenarDescripcion = "down";
				$mensajeOrdenacion = " ORDER BY Descripcion DESC";
				$_SESSION['ordenarDescripcion_trayectos'] = "down";
			}				
		}
		//*************** ORDENACION
		else //ACABARÉ DE ENTRAR EN LA PÁGINA.... LUEGO RESETEO..
		{
		 unset($_SESSION['paginaActual']); //Destruye la variable de sesion || ENTRO EN LA PAGINA!
		 unset($_SESSION['getTrayecto']);
		 unset($_SESSION['busquedaTrayecto']);

		}
		
		
				
		if(isset($_SESSION['getTrayecto']))
		{
			$getTrayecto = $_SESSION['getTrayecto'];
		}
		else if(isset($_SESSION['busquedaTrayecto']))
		{
			$getBusquedaTrayectos = $_SESSION['busquedaTrayecto'];
		}
		

		
		
    }
    else if($_SERVER['REQUEST_METHOD']=='POST')
    {
        if(isset($_POST['search']))
        {
             //echo "HE RECIBIDO VALOR? : ".$_POST['search'];
            unset($_SESSION['getTrayecto']);
            $getBusquedaTrayectos = $_POST['search'];
			$_SESSION['busquedaTrayecto'] = $getBusquedaTrayectos;
			
            if(isset($_POST['ver_todo']))
            {
            
				$getBusquedaParadas="";
				unset($_SESSION['paginaActual']); //Destruye la variable de sesion 

           } 
        }
        else if(isset($_POST['ver_todo']))
        {
            $getBusquedaParadas="";
			unset($_SESSION['getTrayecto']);
			unset($_SESSION['busquedaTrayecto']);
        }
        
    }
   
    
    if($getTrayecto != '')
    {
        $consulta ="SELECT * FROM `TRAYECTOS` a INNER JOIN `EXTREMOS` b ON (a.idextremos = b.idextremos)
            WHERE idTrayecto='".$getTrayecto."' ".$mensajeOrdenacion;
    }
    else if($getBusquedaTrayectos != "")
    {
        $consulta ="SELECT * FROM `TRAYECTOS` a INNER JOIN `EXTREMOS` b ON (a.idextremos = b.idextremos)
            WHERE Descripcion=\" $getBusquedaTrayectos\" ".$mensajeOrdenacion;
        
        //echo "<br>La consulta es: ".$consulta;
        $query = mysql_query($consulta,$connection);
        $num_rows = mysql_num_rows($query);
	
        if($num_rows == 0) //Estaremos ante una consulta erronea con ningÃºn resultado...
        {

            $busquedaFallida = 'SI';
        }
        
    }
    else
    {
        $consulta ="SELECT * FROM `TRAYECTOS` a INNER JOIN `EXTREMOS` b ON (a.idextremos = b.idextremos) $mensajeOrdenacion";
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
 
     <form id="filtro_busqueda" name="filtro_busqueda" action="<?php echo "showTrayectos.php"?>" method="POST">
            <b>Inserte el trayecto a buscar: </b><input style="width:400px; border:#000000 solid 1px;" type="text" onkeypress="probando(event)" name="search" value="" id="busqueda_trayectos" placeholder="Búsqueda" autofocus />
            <input type="submit" name="ver_todo" id="resaltar" value="Ver todo" <?php if($getBusquedaTrayectos != "" || $getTrayecto !="") echo 'enabled=\"enabled\"'; else echo 'disabled=\"disabled\"'?> > 

     </form>
	 
 </div>

<div class="posicionTabla">      
        
<table id="miTabla" class="customers" summary ="Esta tabla contiene los trayectos de la red de autobuses de Gijón">
<caption><br /><br /><br />
</caption>
<thead>
	<tr>
	     
              <th scope="col" width="75" style="cursor:pointer" onclick="ordenar_linea()" title="Click para ordenar línea!">Línea</th>              
              <th scope="col" style="cursor:pointer" onclick="ordenar_origen()" title="Click para ordenar Origen!">Origen</th>
              <th scope="col" style="cursor:pointer" onclick="ordenar_destino()" title="Click para ordenar Destino!">Destino</th>
              <th scope="col" style="cursor:pointer" onclick="ordenar_sentido()" title="Click para ordenar Sentido!">Sentido</th>
              <th width="400" scope="col" style="cursor:pointer" onclick="ordenar_descripcion()" title="Click para ordenar Descripción!">Descripción</th>		
	</tr>
</thead>
<?php  if($busquedaFallida=='NO'){ ?>
<tbody><?php while($fila = mysql_fetch_assoc($query)){ ?>
	<tr >
              <?php $primera = $fila['idLinea'];
                    $segunda = $fila['idOrigenParada'];
                    $tercera = $fila['idDestinoParada'];
                    $cuarta = $fila['Sentido'];
                    $quinta = $fila['Descripcion']; ?>
            
          <td class="puntero" onclick="capturar( <?php echo $primera?> )" title="Pulse para ver la linea!"  >
          <?php echo $primera ?>    
          </td>  
		 
                                
                 
		 
		 
		 
          <td class="puntero" onclick="capturar2( <?php echo $segunda?> )" title="Pulse para ver parada de Origen!" ><?php echo $segunda ?></td> 
          <td class="puntero" onclick="capturar2( <?php echo $tercera?> )" title="Pulse para ver paradas de Destino!" ><?php echo $tercera ?></td> 
          <td><?php echo $cuarta ?></td> 
          <td><?php echo $quinta ?></td> 
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
<div class="texto"><?php echo "Numero de trayectos: ".$numero_registros;?></div>
<?php mysql_close();?>
  
</div>      
        
        
        
    </body>
</html>
