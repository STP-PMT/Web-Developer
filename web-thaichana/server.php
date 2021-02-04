<?php
date_default_timezone_set('Asia/Bangkok');
session_start();
$servername = 'localhost';
$username = 'thaichana';
$password = '123456';
$dbname = 'thaichana';

// $time = date('H:i:s', time() - date('Z') + 010700);
// $date = date_create(date("Y-m-d"));
$date = date("d-m-Y") . " " . date('H:i:s');
$dates =date("d-m-Y") . " " . date('H:i:s',strtotime('+1 hour,15 min'));
$conn = new mysqli($servername, $username, $password, $dbname);

$stmt = $conn->prepare('select * from place');
$stmt->execute();
$place = $stmt->get_result();

if (isset($_GET['checkin'])) {
    $phone = $_GET['phoneno'];
    if (is_numeric($phone) and strlen($phone) == 10) {
        $stmt = $conn->prepare('insert INTO checkstatus(checkin, checkout, placeid,phoneno) VALUES (?,?,?,?)');
        $stmt->bind_param('ssii',$date,$dats,$_GET['place'],$phone);
        $stmt->execute();
        $place = $stmt->affected_rows;
        echo $place;
        $_SESSION["msg"] = '1';
    } else {
        $_SESSION["msg"] = '2';
    }
    //header('location:index.php');
}
