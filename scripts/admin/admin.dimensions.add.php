<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/classes/class.Dimensions.php';

if (isset($_POST['submit'])) {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $text = isset($_POST['text']) ? $_POST['text'] : '';
    $background = isset($_POST['background']) ? $_POST['background'] : '';

    $id = $_dimensions->insert(array($name, $text, $background, null));
    header('Location: /admin/dimensions_edit/?id=' . $id);	
}

$smarty->assign('action', 'add')->display('admin.dimensions.article.tpl');

?>