<?php
	$sensorType = $_POST['sensorType'];
	$datetime = $_POST['datetime'];
	$dbsensor = new PDO('pgsql:host=158.194.94.120;port=5432;dbname=sensor;', 'roubalik', 'dp_roubalik2019');
	
	$sqlMedian = $dbsensor->prepare("SELECT ROUND(PERCENTILE_CONT(0.50) 
									WITHIN GROUP (ORDER BY ta)::numeric, 3) AS median_item_count
									FROM $sensorType  
									WHERE ta <> 0 AND timestamp::text LIKE '$datetime%';");
	$sqlMedian->execute();
    	
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
