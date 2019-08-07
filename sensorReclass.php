<?php
	$korekcniNdmi = $_POST['korekcniNdmi'];
	//$db = new PDO('pgsql:host=localhost;port=5432;dbname=diplomka;', 'postgres', 'sr');
	$db = new PDO('pgsql:host=158.194.94.120;port=5432;dbname=db_roubalik;', 'roubalik', 'dp_roubalik2019');
	$deleteTable = $db->prepare("DROP TABLE IF EXISTS $korekcniNdmi;");
	$deleteTable->execute();
	$sql = $db->prepare("CREATE TABLE reclassKorekcniIndex AS SELECT 
	ST_Reclass(a.rast,1,']-1-0]:1, (0-0.1]:2, (0.1-1]:3, (-9999:4', '32BF',0)
	FROM $korekcniNdmi AS a;");
    $sql->execute();	
?>
