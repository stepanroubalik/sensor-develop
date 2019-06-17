<?php
	$tabulka = $_POST['export'];
    $db = new PDO('pgsql:host=localhost;port=5432;dbname=diplomka;', 'postgres', 'sr');
    $deleteTable = $db->prepare("DROP TABLE IF EXISTS tmp_out;");
	$deleteTable->execute();
	$createTable = $db->prepare("CREATE TABLE tmp_out AS SELECT lo_from_bytea(0, ST_AsGDALRaster(ST_Union(rast), 'JPEG', ARRAY['QUALITY=50'])) AS loid
    FROM $tabulka;");
    $createTable->execute();
?>

