<?php
    $redpasmo = $_POST['ndviRed'];
    $nirpasmo = $_POST['ndviNir'];
	$ndvi = $_POST['ndvi'];
    $db = new PDO('pgsql:host=localhost;port=5432;dbname=diplomka;', 'postgres', 'sr');
    $deleteNdviTable = $db->prepare("DROP TABLE IF EXISTS $ndvi;");
	$deleteNdviTable->execute();	
	$sql = $db->prepare("CREATE TABLE $ndvi AS SELECT ST_MapAlgebra
					(arast, 1, brast, 1, '(-1*([rast1] - [rast2]) / ([rast1] + [rast2] + 0.001))::float', '32BF')
					AS rast FROM 
					(SELECT a.rast as arast, b.rast as brast FROM $redpasmo a INNER JOIN $nirpasmo b ON a.rid = b.rid) as joined");
    $sql->execute();
?>
