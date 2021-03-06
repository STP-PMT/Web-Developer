<!DOCTYPE html>
<html lang="en">

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
    <div class="container">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-xs-6">
                            <h2>แก้ไขข้อมูลสมาชิก</h2>
                        </div>
                        <div class="col-xs-6">
                            <a href="index.php" class="btn btn-danger" ><i class="material-icons">&#xE15C;</i> <span>ออกจากระบบ</span></a>
                            <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>เพิ่มสมาชิก</span></a>
                            <a href="#editEmployeeModal" class="btn btn-warning" data-toggle="modal" ><i class="material-icons">&#xf040;</i> <span>แก้ไข</span></a>

                            <!-- <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a> -->
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>
                            </th>
                            <th>ID</th>
                            <th>ชื่อ</th>
                            <th>นามสกุล</th>
                            <th>ชื่อเล่น</th>
                            <th>เบอร์โทร</th>
                            <th>facebook_url</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <div><?php include 'dbconnect.php';
                                $db = new dbconnect();
                                $db->db_start();
                                $db->show();
                                $db->conn->close();
                                ?></div>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="insert.php" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title">เพิ่มสมาชิก</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>ชื่อ</label>
                            <input type="text" name='name' class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>นามสกุล</label>
                            <input type="text" name='lname' class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>ชื่อเล่น</label>
                            <input type="text" name='nname' class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>เบอร์โทร</label>
                            <input type="int" name='phone' class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>facebook_url</label>
                            <input type="text" name='fb' class="form-control" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="ยกเลิก">
                        <input type="submit" class="btn btn-success" name='buttons' value="เพิ่มสมาชิก">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="updateUI.php" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title">ใส่ ID</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>ใส่ ID ของสมาชิกที่ต้องการแก้ไข</label>
                            <input type="int" name='ID' class="form-control" required>
                        </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="ยกเลิก">
                        <input type="submit" class="btn btn-info" value="แก้ไข">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>