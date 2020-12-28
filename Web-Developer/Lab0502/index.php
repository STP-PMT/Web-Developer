<?php
    $servername  ="localhost";
    $username ="demo";
    $password ="abc123";
    $dbname ="demo";

    $conn = new mysqli($servername,$username,$password,$dbname);
    if($conn-> connect_error){
        die("Connection Fail".$conn->connect_error);
    }else{
        echo "Connection success <br>";
    }

    $sql ="select * from employees";
    $result = $conn->query($sql);

    if($result->num_rows>0){
        ?>
        <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        </style>

            <table>
            <tr>
                <td>Firstname</td>
                <td>Lastname</td>
            </tr>
        <?php
        while($row = $result->fetch_assoc()){
            ?>
                <tr>
                <td><?=$row["firstName"]?></td>
                <td><?=$row["lastName"]?></td>
                </tr>
            <?php
        }
        ?>
        <br>
        </table>
        <?php
    }else{
        echo "No result";
    }
?>