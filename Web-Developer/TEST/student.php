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
} else if ($mode == "delete") {
    $idx = 0;
    foreach ($_SESSION['students'] as $s) {
        if ($s->id == $id) {
            array_splice($_SESSION['students'], $idx, 1);
        } else {
            $idx++;
        }
    }
} elseif ($mode == "show") {
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

} elseif ($mode == "save") {
    foreach ($_SESSION['students'] as $s) {
        if ($s->id == $id) {
            $s->id = $id;
            $s->f = $f;
            $s->fullname = $fullname;
            $s->gpa = $gpa;
            $s->level = $level;
            $s->birthday = $birthday;
        }
    }
} elseif ($mode == "edit") {
    foreach ($_SESSION['students'] as $s) {
        if ($s->id == $id) {
            $mode ="save";
    ?>
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
<?php
        }
    }
    echo $mode . "<br>";
   // header('Location: student.php');
}
?>