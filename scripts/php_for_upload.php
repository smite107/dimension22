<?php
try {
  require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/classes/class.Images.php';
  $ajaxOtherResult = Array('result' => true, 'message' => 'Загрузка прошла успешно!');  
  $item_id = $_POST['item_id'];
  switch ($_POST['uploadType']) {
    case 'walls':
      require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/classes/class.Walls.php';
      $_POST['__file'] = $_images->insert();
      $_walls->setFieldByName($item_id, 'image', $_POST['__file']);
      break;

    case 'canvases':
      require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/classes/class.Canvases.php';
      $_POST['__file'] = $_images->insert();
      $_canvases->setFieldByName($item_id, 'image', $_POST['__file']);
      break;

    case 'graphics':
      require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/classes/class.Graphics.php';
      $_POST['__file'] = $_images->insert();
      $_graphics->setFieldByName($item_id, 'image', $_POST['__file']);
      break;

    default:
      $ajaxOtherResult['result'] = false;
      $ajaxOtherResult['message'] = 'Неопознаный тип загрузки!';
      break;
  }
} catch (DBException $e) {
  $ajaxOtherResult['result'] = false;
  $ajaxOtherResult['message'] = 'Ошибка связанная с базой данных!';
}
?>