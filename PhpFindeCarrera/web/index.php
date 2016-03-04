<?php
//#############################################REDIRIGIR A MOVIL
include('esMovil.php');
$valor = esMovil();

if( $valor == "movil")
{

   
	header( 'location:/~sebastian/movil/' );
	exit();
}


//############################################# REDIRIGIR A MOVIL
?>


<!DOCTYPE html>

<html>
<head>
<title>Proyecto fin de carrera - Open data</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script type="text/javascript" src="Menu_Sebas/inc/jquery.metadata.js"></script>
<script type="text/javascript" src="Menu_Sebas/inc/jquery.hoverIntent.js"></script>
<script type="text/javascript" src="Menu_Sebas/inc/mbMenu.js"></script>

<link rel="stylesheet" type="text/css" href="Menu_Sebas/css/menu_black.css" media="screen" />

<style type="text/css">
  body  a.style{
    color:#AF3002;
    font-family:sans-serif;
    font-size:13px;
    text-decoration:none;
  }
</style>



<style type="text/css">

  body  a.style{
    color:#AF3002;
    font-family:sans-serif;
    font-size:13px;
    text-decoration:none;
  }

  .wrapper{
    font-family:Arial, Helvetica, sans-serif;
    margin-top:50px;
    margin-left:50px;
  }

  .wrapper h1{
    font-family:Arial, Helvetica, sans-serif;
    font-size:26px;
  }
  button{
    padding:4px;
    display:inline-block;
    cursor:pointer;
    font:12px/14px Arial, Helvetica, sans-serif;
    color:#666;
    border:1px solid #999;
    background-color:#eee;
    -moz-border-radius:10px;
    -webkit-border-radius:10px;
    -moz-box-shadow:#999 2px 0px 3px;
    -webkit-box-shadow:#999 2px 0px 3px;
    margin-bottom:4px;
  }
  button:hover{
    color:#aaa;
    background-color:#000;
  }
  :focus {
    outline: 0;
  }

  span.btn{
    padding:10px;
    display:inline-block;
    cursor:pointer;
    font:12px/14px Arial, Helvetica, sans-serif;
    color:#aaa;
    background-color:#eee;
    -moz-border-radius:10px;
    -webkit-border-radius:10px;
    -moz-box-shadow:#999 2px 0px 3px;
    -webkit-box-shadow:#999 2px 0px 3px;
  }
  span.btn:hover{
    background-color:#000;
  }
  
  .msgBox{
    position:absolute;
    width:250px;
    height:60px;
    background:black;
    -moz-box-shadow:#999 2px 0px 3px;
    -webkit-box-shadow:#999 2px 0px 3px;    
    -moz-border-radius:10px;
    -webkit-border-radius:10px;
    padding:10px;
    padding-top:30px;
    top:10px;
    right:10px;
    font:20px/24px Arial, Helvetica, sans-serif;
  }

</style>

