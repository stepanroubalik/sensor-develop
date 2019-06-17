<?php
    $rs=$_POST['typ'];
    $db = new PDO('pgsql:host=localhost;port=5432;dbname=diplomka', 'postgres', 'sr');
    $sql = $db->prepare("SELECT rid As rid, ST_Width(rast) As w, ST_Height(rast) As h, round(ST_PixelWidth(rast)::numeric,4) AS pw, round(ST_PixelHeight(rast)::numeric,4) As ph, ST_SRID(rast) AS srid, T_BandPixelType(rast,2) AS bt
    FROM $rs");
    $sql->execute();

    echo "<table id= 'dtHorizontalVerticalExample' class= 'table table-striped table-bordered table-sm' cellspacing='0', width= '100%'>";
    echo "<tr><th>rid</th><th>w</th><th>h</th><th>pw</th><th>ph</th><th>srid</th><th>bt</th></tr>";
    while ($row = $sql->fetch(PDO::FETCH_ASSOC)){
        echo "<tr>";
        foreach($row as $field=>$value) {
            echo "<td>{$value}</td>";
        }
        echo "</tr>";
    }
    echo"</table>";


?>