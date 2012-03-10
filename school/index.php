<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8" /> 
        <link rel="stylesheet" type="text/css" href="../styles/style0.css"
    </head>
    <body>
        <div class="login">
            <?php
            require_once 'session.php';
            echo "<h3>" . $school . "</h3>";
            echo "<h4>" . $heads . "</h4>"
            ?>
            <form action="test_reg.php" method="post">
                <fieldset>
                    <legend>Авторизация</legend>
                    <table>
<!--                        <tr><td><label>Фамилия Имя Отчество:</label></td></tr>-->
                        <tr><td>
                                
                                <select name="userid">
                                    <option value="1">Администратор</option>
                                    <option value="2">Каримова Д.С.</option>
                                    <option value="3">Рахманова С.Т.</option>
                                    <option value="4">Гаврильчева Т.А.</option>
                                </select></td></tr>
<!--                        <tr><td><label>Пароль:</label></td></tr>-->
                        <tr><td><input type="password" name="userpass" style="width:248px"/></td></tr>
                        <tr><td><input type="submit" value="Войти в систему"/></td></tr>
                    </table>
                </fieldset>
            </form>
        </div>
    </body>
</html>