
<?php
include_once('config/connection.php');
session_unset();
session_destroy();
echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php\">";
exit();
?>