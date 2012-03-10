<?php

require_once 'dbconnect.php';
$userid = $_SESSION['userid'];
$firstname = $_POST['firstname'];
$secondname = $_POST['secondname'];
$thirdname = $_POST['thirdname'];
$sql = "UPDATE users SET secondname='$secondname', firstname='$firstname', thirdname='$thirdname' WHERE userid='$userid';";
$result = mysql_query($sql, $con);
if (!$result) {
    die('Error: ' . mysql_error());
}
header("Location: users.php");
?>
