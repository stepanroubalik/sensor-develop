<?php
	/*Create a database connection*/
	$tabulka = $_POST['meta'];
	$db = new PDO('pgsql:host=localhost;port=5432;dbname=diplomka;', 'postgres', 'sr');
	
	/*Create and display raster metadata*/
	$sqlMetadata = $db->prepare("SELECT
				ST_Height(rast) As h,
				round(ST_PixelWidth(rast)::numeric,0) AS pw,
				ST_SRID(rast) AS srid,
				ST_BandPixelType(rast,1) AS bt
				FROM $tabulka");
    $sqlMetadata->execute();
    echo "<table id= 'dtHorizontalVerticalExample' class= 'table table-striped table-bordered table-sm' cellspacing='0', width= '100%'>";
    echo "<tr><th>rozměr dlaždice</th><th>velikost pixelu[m]</th><th>srs</th><th>spektrální rozlišení</th></tr>";
    while ($row = $sqlMetadata->fetch(PDO::FETCH_ASSOC)){
        echo "<tr>";
        foreach($row as $field=>$value) {
            echo "<td>{$value}</td>";
        }
        echo "</tr>";
    }
    echo"</table>";
	
	/*Convert raster from 16-bit type to 8-bit type*/
	$sqlTransform = $db->prepare("UPDATE $tabulka SET rast = ST_Reclass(rast,'0–2147483647:0-255', '8BUI');");
	$sqlTransform->execute();
	
	/*Create a temporary table and create a jpg file from temp table*/
	$deleteTempTable = $db->prepare("DROP TABLE IF EXISTS tmp_out;");
	$deleteTempTable->execute();
	$createTempTable = $db->prepare("CREATE TABLE tmp_out AS SELECT lo_from_bytea(0, 
	ST_AsGDALRaster(ST_Union(rast), 'JPEG', ARRAY['QUALITY=50'])) AS loid
    FROM $tabulka;");
    $createTempTable->execute();
	$createFile = $db->prepare("SELECT lo_export(loid, 'C:\\xampp\htdocs\diplomka\data\ndvi.jpg')
    FROM tmp_out;");
	$createFile->execute();
	
?>



