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

        <form action="report.php" method="post">
            <div class="row">
                <div class="col-3"></div>

                <div class="col-6"><br><label>เลือกสถานที่</label>
                    <div class="form-group">
                        <select class="form-control" id="sel1" name="place">
                            <?php
                            include 'server.php';
                            while ($row =  $place->fetch_assoc()) {
                            ?><option value=<?= $row['placeid'] ?>><?= $row['placename'] ?></option><?php
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
                    <label>เลือกวันรายงาน</label>
                    <div class="form-group">
                        <input class="form-control" id="datepicker1" width="220" name="datestart" value="03-02-2021">
                        <script>
                            $('#datepicker1').datepicker({
                                format: 'dd-mm-yyyy',
                                uiLibrary: 'bootstrap4'
                            });
                        </script>
                    </div>
                </div>
                <div class="col-3"></div>
            </div>
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6"><input type="submit" name="port" class="btn btn-success btn-block"></input><br><br></div>
                <div class="col-3"></div>
            </div>

        </form>
    </div>
    <?php
    error_reporting(0);
    session_start();

    if (isset($_POST['port'])) {
        $stmt = $conn->prepare('select * FROM checkstatus,place WHERE checkstatus.placeid = place.placeid and checkstatus.placeid=? and checkstatus.checkid LIKE ?');
        $date = date_create($_POST['datestart']);
        $d = "'%" . date_format($date, "Y-m-d") . "%'";
        $stmt->bind_param('is', $_POST['place'], $d);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($stmt->affected_rows != 0) {
    ?>
            <div class="container border  rounded" style="width: 500px; margin-top: 10px;  text-align: center;">
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-4">ไม่มีข้อมูล</div>
                    <div class="col-4"></div>
                </div>
            <?php
        } else {
            ?>
                <div class="container border  rounded" style="width: 800px; margin-top: 10px;  text-align: center;">
                    <div class="row">
                        <div class="col-3 bg-secondary text-light">สถานที่</div>
                        <div class="col-3 bg-secondary text-light">เช็คอิน</div>
                        <div class="col-3 bg-secondary text-light">เช็คเอ๊า</div>
                        <div class="col-3 bg-secondary text-light">หมายเลขโทรศัพท์</div>
                    </div>
                    <?php
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <div class="row">
                            <div class="col-3"><?= $row['placename'] ?></div>
                            <div class="col-3"><?= $row['checkin'] ?></div>
                            <div class="col-3"><?= $row['checkout'] ?></div>
                            <div class="col-3"><?= $row['phoneno'] ?></div>
                        </div>
            <?php
                    }
                }
            }
            ?>
        </div>
</body>

</html>