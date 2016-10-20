<?php
    //  âñÿ ïðîöåäóðà ðàáîòàåò íà ñåññèÿõ. Èìåííî â íåé õðàíÿòñÿ äàííûå  ïîëüçîâàòåëÿ, ïîêà îí íàõîäèòñÿ íà ñàéòå. Î÷åíü âàæíî çàïóñòèòü èõ â  ñàìîì íà÷àëå ñòðàíè÷êè!!!
    session_start();
    ?>
<body>	
<form action="/testreg.php" method="post">
<table style="width: 300px;">
<tr>
<td>Login:</td>
<td width="100"><input type="text" name="login" size=14 /></td>
</tr>
<tr>
<td>Password:</td>
<td><input type="password" name="password" size=14 /></td>
</tr>
<tr>
<tr>
<td><input name="invisible" type="hidden" value="hiddendata" /></td>
<td><input type="submit" value="Ок" /> <input type="reset" value="Отмена" /></td>
</tr>
</table>

</form>
<br>
</body>
</html>