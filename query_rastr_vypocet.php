<?php
        if (isset($_POST['submit'])){
            $db = new PDO('pgsql:host=localhost;port=5432;dbname=vegind;', 'postgres', 'dp2019');
            $input1 = $_POST['input1'];
            $input2 = $_POST['input2'];
            $result = $_POST['result'];
            $sql = $db->prepare("CREATE TABLE $result AS
                                SELECT ST_MapAlgebra (arast, 1, brast, 1, '((1 + 0.5) * ([rast1] - [rast2]) / ([rast1] + [rast2] + 0.5))::float', '32BF') AS rast
                                FROM (SELECT a.rast as arast, b.rast as brast FROM $input1 a INNER JOIN $input2 b ON a.rid = b.rid) as joined");
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
            <input type="text" name="input1" value=""><br>
            <input type="text" name="input2" value=""><br>
            <input type="text" name="result" value=""><br>
            
            <input type="submit" name="submit" value="Submit">
        </form>
        <hr>
      
        
    <!--$sql = $db->prepare("SELECT * FROM $table");

  
        echo"<table>";
        while ($row = $sql->fetch(PDO::FETCH_ASSOC)){
            echo "<tr>";
            foreach($row as $field=>$value) {
                echo "<td>{$value}</td>";
            }
            echo "</tr>";
        }
        echo"</table>";
    
    -->
    </body>

</html>