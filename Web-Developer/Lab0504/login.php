<?php
    $servername ="localhost";
    $username ="demo";
    $password ="abc123";
    $dbname ="demo";

    $conn = new mysqli($servername ,$username,$password ,$dbname);
    if($conn->connect_error){
        die("Connection Fail".$conn->connect_erroe);
    }else{
        echo "Connection success <br>";
    }

    $email =$_GET['email'];
    $pass = $_GET['password'];

    $pwdInDB = getPasswordFromDB($conn,$email);

    if(password_verify($pass,$pwdInDB)){
        echo "Login Success";
    }else{
        echo "Login Fail";
    }
    function getPasswordFromDB($conn,$email){
        $stmt = $conn->prepare("select * from employees where email=?");
        $stmt->bind_param("s",$email);
        $stmt->execute();

        $result=$stmt->get_result();
        if($result->num_rows==1){
            $row=$result->fetch_assoc();
            return $row['password'];
        }else{
            return "";
        }
    }
    
    // $stmt = $conn->prepare("select * from employees where email=? and password=?");
    // $stmt->bind_param("ss",$email,$pass);
    // $stmt->execute();

    // $result=$stmt->get_result();
    // if($result->num_rows == 1){
    //     echo "Login Success <br>";
    //     $row = $result->fetch_assoc();
    //     echo $row['firstName']." ".$row['lastName']." ".$row['email'];
    // }else{
    //     echo "Login Faile";
    // }
    
?>