﻿<form action="methods.php" method="post" enctype="multipart/form-data">
  <input name="name" value="Имя для картинки" type="text">
  <br>
  <input name="myfile" type="file">
  <br>
  <input value="Загрузить" type="submit">
</form>
<?php
// Подключение файла конфигураций
include_once('classes/Config.php');
// Создание объекта конфига
$config = new Config();
// Вывод переменной name из конфигурации
echo $config->get('name');

session_start(); //открываем сессию

$uploadfile ='./uploads/'. time().".jpg"; //совмещаем каталог и имя файла. Функция time возвращает текущее время, это требуется для того, чтобы имена файлов не повторялись.
$_SESSION['filename'] = $uploadfile; //передаем в сессию переменные

$arr = array(); //создаем новый массив для передачи

if (isset($_SESSION['files'])) //проверяем, существует ли такой массив в сессии
	{
		$arr = $_SESSION['files']; //если массив существует, передаем его во временную переменную
	}

$arr[] = $uploadfile; //добавляем в переменную новый элемент
$_SESSION['files'] = $arr; //возвращаем массив в сессию

echo "Последний файл:".$_SESSION['filename']."<br>"; //выводим имя последнего загруженного файла
echo "Список всех файлов:<br>";

foreach ($_SESSION['files'] as $val)
	{
		echo '<img style="width:100px;height:100px;" src="'.$val.'">'; //выводим картинки из массива на страницу
	}
echo "<br>";
echo '<img src="'.$uploadfile.'"><br>'.$_POST['name']; //выводим загруженную картинку

move_uploaded_file($_FILES['myfile']['tmp_name'], $uploadfile); //перемещаем загруженный файл из временной папки на постоянное место хранения

echo '<img src="'.$uploadfile.'"><br>'.$_POST['name']; //выводим загруженную картинку

//Закрытие сессии
unset($_SESSION['filename']);
session_destroy();
?>
