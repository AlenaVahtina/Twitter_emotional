<?php
session_start();
$db = new SQLite3('twitter.db');

if($_SESSION['current_message_id']=="0"){
    if (($db->query('SELECT COUNT(*) FROM apprisal where id_user<>0'))%2==0)
    {
    $results = $db->query('SELECT id_message FROM apprisal where id_user<>'.$_SESSION['id'].' ORDER BY RANDOM() LIMIT 1');  
    $myrow = $results->fetchArray();
    $_SESSION['current_message_id']=$myrow['id_message'];
    }else{
    $results = $db->query('SELECT id FROM message where id not in (select id_message from apprisal)');
    $myrow = $results->fetchArray();
    $_SESSION['current_message_id']=$myrow['id'];
    }
}

if (isset($_POST['emotional'])) {
  // echo "a".$_POST['lable_object_or_sentiment']."a";

    $emotional_count=0;
    $inf_count=0;

    if($_POST['emotional']=='positive'){
      $emotional_count=1;
    } 
      if($_POST['emotional']=='neutral'){
      $emotional_count=2;
    } 
      if($_POST['emotional']=='negative'){
      $emotional_count=3;
    } 
      if($_POST['emotional']=='uninformative'){
      $inf_count=1;
    } 
    // echo "string";

    $db->query('INSERT INTO apprisal(id_user, id_message, emotional_color, inf_color) VALUES('.$_SESSION['id'].', '.$_SESSION['current_message_id'].', '.$emotional_count.', '.$inf_count.' )');
    $_SESSION['current_message_id']=$_SESSION['current_message_id']+1;
} 

if($_POST['lable_object_or_sentiment']!=""){
//  echo 'INSERT INTO  emotional_flag(id_message, object_or_sentiment, emotional_color, word) VALUES('.$_SESSION['current_message_id'].', \''.$_POST['object_or_sentiment'].'\', '.$_POST['emotional_color'].', \''.$_POST['lable_object_or_sentiment'].'\')';
  $db->query('INSERT INTO  emotional_flag(id_message, object_or_sentiment, emotional_color, word) VALUES('.$_SESSION['current_message_id'].', \''.$_POST['object_or_sentiment'].'\', '.$_POST['emotional_color'].', \''.$_POST['lable_object_or_sentiment'].'\')');
}

$twitt_text= $db->query('SELECT * FROM message where id='.$_SESSION['current_message_id']);//извлекаем из базы message
$twittet_row = $twitt_text->fetchArray();
$_SESSION['m_text']=$twittet_row['m_text']; 
?>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Emotional Twitter</title>
</head>
<body>
<center>
  <style>
   p {
    border: 1px solid blue;
    padding: 10px;
    width: 300px; 
    height: 150px;
   }
  </style>

<div align="right">
  <a href='form.php'>Exit</a>
</div>

<img src="twitter_icon.png" alt="Mountain View" width="150" height="100">


 <p><label type="text" name="m_text">
    <?php
    echo $_SESSION['m_text'];
    ?>
 </label></p>

<form action="/twitter.php" method="post">

    <input type="radio" name="emotional" value="positive">
    <label for="positive">Позитивный</label>

    <input type="radio" name="emotional" value="neutral">
    <label for="neutral">Нейтральный</label>

    <input type="radio" name="emotional" value="negative">
    <label for="negative">Негативный</label>
<br>
    <input type="radio" name="emotional"  value="uninformative">
    <label for="uninformative">Малоинформотивный</label>
<br>
<br>

<tr>
<td>Дополнительные функции:</td>
<td><input  name="lable_object_or_sentiment"/></td> 
   
<select name="object_or_sentiment">
  <option value="object">Объект</option>
  <option value="sentiment">Сентимент</option>
</select>
       
<select name="emotional_color">
  <option  value="1">Позитивный</option>
  <option  value="2">Нейтральный</option>
  <option  value="3">Негативный</option>
</select>

    <td><input type="submit" value="Добавить" /></td>
</tr>

<br>
<br>
  <td><input type="submit" value="Ок" /></td>
<br>
<br>
</form>


</center>
</body>
</html>
