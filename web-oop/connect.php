<?php
class connect{
    public $db;
    function __construct()
    {
        $serverName = '202.28.34.197';
        $userName ='stu62011212109';
        $password = '62011212109@csmsu';
        $dbname ='stu62011212109';

        $this->db = new mysqli($serverName,$userName,$password,$dbname);
    }
}