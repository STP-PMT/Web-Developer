<?php
    $servername ="localhost";
    $username ="demo";
    $password ="123456";
    $dbname ="demo";

    $conn = new mysqli($servername ,$username,$password ,$dbname);
    if($conn->connect_error){
        die("Connection Fail".$conn->connect_erroe);
    }else{
        echo "Connection success <br>";
    }

    $email =$_GET['email'];
    $pass = $_GET['password'];
    $sql ="select * from employees where email='".$email."' and password ='".$pass."'";
    echo $sql."<br";
    $result = $conn->query($sql);
    if($result->num_rows == 1){
        echo "Login Success <br>";
        $row = $result->fetch_assoc();
        echo $row['firstName']." ".$row['lastName']." ".$row['email'];
    }else{
        echo "Login Faile";
    }
    //'or'1'='1' and email='dmurphy@classicmodelcars.com
?>