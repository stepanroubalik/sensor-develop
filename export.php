<?php
	$tabulka = $_POST['export'];
    $db = new PDO('pgsql:host=localhost;port=5432;dbname=diplomka;', 'postgres', 'sr');
    $sql = $db->prepare("CREATE TABLE tmp_out AS SELECT lo_from_bytea(0, ST_AsGDALRaster(ST_Union(rast), 'JPEG', ARRAY['QUALITY=50'])) AS loid
    FROM $tabulka;");
    $sql->execute();
	
	 
	
		
?>

