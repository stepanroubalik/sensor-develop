<?php
	$sensorType = $_POST['sensorType'];
	$datetime = $_POST['datetime'];
	$dbsensor = new PDO('pgsql:host=158.194.94.120;port=5432;dbname=sensor;', 'roubalik', 'dp_roubalik2019');
	$sql = $dbsensor->prepare("SELECT id, ta, timestamp FROM $sensorType WHERE timestamp::text LIKE '$datetime%';");
	$sql->execute();
	$sqlMedian = $dbsensor->prepare("SELECT ROUND(PERCENTILE_CONT(0.50) 
									WITHIN GROUP (ORDER BY ta)::numeric, 3) AS median_item_count
									FROM $sensorType  
									WHERE ta <> 0 AND timestamp::text LIKE '$datetime%';");
	$sqlMedian->execute();
    /*$db = new PDO('pgsql:host=localhost;port=5432;dbname=diplomka;', 'postgres', 'sr');
    $sql = $db->prepare("SELECT coord As coord
    FROM $sens;");
    $sql->execute();*/
	    
    echo "<table id= 'dtHorizontalVerticalExample' class= 'table table-striped table-bordered table-sm' cellspacing='0', width= '100%'>";
    echo "<tr><th>id</th><th>ta</th><th>timestamp</th></tr>";
    while ($row = $sql->fetch(PDO::FETCH_ASSOC)){
        echo "<tr>";
        foreach($row as $field=>$value) {
            echo "<td>{$value}</td>";
        }
        echo "</tr>";
    }
    echo"</table>";
	
	echo "<table id= 'dtHorizontalVerticalExample' class= 'table table-striped table-bordered table-sm' cellspacing='0', width= '100%'>";
    echo "<tr><th>median</th></tr>";
    while ($row = $sqlMedian->fetch(PDO::FETCH_ASSOC)){
        echo "<tr>";
        foreach($row as $field=>$value) {
            echo "<td>{$value}</td>";
        }
        echo "</tr>";
    }
    echo"</table>";
	
?>
