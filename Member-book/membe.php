<?php
$db = new dbconnect();
$db->db_start();
?>
<html>

<body>

    <div><?php $db = new dbconnect();
            $db->db_start();
            $db->showU();
            $db->conn->close(); ?></div>


</body>

</html>
<?php

?>