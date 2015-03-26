<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/classes/class.Canvases.php';

$articles = $_canvases->selectAll();
$smarty->assign('articles', $articles)->assign('type', 'canvases')->display('admin.gallery.tpl');
?>