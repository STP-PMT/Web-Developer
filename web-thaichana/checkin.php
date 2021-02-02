<?php
$servername = 'localhost';
$username = 'thaichana';
$password = '123456';
$dbname = 'thaichana';
$date = date("Y-m-d") . " " . date('H:i:s', time() - date('Z') + 010700);
$conn = new mysqli($servername, $username, $password, $dbname);

// $stmt = $conn->prepare('');
// $stmt->bind_param();
// $stmt->execute();

?>
