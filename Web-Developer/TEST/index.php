<!DOCTYPE html>
<html lang="en">

<head>
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

    <!-- =======================================================
  * Template Name: DevFolio - v2.4.0
  * Template URL: https://bootstrapmade.com/devfolio-bootstrap-portfolio-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body id="page-top">
    <form action="student.php" method="POST" class="php-email-form">
        <div >
            <div >
                <div class="col-md-6">
                    <div class="title-box-2 pt-4 pt-md-0">
                        <h5 class="title-left">
                            ข้อมูลนักเรียน
                        </h5>
                    </div>
                    <div class="more-info">
                        <p class="lead">

                        </p>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="title-box-2">
                        <h5 class="title-left">
                            เพิ่มข้อมูล
                        </h5>

                    </div>
                    <div>
                        <table>
                            <tr>
                                <td>
                                    <input type="radio" name="mode" value="add">Add
                                    <input type="radio" name="mode" value="delete">Delete
                                    <input type="radio" name="mode" value="show">Show
                                    <input type="radio" name="mode" value="edit">edit
                                </td>
                            </tr>
                        </table>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <input type="text" name="id" class="form-control" placeholder="รหัส">
                                    <div class="validate"></div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="f" placeholder="คำนำหน้า">
                                    <div class="validate"></div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="ชื่อ-สกุล">
                                    <div class="validate"></div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="gpa" placeholder="เกรด">
                                    <div class="validate"></div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="level" placeholder="ชั้นปี">
                                    <div class="validate"></div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <input type="date" class="form-control" name="birthday" placeholder="วันเกิด">
                                    <div class="validate"></div>
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <button type="submit" class="button button-a button-big button-rouded">ส่ง</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

 
    <script src="assets/js/main.js"></script>

</body>

</html>