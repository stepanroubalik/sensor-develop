<!DOCTYPE html>
<html lang='cs'>
  <head>
    <title></title>
    <meta charset='utf-8'>
    <meta name='description' content=''>
    <meta name='keywords' content=''>
    <meta name='author' content=''>
    <meta name='robots' content='all'>
    <!-- <meta http-equiv='X-UA-Compatible' content='IE=edge'> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.0.1/dist/leaflet.js"></script>
      
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  
  </head>
  <body>
      <div id="header" class="col-md-12">
          <h4>APLIKACE CROP INDEX</h4>
      
      </div>
      <div id="side_panel" class="col-md-3"></div>
      <div id="mapdiv" class="col-md-9"></div>
      <div id="footer" class="col-md-12"></div>
      
      <script>
          var myMap = L.map('mapdiv')
          myMap.setView([48.85, 16.15], 12);
          
          var backgroundLayer = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png');
          myMap.addLayer(backgroundLayer);
      
      </script>
      
   

  </body>
</html>