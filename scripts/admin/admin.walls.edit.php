<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/classes/class.Walls.php';

if (isset($_POST['submit'])) {
    $caption = isset($_POST['caption']) ? $_POST['caption'] : '';
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $_walls->update($id, array($caption));
    header('Location: /admin/walls/');	
}

if (isset($_GET['id'])) {
	$article = $_walls->selectById($_GET['id']);
	$smarty->assign('action', 'edit')
		   ->assign('type', 'walls')
		   ->assign('article', $article[0])
		   ->display('admin.gallery.article.tpl');
} else {
	header('Location: /admin/walls/');
}

?>