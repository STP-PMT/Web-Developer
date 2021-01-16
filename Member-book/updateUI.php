<?php
include 'dbconnect.php';
$db = new dbconnect();
$db->db_start();

$stmt = $db->conn->prepare('select * from member_book WHERE ID=?');
$stmt->bind_param('i', $_POST['ID']);
$stmt->bind_result($ID, $name, $lname, $nname, $phone, $fb);
$stmt->execute();

$result = $stmt->get_result();
if ($stmt->num_rows >= 0) {
    while ($row = $result->fetch_assoc()) {
?>
        <html>

        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Bootstrap CRUD Data Table for Database with Modal Form</title>
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
            <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="bootstrap-4.5.3-dist/bootstrap-4.5.3-dist/css/home.css">
            <link rel="stylesheet" href="bootstrap-4.5.3-dist/bootstrap-4.5.3-dist/css/style.css">
        </head>

        <body>
            <div id="editEmployeeModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="update.php" method="POST">
                            <div class="modal-header">
                                <h4 class="modal-title">แก้ไขข้อมูลสมาชิก</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="hidden" name='ID' class="form-control" required  value="<?= $row["ID"] ?>">
                                </div>
                                <div class="form-group">
                                    <label>ชื่อ</label>
                                    <input type="text" name='name' class="form-control" required value="<?= $row["fristName"] ?>">
                                </div>
                                <div class="form-group">
                                    <label>นามสกุล</label>
                                    <input type="text" name='lname' class="form-control" required value="<?= $row["lastName"] ?>">
                                </div>
                                <div class="form-group">
                                    <label>ชื่อเล่น</label>
                                    <input type="text" name='nname' class="form-control" required value="<?= $row["nickName"] ?>">
                                </div>
                                <div class="form-group">
                                    <label>เบอร์โทร</label>
                                    <input type="int" name='phone' class="form-control" required value="<?= $row["phone"] ?>">
                                </div>
                                <div class="form-group">
                                    <label>facebook_url</label>
                                    <input type="text" name='fb' class="form-control" required value="<?= $row["facebook_url"] ?>">
                                </div>
                                <div class="modal-footer">
                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                    <input type="submit" class="btn btn-info">
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </body>

        </html>
<?php
    }
}


?>