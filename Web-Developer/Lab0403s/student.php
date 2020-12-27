<?php
session_start();
if (!isset($_SESSION['students'])) {
    $_SESSION['students'] = array();
}
class Student
{
    public $id;
    public $fullname;
    public $gpa;
    public $level;
    public $birthday;
    public function __construct($id, $name, $gpa, $level, $birthday)
    {
        $this->id = $id;
        $this->fullname = $name;
        $this->gpa = $gpa;
        $this->level = $level;
        $this->birthday = $birthday;
    }
}

$id = $_POST['id'];
$fullname = $_POST['name'];
$gpa = $_POST['gpa'];
$mode = $_POST['mode'];
$level = $_POST['level'];
$birthday = $_POST['birthday'];


if ($mode == "add") {
    $student = new Student($id, $fullname, $gpa, $level, $birthday);
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
            <th>ชื่อ-สกุล</th>
            <th>เกรด</th>
            <th>ชั้นปี</th>
            <th>วันเกิด</th>
        </tr>
        <?php
        foreach ($_SESSION['students'] as $s) {
        ?>
            <tr>
                <td><?=$s->id?></td>
                <td><?=$s->fullname?></td>
                <td><?=$s->gpa?></td>
                <td><?=$s->level?></td>
                <td><?=$s->birthday?></td>
            <?php

        }
            ?>
    </table>
<?php

}
?>