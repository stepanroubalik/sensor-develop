<?php
    $senzor=$_POST['senzor'];
    $db = new PDO('pgsql:host=localhost;port=5432;dbname=diplomka;', 'postgres', 'sr');
    $sql = $db->prepare("SELECT id, ST_AsGeoJSON(ST_Transform(geom,4326),5) as geom 
	FROM $senzor");
	$sql->execute();
	
	
    //$params = ["ls"=>$ls];
    
    
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
