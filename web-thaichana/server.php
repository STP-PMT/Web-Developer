<?php
date_default_timezone_set('Asia/Bangkok');
session_start();

$servername = 'localhost';
$username = 'thaichana';
$password = '123456';
$dbname = 'thaichana';
$conn = new mysqli($servername, $username, $password, $dbname);

$date = date("Y-m-d") . " " . date('H:i:s');
$dates =date("Y-m-d") . " " . date('H:i:s',strtotime('+1 hour,15 min'));

$stmt = $conn->prepare('select * from place');
$stmt->execute();
$place = $stmt->get_result();

if (isset($_GET['checkin'])) {
    $phone = $_GET['phoneno'];
    if (is_numeric($phone) and strlen($phone) == 10) {
        $stmt = $conn->prepare('insert INTO checkstatus(checkin, checkout, placeid,phoneno) VALUES (?,?,?,?)');
        $stmt->bind_param('ssis',$date,$dates,$_GET['place'],$phone);
        $stmt->execute();
        $_SESSION["msg"] = '1';
    } else {
        $_SESSION["msg"] = '2';
    }
    header('location:index.php');
}
