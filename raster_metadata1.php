<?php
    $ls=$_POST['rid'];
    $db = new PDO('pgsql:host=localhost;port=5432;dbname=sensorapp;', 'postgres', 'diplomka2019');
    $sql = $db->prepare("SELECT rid, ST_SRID(rast), filename, round(ST_PixelWidth(rast)::numeric,4), ST_BandPixelType(rast)
                        FROM l7 WHERE rid = :ls");
    $params = ["ls"=>$ls];
    $sql->execute($params);

    echo "<br>";
    echo "<table class= 'table table-striped table-bordered table-sm' cellspacing='0', width= '100%'>";
    echo "<tr><th>raster id</th><th>srid</th> <th>file</th> <th>velikost pixelu</th><th>bitová hloubka</th></tr>";
    while ($row = $sql->fetch(PDO::FETCH_ASSOC)){
        echo "<tr>";
        foreach($row as $field=>$value) {
            echo "<td>{$value}</td>";
        }
        echo "</tr>";
    }
    echo"</table>";


?>