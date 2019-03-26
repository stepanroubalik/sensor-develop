<?php
    $ls=$_POST['datum'];
    $db = new PDO('pgsql:host=localhost;port=5432;dbname=sensorapp;', 'postgres', 'diplomka2019');
    $sql = $db->prepare("SELECT id, ST_AsGeoJSON(ST_Transform(geom,4326),5) as geom, datum, vlhkost, typ FROM sensortest WHERE datum = :ls");
    $params = ["ls"=>$ls];
    $sql->execute($params);
    
    $features=[];
    while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
        $feature=['type'=>"Feature"];
        $feature=['geometry']=json_decode($row['geom']);
        unset($row['geom']);
        $feature['properties']=$row;
        array_push($features, $feature);
    }
    $featureCollection=['type'=>'FeatureCollection', 'features'=>$features];
    echo json_encode($featureCollection);
?>
