<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/classes/class.Dimensions.php';

if (isset($_POST['submit'])) {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $text = isset($_POST['text']) ? $_POST['text'] : '';
    $background = isset($_POST['background']) ? $_POST['background'] : '';
    $image_main_id = isset($_POST['image_main_id']) ? $_POST['image_main_id'] : null;
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $_dimensions->update($id, array($name, $text, $background, $image_main_id));
    header('Location: /admin/dimensions/');	
}

if (isset($_GET['id'])) {
	$dimension = $_dimensions->selectById($_GET['id']);
    
	$smarty->assign('action', 'edit')
		   ->assign('dimension', $dimension[0])
		   ->display('admin.dimensions.article.tpl');
} else {
	header('Location: /admin/dimensions/');
}

?>