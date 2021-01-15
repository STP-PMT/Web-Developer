<?php
$db = new dbconnect();
$db->db_start();
?>
<html>

<body>
    <center>
        <div><?php $db = new dbconnect();
                $db->db_start();
                $db->show();
                $db->conn->close(); ?></div>
    </center>

</body>

</html>
<?php

?>