<?php
    if (isset($_POST['submit'])){
        $ls=$_POST['datum'];
        $db = new PDO('pgsql:host=localhost;port=5432;dbname=sensorapp;', 'postgres', 'diplomka2019');
        $sql = $db->prepare("SELECT id, datum, vlhkost FROM sensortest WHERE datum= :ls");
        $params = ["ls"=>$ls];
        $sql->execute($params);
    
        echo"<table>";
        while ($row = $sql->fetch(PDO::FETCH_ASSOC)){
            echo "<tr>";
            foreach($row as $field=>$value) {
                echo "<td>{$value}</td>";
            }
            echo "</tr>";
        }
        echo"</table>";
    }
?>

<!DOCTYPE html>
<html>
    <head>
    </head>
    
    <body>
        <form action="" method="post">
            <input type="date" name="datum" value=""><br>
            <input type="submit" name="submit" value="Zobraz">
        </form>
    
    
    </body>

</html>