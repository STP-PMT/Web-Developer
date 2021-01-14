<?php
class dbconnect
{
    public $servername = '202.28.34.197';
    public $username = 'stu62011212109';
    public $password = '62011212109@csmsu';
    public $dbname = 'stu62011212109';
    public $conn;
    public $pass;

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
        $stmt = $this->conn->prepare("select * from admin where username=?");
        $stmt->bind_param('s', $username);
        $stmt->execute();

        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $this->pass = $row['password'];
        } else {
            $this->pass =  "";
        }

        if (password_verify($password, $this->pass)) {
            include 'memberbook.php';
        } else {
            echo "<script>alert('ชื่อผู้ใช้หรือรหัสผ่านผิด');</script>";
            include 'index.html';
            $this->console_log("Login Faile");
        }
    }

    public function show()
    {
        echo "Hello,world";
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
if ($_POST['Login'] == 'noLogin') {
    include 'memberbook.php';
} else if ($_POST['Login'] == 'Login') {
    $db->login($_POST['user'], $_POST['pass']);
}
$db->conn->close();
