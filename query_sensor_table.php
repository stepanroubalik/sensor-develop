<?php
    $ls=$_POST['datum'];
    $db = new PDO('pgsql:host=localhost;port=5432;dbname=sensorapp;', 'postgres', 'diplomka2019');
    $sql = $db->prepare("SELECT id, datum, vlhkost, typ FROM sensortest WHERE datum = :ls");
    $params = ["ls"=>$ls];
    $sql->execute($params);
    
    echo "<table class= 'table table-striped'>";
    echo "<tr><th>id</th><th>datum</th><th>vlhkost</th><th>typ</th></tr>";
    while ($row = $sql->fetch(PDO::FETCH_ASSOC)){
        echo "<tr>";
        foreach($row as $field=>$value) {
            echo "<td>{$value}</td>";
        }
        echo "</tr>";
    }
    echo"</table>";
?>
