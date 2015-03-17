<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/classes/class.Walls.php';

$walls = $_walls->selectAll();
$smarty->assign('walls', $walls)->display('admin.walls.tpl');
?>