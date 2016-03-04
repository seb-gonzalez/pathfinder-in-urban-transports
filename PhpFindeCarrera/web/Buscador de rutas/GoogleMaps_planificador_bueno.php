<?php

       
   
     //require_once("JavaBridge/java/Java.inc");
    require_once("C:/xampp/tomcat/webapps/JavaBridge/java/Java.inc");
    
    
    $getparadaOrigen = 180;
    $getparadaDestino = 180;
    $getverParadas = 'NO';
    
    $origen="";
    $destino="";
    
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if(isset($_POST['paradaOrigen']))
        {
            $getparadaOrigen = $_POST['paradaOrigen'];
        }
            
        if(isset($_POST['paradaDestino']))
        {
            $getparadaDestino = $_POST['paradaDestino'];
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
    

     
    //CALCULO DE LA RUTA
    
    //#################################
    $maximox = -300.0;
    $minimox = 500.0;
    $maximoy = -300.0;
    $minimoy = 500;
    $centrox = -5.6770957172205;
    $centroy = 43.538435869279;
    //#################################      
        
    $objeto = new Java("grafo.Puente");
    $uno = $objeto->getRuta($getparadaOrigen,$getparadaDestino);
    $cadena = "";             
    $verdadero = $objeto->isCamino();
    
    //****
    $n = $objeto ->getGoogleMaps();
    $contador = 0;
    $j = 0;
    $listado_aristas = array();
    //$listado_transbordos = array();
    //****
    
    
    if($verdadero == '1')
    {
        $vertices = $objeto->getParadas(); //Obtengo todos los vertices de los que se compone el camino
        
         
        
        for($i=0; $i < strval($vertices->size()); $i++)
        {
            
            //Establecemos el centro de la imagen
            if(strval($vertices[$i]->getLng()) < $minimox ) $minimox = strval($vertices[$i]->getLng());
            if(strval($vertices[$i]->getLng()) > $maximox ) $maximox = strval($vertices[$i]->getLng());
            if(strval($vertices[$i]->getLat()) < $minimoy ) $minimoy = strval($vertices[$i]->getLat());
            if(strval($vertices[$i]->getLat()) > $maximoy ) $maximoy = strval($vertices[$i]->getLat());
            //-----------------------------------
            
            if(($j+1) >= strval($n[$contador]))
            {
                $contador++; $j=0;
                $cadena .= "new google.maps.LatLng(".strval($vertices[$i]->getLat()).",".strval($vertices[$i]->getLng())."), ";
              //  $listado_transbordos[]=$vertices[$i];
                $listado_aristas[] = $cadena;
                $cadena = "new google.maps.LatLng(".strval($vertices[$i]->getLat()).",".strval($vertices[$i]->getLng())."), ";
            }
            else
            { $j++;
                $cadena .= "new google.maps.LatLng(".strval($vertices[$i]->getLat()).",".strval($vertices[$i]->getLng())."), ";
            }
            
            
             
            
            
           
            
            
        }
        
        
        
        
        
        $centroy = ($maximoy + $minimoy)/2;
        $centrox = ($maximox + $minimox)/2;
        
    }
    
    //echo "<br><b>TRANSBORDOS: ".count($listado_transbordos)."</b>";
   
    
    //##################        
            
            
   
    //#######################################################
    
?>

<!DOCTYPE html>
<html>
<head>
    
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />

<link type="text/css" href="css/smoothness/jquery-ui-1.8.14.custom.css" rel="Stylesheet" />
<script type="text/javascript" src="jquery/js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="jquery/js/jquery-ui-1.8.14.custom.min.js"></script> 

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

<script type="text/javascript">
    
     $(document).ready(function(){
            
       <?php  
        $objeto = new Java("grafo.Puente");
        $lista = array();
        $nuevo="";

        $lista = $objeto->getListaParadas();

        for($i=0; $i < strval($lista -> size()); $i++)
        {
            $nuevo .="\"".$lista[$i]->getDescripcion()." - ".$lista[$i]->getIdParada()."\",";
        }
       
       echo "var listado = [".$nuevo."];"; ?>      
               

         $("#autocompletado").autocomplete({
            source: listado
         })
         
          $("#autocompletado2").autocomplete({
            source: listado
         })
      })
   
function initialize() 
{      



  var myOptions = {                
    mapTypeId: google.maps.MapTypeId.ROADMAP    
  };

  //DefiniciÃ³n ultima del mapa
  var map = new google.maps.Map(document.getElementById("map_canvas"),myOptions);


  <?php     
  
  if($cadena != "")
  {
        $color = "";
        $opacidad = 1;  
              
        for($i=0; $i<count($listado_aristas); $i++)
        {
            echo "var grafoCoordenadas".($i+1)."=[".$listado_aristas[$i]."];";
            
            switch($i%4)
            {
                case 0: $color = "#FF0000"; // rojo
                    break;
                case 1: $color = "#FF9900"; // naranja
                    break;
                case 2: $color = "#00FFFF"; // azul google
                    break;
                case 3: $color = "#66FF00"; //verde
                    break;
            }

            echo "var grafo = new google.maps.Polyline({ path: grafoCoordenadas".($i+1).",    strokeColor: \"".$color."\",    strokeOpacity: ".$opacidad." ,    strokeWeight: 4 });";
            echo "grafo.setMap(map);";
        
        }
      
      
         
  }

  ?>



      var popup;
      <?php 
      
        
         
        if($cadena != "")
        { 
            
            $paradas = $objeto->getParadas();
            $num_filas = strval($paradas->size());
            $color_marca = "";
            
            for($i=0; $i < strval($paradas->size()); $i++)
            {
                if($getverParadas == 'SI') //VISUALIZAMOS TODAS LAS PARADAS
                {
                    $informacion="<div><h1>".$paradas[$i]->getDescripcion()."</h1><div><p>Usted esta viendo la parada nÃºmero: ".$i."</p></div></div>";           
                   
                
                
                    if($i==0) $color_marca = "green";
                    else if($i== $num_filas - 1) $color_marca = "red";
                    else $color_marca = "blue";
                    
                    
                     ?>
            
                    
            //Pintado de los puntos!
             var posicion = new google.maps.LatLng(<?=strval($paradas[$i]->getLat())?>, <?=strval($paradas[$i]->getLng())?>);
             
            
             
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
                else if($i==0 || $i==$num_filas-1)
                {
                    
                    $informacion="<div><h1>".$paradas[$i]->getDescripcion()."</h1><div><p>Usted esta viendo la parada nÃºmero: ".$i."</p></div></div>";           
                   
                
                
                if($i==0) $color_marca = "green";
                else if($i== $num_filas - 1) $color_marca = "red";
                else $color_marca = "blue";
                              
                
               
                
                ?>
            
                    
            //Pintado de los puntos!
             var posicion = new google.maps.LatLng(<?=strval($paradas[$i]->getLat())?>, <?=strval($paradas[$i]->getLng())?>);
             
            
             
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
              
                
            }//FINNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN                   
        }        
                     ?>
            
                    
          
            
      
    
            
                    
         
            
          










  //Centro de la imagen!!!!!!!!!!!!!!!!!!!!!!!!  
  var mapaGijon = new google.maps.LatLng(<?=$centroy?>, <?=$centrox?>);
  map.setCenter(mapaGijon);
  map.setZoom(13);



}
                

    
    
 function regresar()
 {
     location.href="index.html";
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
	top:298px;
	width:1000px;
	height:400px;
	z-index:1;
	border-width : 6px;
	border-color : #EEE;
	border-style : solid;
        
}
div.texto {
	position:absolute;
	left:119px;
	top:118px;
	width:1000px;
	height:170px;
	z-index:1;
	border-width : 6px;
	border-color : #EEE;
	border-style : solid;
        overflow : scroll;
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
	overflow : auto;
	
}
}


        </style>

</head>
<body onload="initialize()">
  
<div class="cabecera"><img src="flecha_izquierda.png" title="Regrese" onclick="regresar()" style="position:relative; cursor: pointer" /> </div>
  
 <div class="formularios">  
  
   <form name="filtro" action="<?php echo "GoogleMaps_planificador.php" ?>" method="POST" >
       <b>Parada Origen</b>&nbsp;
       
 
      <select   name="paradaOrigen" >
          
    <?php
    
    
    $lista = $objeto->getListaParadas();
    
    for($i=0; $i< strval($lista->size()); $i++)
    {
        $valor = strval($lista[$i]->getIdParada());
        $descripcion = $lista[$i]->getDescripcion()." - ".$lista[$i]->getIdParada();
        
     ?>   <option value="<?=$valor?>" <?php if($getparadaOrigen == $valor){ echo 'SELECTED'; $origen=$lista[$i]->getDescripcion();}?>><?=$descripcion?></option>  <?php
    }
    
    
    ?>     
        
     
     
    </select>

       <br><b>Parada Destino</b>&nbsp;
      <select   name="paradaDestino" >
          
    <?php
    
    
    $lista = $objeto->getListaParadas();
    
    for($i=0; $i<strval($lista->size()); $i++)
    {
        
        $valor = strval($lista[$i]->getIdParada());
        $descripcion = $lista[$i]->getDescripcion()." - ".$lista[$i]->getIdParada();
        
     ?>   <option value="<?=$valor?>" <?php if($getparadaDestino == $valor){ echo 'SELECTED'; $destino=$lista[$i]->getDescripcion();}?>><?=$descripcion?></option>  <?php
    }
    
    
    ?>     
        
     
     
    </select>
    
       
    <input type="submit" name="enviar" value="Filtrar" >  
    <input type="submit" name="resaltar" id="resaltar" value="Ver más" <?php if($getverParadas == "NO") echo 'enabled=\"enabled\"'; else echo 'disabled=\"disabled\"'?> > 
     <input type="submit" name="ocultar" id="ocultar" value="Ocultar" <?php if($getverParadas == 'SI') echo 'enabled=\"enabled\"'; else echo 'disabled=\"disabled\"'?> >  
    
 </form>     
     
   </div>  

     <div class="texto">
         <?php     
            
            
            if($verdadero == '1')
            {
                echo "<h2><b>## <u>Indicaciones de ruta en autobús entre <i>".$origen."</i> y <i>".$destino."</i>:</b></u></h2>";
                echo "".$objeto->getCamino();             
                
                
                $paradas = $objeto->getParadas();
                echo "<br># Nuestra ruta se compone de un total de <b>".$paradas->size()."</b> paradas.";
                
                
                               
            }
            else
            {
                echo "<b><h2> - Actualmente no existe ningún tipo de ruta entre <i>".$origen."</i> y <i>".$destino."</i> -</h2></b>";
            }?>
     </div>
    
     <div id="map_canvas"  class="centrado" >       
         
         
         
         </div>
    
   
    
  
</body>
</html>