﻿<?php
// Отображение ошибок.
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// Подключение автоконфига.
include_once 'classes/Autoload.php';

// Подключение класса App.
// Для того чтобы обратиться к классу App, нужно использовать пространство имен classes и имя класса, для этого используется подключение класса: use пространствоИмен\ИмяКласса.
use classes\App;

// Инициализация App.
App::init();
// Запуск приложения.
App::run();
?>
