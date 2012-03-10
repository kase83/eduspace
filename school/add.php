<?php

include_once 'dbconnect.php';
$thirdname = $_POST[thirdname];
$firstname = $_POST[firstname];
$secondname = $_POST[secondname];
$gid = $_POST[gid];
$userpass = $_POST[userpass];
$sql = "INSERT INTO users (firstname, secondname, thirdname, gid, password) VALUES ('$firstname', '$secondname', '$thirdname', '$gid', '$userpass')";
if (!mysql_query($sql, $con)) {
    die('Error: ' . mysql_error());
}
@header('Location: users.php');
exit;

?> 