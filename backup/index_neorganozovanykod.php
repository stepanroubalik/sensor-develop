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
                    <li><a href="#profile" role="tab"><i class="fa fa-bullseye"></i></a></li>
                    <li><a href="#messages" role="tab"><i class="fa fa-wrench"></i></a></li>
                </ul>

                <ul role="tablist">
                    <li><a href="#settings" role="tab"><i class="fa fa-question-circle"></i></a></li>
                </ul>
            </div>
            <!-- Tab panes -->
            <div class="sidebar-content">
                <div class="sidebar-pane" id="home">
                        <h1 class="sidebar-header">
                            Rastrová data
                            <span class="sidebar-close"><i class="fa fa-caret-left"></i></span>
                        </h1>
                        <h4>Výběr rastru</h4>
                            <div class="col-sm-4">
                            <h5><strong>Sentinel-2 RED</strong></h5>
                            <select id="typ">
                                <option value="A">rastr1</option>
                                <option value="B">rastr2</option>
                                <option value="C">rastr3</option>            
                            </select>
                            </div>
                            <div class="col-sm-4">
                            <h5><strong>Landsat 7 RED</strong></h5>
                            <select id="typ">
                                <option value="A">rastr1</option>
                                <option value="B">rastr2</option>
                                <option value="C">rastr3</option>            
                            </select>
                            </div>
                            <div class="col-sm-4">
                            <h5><strong>Landsat 8 RED</strong></h5>
                            <select id="typ">
                                <option value="A">rastr1</option>
                                <option value="B">rastr2</option>
                                <option value="C">rastr3</option>             
                            </select><br>
                            </div>
                        
                            <div class="col-sm-4">
                            <h5><strong>Sentinel-2 <br> NIR</strong></h5>
                            <select id="typ">
                                <option value="A">rastr1</option>
                                <option value="B">rastr2</option>
                                <option value="C">rastr3</option>            
                            </select>
                            </div>
                            <div class="col-sm-4">
                            <h5><strong>Landsat 7 <br> NIR</strong></h5>
                            <select id="typ">
                                <option value="A">rastr1</option>
                                <option value="B">rastr2</option>
                                <option value="C">rastr3</option>            
                            </select>
                            </div>
                            <div class="col-sm-4">
                            <h5><strong>Landsat 8 <br> NIR</strong></h5>
                            <select id="typ">
                                <option value="A">rastr1</option>
                                <option value="B">rastr2</option>
                                <option value="C">rastr3</option>             
                            </select><br>
                            </div>
                            <div class="col-sm-4">
                            <h5><strong>Sentinel-2 <br> SWIR</strong></h5>
                            <select id="typ">
                                <option value="A">rastr1</option>
                                <option value="B">rastr2</option>
                                <option value="C">rastr3</option>            
                            </select>
                            </div>
                            <div class="col-sm-4">
                            <h5><strong>Landsat 7 <br> SWIR</strong></h5>
                            <select id="typ">
                                <option value="A">rastr1</option>
                                <option value="B">rastr2</option>
                                <option value="C">rastr3</option>            
                            </select>
                            </div>
                            <div class="col-sm-4">
                            <label class="form-check-label">Zobrazit bounding</label>
                                <select id="typ">
                                    <option value="1">1</option>
                                    
                                </select><br><br>
                            </div>
                            <div class="col-sm-4"><br>
                                  
                            </div>
                            <div class="btn-group">
                            
                            <button id="" class="btn btn-primary btn-sm btn-block">Import z DB</button>
                            <button id="boundingbox" class="btn btn-primary btn-sm btn-block">Zobrazit tabulku</button>
                            <div id="bound"></div>
                           
                                
                            <script>
                                $("#boundingbox").click(function(){
                                $.ajax({
                                    url:'bound.php',
                                    type:'POST',
                                    data:{
                                        typ: $("#typ").val(),
                                        },
                                        success: function(response){
                                            //console.log(response);
                                            //$("#bound").html(response);
                                            myParser(response);
                                        }
                                });
                            });
                            
                                
                            
                                function myParser(response) {
                                  var res = response.split(",");
                                  var first = res[0].split("((");
                                  var firstA = first[1].split(" ");
                                  var third = res[2].split(" ");
                                  //document.getElementById("bound").innerHTML = "prvni souřadnice = " + firstA[0] + " a druhá = " + firstA[1] + " a třetí = " + third[0] + " a čtvrtá = " + third[1];
                                  getBound(firstA, third);
                                }
                            </script>
                            
                                
                                
                                
                            
                            <!--<form>
                            Levý horní roh x:<br>
                            <input type="text" id="text1x" name="LH" value=""><br>
                            Levý horní roh y:<br>
                            <input type="text" id="text1y" name="LH" value=""><br>
                                
                            Pravý spodní roh x:<br>
                            <input type="text" id="text2x" name="PS" value=""><br>
                            Pravý spodní roh y:<br>
                            <input type="text" id="text2y" name="PS" value=""><br><br>
                                </form>
                                <br>
                               
                            <button onclick="getBound()">odeslat</button>-->
                        
                        </div>
                        </div>
                       
                        
                    
                <div class="sidebar-pane" id="profile">
                    <h1 class="sidebar-header">Senzorová data<span class="sidebar-close"><i class="fa fa-caret-left"></i></span>
                    </h1>          
                    <div><br>
                        <label class="form-check-label">Zobrazit senzory časovém období <input type="date" id="datum" value="2019-03-30"></label>
                        <select id="sens">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>            
                        </select>
                    </div>
                    <div class="btn-group">
                        <button id="filterTable" class="btn btn-primary btn-sm btn-block">Zobrazit data v tabulce</button>
                        <button id="" class="btn btn-primary btn-sm btn-block">Odstranit tabulku </button>
                        <button id="" class="btn btn-primary btn-sm btn-block">Zobrazit data v mapě</button>
                        <button id="" class="btn btn-primary btn-sm btn-block">Odstranit z mapy</button><br>
                    </div>
                    <div id="resultTable"></div>
                </div>
                <div class="sidebar-pane" id="messages">
                <h1 class="sidebar-header">Výpočty<span class="sidebar-close"><i class="fa fa-caret-left"></i></span></h1>
                    <div>
                        <h4>Vegetační indexy</h4>
                        <div class="col-sm-4">
                            <h5><strong>Sentinel-2</strong></h5>
                            <select id="typ">
                                <option value="A">RED (B04)</option>
                                <option value="B">NIR (B08)</option>
                                <option value="C">SWIR (B11)</option>            
                            </select>
                        </div>
                        <div class="col-sm-4">
                        <h5><strong>Landsat 7</strong></h5>
                        <select id="typ">
                            <option value="A">RED (B04)</option>
                            <option value="B">NIR (B08)</option>
                            <option value="C">SWIR (B11)</option>            
                        </select>
                        </div>
                        <div class="col-sm-4">
                        <h5><strong>Landsat 8</strong></h5>
                        <select id="typ">
                            <option value="A">RED (B04)</option>
                            <option value="B">NIR (B08)</option>
                            <option value="C">SWIR (B11)</option>            
                        </select><br><br>
                        </div>
                        <h4>Interpolace senzorových dat</h4>
                        <h4>Korekce rastrových dat</h4>
                        <h4>Statistické výpočty</h4>
                    </div>
            </div>
                <div class="sidebar-pane" id="settings">
                <h1 class="sidebar-header">Nápověda<span class="sidebar-close"><i class="fa fa-caret-left"></i></span></h1>
                </div>
            </div>
        </div>
        <div id="mapdiv"></div>
        <div id="resultTable"></div>
        
        <!--Scripty-->
        <script>
            var map = L.map('mapdiv', { zoomControl:false });
            map.setView([49.5938686, 17.2508706], 12);
            
            
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
        
            /*var rastr = L.tileLayer('http://localhost/vyvoj/data/l7b04/{z}/{x}/{y}.tif', {
            bounds: mapBounds,
            opacity: 0.8
            }).addTo(map);*/
            



            var baseLayers = {
            "Defaultní": defaultni, 
            };

            var overlays = {
            "Tilovaný rastr": rastrvrstva,
            
            };
              
            
            L.control.layers(baseLayers, overlays, {collapsed:true}).addTo(map);
            L.control.scale({imperial:false, position:'bottomright'}).addTo(map);
            function getBound(first, third){
                var text1x = first[0], 
                text1y = first[1],
                text2x = third[0],    
                text2y = third[1];
                //var text1x = $('#text1x').val(), 
                //text1y = $('#text1y').val(),
                //text2x = $('#text2x').val(),    
                //text2y = $('#text2y').val();    
                //console.log($('#text1').val());
                //console.log($('#text2').val());
                //L.marker([text1y, text1x]).addTo(map);
                //L.marker([text2y, text2x]).addTo(map);
                map.panTo([text1y, text1x]);
                var imageBounds = [[text1y, text1x],[text2y, text2x]];
                var imageUrl = './data/export/myfile.png';
                var rastrSnimek = L.imageOverlay(imageUrl, imageBounds).addTo(map);
                console.log(rastrSnimek=='');
                if (rastrSnimek==''){
                    var overlays = {
                        "Tilovaný rastr": rastrvrstva,
                        "rastrovy snimek": rastrSnimek
                    }
                }
                
                
                /*POLYGON((16.0787018413345 48.9451130973981,16.2429583276739 48.9434598801743,16.2402790547419 48.8352659676027,16.0763764538197 48.8369129363666,16.0787018413345 48.9451130973981))*/
                
                
                
                
            }
        </script>
        <script>
                            $("#filterTable").click(function(){
                                $.ajax({
                                    url:'query_sensor_table.php',
                                    type:'POST',
                                    data:{
                                        datum: $("#datum").val(),
                                        sens: $("#sens").val()
                                        
                                    },
                                    success: function(response){
                                        $("#resultTable").html(response);
                                    }
                                });
                            });
            </script>
        
    </body>
</html>