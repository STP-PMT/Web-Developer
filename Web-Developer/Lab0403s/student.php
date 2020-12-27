<?php
session_start();
if (!isset($_SESSION['students'])) {
    $_SESSION['students'] = array();
}
class Student
{
    public $id;
    public $f;
    public $fullname;
    public $gpa;
    public $level;
    public $birthday;
    public function __construct($id, $f, $name, $gpa, $level, $birthday)
    {
        $this->id = $id;
        $this->f = $f;
        $this->fullname = $name;
        $this->gpa = $gpa;
        $this->level = $level;
        $this->birthday = $birthday;
    }
}

?><table>
    <tr>
        <th>รหัส</th>
        <th>คำนำหน้า</th>
        <th>ชื่อ-สกุล</th>
        <th>เกรด</th>
        <th>ชั้นปี</th>
        <th>วันเกิด</th>
    </tr>
    <?php
    foreach ($_SESSION['students'] as $s) {
    ?>
        <tr>
            <td><?= $s->id ?></td>
            <td><?= $s->f ?></td>
            <td><?= $s->fullname ?></td>
            <td><?= $s->gpa ?></td>
            <td><?= $s->level ?></td>
            <td><?= $s->birthday ?></td>
        <?php

    }
        ?>
</table>
<?php

$id = $_POST['id'];
$f = $_POST['f'];
$fullname = $_POST['name'];
$gpa = $_POST['gpa'];
$mode = $_POST['mode'];
$level = $_POST['level'];
$birthday = $_POST['birthday'];




if ($mode == "add") {
    $student = new Student($id, $f, $fullname, $gpa, $level, $birthday);
    array_push($_SESSION['students'], $student);
    header('Location: index.php');
} else if ($mode == "delete") {
    $idx = 0;
    foreach ($_SESSION['students'] as $s) {
        if ($s->id == $id) {
            array_splice($_SESSION['students'], $idx, 1);
        } else {
            $idx++;
        }
    }
    header('Location: index.php');
} elseif ($mode == "show") {
} elseif ($mode == "save") {
    echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
    $idx = 0;
    foreach ($_SESSION['students'] as $s) {
        if ($s->id == $id) {
            $s->id = $id;
            $s->f = $f;
            $s->fullname = $fullname;
            $s->gpa = $gpa;
            $s->level = $level;
            $s->birthday = $birthday;
        }
        $idx++;
    }
    header('Location: index.php');
} elseif ($mode == "edit") {
    foreach ($_SESSION['students'] as $s) {
        if ($s->id == $id) {
?>
            <meta charset="utf-8">
            <meta content="width=device-width, initial-scale=1.0" name="viewport">

            <title>STPPMT</title>
            <meta content="" name="description">
            <meta content="" name="keywords">


            <!-- Favicons -->
            <link href="assets/img/favicon.png" rel="icon">
            <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

            <!-- Vendor CSS Files -->
            <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
            <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
            <link href="assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
            <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
            <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">

            <!-- Template Main CSS File -->
            <link href="assets/css/style.css" rel="stylesheet">
            <section class="footer-paralax bg-image sect-mt4 route" style="background-image: url(assets/img/overlay-bg.jpg)">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="contact-mf">
                                <div id="contact" class="box-shadow-full">
                                    <div class="row">
                                        <form action="student.php" method="POST">
                                            <input type="hidden" name="mode" value="save">
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <div class="form-group">
                                                        <input type="text" name="id" class="form-control" placeholder="รหัส" value="<?= $s->id ?>">
                                                        <div class="validate"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="f" placeholder="คำนำหน้า" value="<?= $s->f ?>">
                                                        <div class="validate"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="name" placeholder="ชื่อ-สกุล" value="<?= $s->fullname ?>">
                                                        <div class="validate"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="gpa" placeholder="เกรด" value="<?= $s->gpa ?>">
                                                        <div class="validate"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="level" placeholder="ชั้นปี" value="<?= $s->level ?>">
                                                        <div class="validate"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <div class="form-group">
                                                        <input type="date" class="form-control" name="birthday" placeholder="วันเกิด" value="<?= $s->birthday ?>">
                                                        <div class="validate"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 text-center">
                                                    <button type="submit" class="button button-a button-big button-rouded">บันทึก</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

<?php
        }
    }
}
?>