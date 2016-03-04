<?php

       
    include('getidTrayectos.php');   
 
    $connection = get_db_conn();
    session_start();
    
    $getidLinea='1';
    $getidTrayecto = 'TODAS';
    $getverParadas = 'NO';
    
    
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if(isset($_POST['idLinea']))
        {
            
            $getidLinea = $_POST['idLinea'];            
            $_SESSION['idLinea'] = $getidLinea;
           // echo 'He picado sobre linea y la linea es: '.$getidLinea.'  la almaceno en session';
        }    
        else if(isset($_POST['trayectos']))
        {
            $getidTrayecto = $_POST['trayectos'];
            
            //echo 'He picado en trayecto y obtengo: '.$getidTrayecto;
            
            if(isset($_SESSION['idLinea']))           $getidLinea = $_SESSION['idLinea'];
           // else echo 'En linea no tenia nada asi que tengo '.$getidLinea;
        }
       
        
        //BOTON PARA VER TODAS LAS PARADAS
        if(isset($_POST['resaltar2']))
        {
            $getverParadas = 'SI';
        }else if(isset($_POST['ocultar']))
        {
            $getverParadas = 'NO';
        }
       
        
    }
    else if($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        if(isset($_SESSION['idLinea']))
        {
            session_unset();
        }
    }
    
   
    $Ntrayectos = getidTrayectos($getidLinea);
    
   
   
    //Para seleccionar dentro del select.
    $select = mysql_query("SELECT * FROM `LINEAS`", $connection);//PARA EL SELECT 1
   
    
   
    

 
     
    // echo "<br>La longitud de los registros: ".$cantidad[0]."<br>";
     
     $identificadorTrayecto = array();
     $tablaTrayectos = array();
    
     while($idtrayecto = mysql_fetch_assoc($Ntrayectos))
     {
         
         
         $mega = "SELECT * FROM 
       `TRAMOS` INNER JOIN `PARADAS` USING(idparada) WHERE idlinea = '".$getidLinea."' AND idtrayecto = '".$idtrayecto['idTrayecto']."' ORDER BY Orden";
        $tramos = mysql_query($mega,$connection);
        
        $tablaTrayectos[] = $tramos;
        
        $identificadorTrayecto[] = $idtrayecto['idTrayecto'];
        
        
        
         
     }
     mysql_data_seek($Ntrayectos,0); //Situo el puntero al comienzo
     
    
    
     
    
    //#################################
    $maximox = -300.0;
    $minimox = 500.0;
    $maximoy = -300.0;
    $minimoy = 500;
    //#################################
    
    
    $listado_aristas = array();
   
    $extremos = array();
        $inicio_fin = array();
        $temporal = "";
        
        
        
    
    $cadena = "";
    $numero_filas = 0;
    
    foreach($tablaTrayectos as $indice)
    {
        $i =0; $coma=",";
        $cuenta = 0;
        $numero_filas = mysql_num_rows($indice); // Numero de filas!
        
        
        while($paradas = mysql_fetch_assoc($indice))
        {
            //Establecemos el centro de la imagen
             if($paradas['Lng'] < $minimox ) $minimox = $paradas['Lng'];
             if($paradas['Lng'] > $maximox ) $maximox = $paradas['Lng'];
             if($paradas['Lat'] < $minimoy ) $minimoy = $paradas['Lat'];
             if($paradas['Lat'] > $maximoy ) $maximoy = $paradas['Lat'];
             //-----------------------------------
             
           
             if($cuenta == 0) 
             {
                 $temporal = $paradas['idTrayecto']; // capturo el idtrayecto
                 
                 $inicio_fin[] = $paradas['Lat'];
                 
                 $inicio_fin[] = $paradas['Lng'];
             }
             else if($cuenta == $numero_filas-1)
             {
                 $inicio_fin[] = $paradas['Lat'];
                 $inicio_fin[] = $paradas['Lng'];
                 $extremos[$temporal] = $inicio_fin; 
      
             }
             
             
             if($cuenta == $numero_filas-1) $coma="";
             
             $cadena .= "new google.maps.LatLng(".$paradas['Lat'].",".$paradas['Lng'].")".$coma;
             
                      
             
             $cuenta++;
             
             
             
        }
      
      
      $inicio_fin = array();
      
      
         
        
    
        $listado_aristas [] = $cadena;
        $cadena = "";
        
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
      
            for($i=0; $i<count($listado_aristas); $i++)
            {
                echo "var grafoCoordenadas".($i+1)."=[".$listado_aristas[$i]."];";
                
                if($getidTrayecto != "TODAS")
                {
                    if($getidTrayecto == $identificadorTrayecto[$i])
                    {
                        $opacidad = 1.0;               
                        
                    }
                    else $opacidad = 0.1;
                }
                
                switch($i%4)
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
                
                echo "var grafo = new google.maps.Polyline({ path: grafoCoordenadas".($i+1).",    strokeColor: \"".$color."\",    strokeOpacity: ".$opacidad." ,    strokeWeight: 4 });";
                echo "grafo.setMap(map);";
                
                
            }
                              
                
                
            
      ?>
      
      
     
      

      var popup;
      <?php 
      
      
        if($getidTrayecto != "TODAS")
        {
            $resaltado = "SELECT * FROM 
           `TRAMOS` INNER JOIN `PARADAS` USING(idparada) WHERE idlinea = '".$getidLinea."' AND idtrayecto = '".$getidTrayecto."' ORDER BY Orden";
            $resaltado_query = mysql_query($resaltado,$connection);
            $num_filas = mysql_num_rows($resaltado_query);
            $color_marca = "";
            
            
                       
            
            while($vertices  = mysql_fetch_assoc($resaltado_query))
            {
                
               
            
                if($getverParadas == 'SI')
                {
                     $informacion="<div><h1>".$vertices['Descripcion']."</h1><div><p>Usted esta viendo la parada número: ".$vertices['Orden']."</p></div></div>";           
                   
                
                
                if($vertices['Orden']==0) $color_marca = "green";
                else if($vertices['Orden']== $num_filas - 1) $color_marca = "red";
                else $color_marca = "blue";
                              
                
               
                
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
                else if($vertices['Orden']==0 || $vertices['Orden']==$num_filas-1)
                {
                     $informacion="<div><h1>".$vertices['Descripcion']."</h1><div><p>Usted esta viendo la parada número: ".$vertices['Orden']."</p></div></div>";           
                   
                
                
                if($vertices['Orden']==0) $color_marca = "green";
                else if($vertices['Orden']== $num_filas - 1) $color_marca = "red";
                else $color_marca = "blue";
                              
                
               
                
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
                
               
                
                
                
                
                
                
            }
            
            
            
            
        }
      
        
      ?>  

       
        
   
      
      
     
    
  
      
      //Centro de la imagen!!!!!!!!!!!!!!!!!!!!!!!!  
      var mapaGijon = new google.maps.LatLng(<?=$centroy?>, <?=$centrox?>);
      map.setCenter(mapaGijon);
      map.setZoom(12);

      
     
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
	top:104px;
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
	top:32px;
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
	top:32px;
	width:450px;
	height:135px;
	z-index:1;
	
}
    
div.centrado {
	position: absolute;
	left:0px;
	top:150px;
        
	width:470px;
	height:480px;
	
	
}

}
        </style>
</head>
<body onload="initialize()">
  

 <div class="cabecera"><img src="css/imagenes/flecha_izquierda.png" title="Regrese" onclick="regresar()" style=" cursor: pointer" /> </div>
 
 <div class="formularios">  
  
   <form name="filtro" action="<?php echo "GoogleMaps_ver3.php" ?>" method="POST" >
       <b>Lineas</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       &nbsp;
       <select   name="idLinea" >
         
     <?php while($fila = mysql_fetch_assoc($select))
           {
                $valor = $fila['idLinea'];
                $descripcion = $fila['Descripcion'];
     ?>
         <option value="<?=$valor?>" <?php if($getidLinea == $valor) echo 'SELECTED'?>><?=$descripcion?></option>    
         
     <?php }?>      
     
     <input type="submit" name="enviar" value="Filtrar" >     
   </select>
    
 </form>
    
     <form name="filtro2" action="<?php echo "GoogleMaps_ver3.php" ?>" method="POST" >
     <b>Resaltar trayecto</b> <select name="trayectos" style='width:365px' >
       
         <option value="TODAS" <?php if($getidTrayecto == "TODAS") echo 'SELECTED'?> >Todos los trayectos resaltados</option>
     <?php while($fila = mysql_fetch_assoc($Ntrayectos))
           {
                $valor = $fila['idTrayecto'];
                $descripcion = $fila['Descripcion'];
     ?>
         <option value="<?=$valor?>" <?php if($valor == $getidTrayecto) echo 'SELECTED'?>><?=$descripcion?></option>    
         
     <?php }?>      
     
     &nbsp;&nbsp;<input type="submit" name="enviar2"  value="Resaltar">   
     <input type="submit" name="resaltar2" id="resaltar2" value="Ver más" <?php if($getidTrayecto != "TODAS" && $getverParadas != 'SI') echo 'enabled=\"enabled\"'; else echo 'disabled=\"disabled\"'?> > 
     <input type="submit" name="ocultar" id="ocultar" value="Ocultar" <?php if($getverParadas == 'SI') echo 'enabled=\"enabled\"'; else echo 'disabled=\"disabled\"'?> > 
   </select>
    
 </form>

     
     
   </div>  
    
     <div id="map_canvas"  class="centrado" ></div>
    
   
    
  
</body>
</html>