<?php
    $ls=$_POST['typ'];
    $db = new PDO('pgsql:host=localhost;port=5432;dbname=diplomka;', 'postgres', 'sr');
    $sql = $db->prepare("SELECT ST_AsText(ST_Transform(ST_Envelope(rast),4326)) As boundwkt
    FROM l7b03 WHERE typ = :ls;");
    $params = ["ls"=>$ls];
    $sql->execute($params);
    
    echo "<table class= 'table table-striped'>";
    echo "<tr><th>rid</th><th>datum</th><th>obal</th><th>typ</th></tr>";
    while ($row = $sql->fetch(PDO::FETCH_ASSOC)){
        echo "<tr>";
        foreach($row as $field=>$value) {
            echo "<td>{$value}</td>";
        }
        echo "</tr>";
    }
    echo"</table>";
?>