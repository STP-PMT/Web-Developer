<?php
include 'connect.php';
$con = new dbconnect();
$con->db_start();
// error_reporting(0);
?>

<html>

<head>
    <meta charset="utf8">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<style>
    @font-face {
        font-family: myFirstFont;
        src: url(font/Kanit/Kanit-Regular.ttf);
    }

    * {
        font-family: myFirstFont;
    }
</style>

<body>
    <div class="container" style="padding: 1%;">
        <div class="container" style="width: 600px; padding: 30px">
            <div class="row text-center">
                <div class="col-6">
                    <a href="">เช็คอินสถานที่</a>
                </div>
                <div class="col-6">
                    <a href="">ตรวจสอบข้อมูล</a>
                </div>
            </div>
        </div>
        <div class="container" style="width: 600px;padding: 30px">
            <div class="card">
                <center>
                    <form action="show.php" method="POST">
                        <div class="container" style="width: 300px">
                            <br>
                            <div class="form-group ">
                                <div class="dropdown">
                                    <label for="">เลือกสถานที่</label>
                                    <?php 
                                    $con->place();
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">เลือกวันรายงาน</label>
                                <input type="date" name="date" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success  btn-lg btn-block">แสดงรายงาน</button>
                            </div>
                        </div>
                    </form>
                </center>
                <br> <br> <br>
            </div>
        </div>
    </div><?php
    $con->show($_POST['pl'],$_POST['date']);?>
    </script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/jquery-3.5.1.min.js"></script>
</body>

</html>