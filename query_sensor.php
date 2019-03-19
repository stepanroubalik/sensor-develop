<?php
    if (isset($_POST['submit'])){
        $ls=$_POST['datum'];
        $db = new PDO('pgsql:host=localhost;port=5432;dbname=vegind;', 'postgres', 'dp2019');
        $sql = $db->prepare("SELECT id, datum, vlhkost FROM sensory WHERE datum> :ls");
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
            <input type="submit" name="submit" value="Submit">
        </form>
    
    
    </body>

</html>