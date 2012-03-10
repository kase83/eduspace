<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="../styles/style0.css" type="text/css" rel="stylesheet"/>
    </head>
    <body>
        <?php
        session_start();
        if (empty($_SESSION['userid'])) {
            echo "<span>Вы не вошли на сайт</span>";
            @header("Location: index.php");
            exit;
        } else {
            echo " <form action='exit.php' method='post'><input type='submit' value='Выйти' /></form>";
        }
        ?>

        <h3>Добавить нового пользователя</h3>
        <form action="add.php" method="post">
            <table>
                <tr><td>Фамилия:</td><td> <input type="text" name="secondname" /></td></tr>
                <tr><td>Имя:</td><td><input type="text" name="firstname" /></td></tr>
                <tr><td>Отчество:</td><td><input type="text" name="thirdname" /></td></tr>
                <tr><td>Роль:</td>
                    <td><select name="gid">
                            <option value="1">Администратор</option>
                            <option value="2">Учитель</option>
                            <option value="3">Ученик</option>
                            <option value="4">Родитель</option>
                        </select></td></tr>
                <tr><td>Пароль:</td><td><input type="text" name="userpass" /></td></tr>
                <tr><td></td><td><input type="submit" value="Добавить" /><input type="hidden" name="add" value="off" /></td></tr>

            </table>
        </form>

        <?php
        require_once 'dbconnect.php';
        global $result_pupils;
        $sql = "SELECT * FROM users, groups WHERE users.gid=groups.gid;";
        $sql2 = "SELECT COUNT(*) FROM users;";
        $sql3 = "SELECT COUNT(*) FROM users where gid=2;";
        $sql4 = "SELECT COUNT(*) FROM users where gid=3;";
        $sql5 = "SELECT COUNT(*) FROM users where gid=4;";
        $sql_teachers = "SELECT * FROM users, groups WHERE users.gid=groups.gid AND groups.gid=2;";
        $sql_pupils = "SELECT * FROM users, groups WHERE users.gid=groups.gid AND groups.gid=3;";
        $result = mysql_query($sql);
        $result2 = mysql_query($sql2);
        $result3 = mysql_query($sql3);
        $result4 = mysql_query($sql4);
        $result5 = mysql_query($sql5);
        $result_teachers = mysql_query($sql_teachers);
        $result_pupils = mysql_query($sql_pupils);
        $row2 = mysql_fetch_array($result2);
        $row3 = mysql_fetch_array($result3);
        $row4 = mysql_fetch_array($result4);
        $row5 = mysql_fetch_array($result5);
//        $row_teachers = mysql_fetch_array($result_teachers);
//        $row_pupils = mysql_fetch_array($result_pupils);
        if (!$result) {
            die('Error: ' . mysql_error());
        }
        
        echo "<table class=users>";
        echo "<colgroup span=1 width=5%></colgroup>";
        echo "<colgroup span=5 width=15%></colgroup>";
        echo "<colgroup span=2 width=5%></colgroup>";
        echo "<caption>Список всех пользователей</caption>";
        echo "<th>#</th><th>Фамилия</th><th>Имя</th><th>Отчество</th><th>Роль</th><th>Пароль</th><th colspan='2'>Действия</th>";
        while ($row = mysql_fetch_array($result)) {
            echo "<tr><td><input type='hidden' value=" . $row['userid'] . " />" . $row['userid'] . "</td><td>" . $row['secondname'] . "</td><td>" . $row['firstname'] . "</td>
                <td>" . $row['thirdname'] . "</td><td>" . $row['groupname'] . "</td><td> " . $row['password'] . "</td><td><a href='edit.php'>Изменить</a></td><td><a href='delete.php?userid=$row[userid]'>Удалить</a></td></tr>";
        }
        echo "</table>";
        echo "<p>Пользователей: " . $row2['0'] . " | Учителей: " . $row3['0'] . " | Учеников: " . $row4['0'] . " | Родителей: " . $row5['0'] . "</p>";
        
        
        echo "<table class=users>";
        echo "<colgroup span=1 width=5%></colgroup>";
        echo "<colgroup span=5 width=15%></colgroup>";
        echo "<colgroup span=2 width=5%></colgroup>";
        echo "<caption>Список учителей</caption>";
        echo "<th>#</th><th>Фамилия</th><th>Имя</th><th>Отчество</th><th>Роль</th><th>Пароль</th><th colspan='2'>Действия</th>";
        while ($row = mysql_fetch_array($result_teachers)) {
            echo "<tr><td>" . $row['userid'] . "</td><td>" . $row['secondname'] . "</td><td>" . $row['firstname'] . "</td>
                <td>" . $row['thirdname'] . "</td><td>" . $row['groupname'] . "</td><td> " . $row['password'] . "</td><td><form action='edit.php' method='post'><input type='hidden' value=" . $row['userid'] . " /><input type='submit' value='Изменить'/></form></td><td><form action='delete.php' method='post'><input type='hidden' value=" . $row['userid'] . " /><input type='submit' value='Удалить'/></form></td></tr>";
        }
        echo "</table>";
        
               
        echo "<table class=users>";
        echo "<colgroup span=1 width=5%></colgroup>";
        echo "<colgroup span=5 width=15%></colgroup>";
        echo "<colgroup span=2 width=5%></colgroup>";
        echo "<caption>Список учеников</caption>";
        echo "<th>#</th><th>Фамилия</th><th>Имя</th><th>Отчество</th><th>Роль</th><th>Пароль</th><th colspan='2'>Действия</th>";
        while ($row_pupils = mysql_fetch_array($result_pupils)) {
            echo "<tr><td><input type='hidden' value=" . $row_pupils['userid'] . " />" . $row_pupils['userid'] . "</td><td>" . $row_pupils['secondname'] . "</td><td>" . $row_pupils['firstname'] . "</td>
                <td>" . $row_pupils['thirdname'] . "</td><td>" . $row_pupils['groupname'] . "</td><td> " . $row_pupils['password'] . "</td><td><a href='edit.php'>Изменить</a></td><td><a href='delete.php?userid=$row[userid]'>Удалить</a></td></tr>";
        }
        echo "</table>";
        
        
        
        
        mysql_close($con);
        ?>


    </body>
</html> 

