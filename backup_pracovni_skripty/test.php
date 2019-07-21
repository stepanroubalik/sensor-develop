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
                  
	<div class="col-sm-6">
                    <h5><strong>Konverze rastru</strong></h5>
                    <select id="export">
                        <option name="inputrastr" value="l7b04">l7b04</option>
                        <option name="inputrastr" value="l7b05">l7b05</option>
                        <option name="inputrastr" value="l7b03">l7b03</option>            
                    </select>
            		<hr>
                  </div>
	
	
	<div class="col-sm-6">
      <h5><strong>Vyber tabulku</strong></h5>
        <select id="tmp">
          <option name="inputrastr" value="tmp_out">rastr</option>
                  
        </select>
        <hr>
    </div>
	<div class="col-sm-6">
      <div class="btn-group-vertical">
        <button id="worktable" class="btn btn-primary btn-sm btn-block">NAČÍST DO PAMĚTI</button>
        <button id="createfile" class="btn btn-primary btn-sm btn-block">ULOŽIT DO SOUBORU</button>
		<hr>
      </div>     
    </div>
	
	<div class="col-sm-4">
      <h5><strong>Pásmo 1</strong></h5>
        <select id="pasmo1">
          <option value="l7b03">landsat 7 red</option>
		  <option value="l8b03">landsat 8 red</option>
		  <option value="s2b04">sentinel 2 red</option>
                  
        </select>
        <hr>
    </div>
	<div class="col-sm-4">
      <h5><strong>Pásmo 2</strong></h5>
        <select id="pasmo2">
          <option value="l7b04">landsat 7 nir</option>
		  <option value="l8b04">landsat 8 nir</option>
		  <option value="s2b04">sentinel 2 nir</option>
                  
        </select>
        <hr>
    </div>
	
	
	<div class="col-sm-4">
      <div class="btn-group-vertical">
        <button id="ndvi" class="btn btn-primary btn-sm btn-block">Výpočet</button>
        
      </div>     
    </div>
	
	
	
	
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
		$("#createfile").click(function(){
		  $.ajax({
			url:'export_rastrfile.php',
			type:'POST',
			data:{
                tmp:$("#tmp").val(),
                },
            success: function(){
				alert("rastr byl exportován");
								}
							});
						});
	</script>
		
  </body>
</html>
  