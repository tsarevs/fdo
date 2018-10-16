<form action="methods.php" method="post" enctype="multipart/form-data">
  <input name="name" value="Имя для картинки" type="text">
  <br>
  <input name="myfile" type="file">
  <br>
  <input value="Загрузить" type="submit">
</form>
<?php
$uploadfile ='./uploads/'. time().".jpg";//совмещаем каталог и имя файла. Функция time возвращает текущее время, это требуется для того, чтобы имена файлов не повторялись.
move_uploaded_file($_FILES['myfile']['tmp_name'], $uploadfile); //перемещаем загруженный файл из временной папки на постоянное место хранения
echo '<img src="'.$uploadfile.'"><br>'.$_POST['name'];//выводим загруженную картинку
?>