<script type="text/javascript">

  /*
   * DEFAULT OPTIONS
   *
   options: {
   template:"yourMenuVoiceTemplate",--> the url that returns the menu voices via ajax. the data passed in the request is the "menu" attribute value as "menuId"
   additionalData:"",								--> if you need additional data to pass to the ajax call
   menuSelector:".menuContainer",		--> the css class for the menu container
   menuWidth:150,										--> min menu width
   openOnRight:false,								--> if the menu has to open on the right insted of bottom
   iconPath:"ico/",									--> the path for the icons on the left of the menu voice
   hasImages:true,									--> if the menuvoices have an icon (a space on the left is added for the icon)
   fadeInTime:100,									--> time in milliseconds to fade in the menu once you roll over the root voice
   fadeOutTime:200,									--> time in milliseconds to fade out the menu once you close the menu
   menuTop:0,												--> top space from the menu voice caller
   menuLeft:0,											--> left space from the menu voice caller
   submenuTop:0,										--> top space from the submenu voice caller
   submenuLeft:4,										--> left space from the submenu voice caller
   opacity:1,												--> opacity of the menu
   shadow:false,										--> if the menu has a shadow
   shadowColor:"black",							--> the color of the shadow
   shadowOpacity:.2,								--> the opacity of the shadow
   openOnClick:true,								--> if the menu has to be opened by a click event (otherwise is opened by a hover event)
   closeOnMouseOut:false,						--> if the menu has to be cloesed on mouse out
   closeAfter:500,									--> time in millisecond to whait befor closing menu once you mouse out
   minZindex:"auto", 								--> if set to "auto" the zIndex is automatically evaluate, otherwise it start from your settings ("auto" or int)
   hoverInted:0, 										--> if you use jquery.hoverinted.js set this to time in milliseconds to delay the hover event (0= false)
   onContextualMenu:function(o,e){} --> a function invoked once you call a contextual menu; it pass o (the menu you clicked on) and e (the event)
   },
   */

  $(function(){
    $(".myMenu").buildMenu(
    {
      template:"menuVoices.html",
      additionalData:"pippo=1",
      menuWidth:200,
      openOnRight:false,
      menuSelector: ".menuContainer",
      iconPath:"Menu_Sebas/ico/",
      hasImages:true,
      fadeInTime:100,
      fadeOutTime:300,
      adjustLeft:2,
      minZindex:"auto",
      adjustTop:10,
      opacity:.95,
      shadow:false,
      shadowColor:"#ccc",
      hoverIntent:0,
      openOnClick:true,
      closeOnMouseOut:false,
      closeAfter:1000,
      submenuHoverIntent:200
    });

    $(".vertMenu").buildMenu(
    {
      template:"menuVoices.html",
      menuWidth:170,
      openOnRight:true,
      menuSelector: ".menuContainer",
      iconPath:"Menu_Sebas/ico/",
      hasImages:true,
      fadeInTime:200,
      fadeOutTime:200,
      adjustLeft:0,
      adjustTop:0,
      opacity:.95,
      openOnClick:false,
      minZindex:200,
      shadow:false,
      hoverIntent:300,
      submenuHoverIntent:300,
      closeOnMouseOut:true
    });

    $(document).buildContextualMenu(
    {
      template:"menuVoices.html",
      menuWidth:200,
      overflow:2,
      menuSelector: ".menuContainer",
      iconPath:"Menu_Sebas/ico/",
      hasImages:false,
      fadeInTime:100,
      fadeOutTime:100,
      adjustLeft:0,
      adjustTop:0,
      opacity:.99,
      closeOnMouseOut:false,
      onContextualMenu:function(o,e){}, //params: o = the contextual menu,e = the event
      shadow:false
    });
  });

  //this function get the id of the element that fires the context menu.
  function testForContextMenu(el){
    if (!el) el= $.mbMenu.lastContextMenuEl;
    alert("the ID of the element is:   "+$(el).attr("id"));
  }

  function recallcMenu(el){
    if (!el) el= $.mbMenu.lastContextMenuEl;
    var cmenu=+$(el).attr("cmenu");
    $(cmenu).remove();
  }

  function loadFlash(){
    $.ajax({
      url:"testFlash/test.html",
      success:function(html){
        $("#flashTest").html(html);
      }
    });
  }

  function showMessage(msg){
    var msgBox=$("<div>").addClass("msgBox");
    $("body").append(msgBox);
    msgBox.append("Dirigiendonos a: <br>"+msg);
    setTimeout(function(){msgBox.fadeOut(500,function(){msgBox.remove();})},3000)
  }

</script>

