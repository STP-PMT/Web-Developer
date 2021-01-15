<?php
$db = new dbconnect();
$db->db_start();
?>
<html>

<body>
    <?php   $hashed=password_hash("1234",PASSWORD_DEFAULT);
    echo $hashed; ?>
</body>

</html>
<?php

?>
