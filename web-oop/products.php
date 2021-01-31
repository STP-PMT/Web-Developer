<?php
include 'connect.php';

class products{
    public $productCode;
    public $productName;
    public $productLine;
    
    function __construct()
    {
        
    }

    function show(){
        $conn = new connect();
        $stmt = $conn->db->prepare('select productCode,productName,productLine from products where productCode=1');
        $stmt->execute();
        $stmt->get_result();
        $nAffedted = $stmt->affected_rows;
        echo $nAffedted;
    }
}