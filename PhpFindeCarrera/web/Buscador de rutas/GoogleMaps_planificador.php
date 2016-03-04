

<!DOCTYPE html>
<html>
<head>
    
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />

<link type="text/css" href="../css/smoothness/jquery-ui-1.8.14.custom.css" rel="Stylesheet" />
<script type="text/javascript" src="../jquery/js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="../jquery/js/jquery-ui-1.8.14.custom.min.js"></script> 

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>


<?php
    include('configuracionBD.php');        
    require_once("../../java/Java.inc");
    
    
    $getparadaOrigen = '';
    $getparadaDestino = '';
    $getverParadas = '';
    
    $ADELANTE = 'NO';
    
    $origen = '';
    $destino = '';
    
    
    
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if(isset($_POST['paradaOrigen']))
        {
            if($_POST['paradaOrigen'] != '' && strrpos($_POST['paradaOrigen'], '-') == true)
            {
                list(,$resultado) = explode('-',$_POST['paradaOrigen'],2);
                $getparadaOrigen = strval(trim($resultado));
                $origen = $_POST['paradaOrigen'];
                
            }            
            
        }
            
        if(isset($_POST['paradaDestino']))
        {
            
            if($_POST['paradaDestino'] != '' && strrpos($_POST['paradaDestino'], '-') == true)
            {
                list(,$resultado) = explode('-',$_POST['paradaDestino'],2);
                $getparadaDestino = strval(trim($resultado));


                $destino = $_POST['paradaDestino'];                
                
            }

        
        }
        
        
        //BOTON PARA VER TODAS LAS PARADAS  
        
    
        
      
    
        
        
        if(isset($_POST['resaltar']))
        {
            $getverParadas =  'SI';
            
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
    $objeto = new Java('grafo.Puente');
    $cadena = '';
    
    if($origen != '' && $destino !='')
    { 
    
    if(isset($_POST['enviar'])) $getverParadas = 'NO';

    $uno = $objeto->getRuta($getparadaOrigen,$getparadaDestino);
                 
    $verdadero = $objeto->isCamino();
    
    //****
    $n = $objeto ->getGoogleMaps();
    $contador = 0;
    $j = 0;
    $listado_aristas = array();
    //$listado_transbordos = array();
    //****
    } 
    else 
    {
        $verdadero = 0; //No hay camino posible 
        
    }
            
        

    
    
    if($verdadero == '1')//ExistirÃ¡ un camino posible
    {
     
        $vertices = $objeto->getParadas(); //Obtengo todos los vertices de los que se compone el camino
        $tam = strval($vertices->size());
         
        
        for($i=0; $i < $tam; $i++)
        {
            $uno = strval($vertices[$i]->getLng());
            $dos = strval($vertices[$i]->getLat());
            
            //Establecemos el centro de la imagen
            if($uno < $minimox ) $minimox = $uno;
            if($uno > $maximox ) $maximox = $uno;
            if($dos < $minimoy ) $minimoy = $dos;
            if($dos > $maximoy ) $maximoy = $dos;
            //-----------------------------------
           
            if(($j+1) >= strval($n[$contador]))
            {
                $contador++; $j=0;
                $cadena .= 'new google.maps.LatLng('.$dos.','.$uno.'), ';
              //  $listado_transbordos[]=$vertices[$i];
                $listado_aristas[] = $cadena;
                $cadena = 'new google.maps.LatLng('.$dos.','.$uno.'), ';
            }
            else
            { $j++;
                $cadena .= 'new google.maps.LatLng('.$dos.','.$uno.'), ';
            }
            
            
             
            
            
           
            
            
        }
        
        
        
        
        
        $centroy = ($maximoy + $minimoy)/2;
        $centrox = ($maximox + $minimox)/2;
        
    }else $getverParadas = '';
    
    //echo '<br><b>TRANSBORDOS: '.count($listado_transbordos).'</b>';
   
  
    //##################     
    
    
    
    
    /*Si pulsamos el boton para ver los autobuses live y ademas existe un camino...*/
    if(isset($_POST['busLive']) && $verdadero == '1') 
    {
        
        
       
        
        $connection = get_db_conn();
        $Lineas = $objeto->getlistaLineas();
        $line = ''; $trayect ='';

        //Recorremos las lineas que existan...
        for($i=0; $i < strval($Lineas->size()); $i++)
        { 
          list($line,$trayect) = explode('|',$Lineas[$i],2);
          

          
          $consultaViva = 'SELECT * FROM `POSICIONVIVA` a INNER JOIN `AUTOBUS` b on (a.`idAutobus` = b.`idAutobus`) WHERE a.`idLinea`='.$line.'  AND a.`idTrayecto`='.$trayect ;
          //$consultaViva = 'SELECT * FROM `POSICIONVIVA` WHERE idLinea=''.$line.'' AND idTrayecto=''.$trayect.''';          
          //$consultaViva = 'SELECT * FROM `PARADAS` LIMIT 0,15'; //Puesto de prueba!!!
          $datos = mysql_query($consultaViva, $connection);
          $num_rows = mysql_num_rows($datos);
          $listado_autobuses = array();
          
        
          if($num_rows != 0) //Existen autobuses en la linea y trayecto....
          {
              //Recorro cada bus y lo almaceno
              $listado_autobuses[] = $datos; //Mas adelante esto serÃ¡ leido en el javascript
              
          }
          
           
        }     
        
        //Si resultase que no existe ningÃºn autobus colindante en las lineas...
        if(count($listado_autobuses) != 0)
        {
            $ADELANTE = 'SI';
            $getverParadas = 'SI'; //PARA DESACTIVAR CONTROLES
        }
        else $getverParadas = 'SI';   
            
      
          
    }
    
   
    //#######################################################
    
?>


<?php  

    $lista = array();
    $nuevo='';

    $lista = $objeto->getListaParadas();
    $tamList = strval($lista -> size());
    
    for($i=0; $i < $tamList; $i++)    
    {
        $variable_description = $lista[$i]->getDescripcion();
        $variable_parada = $lista[$i]->getIdParada();
        $nuevo .="\"".iconv('UTF-8', 'ISO-8859-1', $variable_description)." - ".iconv('UTF-8', 'ISO-8859-1', $variable_parada)."\",";
    }
    

    
   
?>


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
	width: 465px;
	height: 15px;



	
	
        
       
}

