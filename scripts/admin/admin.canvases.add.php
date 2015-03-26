<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/classes/class.Canvases.php';

if (isset($_POST['submit'])) {
    $caption = isset($_POST['caption']) ? $_POST['caption'] : '';
    $id = $_canvases->insert(array($caption));
    header('Location: /admin/canvases_edit/?id=' . $id);	
}

$smarty->assign('action', 'add')->assign('type', 'canvases')->display('admin.gallery.article.tpl');

?>