<?php
	$typ = $_POST['typ'];
    $db = new PDO('pgsql:host=localhost;port=5432;dbname=diplomka;', 'postgres', 'sr');
    $sql = $db->prepare("SELECT ST_AsText(ST_Transform(ST_Envelope(rast),4326)) As boundwkt
    FROM $typ;");
    $sql->execute();
	    
    while ($row = $sql->fetch(PDO::FETCH_ASSOC)){
        foreach($row as $field=>$value) {
            echo "{$value}";
        }
    }
?>

