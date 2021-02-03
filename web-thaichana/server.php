<?php
session_start();
$servername = 'localhost';
$username = 'thaichana';
$password = '123456';
$dbname = 'thaichana';
$date = date("Y-m-d") . " " . date('H:i:s', time() - date('Z') + 010700);
$conn = new mysqli($servername, $username, $password, $dbname);

$stmt = $conn->prepare('select * from place');
$stmt->execute();
$place = $stmt->get_result();

if(isset($_GET['checkin'])){
    echo 1;
    $phone = $_GET['phoneno'];
    if(is_numeric($phone) and strlen($phone) == 10){
        $_SESSION["msg"]='1';
    }else{
        $_SESSION["msg"]='2';
    }
    header('location:index.php');
}

?>
