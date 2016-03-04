

<!DOCTYPE html>
<?php session_start();?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
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
<script language="JavaScript" type="text/javascript">
            
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
		.tablesorter({   widgets: ['zebra'], headers: {0:{sorter: false}, 1:{sorter: false },2:{sorter: false }}     } );  


	} 
	); 
			
	function capturar(a, b, c)
	{	 //alert("captura: "+a.toString()+" "+b+" "+c);
			location.href="../../Geoposicionar.php?Latitud="+a+"&Longitud="+b+"&informacion="+c+"&info2=Usted esta viendo la posición de su parada."
			+"&back=Consultas/Estaticas/showParadas.php";
	}
			
			
			
			
	function probando(evt) 
	{
			
		 var charCode = (evt.which) ? evt.which : event.keyCode
		if(charCode == "13"){
		document.filtro_busqueda.submit();}
		return true;
	} 
		 
	 function regresar()
	 {
		 location.href="../../index.php";
	 }	 
        
		
	function ordenar_descripcion()
	{
		
		location.href="showParadas.php?ordenarDescripcion";
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
			top:660px;
			width:582px;
			height:135px;
			z-index:1;
		}

		div.texto {
			position:absolute;
			left:480px;
			top:690px;
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
			width:450px;
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
		width: 780px;
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
			top:680px;
			width:582px;
			height:135px;
			z-index:1;
		}

		div.texto {
			position:absolute;
			left:180px;
			top:710px;
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





        
        
        <title>Paradas de la red de autobúses</title>
    </head>
    <body>
       
   <?php

    
    $connection = get_db_conn();	
    
    
    $variable='';
    $peticion = ""; //tipo de peticion.
    $consulta='';
    
	$mensajeOrdenacion = "ORDER BY Descripcion DESC"; //POR DEFECTO
	$ordenarDescripcion = "";
    $getBusquedaParadas = "";
    $busquedaFallida = 'NO';
    
    $cadena = "";
    $numero_registros = 0;
    $query = null;
    
    if($_SERVER['REQUEST_METHOD'] == 'GET')
    {
     
        if(isset($_GET['infoLinea']))
        {
            $variable = $_GET['infoLinea'];
            $_SESSION['infoLinea'] = $variable; 
            $peticion="ver paradas por linea";
        
        }
        else if(isset($_GET['page']))
        {
            

            //Almaceno la pagina actual del paginador!   
            $_SESSION['paginaActual'] = $_GET['page'];

            if(isset($_SESSION['infoLinea']))
            {
                $variable = $_SESSION['infoLinea'];
                $peticion="ver paradas por linea";
            }
            
        }
        else if(isset($_GET['tramos-paradas']))
        {
            $variable = $_GET['tramos-paradas'];            
            $peticion = "ver parada";
        }
        else if(isset($_GET['trayectos-paradas']))
        {
            $variable = $_GET['trayectos-paradas'];
            $peticion = "ver parada";
        }
        else if(isset($_GET['localizacion-paradas']))
        {
            $variable = $_GET['localizacion-paradas'];
            $peticion = "ver parada";
        }
		else if(isset($_GET['carrera-parada']))
        {
            $variable = $_GET['carrera-parada'];
            $peticion = "ver parada";
        }
		else if(isset($_GET['ordenarDescripcion'])) //ORDENACION!!!
		{
	        if(isset($_SESSION['ordenarDescripcion_paradas'])) $ordenarDescripcion=$_SESSION['ordenarDescripcion_paradas'];
        
			
			
			if($ordenarDescripcion=="" || $ordenarDescripcion=="down")
			{
				
				$ordenarDescripcion="up";
				$mensajeOrdenacion = " ORDER BY Descripcion ASC";
				$_SESSION['ordenarDescripcion_paradas'] = "up";
			}
			else if($ordenarDescripcion == "up") 
			{
				
				$ordenarDescripcion = "down";
				$mensajeOrdenacion = " ORDER BY Descripcion DESC";
				$_SESSION['ordenarDescripcion_paradas'] = "down";
			}	
		}
        else // 'ACABO DE ENTRAR EN LA PAGINA';
        {
            unset($_SESSION['paginaActual']); //Destruye la variable de sesion || ENTRO EN LA PAGINA!

            if(isset($_SESSION['infoLinea']))
            {
                unset($_SESSION['infoLinea']); 
            }
            
        }
        
    }
    else if($_SERVER['REQUEST_METHOD']=='POST')
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
    
    
    
   
    if($variable == '' && $getBusquedaParadas == "")
    {
        $consulta = "SELECT * FROM PARADAS $mensajeOrdenacion";
    }
    else if($getBusquedaParadas != "")
    {
        $consulta = "SELECT * FROM PARADAS WHERE Descripcion = \"$getBusquedaParadas\"";
      
        $query = mysql_query($consulta,$connection);
        $num_rows = mysql_num_rows($query);
	
        if($num_rows == 0) //Estaremos ante una consulta erronea con ningÃºn resultado...
        {
            $busquedaFallida = 'SI';
        }
        
    }
    else
    {
        switch($peticion)
        {
            case "ver paradas por linea":
                $consulta = "select * from PARADAS A inner join (select Distinct idParada from TRAMOS where idLinea = ".$variable.") B
                    using(idParada)";
                break;
            case "ver parada": 
                $consulta = "select * from PARADAS where idParada=".$variable;
                break;
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
 
     <form id="filtro_busqueda" name="filtro_busqueda" action="<?php echo "showParadas.php"?>" method="POST">
            <b>Inserte la parada a buscar: </b><input style="width:285px; border:#000000 solid 1px;" type="text" onkeypress="probando(event)" name="search" value="" id="busqueda_paradas" placeholder="Búsqueda" autofocus />
            <input type="submit" name="ver_todo" id="resaltar" value="Ver todo" <?php if($getBusquedaParadas != "" || $peticion != "") echo 'enabled=\"enabled\"'; else echo 'disabled=\"disabled\"'?> > 
            <b> || Paradas</b>
     </form>
 </div>              
        
        
<div class="posicionTabla">      
        
	<table id="miTabla" class="customers" summary ="Esta tabla contiene las paradas de la red de autobuses de Gijón">
		<caption><br /><br /><br />
		</caption>
		<thead>
			<tr>		
				<th scope="col" width="300" style="cursor:pointer" onclick="ordenar_descripcion()" title="Click para ordenar Descripción!">Descripción</th>
				<th scope="col" width="150">Ver en mapa</th>		
				<th scope="col" width="300">Lineas que pasan por aqui!</th>
			</tr>
		</thead>
		<?php  if($busquedaFallida=='NO'){ ?>
		<tbody><?php while($fila = mysql_fetch_assoc($query)){ ?>
			<tr > 
				<td><?php
						 
					//Parada fuera ...........
					$primera = $fila['idParada'];
					$segunda = $fila['Descripcion'];
					$tercera = $fila['Lat'];
					$cuarta = $fila['Lng'];
					//Consulta para ver que paradas tiene una linea!
					$consult = "select distinct idLinea from TRAMOS where idParada=".$primera;
					$datos = mysql_query($consult, $connection);
                                        $numero_items = mysql_num_rows($datos);
							 
					 echo $segunda; ?>
				</td>
				
				<td class="puntero" onclick="capturar( <?php echo $tercera;?>,<?php echo $cuarta;?>, <?php echo '\''.$segunda.'\'';?> )" align="center"
				title="Vea su parada en el mapa!">
				<img src="../../css/imagenes/ver_mapa2.png" width="14%"/>
				</td> 
				<td>   
                                    
                                <?php if($numero_items == 0) echo "Ninguna Linea";
                                      else{?>
				<form name="verLinea" action="<?php echo "showLineas.php"; ?>" method="POST" >
                                    <select name="lineas" >

                                    <?php while($i = mysql_fetch_assoc($datos)){?>


                                    <option value="<?php echo $i['idLinea']; ?>"  <?php if($variable == $i['idLinea']) echo 'SELECTED'?> >  <?php echo "Linea ".$i['idLinea'];?> </option>  
                                    <?php }?>


                                    <input type="submit" name="enviar" value="Ver">
                                    </select>
				</form>
					</td>
                </tr><?php  }} ?>
			
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
        
<div class="texto" ><?php echo "Numero de paradas: ".$numero_registros;?></div>
	<?php mysql_close();?>  
</div>      
        
        
        
    </body>
</html>
