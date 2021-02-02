<html>

<head>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<style>
.centered {
  position: fixed;
  top: 50%;
  left: 50%;
  /* bring your own prefixes */
  transform: translate(-50%, -50%);
}
</style>
<body>
    <br>
    <div class="centered">
        <form action="">
            <div class="card" style="width: 400px">
                <div class="container">
                    <h1>Login</h1>
                    <div class="form-group">
                        <label for="">email</label>
                        <input type="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">password</label>
                        <input type="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/jquery-3.5.1.min.js"></script>
</body>

</html>