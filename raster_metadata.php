<?php
    $rs=$_POST['rid'];
    $db = new PDO('pgsql:host=localhost;port=5432;dbname=sensorapp;', 'postgres', 'diplomka2019');
    $sql = $db->prepare("SELECT rid As r, (rm) .upperleftx As ux, (rm) .numbands As nb, (rbm) .* FROM
                        (SELECT rid, ST_MetaData(rast) As rm, ST_BandMetaData(rast,1) As rbm FROM public.l7b03)
                        As r
                        WHERE rid = :rs");
    $params = ["rs"=>$rs];
    $sql->execute($params);

    echo "<table id= 'dtHorizontalVerticalExample' class= 'table table-striped table-bordered table-sm' cellspacing='0', width= '100%'>";
    echo "<tr><th>id</th><th>LHroh</th><th>počet pásem</th><th>bitová hloubka</th></tr>";
    while ($row = $sql->fetch(PDO::FETCH_ASSOC)){
        echo "<tr>";
        foreach($row as $field=>$value) {
            echo "<td>{$value}</td>";
        }
        echo "</tr>";
    }
    echo"</table>";


?>