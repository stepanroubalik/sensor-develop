<?php
    $redpasmo = $_POST['pasmo1'];
    $nirpasmo = $_POST['pasmo2'];
    $db = new PDO('pgsql:host=localhost;port=5432;dbname=diplomka;', 'postgres', 'sr');
    $sql = $db->prepare("CREATE TABLE ndvi AS SELECT ST_MapAlgebra
					(arast, 1, brast, 1, '((1 + 0.5) * ([rast1] - [rast2]) / ([rast1] + [rast2] + 0.5))::float', '32BF')
					AS rast FROM 
					(SELECT a.rast as arast, b.rast as brast FROM $redpasmo a INNER JOIN $nirpasmo b ON a.rid = b.rid) as joined");
    $sql->execute();
?>
