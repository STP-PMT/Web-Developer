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
        <main id="main">
            <!-- ======= Contact Section ======= -->
            <section class="footer-paralax bg-image sect-mt4 route" style="background-image: url(assets/img/overlay-bg.jpg)">
                <div class="overlay-mf"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="contact-mf">
                                <div id="contact" class="box-shadow-full">
                                    <div class="row">
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
                                            <?php error_reporting(0); ?>
                                            <?php include 'student.php'; ?>
                                            <!-- <div class="error-message"></div> -->
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
                                                            <input type="radio" name="mode" value="add">เพิ่มข้อมูล
                                                            <input type="radio" name="mode" value="delete">ลบ
                                                            <input type="radio" name="mode" value="edit">แก้ไข
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
                                                            วันเกิด
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
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Contact Section -->
        </main>
    </form>

    <!-- End #main -->

    <!-- ======= Footer ======= -->
   
    <!-- End  Footer -->

    <!-- <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <div id="preloader"></div> -->

    <!-- Vendor JS Files -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->
    <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="assets/vendor/counterup/jquery.counterup.min.js"></script>
    <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="assets/vendor/typed.js/typed.min.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>