div.texto {
	position:absolute;
	left:0px;
	top:135px;
	width:465px;
	height:145px;
	z-index:1;
	border-width : 6px;
	border-color : #EEE;
	border-style : solid;
        overflow : scroll;
}


  div.formularios {
	position:absolute;
	left:0px;
	top:30px;
	width:450px;
	height:135px;
	z-index:1;
        
	
}
    
div.centrado {
	position: absolute;
	left:0px;
	top:290px;
        
	width:465px;
	height:340px;
	
        
 
	z-index:1;
	border-width : 6px;
	border-color : #EEE;
	border-style : solid;
	
}
}


</style>

<script language="JavaScript" type="text/javascript"> 

 $(document).ready(function(){
		
       
		   
var listado=[<?php echo $nuevo ?>];


	 $("#autocompletado").autocomplete({
		source: listado            
		
	 })
	 
	  $("#autocompletado2").autocomplete({
		source: listado
		

	 })
	 
	 
  })   

    
</script>

<script language="JavaScript" type="text/javascript">
 function regresar()
 {
     location.href="/PhpFindeCarrera";
 }
</script>

<script language="JavaScript" type="text/javascript">
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
                    $informacion="<div><h1>".$paradas[$i]->getDescripcion()."</h1><div><p>Usted esta viendo la parada número: ".$i."</p></div></div>";           
                   
                
                
                    if($i==0) $color_marca = "green";
                    else if($i== $num_filas - 1) $color_marca = "red";
                    else $color_marca = "blue";
                    
                    
                     ?>
            
                    
            //Pintado de los puntos!
             var posicion = new google.maps.LatLng(<?php echo strval($paradas[$i]->getLat())?>, <?php echo strval($paradas[$i]->getLng())?>);
             
            
             
             var marcador = new google.maps.Marker(
             {position:posicion,
                 title:'Pulsa aquí',
              icon:'http://gmaps-samples.googlecode.com/svn/trunk/markers/<?php echo $color_marca?>/blank.png'});     
             marcador.setMap(map);
             
             
             
             google.maps.event.addListener(marcador, 'click', function() {
                 
                 
            if(!popup){
                popup = new google.maps.InfoWindow();
            }
                
              popup.setContent("<?php echo $informacion?>");
              popup.open(map,this);
            });
            
            <?php
                }
                else if($i==0 || $i==$num_filas-1)
                {
                    
                    $informacion="<div><h1>".$paradas[$i]->getDescripcion()."</h1><div><p>Usted esta viendo la parada número: ".$i."</p></div></div>";           
                   
                
                
                if($i==0) $color_marca = "green";
                else if($i== $num_filas - 1) $color_marca = "red";
                else $color_marca = "blue";
                              
                
               
                
                ?>
            
                    
            //Pintado de los puntos!
             var posicion = new google.maps.LatLng(<?php echo strval($paradas[$i]->getLat())?>, <?php echo strval($paradas[$i]->getLng())?>);
             
            
             
             var marcador = new google.maps.Marker(
             {position:posicion,
                 title:'Pulsa aquí',
              icon:'http://gmaps-samples.googlecode.com/svn/trunk/markers/<?php echo $color_marca?>/blank.png'});     
             marcador.setMap(map);
             
             
             
             google.maps.event.addListener(marcador, 'click', function() {
                 
                 
            if(!popup){
                popup = new google.maps.InfoWindow();
            }
                
              popup.setContent("<?php echo $informacion?>");
              popup.open(map,this);
            });
            
            <?php
                }      
                
                
               
                
              
                
            }//FINNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN    
            
            
            
             //Pregunto por si se ha pulsado el live de buses!
               if($ADELANTE=="SI")
               {
                   
                   //Recorremos cada objeto de consulta....
                   //for($i=0; $i<1; $i++)//count($listado_autobuses)
                   for($i=0; $i<count($listado_autobuses); $i++)
                   {
                       while($busVivo = mysql_fetch_assoc($listado_autobuses[$i]))
                       {
                           //############################################
                           $informacion="<div><h1>Autobús: ".$busVivo['idAutobus']."</h1><div><p>Usted esta viendo el autobús que circula sobre la línea #".$busVivo['idLinea'].".<br>La posición de este autobús fue tomada el día y horas: ".$busVivo['FechaActualizacion'].", ".$busVivo['HoraActualizacion']."</p></div></div>";
                           //$informacion="<div><h1>".$busVivo['Descripcion']."</h1><div><p>Usted esta viendo el autobÃºs que circula sobre la lÃ­nea #: ".$busVivo['idParada']."</p></div></div>";           
                           //############################################          
                                            ?>


                            //Pintado de los puntos!
                             var posicion = new google.maps.LatLng(<?php echo strval($busVivo['Lat'])?>, <?php echo strval($busVivo['Lng'])?>);



                             var marcador = new google.maps.Marker(
                             {position:posicion,
                                 title:'Pulsa aquí',
                              icon:'http://gmaps-samples.googlecode.com/svn/trunk/markers/pink/blank.png'});     
                             marcador.setMap(map);



                             google.maps.event.addListener(marcador, 'click', function() {


                            if(!popup){
                                popup = new google.maps.InfoWindow();
                            }

                              popup.setContent("<?php echo $informacion?>");
                              popup.open(map,this);
                            });

                            <?php
                           
                           
                           
                           
                           
                       }
                   }
                   
               }
                //LIVE DE BUSSES.................................
            
            
        }        
                     ?>
            
                    
          
            
      
    
            
                    
         
            
          










  //Centro de la imagen!!!!!!!!!!!!!!!!!!!!!!!!  
  var mapaGijon = new google.maps.LatLng(<?php echo $centroy?>, <?php echo $centrox?>);
  map.setCenter(mapaGijon);
  map.setZoom(13);



}
</script>

