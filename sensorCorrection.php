<?php
	$corNIR = $_POST['corNIR'];
	$corSWIR = $_POST['corSWIR'];
	$sensorHodnota = $_POST['sensorValue'];
	$korekcniNdmi = $_POST['korekcniNdmi'];
	$db = new PDO('pgsql:host=localhost;port=5432;dbname=diplomka;', 'postgres', 'sr');
	$deleteTable = $db->prepare("DROP TABLE IF EXISTS $korekcniNdmi;");
	$deleteTable->execute();
	$sql = $db->prepare("CREATE TABLE $korekcniNdmi AS SELECT ST_MapAlgebra
					(arast, 1, brast, 1, '(-1*([rast1] - [rast2]) / ([rast1] + [rast2] + 0.001) + $sensorHodnota)::float', '32BF')
					AS rast FROM 
					(SELECT a.rast as arast, b.rast as brast FROM $corNIR a INNER JOIN $corSWIR b ON a.rid = b.rid) as joined");
    $sql->execute();
	
?>
