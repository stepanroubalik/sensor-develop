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
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" 
	integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
	crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.0.1/dist/leaflet.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <!--Bootstrap a css soubory-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="css/style.css">
    <!--Zoomhome plugin-->
    <link rel="stylesheet" href="./zoomhome/dist/leaflet.zoomhome.css"/>
    <script src="./zoomhome/dist/leaflet.zoomhome.min.js"></script>
    <!--sidebar style-->
    <link rel="stylesheet" href="./css/leaflet-sidebar.css" /> 
	<link rel="stylesheet" href="./css/Control.Coordinates.css" />
    <script src="./js/leaflet-sidebar.js"></script>
	<script src="./js/Control.Coordinates.js"></script>
  </head>
    <body>
        <div id="sidebar" class="sidebar collapsed">
            <!-- Nav tabs -->
            <div class="sidebar-tabs">
                <ul role="tablist">
                    <li><a href="#home" role="tab"><i class="fa fa-eye"></i></a></li>
                    <li><a href="#profile" role="tab"><i class="fa fa-cogs"></i></a></li>
                    <!--<li><a href="#messages" role="tab"><i class="fa fa-wrench"></i></a></li>-->
                </ul>

                <ul role="tablist">
                    <li><a href="#settings" role="tab"><i class="fa fa-question-circle"></i></a></li>
                </ul>
            </div>
            <!-- Tab panes -->
            <div class="sidebar-content">
              <div class="sidebar-pane" id="home">
                <h1 class="sidebar-header">Prohlížení dat <span class="sidebar-close"><i class="fa fa-caret-left"></i></span></h1>
                  <div class="col-sm-6">
                    <h5><strong>Rastrová data</strong></h5>
                    <select id="meta">
                        <option name="inputrastr" value="l7b04">l7b04</option>
                        <option name="inputrastr" value="l7b05">l7b05</option>
                        <option name="inputrastr" value="l7b03">l7b03</option>            
                    </select>
            		
				  </div>
				  
				  <div class="col-sm-6">
                    <h5><strong>Senzor data</strong></h5>
                    <select id="export">
                        <option name="" value="">SRA 11</option>
                        <option name="" value="">SRA 21</option>
                        <option name="" value="">SRA 31</option>            
                    </select><br>
            		
                  </div>
				  <br><div class="col-sm-6">
                    <div class="btn-group-vertical">
                    <button id="metadata" class="btn btn-primary btn-sm btn-block">ZOBRAZIT METADATA</button>
					<button id="" class="btn btn-primary btn-sm btn-block">TRANSFORMACE 8-bit</button>
					<button id="worktable" class="btn btn-primary btn-sm btn-block">NAČÍST DO PAMĚTI</button>
                    <button id="save" class="btn btn-primary btn-sm btn-block">ULOŽIT DO SOUBORU</button>
					<hr>
                    </div>     
                  </div>
                  <div class="col-sm-6">
                    <div class="btn-group-vertical">
                    <button id="filterTable" class="btn btn-primary btn-sm btn-block">ZOBRAZIT TABULKU</button>
                    <button id="" class="btn btn-primary btn-sm btn-block">ODSTRANIT TABULKU</button>
					<button id="displaysenzor" class="btn btn-primary btn-sm btn-block">ZOBRAZIT V MAPĚ</button>
                    <button id="" class="btn btn-primary btn-sm btn-block">ODSTRANIT Z MAPY</button>
					<hr>
                    </div>     
                  </div>
				  <div class="col-sm-6">
                    <h5><strong>Zobrazení rastru</strong></h5>
                    <select id="typ">
                        <option name="inputrastr" value="l7b04">landsat 7 NIR</option>
                        <option name="inputrastr" value="l7b05">landsat 7 SWIR</option>
                        <option name="inputrastr" value="l7b03">landasat 7 RED</option>            
                    </select>
            		
                  </div>
				  <div class="col-sm-6">
                    <h5><strong>Zobrazení indexu</strong></h5>
                    <select id="">
                        <option name="inputrastr" value="l7b04">S2 NDVI</option>
                        <option name="inputrastr" value="l7b05">L7 NDVI</option>
                        <option name="inputrastr" value="l7b03">L8 NDVI</option>            
                    </select>
            		
                  </div>
                  <div class="col-sm-6">
                    <div class="btn-group-vertical">
                    <button id="boundingbox" class="btn btn-primary btn-sm btn-block">NAČÍST DO MAPY</button>
					<button id="clearmap" class="btn btn-primary btn-sm btn-block">ODSTRANIT Z MAPY</button>
					<hr>
                    </div>     
                  </div>
				  <div class="col-sm-6">
                    <div class="btn-group-vertical">
                    <button id="" class="btn btn-primary btn-sm btn-block">NAČÍST DO MAPY</button>
					<button id="" class="btn btn-primary btn-sm btn-block">ODSTRANIT Z MAPY</button>
					<hr>
                    </div>     
                  </div>
				  <div id="rasterTable"></div>
				</div>
                  
                <div class="sidebar-pane" id="profile">
                <h1 class="sidebar-header">Výpočty nad daty<span class="sidebar-close"><i class="fa fa-caret-left"></i></span></h1>
                <div class="col-sm-12">
                  <h5><strong>Výpočet vegetačního indexu NDVI</strong></h5>
				</div>
                  <div class="col-sm-4"><br>
                    <h5><strong>RED PÁSMO</strong></h5>
                    <select id="pasmo1">
                        <option value="l7b03">LANDSAT 7</option>
                        <option value="l8b03">LANDSAT 8</option>
                        <option value="s2b04">SENTINEL 2</option>            
                    </select>    
                  </div>
                  <div class="col-sm-4"><br>
                    <h5><strong>NIR PÁSMO</strong></h5>
                    <select id="">
                        <option value="l7b04">LANDSAT 7</option>
                        <option value="l8b04">LANDSAT 8</option>
                        <option value="s2b04">SENTINEL 2</option>            
                    </select>    
                  </div>
				  <div class="col-sm-4"><br>
                    <h5><strong>VÝSLEDEK</strong></h5>
                    <select id="ndvi">
                        <option value="">NDVI L7</option>
                        <option value="">NDVI L8</option>
                        <option value="">NDVI S2</option>            
                    </select>    
                  </div>
				  <div class="col-sm-4"><br>
                    <div class="btn-group-vertical">
                    <button id="" class="btn btn-primary btn-sm btn-block">VYPOČÍTAT</button>
                    </div>     
                  </div>
				  <div class="col-sm-4"><br>
                    <div class="btn-group-vertical">
                    <button id="" class="btn btn-primary btn-sm btn-block">PŘIDAT INDEX</button>
                    </div>     
                  </div>
				  <div class="col-sm-4"><br>
                    <div class="btn-group-vertical">
                    <button id="" class="btn btn-primary btn-sm btn-block">ODSTRANIT</button>
                    </div>     
                  </div>
				  <div class="col-sm-12">
                    <h5><strong>Výpočet vegetačního indexu NDMI</strong></h5>
				  </div>
                  <div class="col-sm-4"><br>
                    <h5><strong>RED PÁSMO</strong></h5>
                    <select id="">
                        <option value="A">LANDSAT 7</option>
                        <option value="B">LANDSAT 8</option>
                        <option value="C">SENTINEL 2</option>            
                    </select>    
                  </div>
                  <div class="col-sm-4"><br>
                    <h5><strong>NIR PÁSMO</strong></h5>
                    <select id="">
                        <option value="A">LANDSAT 7</option>
                        <option value="B">LANDSAT 8</option>
                        <option value="C">SENTINEL 2</option>            
                    </select>    
                  </div>
				  <div class="col-sm-4"><br>
                    <h5><strong>VÝSLEDEK</strong></h5>
                    <select id="">
                        <option value="A">NDVI L7</option>
                        <option value="B">NDVI L8</option>
                        <option value="C">NDVI S2</option>            
                    </select>    
                  </div>
				  
                  <div class="col-sm-4"><br>
                    <div class="btn-group-vertical">
                    <button id="" class="btn btn-primary btn-sm btn-block">VYPOČÍTAT</button>
                    </div>     
                  </div>
				  <div class="col-sm-4"><br>
                    <div class="btn-group-vertical">
                    <button id="" class="btn btn-primary btn-sm btn-block">PŘIDAT INDEX</button>
                    </div>     
                  </div>
				  <div class="col-sm-4"><br>
                    <div class="btn-group-vertical">
                    <button id="" class="btn btn-primary btn-sm btn-block">ODSTRANIT</button>
                    </div>     
                  </div>
				  
				  <div class="col-sm-12">
                    <h5><strong>Výpočet vegetačního indexu SAVI</strong></h5>
				  </div>
                  <div class="col-sm-4"><br>
                    <h5><strong>RED PÁSMO</strong></h5>
                    <select id="">
                        <option value="A">LANDSAT 7</option>
                        <option value="B">LANDSAT 8</option>
                        <option value="C">SENTINEL 2</option>            
                    </select>    
                  </div>
                  <div class="col-sm-4"><br>
                    <h5><strong>NIR PÁSMO</strong></h5>
                    <select id="">
                        <option value="A">LANDSAT 7</option>
                        <option value="B">LANDSAT 8</option>
                        <option value="C">SENTINEL 2</option>            
                    </select>    
                  </div>
				  <div class="col-sm-4"><br>
                    <h5><strong>VÝSLEDEK</strong></h5>
                    <select id="">
                        <option value="A">NDVI L7</option>
                        <option value="B">NDVI L8</option>
                        <option value="C">NDVI S2</option>            
                    </select>    
                  </div>
				  
                  <div class="col-sm-4"><br>
                    <div class="btn-group-vertical">
                    <button id="" class="btn btn-primary btn-sm btn-block">VYPOČÍTAT</button>
                    </div>     
                  </div>
				  <div class="col-sm-4"><br>
                    <div class="btn-group-vertical">
                    <button id="" class="btn btn-primary btn-sm btn-block">PŘIDAT INDEX</button>
                    </div>     
                  </div>
				  <div class="col-sm-4"><br>
                    <div class="btn-group-vertical">
                    <button id="" class="btn btn-primary btn-sm btn-block">ODSTRANIT</button>
                    </div>     
                  </div>
			    </div>
                    
                <div class="sidebar-pane" id="messages"></div>
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
            var zoomHome = L.Control.zoomHome({position: 'topright'});
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

            var baseLayers = {
            "Defaultní": defaultni, 
            };

            var overlays = {
            };
			
					
            L.control.layers(baseLayers, overlays, {collapsed:true}).addTo(map);
            L.control.scale({imperial:false, position:'bottomright'}).addTo(map);
			
			var c = new L.Control.Coordinates();
			c.addTo(map);

			map.on('click', function(e) {
			c.setCoordinates(e);
			});
            
			function getBound(first, third){
                var text1x = first[0], 
                text1y = first[1],
                text2x = third[0],    
                text2y = third[1];
                map.panTo([text1y, text1x]);
                var imageBounds = [[text1y, text1x],[text2y, text2x]];
                var typ = document.getElementById("typ");
                var vybranyTypRastru = typ.options[typ.selectedIndex].value;
                var imageUrl = './data/'+vybranyTypRastru+'.jpg';
                var rastrSnimek = L.imageOverlay(imageUrl, imageBounds).addTo(map);
                if (rastrSnimek==''){
                    var overlays = {
                        "Tilovaný rastr": rastrvrstva,
                        "rastrovy snimek": rastrSnimek
                    }
                }
            }
            //napsat tlačítko které po stisknutí udělá map.removeLayer(rastrSnimek)
            //./data/export/
			//var text1x = $('#text1x').val(), 
                //text1y = $('#text1y').val(),
                //text2x = $('#text2x').val(),    
                //text2y = $('#text2y').val();    
                //console.log($('#text1').val());
                //console.log($('#text2').val());
                //L.marker([text1y, text1x]).addTo(map);
                //L.marker([text2y, text2x]).addTo(map);
				//console.log(vybranyTypRastru);
			
			
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
          //document.getElementById("bound").innerHTML = 
		  //"prvni souřadnice = " + firstA[0] + " a druhá = " + 
		  //firstA[1] + " a třetí = " + third[0] + " a čtvrtá = " + third[1];
          getBound(firstA, third);
        }
    </script>
	<script>
		$("#worktable").click(function(){
		  $.ajax({
			url:'export_rastr.php',
			type:'POST',
			data:{
                export:$("#export").val(),
                },
            success: function(){
				alert("tabulka byla vytvořena");
								}
							});
						});
	</script>
	<script>
		$("#save").click(function(){
		  $.ajax({
			url:'export_rastrfile.php',
			type:'POST',
			data:{
                export: $("#export").val(),
                },
            success: function(){
				alert("soubor byl vytvořen");
								}
							});
						});
	</script>
	<script>
		$("#ndvi").click(function(){
		  $.ajax({
			url:'vegetacni_index.php',
			type:'POST',
			data:{
                pasmo1:$("#pasmo1").val(), 
				pasmo2:$("#pasmo2").val(),
                },
            success: function(){
				alert("index byl vypočítán");
								}
							});
						});
	</script>
	<script>
        $("#metadata").click(function(){
            $.ajax({
                url:'raster_metadata.php',
                type:'POST',
                data:{
                    meta: $("#meta").val(),
					},
                success: function(response){
                    $("#rasterTable").html(response);
                }
            });
        });
    </script>
	
  </body>
</html>