<?php
    session_start();
if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $login = trim($login);
    $password = trim($password);
    $db = new SQLite3('twitter.db');
    $results = $db->query('SELECT * FROM users');//извлекаем из базы все данные о пользователе с введенным логином
 
    $myrow = $results->fetchArray();
    if (empty($myrow['pasword']))
    {
    exit ("Извините, введённый вами login или пароль неверный.");
    }
    else {
    if ($myrow['pasword']==$password) {
    //если пароли совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
    $_SESSION['login']=$myrow['login']; 
    $_SESSION['id']=$myrow['id'];//эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
    $_SESSION['current_message_id']="0";
    echo "Вы успешно вошли на сайт!  
    <br>
    <a href='twitter.php'>Главная страница</a>";
    }
 else {
    //если пароли не сошлись
    exit ("Извините, введённый вами login или пароль неверный.");
    }
    }
    ?>