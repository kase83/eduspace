<?php

require_once 'dbconnect.php';
if(isset($_POST['userid'])) {
$userid = $_POST['userid'];
$sql = "DELETE FROM users WHERE  userid='$userid';";
$result = mysql_query($sql, $con);
if (!$result) {
    die('Error: ' . mysql_error());
}
}
mysql_close($con);
header("Location: users.php");

?>
