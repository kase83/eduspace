<?php

session_start();

if (isset($_POST['userid'])) {
    $userid = $_POST['userid'];
    if ($userid == '') {
        unset($userid);
    }
} //заносим введенный пользователем id в переменную $userid, если он пустой, то уничтожаем переменную
if (isset($_POST['userpass'])) {
    $userpass = $_POST['userpass'];
    if ($userpass == '') {
        unset($userpass);
    }
}
//заносим введенный пользователем пароль в переменную $userpass, если он пустой, то уничтожаем переменную
if (empty($userid) or empty($userpass)) { //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    exit("Вы ввели не всю информацию!");
}
//если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
$userid = stripslashes($userid);
$userid = htmlspecialchars($userid);
$userpass = stripslashes($userpass);
$userpass = htmlspecialchars($userpass);
//удаляем лишние пробелы
$userpass = trim($userpass);
// подключаемся к базе
require_once 'dbconnect.php'; // файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 

$result = mysql_query("SELECT * FROM users WHERE userid='$userid'"); //извлекаем из базы все данные о пользователе с введенным логином
$myrow = mysql_fetch_array($result);
if (empty($myrow['userid'])) {
    //если пользователя с введенным id не существует
    echo "Извините, введённый вами пароль неверный.";
    @header('Refresh:2; URL=index.php');
} else {
    //если существует, то сверяем пароли
    if ($myrow['password'] == $userpass) {
        //если пароли совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
        $_SESSION['userid'] = $myrow['userid'];
        $_SESSION['userid'] = $myrow['userid']; //эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
        echo "Вы успешно вошли на сайт как " . $_SESSION['userid'];
        @header('Refresh: 0; URL=cabinet.php');
    } else {
        //если пароли не сошлись

        echo "Извините, введённый вами пароль неверный.";
        @header('Refresh: 2; URL=index.php');
    }
}
?>