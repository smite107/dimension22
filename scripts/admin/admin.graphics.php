<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/classes/class.Graphics.php';

$articles = $_graphics->selectAll();
$smarty->assign('articles', $articles)->assign('type', 'graphics')->display('admin.gallery.tpl');
?>