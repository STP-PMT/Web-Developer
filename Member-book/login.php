<?php
include 'dbconnect.php';
$db = new dbconnect();
$db->db_start();
if ($_POST['Login'] == 'Login') {
    $db->login($_POST['user'], $_POST['pass']);
}else{}
$db->conn->close();
?>