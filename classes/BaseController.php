<?php
namespace classes;

class BaseController {
  // Метод запускает работу контроллера.
  public function run($data) {

  }
  // Метод отрисовывает страницу полностью.
  protected function renderFull($tplName, $data) {
    // Отображение head
    $out = $this->render('head', [
    'name' => App::$config->get('name'),
    'css' => App::$config->get('css'),
    'js' => App::$config->get('js'),
    ]);
    // Отображение меню
    $out .= $this->render('menu', []);
    // Отображение основного контента
    $out .= $this->render($tplName, $data);
    // Отображение дополнительной панели
    $out .= $this->render('additional', []);
    // Отображение футера
    $out .= $this->render('footer', []);
    // Возвращение результата
    return $out;
  }
  // Метод отрисовывает один шаблон.
  protected function render($tplName, $data) {
    // Создание объекта шаблона
    $out = new Tpl();
    // Заполнение шаблона данными
    $out->addVars($data);
    // Отрисовка и возвращение шаблона
    return $out->render($tplName);
  }
}
?>
