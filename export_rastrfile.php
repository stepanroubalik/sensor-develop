<?php
	$tmp = $_POST['tmp'];
    $db = new PDO('pgsql:host=localhost;port=5432;dbname=diplomka;', 'postgres', 'sr');
	$createFile = $db->prepare("SELECT lo_export(loid, 'C:\\xampp\htdocs\diplomka\data\l7b05.jpg')
     FROM $tmp;");
    $createFile->execute();
	//echo ($createFile)
?>

