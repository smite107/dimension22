<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/classes/class.Canvases.php';

if (isset($_POST['submit'])) {
    $caption = isset($_POST['caption']) ? $_POST['caption'] : '';
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $_canvases->update($id, array($caption));
    header('Location: /admin/canvases/');	
}

if (isset($_GET['id'])) {
	$article = $_canvases->selectById($_GET['id']);
	$smarty->assign('action', 'edit')
		   ->assign('type', 'canvases')
		   ->assign('article', $article[0])
		   ->display('admin.gallery.article.tpl');
} else {
	header('Location: /admin/canvases/');
}

?>