</head>
<body onload="initialize()">
 
<div class="cabecera"><img src="../css/imagenes/flecha_izquierda.png" title="Regrese" onclick="regresar()" style="position:relative; cursor: pointer" /> </div>
  
 <div class="formularios">  
  
   <form name="filtro" action="<?php echo "GoogleMaps_planificador.php" ?>" method="POST" >
       <b>Parada Origen</b>&nbsp;&nbsp;       
       <input value ="<?php if($origen=="") echo ''; else echo $origen;?>" type="text" name="paradaOrigen" id="autocompletado" style="width:330px; border:#000000 solid 1px;" />


       <br><b>Parada Destino</b>&nbsp;
          <input value ="<?php if($destino=="") echo ''; else echo $destino;?>" type="text" name="paradaDestino" id="autocompletado2" style="width:330px; border:#000000 solid 1px;" />

    
          <br> 
    <input type="submit" name="enviar" id="enviar"  value="Buscar" >  
    <input type="submit" name="resaltar" id="resaltar" value="Ver paradas" <?php if($getverParadas == "NO" ) echo 'enabled=\"enabled\"'; else echo 'disabled=\"disabled\"'?> > 
     <input type="submit" name="ocultar" id="ocultar" value="Ocultar" <?php if($getverParadas == "SI") echo 'enabled=\"enabled\"'; else echo 'disabled=\"disabled\"'?> >  
     <input type="submit" name="busLive" id="buslive" value="busLive!" <?php if($getverParadas == "NO") echo 'enabled=\"enabled\"'; else echo 'disabled=\"disabled\"'?> >  
    
 </form>     
     
   </div>  

     <div class="texto">
         <?php     
            
            
            if($verdadero == '1') //EXISTE CAMINO!
            {
                list($origen,) = explode('-',$origen,2);
                list($destino,) = explode('-',$destino,2);
                echo "<h2><b>## <u>Indicaciones de ruta en autobús entre <i>".$origen."</i> y <i>".$destino."</i>:</b></u></h2>";
                echo "".iconv('UTF-8', 'ISO-8859-1',$objeto->getCamino());             
                
                
                $paradas = $objeto->getParadas();
                echo "<br># Nuestra ruta se compone de un total de <b>".iconv('UTF-8', 'ISO-8859-1',$paradas->size())."</b> paradas.";
                
                
                               
            }
            else //NO EXISTE CAMINO POSIBLE
            {
                if($origen=="" and $destino=="")
                {
                    echo "<b><h2> - Seleccione su parada origen y parada destino -</h2></b>";
                }
                else
                {
                    list($origen,) = explode('-',$origen,2);
                    list($destino,) = explode('-',$destino,2);
                    echo "<b><h2> - Actualmente no existe ningún tipo de ruta entre <i>".$origen."</i> y <i>".$destino."</i> -</h2></b>";
                }
                
               
                    
                
            }?>
     </div>
    
     <div id="map_canvas"  class="centrado" >  </div>
    
   
    
  
</body>
</html>