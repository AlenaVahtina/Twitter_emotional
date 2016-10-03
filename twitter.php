<?php
session_start();
$db = new SQLite3('twitter.db');

if($_SESSION['current_message_id']=="0"){
    $results = $db->query('SELECT id_message FROM apprisal where id_user='.$_SESSION['id'].' order by id_message');
    $myrow = $results->fetchArray();
    $_SESSION['current_message_id']=$myrow['id_message'];
}

if (isset($_POST['emotional'])) {
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

  $db->query('INSERT INTO apprisal(id_user, id_message, emotional_color, inf_color) VALUES('.$_SESSION['id'].', '.$_SESSION['current_message_id'].', '.$emotional_count.', '.$inf_count.' )');
  $_SESSION['current_message_id']=$_SESSION['current_message_id']+1;
} 

$twitt_text= $db->query('SELECT * FROM message where id='.$_SESSION['current_message_id']);//извлекаем из базы message
$twittet_row = $twitt_text->fetchArray();
$_SESSION['m_text']=$twittet_row['m_text']; 

// $bd_apprisal= $db->query('SELECT * FROM apprisal');//извлекаем из базы apprisal
// $apprisal_row=$bd_apprisal->fetchArray();
// $_SESSION['emotional_color']=$twittet_row['emotional_color'];
// $_SESSION['inf_color']=$twittet_row['inf_color'];  
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Emotional Twitter</title>
</head>
<body>

  <style>
   p {
    border: 1px solid blue;
    padding: 10px;
   }
  </style>

<p><img src="twitter_icon.png"></p>


 <p><label type="text" name="m_text">
    <?php
    echo $_SESSION['m_text'];
    ?>
 </label></p>

<form action="/twitter.php" method="post">
  <fieldset>
    <legend>Select a Location: </legend>

    <input type="radio" name="emotional" value="positive">
    <label for="positive">Positive</label>

    <input type="radio" name="emotional" value="neutral">
    <label for="neutral">Neutral</label>

    <input type="radio" name="emotional" value="negative">
    <label for="negative">Negative</label>
  </fieldset>

  <br>
  <input type="radio" name="emotional"  value="uninformative">
  <label for="uninformative">Uninformative</label>

  <br>
  <td><input type="submit" value="Ok" /></td>

</form>
</body>
</html>
