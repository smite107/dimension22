<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/classes/class.Walls.php';

$articles = $_walls->selectAll();
$smarty->assign('articles', $articles)->assign('type', 'walls')->display('admin.gallery.tpl');
?>