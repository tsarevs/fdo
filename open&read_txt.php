<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Документ без названия</title>
</head>

<body>
<?php
$fp = fopen('file.txt', 'rt'); // Открываем файл в режиме чтения
if ($fp)//если файл открыт
{
while (!feof($fp))//цикл, который повторяется до окончания файла (условие feof)
{
$mytext = fgets($fp, 4096);//считываем данные
echo $mytext.'<br>';//выводим на экран
}
}
else echo 'Ошибка при открытии';
fclose($fp);
?>
</body>
</html>