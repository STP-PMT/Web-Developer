<?php
date_default_timezone_set('Asia/Bangkok');
session_start();

$servername = 'localhost';
$username = 'thaichana';
$password = '123456';
$dbname = 'thaichana';
$conn = new mysqli($servername, $username, $password, $dbname);

$date = date("Y-m-d") . " " . date('H:i:s');
$dates = date("Y-m-d") . " " . date('H:i:s', strtotime('+1 hour,15 min'));

$stmt = $conn->prepare('select * from place');
$stmt->execute();
$place = $stmt->get_result();

if (isset($_GET['checkin'])) {
    $phone = $_GET['phoneno'];
    if (is_numeric($phone) and strlen($phone) == 10) {
        $stmt = $conn->prepare('insert INTO checkstatus(checkin, checkout, placeid,phoneno) VALUES (?,?,?,?)');
        $stmt->bind_param('ssis', $date, $dates, $_GET['place'], $phone);
        $stmt->execute();
        $_SESSION["msg"] = '1';
    } else {
        $_SESSION["msg"] = '2';
    }
    header('location:index.php');
}

// if (isset($_POST['port'])) {
//     $stmt = $conn->prepare('select * FROM checkstatus,place WHERE checkstatus.placeid = place.placeid and checkstatus.placeid=? or checkstatus.checkid LIKE ? or checkstatus.checkout LIKE ?');
//     $date = date_create($_POST['datestart']);
//     $d = "'%".date_format($date,"Y-m-d")."%'";
//     $stmt->bind_param('iss',$_POST['place'],$d,$d);
//     $stmt->execute();
//     $result = $stmt->get_result();
    
//     if($stmt->affected_rows==0){
//         $_SESSION['report']=1;
//     }else{
//         $_SESSION['result']=$result;
//         $_SESSION['report']=2;
//     }
// }
