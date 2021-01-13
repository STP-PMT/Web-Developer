<?php
class dbconnect
{
    public $servername = 'localhost';
    public $username = 'demo';
    public $password = '123456';
    public $dbname = 'demo';
    public $conn;

    public function db_start()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die($this->console_log('Connect fail' . $this->conn->connect_error));
        } else {
            $this->console_log('Connect completed');
        }
    }

    public function login($username, $password)
    {
        $stmt = $this->conn->prepare("select * from employees where email=?");
        $stmt->bind_param("s", $username);
        $stmt->execute();

        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            include 'home.php';
            $this->console_log("Login Success");
        } else {
            include 'index.html';
            echo "<script>alert('ชื่อผู้ใช้หรือรหัสผ่านผิด');</script>";
            $this->console_log("Login Faile");
        }
    }

    public function console_log($output, $with_script_tags = true)
    {
        $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
            ');';
        if ($with_script_tags) {
            $js_code = '<script>' . $js_code . '</script>';
        }
        echo $js_code;
    }
}

$db = new dbconnect();
$db->db_start();
$db->login($_POST['user'], $_POST['pass']);
$db->conn->close();