</head>
<body bgcolor="#ffffff">
<div class="wrapper">
  <h1>Proyecto fin de carrera 2010-2011</h1>
  

  <table width="100%"  border="0" cellpadding="0" cellspacing="0" bgcolor="#EDEDED">
    <tr>
      <td width="180" height="33" style="padding:10px" class="style">
      </td>
      <td valign="bottom">
        <table  border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="container">
          <tr>
            <td class="myMenu">

              <!-- start horizontal menu -->

              <table class="rootVoices" cellspacing='0' cellpadding='0' border='0'><tr>                
                <td class="rootVoice {menu: 'menu_proyecto'}" >Proyecto</td>
                <td class="rootVoice {menu: 'menu_webservices'}" >Web Services</td>
                <td class="rootVoice {menu: 'menu_GMaps'}" >Visualización en GMaps</td>
		<td class="rootVoice {menu: 'menu_Planificador'}" >Planificador de rutas</td>
                <td class="rootVoice {menu: 'menu_Errores'}" >Errores controlados</td>
               <!-- <td class="rootVoice {menu: 'menu_acercade'}" >Acerca de ...</td>-->                
              </tr></table>

              <!-- end horizontal menu -->

            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  

  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>

  <br/>
  <br/>
  <br/>
  <br/>
  <div class="containerContent" style="float:right; margin-left:150px; margin-right:100px">
    <br/><br/>
    <a class="style" href="#">EnrutaBus</a>: Proyecto en el que partiendo de la filosofía que envuelve a los Open Data, desarrollamos una aplicación web que nos proporciona el camino a seguir entre dos paradas de autobús dadas.
	Esta filosofía de reutilización y apertura de datos es sustentada gracias a los datos ofrecidos por un servicio web de la red de autobuses de Gijón. De esta forma, nuestro proyecto queda enmarcado en el campo de la informática urbana. El cual, trata sobre el uso (y generación) de información física y digital sobre la ciudad como fuente de nuevas aplicaciones que puedan ser usadas por el ciudadano a través de dispositivos fijos o móviles.
  </div>

 



  <div id="menu_proyecto" class="mbmenu">
    <a rel="title" class="{action: 'showMessage(\'Menu Proyecto\')', img: 'select.png'}">Seleccione uno de estos links</a>
	<a href="../docs/" class="{img: 'pdf.png'}">Memoria del proyecto</a>
     <a rel="separator"> </a>
    <a class="{menu: 'overview', img: 'open_data.png'}">Open data</a>
     <a rel="separator"> </a>
    <a class="{menu: 'Blog', img: 'wordpress.png'}">/*datos en abierto~*/</a>   

  </div> 
  
  
    <div id="overview" class="mbmenu">
    <a href="https://datosenabierto.wordpress.com/estado-del-arte/" target="_blank">Overview sobre los Open data</a>
  
  </div>
      <div id="Blog" class="mbmenu">
    <a href="https://datosenabierto.wordpress.com/" target="_blank">Blog del PFC</a>
  
  </div>
  
  
  

  <div id="menu_webservices" class="mbmenu">
    <a rel="title" class="{action: 'showMessage(\'menu_2.1\')', img: 'select.png'}">Seleccione uno de estos links</a>
    <a href="http://www.geoportal-idec.net/geoportal/cas/geoserveis/ws-i/"  target="_self">Â¿QuÃ© son?</a>
    <a class="{menu: 'sub_menu_1', img: 'icon_14.png'}">Web services BusGijÃ³n</a>
     <a rel="separator"> </a>
    <a class="{menu: 'sub_menu_2', img: '24-tag-add.png'}">Consumo ordenado</a>
     </div>
   
     <div id="sub_menu_1" class="mbmenu">
    <a href="http://datos.gijon.es/risp_datasets/show/busgijontr" target="_self">Autobuses de GijÃ³n. Tiempo real.</a>
  
  </div>
   
     <div id="sub_menu_2" class="mbmenu">
    <a href="Frame1.html" class="{img: 'configuracion.png'} target="_self" >ConfiguraciÃ³n</a>
    <a href="Frame2_dinamico.html" class="{img: 'estado.png'}" target="_self" >Estado de los autobuses</a>
  </div>
   


  
    <div id="menu_GMaps" class="mbmenu">
    <a rel="title" class="{action: 'showMessage(\'menu_2.1\')', img: 'select.png'}">Seleccione uno de estos links</a>
    <a href="http://es.wikipedia.org/wiki/Google_Maps"  target="_self">Qué es Google Maps?</a>
    <a rel="separator"> </a>
    <a class="{menu: 'sub_menu_2GMaps', img: 'buttonfind.gif'}">Visualizar...</a>  

  </div>

      <div id="sub_menu_2GMaps" class="mbmenu">
    <a href="GoogleMaps_ver3.php" class="{img: 'lineas.png'}" target="_self" >Lineas y sus trayectos!</a>
    <a href="GoogleMaps_GRAFOS_BUS.php" class="{img: 'bus.png'}" target="_self" >Rutas de los autobuses </a>
  </div>

    <div id="menu_Planificador" class="mbmenu">
    <a rel="title" class="{action: 'showMessage(\'menu_2.1\')', img: 'select.png'}">Seleccione uno de estos links</a>
    
    <a rel="separator"> </a>
    <a class="{menu: 'sub_menu_2Planificador', img: 'buttonfind.gif'}">EnrutaBus...</a>  

    </div>


    <div id="sub_menu_2Planificador" class="mbmenu">
        <a href="Buscador de rutas/GoogleMaps_planificador.php" class="{img: 'lineas.png'}" target="_self" >Aplicación planificadora!</a>		
	</div>	
	
	
  
  <!-- <div id="menu_acercade" class="mbmenu">
    <a rel="title" class="{action: 'showMessage(\'Menu Proyecto\')', img: 'select.png'}">Seleccione uno de estos links</a>

    <a class="{menu: 'Quienes', img: 'info.png'}">Quienes somos?</a>
       
    

  </div> 
  
  
    <div id="Quienes" class="mbmenu">
    <a href="https://datosenabierto.wordpress.com/acerca-de/" target="_blank">who are we?</a>
  
  </div>        -->


    <div id="menu_Errores" class="mbmenu">
    <a rel="title" class="{action: 'showMessage(\'menu_2.1\')', img: 'select.png'}">Seleccione uno de estos links</a>
    <a rel="separator"> </a>
    <a href="showError.php" class="{img: 'error.png'}" target="_self">Mostrar errores</a>

  

 

 
</body>
</html>