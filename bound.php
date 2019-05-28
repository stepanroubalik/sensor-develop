<?php
	$typ = $_POST['typ'];
    $db = new PDO('pgsql:host=localhost;port=5432;dbname=diplomka;', 'postgres', 'sr');
    $sql = $db->prepare("SELECT ST_AsText(ST_Transform(ST_Envelope(rast),4326)) As boundwkt
    FROM $typ;");

    $sql->execute();
	
    //echo "<table class= 'table table-striped'>";
    //echo "<tr><th>bounding box</th></tr>";
    while ($row = $sql->fetch(PDO::FETCH_ASSOC)){
        //echo "<tr>";
        foreach($row as $field=>$value) {
            echo "{$value}";
        }
        //echo "</tr>";
    }
    //echo"</table>";
?>