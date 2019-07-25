<?php
	$sens = $_POST['sens'];
    $db = new PDO('pgsql:host=localhost;port=5432;dbname=diplomka;', 'postgres', 'sr');
    $sqlLocation = $db->prepare("SELECT coord As coord FROM $sens;");
    $sqlLocation->execute();
	
	while ($row = $sqlLocation->fetch(PDO::FETCH_ASSOC)){
        foreach($row as $field=>$value) {
            echo "{$value}";
        }
    }	
?>
