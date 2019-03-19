<?php
        if (isset($_POST['submit'])){
            $db = new PDO('pgsql:host=localhost;port=5432;dbname=vegind;', 'postgres', 'dp2019');
            $table = $_POST['table'];
            $sql = $db->prepare("SELECT rid, ST_AsTIFF(rast) FROM $table");
            $sql->execute();
            }
        ?>
<!DOCTYPE html>
<html>
    <head>
    </head>
    
    <body>
        
        <h2>dotaz na rastr</h2>
        <form action="" method="post">
            <input type="text" name="table" value=""><br>
            <input type="submit" name="submit" value="Submit">
        </form>
        <hr>
        <?php
        echo"<table>";
        while ($row = $sql
               ->fetch(PDO::FETCH_ASSOC)){
            echo "<tr>";
            foreach($row as $field=>$value) {
                echo "<td>{$value}</td>";
            }
            echo "</tr>";
        }
        echo"</table>";
    
    ?>
    </body>

</html>