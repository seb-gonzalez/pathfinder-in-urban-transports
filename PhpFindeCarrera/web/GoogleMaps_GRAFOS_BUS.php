<?php

       
    include('configuracionBD.php');       
    $connection = get_db_conn();
    
    $getidAutobus = '-1';
    $getMuestreo = '30';
    $getverParadas = 'NO';
   

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if(isset($_POST['idAutobus']))
        {
            $getidAutobus = $_POST['idAutobus'];
        }
        
        if(isset($_POST['Muestreo']))
        {
            $getMuestreo = $_POST['Muestreo'];
        }
        
        
        
        
        //BOTON PARA VER TODAS LAS PARADAS
        if(isset($_POST['resaltar']))
        {
            $getverParadas = 'SI';
        }else if(isset($_POST['ocultar']))
        {
            $getverParadas = 'NO';
        }
    }
    
    
    //Tomamos el primer autobus
    if($getidAutobus == '-1')
    {
        $unica = mysql_query('select * from `POSICIONVIVA` order by idAutobus limit 0,1',$connection);
        while($explorar = mysql_fetch_array($unica))
        {
            $getidAutobus = $explorar['idAutobus'];
            
        }
    }
      
    
    
    //#################################
    $maximox = -300.0;
    $minimox = 500.0;
    $maximoy = -300.0;
    $minimoy = 500;
    //#################################    
    
    $consulta = "SELECT * FROM `LOCALIZACION` WHERE idAutobus='".$getidAutobus."' ORDER BY FechaActualizacion DESC, HoraActualizacion DESC limit 0,".$getMuestreo."";
    $queryTotal = mysql_query($consulta, $connection);  
    
    
    $cadena="";
    $coma=",";
    $cuenta = 0;
    $numero_filas = mysql_num_rows($queryTotal); // Numero de filas!
    
    while($posiciones = mysql_fetch_array($queryTotal))
    {
         //Establecemos el centro de la imagen
         if($posiciones['Lng'] < $minimox ) $minimox = $posiciones['Lng'];
         if($posiciones['Lng'] > $maximox ) $maximox = $posiciones['Lng'];
         if($posiciones['Lat'] < $minimoy ) $minimoy = $posiciones['Lat'];
         if($posiciones['Lat'] > $maximoy ) $maximoy = $posiciones['Lat'];
         //-----------------------------------
         
         
         if($cuenta == $numero_filas-1) $coma="";
         
         $cadena .= "new google.maps.LatLng(".$posiciones['Lat'].",".$posiciones['Lng'].")".$coma;
          
         
          
         $cuenta++; 
    }
   
    $centroy = ($maximoy + $minimoy)/2;
    $centrox = ($maximox + $minimox)/2;
    
   
    
    //#######################################################

?>

<!DOCTYPE html>
<html>
<head>
    
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
   
            
    function initialize() 
    {      
        
      
      
      var myOptions = {                
        mapTypeId: google.maps.MapTypeId.ROADMAP    
      };

      //DefiniciÃ³n ultima del mapa
      var map = new google.maps.Map(document.getElementById("map_canvas"),myOptions);
      
      
      <?php      
            $color = "";
            $opacidad = 0.5;  
            switch(2)
            {
                case 0: $color = "#00FFFF"; // azul google
                    break;
                case 1: $color = "#FF9900"; // naranja
                    break;
                case 2: $color = "#FF0000"; // rojo
                    break;
                case 3: $color = "#66FF00"; //verde
                    break;
            }             
            
            echo "var grafoCoordenadas = [".$cadena."];";
            echo "var grafo = new google.maps.Polyline({ path: grafoCoordenadas,    strokeColor: \"".$color."\",    strokeOpacity: ".$opacidad." ,    strokeWeight: 4 });";
            echo "grafo.setMap(map);"; 
            
      ?>
      
      
     var popup;
      <?php
      
        
        
            $resaltado = "SELECT * FROM `LOCALIZACION` WHERE idAutobus=".$getidAutobus." ORDER BY FechaActualizacion DESC, HoraActualizacion DESC limit 0,".$getMuestreo."";
            $resaltado_query = mysql_query($resaltado,$connection);
            $num_filas = mysql_num_rows($resaltado_query);
            $color_marca = "";
            $i=0;
            
            while($vertices  = mysql_fetch_assoc($resaltado_query))
            {
                
                $informacion="<div><h1>Autobús: ".$vertices['idAutobus']."</h1><div><p>Dicho autobus se encontraba aquí­ el dí­a: ".$vertices['FechaActualizacion']." a la hora: ".$vertices['HoraActualizacion']."</p></div></div>";           
                   
                              
                if($i == 0) $color_marca = "green";
                else if($i == $num_filas - 1) $color_marca = "red";
                else $color_marca = "blue";
                
                
                //Visualizo todas las posiciones
                if($getverParadas == 'SI')
                {        
                ?>
                             
            
                    
            //Pintado de los puntos!
             var posicion = new google.maps.LatLng(<?=$vertices['Lat']?>, <?=$vertices['Lng']?>);
             
            
             
             var marcador = new google.maps.Marker(
             {position:posicion,
                 title:'Pulsa aquí­',
              icon:'http://gmaps-samples.googlecode.com/svn/trunk/markers/<?=$color_marca?>/blank.png'});     
             marcador.setMap(map);
             
             
             
             google.maps.event.addListener(marcador, 'click', function() {
                 
                 
            if(!popup){
                popup = new google.maps.InfoWindow();
            }
                
              popup.setContent("<?=$informacion?>");
              popup.open(map,this);
            });
                        
                <?php
                
                
                
                
            }    
            else if($i==0 || $i == $num_filas - 1) //Primer y ultimo elemento
            {
                ?>
                             
            
                    
            //Pintado de los puntos!
             var posicion = new google.maps.LatLng(<?=$vertices['Lat']?>, <?=$vertices['Lng']?>);
             
            
             
             var marcador = new google.maps.Marker(
             {position:posicion,
                 title:'Pulsa aquÃ­',
              icon:'http://gmaps-samples.googlecode.com/svn/trunk/markers/<?=$color_marca?>/blank.png'});     
             marcador.setMap(map);
             
             
             
             google.maps.event.addListener(marcador, 'click', function() {
                 
                 
            if(!popup){
                popup = new google.maps.InfoWindow();
            }
                
              popup.setContent("<?=$informacion?>");
              popup.open(map,this);
            });
                        
                <?php
            }
            
            
            
            $i++;
                }  
                
                    
                    
                
                
                
                
        
      
      ?>

 

       
        
   
      
      
     
    
  
      
      //Centro de la imagen!!!!!!!!!!!!!!!!!!!!!!!!  
      var mapaGijon = new google.maps.LatLng(<?=$centroy?>, <?=$centrox?>);
      map.setCenter(mapaGijon);
      map.setZoom(13);

      
     
    }
    
    
 function regresar()
 {
     location.href="index.php";
 }
    
