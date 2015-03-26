<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/classes/class.Graphics.php';

if (isset($_POST['submit'])) {
    $caption = isset($_POST['caption']) ? $_POST['caption'] : '';
    $id = $_graphics->insert(array($caption));
    header('Location: /admin/graphics_edit/?id=' . $id);	
}

$smarty->assign('action', 'add')->assign('type', 'graphics')->display('admin.gallery.article.tpl');

?>