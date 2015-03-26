<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/classes/class.Graphics.php';

if (isset($_POST['submit'])) {
    $caption = isset($_POST['caption']) ? $_POST['caption'] : '';
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $_graphics->update($id, array($caption));
    header('Location: /admin/graphics/');	
}

if (isset($_GET['id'])) {
	$article = $_graphics->selectById($_GET['id']);
	$smarty->assign('action', 'edit')
		   ->assign('type', 'graphics')
		   ->assign('article', $article[0])
		   ->display('admin.gallery.article.tpl');
} else {
	header('Location: /admin/graphics/');
}

?>