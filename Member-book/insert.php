<?php
include 'dbconnect.php';
$db = new dbconnect();
$db->db_start();

$db->insert($_POST['name'], $_POST['lname'], $_POST['nname'], $_POST['phone'], $_POST['fb']);

$db->conn->close();
