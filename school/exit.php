<?php
session_start();
if (isset($_SESSION['userid'])) {
    unset($_SESSION['userid']);
}
@header('Refresh:0; URL=index.php');
?>
