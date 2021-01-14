<?php
$db = new dbconnect();
$db->db_start();
?>
<html>

<body>
    <?php $db->show(); ?>
</body>

</html>
<?php

?>