<?php
// Устаревший вариант
function __autoload($class)
{
    $class = str_replace('\\', '/', $class);
    require_once realpath('./') . '/' . $class . '.php';
}

// Актуальный вариант с безымянной функцией
//Регистрирует заданную функцию в качестве реализации метода __autoload()
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require_once realpath('./') . '/' . $class .'.php');
	}
?>
