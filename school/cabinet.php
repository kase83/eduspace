<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <?php
        session_start();
        if (empty($_SESSION['userid'])) {
            // Если пусты, то мы не выводим ссылку
            echo "<span>Вы не вошли на сайт</span>";
            @header("Location: index.php");
        } else {
            $userid = $_SESSION['userid'];
            require_once 'dbconnect.php';
            $sql = "SELECT FROM users WHERE userid='$userid'";
            $result = mysql_query($sql);
            $row2 = mysql_fetch_array($result);
            echo $row2['firstname'];
            echo "<h3>Личный кабинет</h3>";
            echo "<p>Пользователь: " . $row2['firstname'] . "</p>";
            echo "<h4>Разделы:</h4>";
            echo "<a href='users.php'>Пользователи</a><br/>";
            echo "<a href='#'>Отчеты</a>";
            mysql_close($con);
        }
        ?>
    </body>
</html>
