<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

<script type="text/javascript">
  function load() {  
      
  
  var myLatlng = new google.maps.LatLng("<?php echo $_GET['Latitud']?>", "<?php echo $_GET['Longitud']?>");
 
  
        
  var myOptions =
  {
    zoom: 16,
    center: myLatlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  
   var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);


    var nombre = "<?php echo $_GET['informacion']?>";
    var contentString = '<div id="content">'+
    '<div id="siteNotice">'+
    '</div>'+
    '<h1 id="firstHeading" class="firstHeading">'+nombre+'</h1>'+
    '<div id="bodyContent">'+
    '<p>' +"<?php echo $_GET['info2']?>"+'</p>'+ 
    '<p>Para regresar pulse el enlace: <a href="<?php echo $_GET['back']?>">'+
    'Volver atras</a></p>'+
    '</div>'+
    '</div>';

    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });

 
 


 
     var marker = new google.maps.Marker({
          position: myLatlng,  	 
          title:"Posicionamiento"
      });
  
      // To add the marker to the map, call setMap();
      marker.setMap(map);  
      infowindow.open(map,marker);
  
  
  
  
  }

</script>
</head>
<body onLoad="load()">
  <div id="map_canvas" style="width:100%; height:100%"></div>
</body>
</html>