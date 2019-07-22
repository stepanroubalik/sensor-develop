<?php
	$sens = $_POST['sens'];
    $db = new PDO('pgsql:host=localhost;port=5432;dbname=diplomka;', 'postgres', 'sr');
    $sql = $db->prepare("SELECT coord As coord
    FROM $sens;");
    $sql->execute();
	    
    while ($row = $sql->fetch(PDO::FETCH_ASSOC)){
        foreach($row as $field=>$value) {
            echo "{$value}";
        }
    }
?>
