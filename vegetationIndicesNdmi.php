<?php
    $ndmiSwir = $_POST['ndmiSwir'];
    $ndmiNir = $_POST['ndmiNir'];
	$index = $_POST['ndmi'];
    $db = new PDO('pgsql:host=localhost;port=5432;dbname=diplomka;', 'postgres', 'sr');
    $deleteNdmiTable = $db->prepare("DROP TABLE IF EXISTS $index;");
	$deleteNdmiTable->execute();	
	$sql = $db->prepare("CREATE TABLE $index AS SELECT ST_MapAlgebra
					(arast, 1, brast, 1, '(-1*([rast1] - [rast2]) / ([rast1] + [rast2] + 0.001))::float', '32BF')
					AS rast FROM 
					(SELECT a.rast as arast, b.rast as brast FROM $ndmiNir a INNER JOIN $ndmiSwir b ON a.rid = b.rid) as joined");
    $sql->execute();
?>
