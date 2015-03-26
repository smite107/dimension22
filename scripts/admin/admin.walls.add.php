<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/classes/class.Walls.php';

if (isset($_POST['submit'])) {
    $caption = isset($_POST['caption']) ? $_POST['caption'] : '';
    $id = $_walls->insert(array($caption));
    header('Location: /admin/walls_edit/?id=' . $id);	
}

$smarty->assign('action', 'add')->assign('type', 'walls')->display('admin.gallery.article.tpl');

?>