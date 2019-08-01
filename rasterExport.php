<?php
	/*Create a database connection*/
	$tabulka = $_POST['meta'];
	$db = new PDO('pgsql:host=localhost;port=5432;dbname=diplomka;', 'postgres', 'sr');
	
	/*Create a temporary table and create a jpg file from temp table*/
	$deleteTempTable = $db->prepare("DROP TABLE IF EXISTS tmp_out;");
	$deleteTempTable->execute();
	$createTempTable = $db->prepare("CREATE TABLE tmp_out AS SELECT lo_from_bytea(0, 
	ST_AsGDALRaster(ST_Union(rast), 'JPEG', ARRAY['QUALITY=50'])) AS loid
    FROM $tabulka;");
    $createTempTable->execute();
	$createFile = $db->prepare("SELECT lo_export(loid, 'C:\\xampp\htdocs\diplomka\data\\$tabulka.jpg')
    FROM tmp_out;");
	$createFile->execute();
	
?>



