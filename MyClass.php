<?php
class Product {
// Двумерный массив со списком товаров
public $items = [
	["name"=>"Женское платье", "size"=>"40-42", "price"=>"8899 тг."],
	["name"=>"Женское платье", "size"=>"44-46", "price"=>"8899 тг."],
	["name"=>"Набор женских топов", "size"=>"40-42", "price"=>"3999 тг."],
	["name"=>"Набор женских топов", "size"=>"44-46", "price"=>"3999 тг."],
	["name"=>"Женская юбка", "size"=>"40-42", "price"=>"7699 тг."],
	["name"=>"Женская юбка", "size"=>"44-46", "price"=>"7699 тг."],
	["name"=>"Балетки", "size"=>"36", "price"=>"6399 тг."],
	["name"=>"Балетки", "size"=>"37", "price"=>"6399 тг."],
	["name"=>"Балетки", "size"=>"38", "price"=>"6399 тг."]
];

// Пустой конструктор
function __construct(){}
     
// Методы:
    // Добавление товара в массив
    public function addItem($item){
		$this->items[] = $item;
		}


    // Вывод на экран списка товаров из массива
        public function printItems(){
	foreach($this->items as $itemKey => $item){
		echo 'Товар №'.$itemKey.'<br/>';
		foreach($item as $key => $value){
			echo $key.' -> '.$value.'<br>';
			}
			echo '<br/>';
		}
	}
	// Подсчет суммы и вывод на экран
	public function printSum(){
		foreach($this->items as $k => $v){
			$sum = $sum + $v['price'];
			}
			echo 'Сумма: '.$sum.'<br/>';
		}
}

// Создаем объект класса:
$object = new Product();
$object->addItem(["name"=>"Женская юбка", "size"=>"40-42", "price"=>"7699"]);
$object->printItems();
$object->printSum();
?>