<?php
    session_start();
if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //������� ��������� ������������� ����� � ���������� $login, ���� �� ������, �� ���������� ����������
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
if (empty($login) or empty($password)) //���� ������������ �� ���� ����� ��� ������, �� ������ ������ � ������������� ������
    {
    exit ("�� ����� �� ��� ����������, ��������� ����� � ��������� ��� ����!");
    }
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $login = trim($login);
    $password = trim($password);
    $db = new SQLite3('twitter.db');
    $results = $db->query('SELECT * FROM users');//��������� �� ���� ��� ������ � ������������ � ��������� �������
 
    $myrow = $results->fetchArray();
    if (empty($myrow['pasword']))
    {
    exit ("��������, �������� ���� login ��� ������ ��������.");
    }
    else {
    if ($myrow['pasword']==$password) {
    //���� ������ ���������, �� ��������� ������������ ������! ������ ��� ����������, �� �����!
    $_SESSION['login']=$myrow['login']; 
    $_SESSION['id']=$myrow['id'];//��� ������ ����� ����� ������������, ��� �� � ����� "������ � �����" �������� ������������
    $_SESSION['current_message_id']="0";
    echo "�� ������� ����� �� ����!  
    <br>
    <a href='twitter.php'>������� ��������</a>";
    }
 else {
    //���� ������ �� �������
    exit ("��������, �������� ���� login ��� ������ ��������.");
    }
    }
    ?>