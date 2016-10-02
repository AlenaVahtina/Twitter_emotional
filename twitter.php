<?php
    //  âñÿ ïðîöåäóðà ðàáîòàåò íà ñåññèÿõ. Èìåííî â íåé õðàíÿòñÿ äàííûå  ïîëüçîâàòåëÿ, ïîêà îí íàõîäèòñÿ íà ñàéòå. Î÷åíü âàæíî çàïóñòèòü èõ â  ñàìîì íà÷àëå ñòðàíè÷êè!!!
    session_start();
    ?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Emotional Twitter</title>
</head>
<body>

<IMG scr="twitter_icon.png">

 <LABLE><TEXTAREA type="text" id="twitter"></TEXTAREA></LABLE>
</div>

<form action="/twitter.php" method="post">
<?php 
  $db = new SQLite3('twitter.db');
?>
<input type="text" name="login" size=14 />
  <fieldset>
    <legend>Select a Location: </legend>

    <input type="radio" name="radio-1" id="radio-1">
    <label for="radio-1">Positive</label>

    <input type="radio" name="radio-1" id="radio-2">
    <label for="radio-2">Neutral</label>

    <input type="radio" name="radio-1" id="radio-3">
    <label for="radio-3">Negative</label>
  </fieldset>

  <br>
  <input type="radio" name="radio-1" id="radio-4">
  <label for="radio-4">Uninformative</label>

  <br>
  <td><input type="submit" value="Ok" /></td>

</form>
</body>
</html>
