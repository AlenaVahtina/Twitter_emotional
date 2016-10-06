<?php
    //  вс€ процедура работает на сесси€х. »менно в ней хран€тс€ данные  пользовател€, пока он находитс€ на сайте. ќчень важно запустить их в  самом начале странички!!!
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
<td><input type="submit" value="Ok" /> <input type="reset" value="Cancel" /></td>
</tr>
</table>
</form>
<br>
</body>
</html>