</script>
        <style type="text/css">

            
@media screen and (min-device-width: 480px){


div.cabecera {	
        position:absolute;
        left:119px;  
        top:1px;
	width: 1000px;
	height: 15px;
	
	background-color : #EEE;
        
        border-width : 6px;
	border-color : #EEE;
	border-style : solid;
        
       
}


div.centrado {
	position:absolute;
	left:119px;
	top:98px;
	width:1000px;
	height:600px;
	z-index:1;
	border-width : 6px;
	border-color : #EEE;
	border-style : solid;
}
div.formularios {
	position:absolute;
	left:119px;
	top:38px;
	width:582px;
	height:135px;
	z-index:1;
	
}

}

@media screen and (max-device-width: 480px){
div.cabecera {	
        position:absolute;
        left:0px;  
        top:1px;
	width: 480px;
	height: 15px;



	
	
        
       
}


  div.formularios {
	position:absolute;
	left:10px;
	top:38px;
	width:450px;
	height:135px;
	z-index:1;
	
}
    
div.centrado {
	position: absolute;
	left:0px;
	top:100px;
        
	width:470px;
	height:530px;
	
	
}
}


        </style>
</head>
<body onload="initialize()">
  
<div class="cabecera"><img src="css/imagenes/flecha_izquierda.png" title="Regrese" onclick="regresar()" style="position:relative; cursor: pointer" /> </div>
  
 <div class="formularios">  
  
   <form name="filtro" action="<?php echo "GoogleMaps_GRAFOS_BUS.php" ?>" method="POST" >
       <b>Num. Autobus</b>&nbsp;
      <select   name="idAutobus" >
         
     <?php
           
         $select = mysql_query('select * from POSICIONVIVA order by idAutobus',$connection);
         
         while($fila = mysql_fetch_assoc($select))
         {
              $valor = $fila['idAutobus'];
              
         
                
              
              
         
     ?>
         <option value="<?=$valor?>" <?php if($getidAutobus == $valor) echo 'SELECTED'?>><?=$valor?></option>    
         
   <?php }?>      
     
     
    </select>
    
    <b>Muestreo</b>&nbsp;
    <select name="Muestreo">    
        <option <?php if ($getMuestreo == 30) echo 'SELECTED'?>>30</option>
        <option <?php if ($getMuestreo == 60) echo 'SELECTED'?>>60</option>
        <option <?php if ($getMuestreo == 100) echo 'SELECTED'?>>100</option>
        <option <?php if ($getMuestreo == 400) echo 'SELECTED'?>>400</option>
        <option <?php if ($getMuestreo == 800) echo 'SELECTED'?>>800</option>
        <option <?php if ($getMuestreo == 2000) echo 'SELECTED'?>>2000</option>
        <option <?php if ($getMuestreo == 3000) echo 'SELECTED'?>>3000</option>
        <option <?php if ($getMuestreo == 5000) echo 'SELECTED'?>>5000</option>
        <option <?php if ($getMuestreo == 10000) echo 'SELECTED'?>>10000</option>
    </select>
    
       
    <input type="submit" name="enviar" value="Filtrar" >    
     <br> 
     <input type="submit" name="resaltar" id="resaltar" value="Ver más" <?php if($getverParadas == 'NO') echo 'enabled=\"enabled\"'; else echo 'disabled=\"disabled\"'?> > 
     <input type="submit" name="ocultar" id="ocultar" value="Ocultar" <?php if($getverParadas == 'SI') echo 'enabled=\"enabled\"'; else echo 'disabled=\"disabled\"'?> >  
    
 </form>     
     
   </div>  
    
     <div id="map_canvas"  class="centrado" ></div>
    
   
    
  
</body>
</html>