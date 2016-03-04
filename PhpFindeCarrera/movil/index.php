
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <title>Proyecto final de carrera 2010-2011</title>
        <style type="text/css" media="screen">@import "jqtouch/jqtouch.css";</style>
    <style type="text/css" media="screen">
    @import "themes/apple/theme.css";#infoProyecto .info br {
	text-align: justify;
}
    #infoProyecto .info p {
	text-align: justify;
}
    </style>
    <script src="jqtouch/jquery-1.4.2.js" type="text/javascript" charset="utf-8"></script>
    <script src="jqtouch/jqtouch.js" type="application/x-javascript" charset="utf-8"></script>
  <!-- librerias -->
  <script type="text/javascript" charset="utf-8">
    var jQT = new $.jQTouch({
      icon: 'jqtouch.png',
      addGlossToIcon: false,
      startupScreen: 'jqt_startup.png',
      statusBar: 'black',
      preloadImages:[
        'themes/jqt/img/back_button.png',
        'themes/jqt/img/back_button_clicked.png',
        'themes/jqt/img/button_clicked.png',
        'themes/jqt/img/grayButton.png',
        'themes/jqt/img/whiteButton.png',
        'themes/jqt/img/loading.gif'
      ]
    });
  </script>


    </head>
    <body>
<div id="inicio">
  <div class="toolbar">
    <!-- Titulo de la ventana -->
    <h1>/*EnrutaBus~*/</h1>
  </div>
           


  <h2>Menú: </h2>
  <ul class="rounded">
  
  	<li class="arrow">
      <a href="../web/showError.php" rel="external">Planificador de rutas*</a>
    </li>  

    <li class="arrow">
      <a href="#Grafos">Datos en forma de grafo</a>
    </li>  	
  
    <li class="arrow">
      <a href="#tiemporeal">Datos a tiempo real</a>
    </li> 
	

    
  </ul>
  
  <h2>Errores en la comunicación: </h2>
  <ul class="rounded">
  <li class="arrow">
      <a href="../web/showError.php" rel="external">Excepciones</a>
    </li>
  </ul>

 <h2>Información: </h2>
  <ul class="rounded">
 
    <li class="arrow">
      <a href="#infoProyecto">Acerca de...</a>
    </li>
  </ul>


</div>
        
<div id="infoProyecto">
    
      <div class="toolbar">
         <h1>Información</h1>
         <a class="back" href="#inicio">Volver</a>
      </div>

      <div class="info" align=â€rightâ€>
          
         <h1> Proyecto final de carrera 2010/2011. Ingenierí­a informática.
          Sebastián González Aranda.</h1><br>
          
          <p>Proyecto que profundiza en la consecuencia de la liberalización
          de datos por parte de las administraciones públicas y demás empresas 
          privadas y como el público en general puede reutilizarlos a su antojo
          para crear las más diversas aplicaciones.</p>
        <p>&nbsp;</p>
          
          <p>Ese fín ultimo es el que se pretende poner de manifiesto en la parte
          implementativa de este proyecto. Objetivo que será llevado a cabo 
          gracias a la creación de una aplicación movil para planificar rutas 
          de autobus.</p>
          
      </div>
    
    
    
</div>




        
 <div id="tiemporeal">
  <div class="toolbar">
    <!-- Titulo de la ventana -->
    <h1>Tiempo real</h1>
    <a class="back" href="#inicio">Volver</a>
  </div>
  


  <h2>Opciones: </h2>
  <ul class="rounded">

    <li class="arrow">
      <a href="#estadoBus" >Estado de los autobuses</a>
    </li>  
    <li class="arrow">
      <a href="#configuracion" >Configuración</a>
    </li>    

  </ul>

 <!-- <h2>Más info: </h2>
   <ul class="rounded">
    <li class="arrow">
      <a href="#Que_son">¿Qué son?</a>
    </li>
    <li class="arrow">
      <a href="#fuentes">¿Qué tipo de datos intervienen?</a>
    </li>
  </ul>  -->


</div>



<div id="configuracion">
	<div class="toolbar">
	<h1>Configuración</h1>
          <a class="back" href="#tiemporeal">Volver</a>
	</div>



  <h2>Opciones: </h2>
  <ul class="rounded">
    <li class="forward">
      <a href="../web/Consultas/Estaticas/showLineas.php" rel="external" >Líneas</a>
    </li>    
    <li class="forward">
      <a href="../web/Consultas/Estaticas/showParadas.php" rel="external"  >Paradas</a>
    </li>    
    <li class="forward">
      <a href="../web/Consultas/Estaticas/showTrayectos.php" rel="external"  >trayectos</a>
    </li>    
    <li class="forward">
      <a href="../web/Consultas/Estaticas/showTramos.php" rel="external"  >Tramos</a>
    </li>    
    <li class="forward">
      <a href="../web/Consultas/Estaticas/showAutobus.php" rel="external"  >Autobus</a>
    </li>    
  </ul>

  <h2>Ver más ... </h2>
  <ul class="rounded">
    <li class="arrow">
      <a href="#estadoBus" >Estado buses</a>
    </li>    
		<li class="arrow">
      <a href="#inicio" >Menú inicial</a>	  
    </li>  
  </ul>




</div>

<div id="estadoBus">
	<div class="toolbar">
	<h1>EstadoBus!</h1>
          <a class="back" href="#tiemporeal">Volver</a>
	</div>



  <h2>Opciones: </h2>
  <ul class="rounded">
    <li class="forward">
      <a href="../web/Consultas/Dinamicas/showLocalizacion.php" rel="external"  >Localización</a>
    </li>    
    <li class="forward">
      <a href="../web/Consultas/Dinamicas/showCarrera.php" rel="external"  >Carrera</a>
    </li>    
      
  </ul>

  <h2>Ver más ... </h2>
  <ul class="rounded">
    <li class="arrow">
      <a href="#configuracion" >Configuración</a>	  
    </li>    
	<li class="arrow">
      <a href="#inicio" >Menú inicial</a>	  
    </li>    
	
  </ul>

</div>






        
        
        
<div id="Grafos">
  <div class="toolbar">
    <!-- Titulo de la ventana -->
    <h1>Grafos+nodos</h1>
    <a class="back" href="#inicio">Volver</a>
  </div>
           


  <h2>Opciones: </h2>
  <ul class="rounded">
    <li class="forward">
      <a href="../web/GoogleMaps_ver3.php" rel="external">Lineas y sus trayectos!</a>
    </li>    
    
    <li class="forward">
      <a href="../web/GoogleMaps_GRAFOS_BUS.php" rel="external">Autobuses</a>
    </li>  
  </ul>


</div>        
        
    </body>
</html>
