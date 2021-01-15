<?php
include 'dbconnect.php';
$db = new dbconnect();
$db->db_start();



$db->update($_POST['name'], $_POST['lname'], $_POST['nname'], $_POST['phone'], $_POST['fb'],$_GET['id']);

$db->conn->close();
