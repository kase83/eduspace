<?php
$school="Управление школой";
$heads="Кадры";
session_start();
if (empty($_SESSION['userid'])) {
//    @header("Location: index.php");
} else {
    // Если не пусты, то мы выводим ссылку
//    echo "Вы вошли на сайт, как " . $_SESSION['username'];
    @header("Location: cabinet.php");
}
?>