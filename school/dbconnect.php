<?php

$dbserv=localhost;
$dbuser=root;
$dbpass=VrvMBs;
$db=eduspace;
$con=mysql_connect($dbserv,$dbuser,$dbpass);
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}
mysql_select_db($db, $con);

?>
