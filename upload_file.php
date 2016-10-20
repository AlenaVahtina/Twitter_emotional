<html>
<body>
<form enctype="multipart/form-data" action="server_upload.php" method="POST">
    <!-- Поле MAX_FILE_SIZE должно быть указано до поля загрузки файла -->
    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
    <!-- Название элемента input определяет имя в массиве $_FILES -->
    Отправить этот файл: 
    <br>
    <input name="userfile" type="file" />
    <br>
    <input type="submit" value="Отправить файл" />
</form>
<br>
<a href='twitter.php'>Главная страница</a>";
</body>
</html>