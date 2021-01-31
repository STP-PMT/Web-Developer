<html>

<head>
    <?php include 'products.php';
    $pd = new products();
    ?>
    <a href="bootstrap/css/bootstrap.min.css"></a>
</head>

<body>
    <div class="container">
        <div class="row">
            <div>

            </div>
            <?=$pd->show();?>
        </div>
    </div>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/jquery-3.5.1.min.js"></script>
</body>

</html>