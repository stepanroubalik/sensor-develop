<!DOCTYPE html>
<html lang='cs'>
  <head>
    <title>VEG</title>
    <meta charset='utf-8'>
    <meta name='description' content=''>
    <meta name='keywords' content=''>
    <meta name='author' content=''>
    <meta name='robots' content='all'>
    <!-- <meta http-equiv='X-UA-Compatible' content='IE=edge'> -->
    <!--leaflet & jquery-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.0.1/dist/leaflet.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"/>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <!--Bootstrap a css soubory-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!--Zoomhome plugin-->
    <link rel="stylesheet" href="./zoomhome/dist/leaflet.zoomhome.css"/>
    <script src="./zoomhome/dist/leaflet.zoomhome.min.js"></script>
      
    <!--sidebar style-->
    <link rel="stylesheet" href="./css/leaflet-sidebar.css" />  
    <script src="./js/leaflet-sidebar.js"></script>
  </head>

  <body>
      <!--<div id="side_panel" class="col-md-3">
     
          
          <br>
          <h5>Senzorová data</h5>
          <label>Čas záznamu</label>
          <input type="date" name="datum" value=""><br>
          <label>Zobrazit v mapě</label>
          <button id="filterSubmit">OK</button><br>
          <label>Zobrazit v tabulce</label>
          <button id="filterSubmit">OK</button>
          
          <h5>Zobrazení rastrových dat</h5>
          <label>Čas záznam</label>
          <input type="date" name="datum" value=""><br>
          <label>Zobrazit v mapě</label>
          <button id="filterSubmit">OK</button><br>
          <label>Zobrazit v tabulce</label>
          <button id="filterSubmit">OK</button>
          
          <h5>Výpočet vegetačních indexů</h5>
          <label>Čas záznamu</label>
          <input type="date" name="datum" value=""><br>
          <label>Zobrazit v mapě</label>
          <button id="filterSubmit" class="btn">OK</button><br>
          <label>Zobrazit v tabulce</label>
          <button id="filterSubmit" class="btn">OK</button>
          
          <h5>Korekční výpočet</h5>
          <label>Čas záznamu</label>
          <input type="date" name="datum" value=""><br>
          <label>Zobrazit v mapě</label>
          <button id="filterSubmit" class="btn">OK</button><br>
          <label>Zobrazit v tabulce</label>
          <button id="filterSubmit" class="btn">OK</button>
          -->
      </div>
      <div id="sidebar" class="sidebar collapsed">
        <!-- Nav tabs -->
        <div class="sidebar-tabs">
            <ul role="tablist">
                <li><a href="#home" role="tab"><i class="fa fa-bars"></i></a></li>
                <li><a href="#profile" role="tab"><i class="fa fa-user"></i></a></li>
                <li class="disabled"><a href="#messages" role="tab"><i class="fa fa-envelope"></i></a></li>
                <li><a href="https://github.com/Turbo87/sidebar-v2" role="tab" target="_blank"><i class="fa fa-github"></i></a></li>
            </ul>

            <ul role="tablist">
                <li><a href="#settings" role="tab"><i class="fa fa-gear"></i></a></li>
            </ul>
        </div>

        <!-- Tab panes -->
        <div class="sidebar-content">
            <div class="sidebar-pane" id="home">
                <h1 class="sidebar-header">
                    Zobrazení rastrových a sensorových dat
                    <span class="sidebar-close"><i class="fa fa-caret-left"></i></span>
                </h1>
                <h5>Senzorová data</h5>
    <div>
        <input type="date" id="datum" value="2019-03-30"><br>
                    <select id="typ">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>            
                    </select><br>
                    <button id="filterSubmit">Zobraz Tabulku</button>
                    <hr>
      </div>
      <div>
        <input type="date" id="datum" value="2019-03-30"><br>
                    <select id="typ">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>            
                    </select><br>
                    <button id="filterData">Zobraz sensory</button>
                    <hr>
      </div>
    
        
    <script>
        $("#filterSubmit").click(function(){
            $.ajax({
                url:'query_sensor_table.php',
                type:'POST',
                data:{
                    datum: $("#datum").val(),
                    typ: $("#typ").val()
                },
                success: function(response){
                    $("#resultTable").html(response);
                }
            });
        });
    </script>
      
                

              
                
            </div>

        <div class="sidebar-pane" id="profile">
                <h1 class="sidebar-header">Zpracování dat<span class="sidebar-close"><i class="fa fa-caret-left"></i></span></h1>
            </div>
            

            <div class="sidebar-pane" id="messages">
                <h1 class="sidebar-header">Messages<span class="sidebar-close"><i class="fa fa-caret-left"></i></span></h1>
            </div>

            <div class="sidebar-pane" id="settings">
                <h1 class="sidebar-header">Odkazy<span class="sidebar-close"><i class="fa fa-caret-left"></i></span></h1>
            </div>
        </div>-->
    </div>
      <div id="mapdiv" class="col-md-12"></div>
        <div id="resultTable"></div>
          <script>
            var map = L.map('mapdiv', { zoomControl:false });
            map.setView([49.5938686, 17.2508706], 12);
              
            $("#filterData").click(function(){
                $.ajax({
                    url:'query_sensor_data.php',
                    type:'POST',
                    data:{
                        datum: $("#datum").val(),
                        typ: $("#typ").val()
                    },
                    success: function(response){
                        var sLayer=L.GeoJSON(JSON.parse(response)).addTo(map);
                    }
                });
            });
            
            var sidebar = L.control.sidebar('sidebar').addTo(map);
            
            var zoomHome = L.Control.zoomHome({position: 'bottomright'});
            zoomHome.addTo(map);

            function onEachFeature (feature, layer) {
            layer.bindPopup(feature.properties.name);
            layer.on('click', function(e) {
            map.panTo([feature.geometry.coordinates[1],feature.geometry.coordinates[0]]);
            })};

            var mapBounds = new L.LatLngBounds(
            new L.LatLng(49.5716454, 17.23123875),
            new L.LatLng(49.61717404, 17.28202142));
            var mapMinZoom = 2;
            var mapMaxZoom = 21;

            var defaultni = L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            maxZoom: 18,
            attribution: 'Štěpán Roubalík | Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox.streets'
            }).addTo(map);

            var rastrvrstva = L.tileLayer('http://mapy.upol.cz/tileserver/1745/{z}/{x}/{y}.png', {
            bounds: mapBounds,
            opacity: 0.8
            }).addTo(map);       


            var baseLayers = {
            "Defaultní": defaultni, 
            };

            var overlays = {
            "Tilovaný rastr": rastrvrstva,
            
            
            };
              
            
            L.control.scale({imperial:false, position:'bottomright'}).addTo(map);
            L.control.layers(baseLayers, overlays, {collapsed:true}).addTo(map);  
          </script>
      </body>
     
</html>