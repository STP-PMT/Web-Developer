<?php
include 'dbconnect.php';
$db = new dbconnect();
$db->db_start();
$db->delete($_GET['id']);
$db->conn->close();
