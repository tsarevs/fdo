<form action="methods.php" method="post" enctype="multipart/form-data">
  <input name="name" value="Имя для картинки" type="text">
  <br>
  <input name="myfile" type="file">
  <br>
  <input value="Загрузить" type="submit">
</form>
<?php
// Подключение файла конфигураций.
include_once('classes/Config.php');
// Создание объекта конфига.
$config = new Config();
// Вывод переменной name из конфигурации.
echo $config->get('name');

session_start();//открываем сессию
$uploadfile ='./uploads/'. time().".jpg";//совмещаем каталог и имя файла. Функция time возвращает текущее время, это требуется для того, чтобы имена файлов не повторялись.
move_uploaded_file($_FILES['myfile']['tmp_name'], $uploadfile); //перемещаем загруженный файл из временной папки на постоянное место хранения
$_SESSION['filename']=$uploadfile;//передаем в сессию переменные
$arr=array();//создаем новый массив для передачи
if (isset($_SESSION['files']))//проверяем, существует ли такой массив в сессии
{
$arr=$_SESSION['files'];//если массив существует, передаем его во временную переменную
}
$arr[]=$uploadfile;//добавляем в переменную новый элемент
$_SESSION['files']=$arr;//возвращаем массив в сессию
echo "Список всех файлов:<br>";
foreach($_SESSION['files'] as $val)//в цикле перебираем все элементы массива в сессии
{
    echo $val.'<br>';//выводим имена файлов из массива на страницу
}
//echo "Последний загруженный файл: ".$_SESSION['filename']."<br><br>";//выводим имя последнего загруженного файла

$fp = fopen('upload_images.txt', 'at'); // Открываем файл в режиме записи
//$mytext = 'Строка для файла \r\n'; // Исходная строка
$mytext = $val;// Передаем переменной все имена файлов их массива
$test = fwrite($fp, $mytext); // Запись в файл
if ($test) echo 'Данные записаны.';
else echo 'Ошибка записи.';
fclose($fp); //Закрываем файл

//unset($_SESSION['filename']);
//session_destroy();
?>
