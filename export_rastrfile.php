<?php
	$tmp = $_POST['tmp'];
	$db = new PDO('pgsql:host=localhost;port=5432;dbname=diplomka;', 'postgres', 'sr');
	$createFile = $db->prepare("SELECT lo_export(loid, 'C:\\xampp\htdocs\diplomka\data\l7b04.jpg')
     FROM $tmp;");
	
	//$rastrname = $_POST['rastrname'];
	//$createFile1 = $db->prepare("SELECT lo_export(loid, 'C:\\xampp\htdocs\diplomka\data\$rastrname.jpg')
     //FROM tmp_out;");
    $createFile->execute();
	//echo ($createFile)
	
	
	/*
	Dotaz zní takto: V současném stavu proměnná $createFile vytvoří z dočasné tabulky tmp_out (která zde vstupuje jako proměnná $tmp z odeslaného formuláře) 
	rastr jehož název je v těle selectu definovaný napevno (l7b04.jpg).
	
	Hlavním nedostatkem je že tento název je napevno daný. Stav do kterého by se to mělo dostat je nastíněný v proměnné $createFile1, kde 
	napevno definovaná je dočasná tabulka tmp_out a jako proměnná do řetězce vstupuje hodnota názvu výsledného rastru opět přebraná z odeslaného formuláře.
	Klíčové je mít napevno definované úložiště ('C:\\xampp\htdocs\diplomka\data\), volitelný název rastru pomocí proměnné $rastrname a napevno definovanou
	příponu souboru .jpg'.
	Problém je s parsováním toho řetězce.
	*/
?>

