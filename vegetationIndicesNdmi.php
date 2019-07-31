<?php
    $swirpasmo = $_POST['ndmi_swir'];
    $nirpasmo = $_POST['ndmi_nir'];
	$index = $_POST['ndmi'];
    $db = new PDO('pgsql:host=localhost;port=5432;dbname=diplomka;', 'postgres', 'sr');
    $deleteNdmiTable = $db->prepare("DROP TABLE IF EXISTS $index;");
	$deleteNdmiTable->execute();	
	$sql = $db->prepare("CREATE TABLE $index AS SELECT ST_MapAlgebra
					(arast, 1, brast, 1, '([rast1] - [rast2]) / ([rast1] + [rast2])::float', '32BF')
					AS rast FROM 
					(SELECT a.rast as arast, b.rast as brast FROM $swirpasmo a INNER JOIN $nirpasmo b ON a.rid = b.rid) as joined");
    $sql->execute();
?>
