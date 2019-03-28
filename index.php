<!DOCTYPE html>
<html lang='cs'>
    <head>
        <title>DIPLOMOVÁ PRÁCE</title>
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
        <div id="sidebar" class="sidebar collapsed">
            <!-- Nav tabs -->
            <div class="sidebar-tabs">
                <ul role="tablist">
                    <li><a href="#home" role="tab"><i class="fa fa-file-image-o"></i></a></li>
                    <li><a href="#profile" role="tab"><i class="fa fa-wifi"></i></a></li>
                    <li><a href="#messages" role="tab"><i class="fa fa-gears"></i></a></li>
                    <li><a href="https://github.com/stepanroubalik/sensor-develop" role="tab" target="_blank"><i class="fa fa-envelope"></i></a></li>
                </ul>

                <ul role="tablist">
                    <li><a href="#settings" role="tab"><i class="fa fa-question-circle"></i></a></li>
                </ul>
            </div>

            <!-- Tab panes -->
            <div class="sidebar-content">
                <div class="sidebar-pane" id="home">
                        <h1 class="sidebar-header">
                            Zobrazení rastrových dat
                            <span class="sidebar-close"><i class="fa fa-caret-left"></i></span>
                        </h1>
                            <br><label class="form-check-label">Zobrazit snámky v časovém období <input type="date" id="datum" value="2019-03-30"></label>
                        <div class="input-group mb-3">
                            <h5><strong>Sentinel-2</strong></h5>
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">RED (B04) <br>
                            <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">NIR (B08) <br>
                            <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">SWIR (B11) <br>
                            </label>

                            <h5><strong>Landsat 7</strong></h5>
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">RED (B04) <br>
                            <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">NIR (B08) <br>
                            <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">SWIR (B11)
                            </label>

                            <h5><strong>Landsat 8</strong></h5>
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">RED (B04) <br>
                            <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">NIR (B08) <br>
                            <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">SWIR (B11)
                            </label>
                        </div>
                        <div class="btn-group">
                            <button id="filterSubmit" class="btn btn-primary btn-sm btn-block">Načíst metadata</button>
                            <button id="filterSubmit" class="btn btn-primary btn-sm btn-block">Import z DB</button>
                            <button id="filterSubmit" class="btn btn-primary btn-sm btn-block">Zobrazit rastr</button>
                            <button id="filterSubmit" class="btn btn-primary btn-sm btn-block">převést na 8-bitový rastr</button>
                            <button id="filterSubmit" class="btn btn-primary btn-sm btn-block">převést na 16-bitový rastr</button>
                        </div>
                    </div>
                <div class="sidebar-pane" id="profile">
                        <h1 class="sidebar-header">
                            Zobrazení senzorových dat
                            <span class="sidebar-close"><i class="fa fa-caret-left"></i></span>
                        </h1>
          
                        <div>
                            <br>
                            <label class="form-check-label">Zobrazit senzory časovém období <input type="date" id="datum" value="2019-03-30"></label>
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">typ 1 <br>
                            <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">typ 2 <br>
                            <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">typ 3 <br>
                            <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">typ 4
                            </label>
                        </div>
                        <div class="btn-group">
                            <button id="filterSubmit" class="btn btn-primary btn-sm btn-block">Zobrazit data v tabulce</button>
                            <button id="filterSubmit" class="btn btn-primary btn-sm btn-block">Odstranit tabulku </button>
                            <button id="filterSubmit" class="btn btn-primary btn-sm btn-block">Zobrazit data v mapě</button>
                            <button id="filterSubmit" class="btn btn-primary btn-sm btn-block">Odstranit z mapy</button>
                        </div>
                    </div>
                <div class="sidebar-pane" id="messages">
                <h1 class="sidebar-header">Výpočty<span class="sidebar-close"><i class="fa fa-caret-left"></i></span></h1>
            </div>
                <div class="sidebar-pane" id="settings">
                <h1 class="sidebar-header">Settings<span class="sidebar-close"><i class="fa fa-caret-left"></i></span></h1>
                </div>
            </div><!---->
        </div>
        <div id="resultTable"></div>
        <div id="mapdiv" class="col-md-12"></div>
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