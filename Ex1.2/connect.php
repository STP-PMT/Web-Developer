<?php
class dbconnect
{
    public $servername = '202.28.34.197';
    public $username = 'stu62011212109';
    public $password = '62011212109@csmsu';
    public $dbname = 'stu62011212109';
    public $conn;
    public $place;
    public $d = array();
    public function db_start()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    }
    public function place()
    {
        $stmt = $this->conn->prepare("select * from place");
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            ?> <select class="form-control" name="pl"><?php
            while ($row = $result->fetch_assoc()) { ?>
                
                    <option value="<?=$row['placeid']?>"><?=$row['placename']?></option>
                
            <?php
            }
            ?></select><?php
        }
    }

    public function show($id, $date)
    {
        $stmt = $this->conn->prepare("select * from checkstatus,place where checkstatus.placeid = place.placeid and checkstatus.placeid=? and checkstatus.checkin LIKE " . "'%" . $date . "%'");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {


            ?> <div class="container border  rounded" style="width: 800px; margin-top: 10px;  text-align: center;">
                <div class="row">
                    <div class="col-3 bg-secondary text-light">สถานที่</div>
                    <div class="col-3 bg-secondary text-light">เช็คอิน</div>
                    <div class="col-3 bg-secondary text-light">เช็คเอ๊า</div>
                    <div class="col-3 bg-secondary text-light">หมายเลขโทรศัพท์</div>
                </div>
                <?php
                while ($row = $result->fetch_assoc()) {
                    $this->d = explode(" ", $row['checkin']);
                ?>
                    <div class="row">
                        <div class="col-3"><?= $row['placename'] ?></div>
                        <div class="col-3"><?= $row['checkin'] ?></div>
                        <div class="col-3"><?= $row['checkout'] ?></div>
                        <div class="col-3"><?= $row['phoneno'] ?></div>
                    </div>
                <?php
                }
                ?>
            </div><?php
                } else { ?>
            <div class="container border  rounded" style="width: 800px; margin-top: 10px;  text-align: center;">
                <div class="bg-secondary text-light">ไม่มีข้อมูล</div>
            </div><?php
                }
            }
        }
                    ?>