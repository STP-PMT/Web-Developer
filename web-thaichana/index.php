<html>

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

</head>

<body>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />


    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <div class="container" style="width: 500px; margin-top: 50px; text-align: center;">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-5"><a href="index.php">เช็คอินสถานที่</a></div>
            <div class="col-1"></div>
            <div class="col-4"><a href="report.php">ตรวจสอบข้อมูล</a></div>
            <div class="col-1"></div>
        </div>
    </div>
    </div>

    <div class="container border  rounded" style="width: 500px;  margin-top: 50px; text-align: center;">
        <form action="server.php" method="get">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    <br>
                    <div class="form-group">
                        <label>เลือกสถานที่ จำลองการเช็คอิน</label>
                        <select class="form-control" id="sel1" name="place">
                            <?php
                                include 'server.php';
                                while ($row =  $place->fetch_assoc()) {
                                    ?><option value=<?=$row['placeid']?>><?=$row['placename']?></option><?php
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-3"></div>
            </div>
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="หมายเลขโทรศัพท์" name="phoneno"></input><br> <input type="submit" name="checkin" value="เช็คอิน" class="btn btn-success btn-block"></input><br><br>
                        <?php
                        error_reporting(0);
                        session_start();
                        if ($_SESSION['msg'] == '1') {
                            echo '<label for=""><span class="text-success">
                                <p>*เช็คอินเรียบร้อย</p>
                            </span></label>';
                        } else if ($_SESSION['msg'] == '2') {
                            echo '<label for=""><span class="text-danger">
                                <p>*หมายเลขโทรศัพท์ไม่ถูกต้อง</p>
                            </span></label>';
                        }
                        unset($_SESSION['msg']);
                        ?>
                        <label for=""><span class="text-muted">
                                <p>หมายเหตุ - ระบบต้องบันทึกการเช็คอินเป็นวันเวลาปัจจุบัน และจำลองการเช็คเอ๊าในอีก 1 ชม.15 นาที</p>
                            </span>
                        </label>
                    </div>
                </div>
                <div class="col-3"></div>
            </div>
        </form>
    </div>
    
</body>

</html>